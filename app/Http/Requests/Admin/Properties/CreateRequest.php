<?php

namespace App\Http\Requests\Admin\Properties;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name_ru' => 'required|string|min:3|unique:properties',
            'name_en' => 'required|string|min:3|unique:properties',
            'measure_en' => 'nullable|string|min:1',
            'measure_ru' => 'nullable|string|min:1',
        ];
    }

    public function messages()
    {
        return [
            'name_ru.required' => 'Это поле обязательно для заполнения',
            'name_ru.string' => 'Значение этого поля должно быть строкой',
            'name_ru.min' => 'Длина не менее 3 символов',
            'name_ru.unique' => 'Такой параметр уже существует',

            'name_en.required' => 'Это поле обязательно для заполнения',
            'name_en.string' => 'Значение этого поля должно быть строкой',
            'name_en.min' => 'Длина не менее 3 символов',
            'name_en.unique' => 'Такой параметр уже существует',

            'measure_en.string' => 'Значение этого поля должно быть строкой',
            'measure_en.min' => 'Длина не менее 1 символа',

            'measure_ru.string' => 'Значение этого поля должно быть строкой',
            'measure_ru.min' => 'Длина не менее 1 символа',
        ];
    }
}
