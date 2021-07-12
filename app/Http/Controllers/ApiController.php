<?php

namespace App\Http\Controllers;

use App\Exceptions\ValidatorException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

/**
 * Class ApiController
 * @package App\Http\Controllers
 */
class ApiController extends Controller
{
    /**
     * @param $body
     * @param int $status
     * @return void
     */
    protected function responseData($body = null, $status = 200)
    {
        (new Response($body, $status));
    }

    /**
     * @param array $data
     * @param array $rules
     * @return array
     * @throws ValidatorException
     * @throws ValidationException
     */
    protected function validateRequest(array $data, array $rules): array
    {
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            throw new ValidatorException($validator->errors());
        }

        return $validator->validated();
    }
}
