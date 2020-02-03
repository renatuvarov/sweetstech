<?php


namespace App\Handlers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ValidateOrderEmail
{
    private function messages()
    {
        return [
            'ru' => [
                'name.required' => 'Обязательное поле',
                'name.string' => 'Это поле - строка',
                'name.min' => 'Некорректное значение',
                'name.max' => 'Некорректное значение',
                'surname.required' => 'Обязательное поле',
                'surname.string' => 'Это поле - строка',
                'surname.min' => 'Некорректное значение',
                'surname.max' => 'Некорректное значение',
                'email.required' => 'Обязательное поле',
                'email.string' => 'Это поле - строка',
                'email.email' => 'Некорректный e-mail',
                'email.max' => 'Некорректный e-mail',
                'phone.required' => 'Обязательное поле',
                'phone.numeric' => 'Некорректный номер',
                'phone.between' => 'Некорректный номер',
                'product.required' => '',
                'product.string' => '',
                'product.min' => '',
                'product.max' => '',
            ],

            'en' => [
                'name.required' => 'error!',
                'name.string' => 'error!',
                'name.min' => 'error!',
                'name.max' => 'error!',
                'surname.required' => 'error!',
                'surname.string' => 'error!',
                'surname.min' => 'error!',
                'surname.max' => 'error!',
                'email.required' => 'error!',
                'email.string' => 'error!',
                'email.email' => 'error!',
                'email.max' => 'error!',
                'phone.required' => 'error!',
                'phone.numeric' => 'error!',
                'phone.between' => 'error!',
                'product.required' => '',
                'product.string' => '',
                'product.min' => '',
                'product.max' => '',
            ],
        ];
    }

    public function handle(Request $request, string $lang = 'ru')
    {
        $messages = $this->messages()[$lang];

        return Validator::make($request->all(), [
            'name' => ['required', 'string', 'min:1', 'max:50'],
            'surname' => ['required', 'string', 'min:1', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:100'],
            'phone' => ['required', 'between:7,16'],
            'product' => ['required', 'string', 'min:1', 'max:50'],
        ], $messages);
    }
}
