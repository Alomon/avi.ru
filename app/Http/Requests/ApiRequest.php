<?php

namespace App\Http\Requests;

use App\Exceptions\ApiException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ApiRequest extends FormRequest
{
    public function failedAuthorization()
    {
        throw new ApiException(403, 'Ошибка авторизации');
    }

    public function failedValidation(Validator $validator)
    {
        throw new ApiException(422, 'Ошибка валидации данных', $validator->errors());
    }
}
