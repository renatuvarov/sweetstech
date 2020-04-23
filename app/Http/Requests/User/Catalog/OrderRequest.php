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
            'st_nsp' => ['required', 'string', 'min:1', 'max:100'],
            'st_company' => ['required', 'string', 'min:1', 'max:50'],
            'st_email' => ['required', 'string', 'email', 'max:100'],
            'st_phone' => ['nullable', 'between:7,16'],
            'st_id' => ['required', 'integer', 'in:' . $ids],
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
            'st_nsp.required' => 'Обязательное поле.',
            'st_nsp.string' => 'Некорректное значение.',
            'st_nsp.min' => 'Некорректное значение.',
            'st_nsp.max' => 'Некорректное значение.',
            'st_company.required' => 'Обязательное поле.',
            'st_company.string' => 'Некорректное значение.',
            'st_company.min' => 'Некорректное значение.',
            'st_company.max' => 'Некорректное значение.',
            'st_email.required' => 'Обязательное поле.',
            'st_email.string' => 'Некорректное значение.',
            'st_email.email' => 'Некорректный e-mail.',
            'st_email.max' => 'Некорректный e-mail.',
            'st_phone.between' => 'Некорректный номер.',
            'st_id.required' => 'Оборудование не найдено.',
            'st_id.integer' => 'Оборудование не найдено.',
            'st_id.in' => 'Оборудование не найдено.',
        ];
    }

    private function messagesEn()
    {
        return [
            'st_nsp.required' => 'This field is required.',
            'st_nsp.string' => 'This field is required.',
            'st_nsp.min' => 'Invalid value.',
            'st_nsp.max' => 'Invalid value.',
            'st_company.required' => 'This field is required.',
            'st_company.string' => 'This field is required.',
            'st_company.min' => 'Invalid value.',
            'st_company.max' => 'Invalid value.',
            'st_email.required' => 'This field is required.',
            'st_email.string' => 'This field is required.',
            'st_email.email' => 'Invalid e-mail.',
            'st_email.max' => 'Invalid e-mail.',
            'st_phone.between' => 'Invalid phone number.',
            'st_id.required' => 'Fuck you.',
            'st_id.integer' => 'Fuck you.',
            'st_id.in' => 'Fuck you.',
        ];
    }
//
//    public function failedValidation(Validator $validator) {
//        throw new HttpResponseException(response()->json($validator->errors(), 422));
//    }
}
