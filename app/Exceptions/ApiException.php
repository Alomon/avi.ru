<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;


class ApiException extends HttpResponseException
{
    public function __construct($code, $message, $errors = [])
    {
        $response = [
            'code' => $code,
            'message' => $message
        ];
        if (count($errors) > 0){
            $response['errors'] = $errors;
        }
        parent::__construct(response()->json($response)->setStatusCode($code));
    }
}
