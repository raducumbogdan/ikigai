<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Services\ProviderRouterService;
use Illuminate\Http\Request;

/**
 * Class WebHookController
 * @package App\Http\Controllers
 *
 * @TODO add logging in the provider services and other necessary places
 * @TODO handle errors somehow, not sure how because requirements are poor :(
 */
class WebHookController extends ApiController
{
    public function log(Request $request, int $id)
    {
        // Let's validate the provider id first, to make sure it exists
        $this->validateRequest(['id' => $id], Provider::existsProviderRules());

        // Let's send the request to our ProviderRouterService that will take care of everything
        new ProviderRouterService($request, $id);

        // Return 200 OK response without any data
        return $this->responseData();
    }
}
