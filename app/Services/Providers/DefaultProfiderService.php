<?php


namespace App\Services\Providers;

use App\Exceptions\ValidatorException;
use App\Models\Customer;
use App\Models\CustomerProvider;
use App\Models\GenericEvent;
use App\Models\ProcessedTransaction;
use App\Models\ProviderEvent;
use App\Models\RawTransaction;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

/**
 * Class DefaultProfiderService
 * @package App\Services\Providers
 */
abstract class DefaultProfiderService
{
    /**
     * @var Request
     */
    public $request;

    /**
     * @var
     */
    public $providerId;

    /**
     * @var
     */
    public $customerId;

    /**
     * DefaultProfiderService constructor.
     * @param Request $request
     * @param $id
     * @throws GuzzleException
     */
    public function __construct(Request $request, $id)
    {
        $this->request = $request;
        $this->providerId = $id;

        $this->validatePayload();
        $this->checkCustomerProvider();
        $this->processTransaction();
    }

    /**
     * @param array $rules
     * @return array
     * @throws ValidatorException
     * @throws ValidationException
     *
     * Validates a request payload based on rules defined in each Provider Service Class (that extends this one)
     */
    public function validateRequest(array $rules)
    {
        $validator = Validator::make($this->request->all(), $rules);

        if ($validator->fails()) {
            throw new ValidatorException($validator->errors());
        }

        return $validator->validated();
    }

    /**
     * @return int
     *
     * Retrieves the unique id of a customer based on received customer_id from the transaction payload
     * Default set to 0, @TODO log the issue somehow, alert something, send some notifications to operators? (no reqs)
     */
    public function getCustomerId()
    {
        return Customer::where('customer_id', $this->request->get('customer_id'))->select('id')->first()->id ?? 0;
    }


    /**
     * @throws Exception
     *
     * Used to check if the provider is linked with the request targeted customer
     */
    public function checkCustomerProvider()
    {
        $this->customerId = $this->getCustomerId();
        $customerHasProvider = CustomerProvider::where('id_customer', $this->customerId)
            ->where('id_provider', $this->providerId)->first();

        if (!$customerHasProvider) {
            // I guess we should log this and handle it somehow (not documented)
            throw new Exception('Provider is not linked with the customer');
        }
    }

    /**
     * @return string
     *
     * Formats transaction value to a more generic format
     */
    public function formatTransactionValue()
    {
        return number_format($this->request->get('value'), 2, '.', '');
    }

    /**
     * @param $eventSlug
     * @return mixed
     *
     * Retrieves the generic event id based on the specific key received in the transaction payload
     * Default is set to undefined
     */
    public function getGenericEventId($eventSlug)
    {
        $genericEvent = ProviderEvent::where('id_provider', $this->providerId)
            ->where('slug', $eventSlug)
            ->select('id_event')
            ->first();

        return $genericEvent->id_event ??
            GenericEvent::where('slug', 'undefined')->select('id')->first()->id;
    }

    /**
     * @return string
     * @throws GuzzleException
     *
     * Retrieves through API call the BTC value based on the transaction value
     */
    public function getBtcTransactionValue()
    {
        // We should have the currency of the transaction in the received payload, here's a default one
        $currency = "GBP";

        // Also obtaining the BTC value at exact time of transaction (datetime received in request) would be precise
        // But the Blockchain API doesn't support time parameter

        $guzzleClient = new Client();

        // @TODO store the url in a config, maybe add retries, other source APIs etc
        return $guzzleClient->get(
            'https://blockchain.info/tobtc?currency=' . $currency . '&value=' . $this->formatTransactionValue()
        )->getBody()->getContents();
    }

    /**
     * @return bool
     * @throws GuzzleException
     *
     * Does the actual processing of the transaction
     */
    public function processTransaction()
    {
        $genericEventId = $this->translateEvent();
        $customerId = $this->getCustomerId();

        // Check if the transaction was received until now so we mark it as duplicate but not go further
        $isDuplicate = ProcessedTransaction::where('transaction_unique_id', $this->request->get('id'))
                ->where('id_provider', $this->providerId)
                ->where('id_event', $genericEventId)
                ->where('id_customer', $customerId)
                ->select('id_raw_transaction')->first()->id_raw_transaction ?? null;

        // We log everything so we first log the raw received transaction
        $rawTransactionId = RawTransaction::create([
            'payload' => $this->request->all(),
            'id_duplicate_raw_transaction' => $isDuplicate
        ])->id;

        // If the request we received was not a duplicate we continue adding the processed version for it
        if (!$isDuplicate) {
            return ProcessedTransaction::create(
                [
                    'id_provider' => $this->providerId,
                    'id_event' => $genericEventId,
                    'id_customer' => $customerId,
                    'id_raw_transaction' => $rawTransactionId,
                    'value' => $this->formatTransactionValue(),
                    'btc_value' => $this->getBtcTransactionValue(),
                    'status' => $this->request->get('status'),
                    'transaction_unique_id' => $this->request->get('id'),
                    'transaction_time' => $this->translateTransactionTime()
                ]
            );
        }

        // If it reached this point means it was a duplicate and we could maybe ... @TODO log this duplicate request?

        return true;
    }


}
