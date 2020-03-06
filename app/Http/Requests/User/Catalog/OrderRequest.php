<?php

namespace App\Http\Requests\User\Catalog;

use App\Entities\Catalog\Machine;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class OrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $ids = implode(',', Machine::pluck('id')->toArray());

        return [
            'sh_nsp' => ['required', 'string', 'min:1', 'max:100'],
            'sh_company' => ['required', 'string', 'min:1', 'max:50'],
            'sh_email' => ['required', 'string', 'email', 'max:100'],
            'sh_phone' => ['nullable', 'between:7,16'],
            'sh_id' => ['required', 'integer', 'in:' . $ids],
        ];
    }

    public function messages()
    {
        $prefix = config('site.user.routes.prefix.name');

        return $prefix === substr($this->route()->getName(), 0, strlen($prefix))
            ? $this->messagesRu()
            : $this->messagesEn();
    }

    private function messagesRu()
    {
        return [
            'sh_nsp.required' => 'Обязательное поле.',
            'sh_nsp.string' => 'Некорректное значение.',
            'sh_nsp.min' => 'Некорректное значение.',
            'sh_nsp.max' => 'Некорректное значение.',
            'sh_company.required' => 'Обязательное поле.',
            'sh_company.string' => 'Некорректное значение.',
            'sh_company.min' => 'Некорректное значение.',
            'sh_company.max' => 'Некорректное значение.',
            'sh_email.required' => 'Обязательное поле.',
            'sh_email.string' => 'Некорректное значение.',
            'sh_email.email' => 'Некорректный e-mail.',
            'sh_email.max' => 'Некорректный e-mail.',
            'sh_phone.between' => 'Некорректный номер.',
            'sh_id.required' => 'Оборудование не найдено.',
            'sh_id.integer' => 'Оборудование не найдено.',
            'sh_id.in' => 'Оборудование не найдено.',
        ];
    }

    private function messagesEn()
    {
        return [
            'sh_nsp.required' => 'This field is required.',
            'sh_nsp.string' => 'This field is required.',
            'sh_nsp.min' => 'Invalid value.',
            'sh_nsp.max' => 'Invalid value.',
            'sh_company.required' => 'This field is required.',
            'sh_company.string' => 'This field is required.',
            'sh_company.min' => 'Invalid value.',
            'sh_company.max' => 'Invalid value.',
            'sh_email.required' => 'This field is required.',
            'sh_email.string' => 'This field is required.',
            'sh_email.email' => 'Invalid e-mail.',
            'sh_email.max' => 'Invalid e-mail.',
            'sh_phone.between' => 'Invalid phone number.',
            'sh_id.required' => 'Fuck you.',
            'sh_id.integer' => 'Fuck you.',
            'sh_id.in' => 'Fuck you.',
        ];
    }

    public function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
