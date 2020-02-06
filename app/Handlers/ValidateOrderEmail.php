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
                'nsp.required' => 'Обязательное поле',
                'nsp.string' => 'Это поле - строка',
                'nsp.min' => 'Некорректное значение',
                'nsp.max' => 'Некорректное значение',
                'company.required' => 'Обязательное поле',
                'company.string' => 'Это поле - строка',
                'company.min' => 'Некорректное значение',
                'company.max' => 'Некорректное значение',
                'email.required' => 'Обязательное поле',
                'email.string' => 'Это поле - строка',
                'email.email' => 'Некорректный e-mail',
                'email.max' => 'Некорректный e-mail',
                'phone.numeric' => 'Некорректный номер',
                'phone.between' => 'Некорректный номер',
                'product.required' => '',
                'product.string' => '',
                'product.min' => '',
                'product.max' => '',
            ],

            'en' => [
                'nsp.required' => 'error!',
                'nsp.string' => 'error!',
                'nsp.min' => 'error!',
                'nsp.max' => 'error!',
                'company.required' => 'error!',
                'company.string' => 'error!',
                'company.min' => 'error!',
                'company.max' => 'error!',
                'email.required' => 'error!',
                'email.string' => 'error!',
                'email.email' => 'error!',
                'email.max' => 'error!',
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
            'nsp' => ['required', 'string', 'min:1', 'max:100'],
            'company' => ['required', 'string', 'min:1', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:100'],
            'phone' => ['nullable', 'between:7,16'],
            'product' => ['required', 'string', 'min:1', 'max:50'],
        ], $messages);
    }
}
