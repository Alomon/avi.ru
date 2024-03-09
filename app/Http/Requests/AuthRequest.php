<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'phone' => 'required|string|unique:users',
            'login' => 'required|string|min:3|max:255|unique:users',
            'password' => 'required|string|min:6|max:255',
            'avatar' => 'file|max:16384|mimes:png,jpg',
        ];
    }
    public function messages()
    {
        return [
          '*.required' => 'Поле ОБЯЗАТЕЛЬНО для заполнения',
          'login.min' => 'Давай-ка больше 3-ёх, пж',
          'password.min' => 'Давай-ка больше 6-и, пж',
            'login.max' => 'Вооооу куда так много? Я вывезу не больше 255 символов',
            'password.max' => 'Вооооу куда так много? Я вывезу не больше 255 символов',
            'avatar.max' => 'Милый... У тебя слишком большой... Файл. Меньше 16 пожалуйста.',
            'avatar.mimes' => 'Мир делится только на два формата и твой мне не подходит. PNG или JPG плиз. ',
            'avatar.file' => 'М.. И что это ты попытался сюда вставить? Я только файлы принимаю, глупый.',
        ];
    }
}
