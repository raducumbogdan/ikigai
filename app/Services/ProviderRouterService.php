<?php


namespace App\Services;


use App\Models\Provider;
use Exception;
use Illuminate\Http\Request;

/**
 * Class ProviderRouterService
 * @package App\Services
 *
 * This service has the simple logic to route a webhook log request to it's specific source provider service
 */
class ProviderRouterService
{
    /**
     * ProviderRouterService constructor.
     * @param Request $request
     * @param int $id
     * @throws Exception
     */
    public function __construct(Request $request, int $id)
    {
        // Obtain the provider based on id
        $provider = Provider::whereId($id)->first();

        if ($provider !== null) {
            // Return our provider specific class located in Services/Provider/*

            $providerClassName = __NAMESPACE__ . '\\Providers\\' . $provider->service_name;
            if (class_exists($providerClassName)) {
                return new $providerClassName($request, $id);
            } else {
                throw new Exception('Class ' . $providerClassName . ' is not registered');
            }
        }

        throw new Exception('Provider not found in DB');
    }
}
