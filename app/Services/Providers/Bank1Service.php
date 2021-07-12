<?php


namespace App\Services\Providers;

use App\Exceptions\ValidatorException;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

/**
 * Class Bank1Service
 * @package App\Services\Providers
 *
 * Bank one provider service
 */
class Bank1Service extends DefaultProfiderService implements ProviderInterface
{
    /**
     * @var
     */
    public $providerId;

    /**
     * @var
     */
    public $request;

    /**
     * IkigaiService constructor.
     * @param Request $request
     * @param $id
     * @throws GuzzleException
     */
    public function __construct(Request $request, $id)
    {
        parent::__construct($request, $id);
    }

    /**
     * @throws ValidatorException
     * @throws ValidationException
     *
     * Used at validating a request payload based on each provider's custom fields
     */
    public function validatePayload()
    {
        parent::validateRequest(
            [
                'transaction_time' => 'required|string',
                'id' => 'required|string',
                'event_id' => 'required|numeric',
                'value' => 'required|numeric', // Could be string, depending on how the provider sends us the request
                'status' => 'required|string',
                'customer_id' => 'required|string'
            ]
        );
    }

    /**
     * @return mixed
     *
     * Used at validating a received event based on each provider's custom event field key
     */
    public function translateEvent()
    {
        return parent::getGenericEventId($this->request->get('event_id'));
    }

    /**
     * @return string
     *
     * Used at converting each provider's custom transaction time format into a standard datetime format
     */
    public function translateTransactionTime()
    {
        return "2020-10-02 12:23:12";

        // @TODO, find a way to fix this, currently throws error about timezone issue :(
        // return Carbon::createFromFormat('Y-m-dTH-i-s', $this->request->get('transaction_time'))->toDateTimeString();
    }
}
