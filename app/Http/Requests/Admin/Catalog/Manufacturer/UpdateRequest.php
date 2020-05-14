<?php

namespace App\Http\Requests\Admin\Catalog\Manufacturer;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name_ru' => 'required|string|min:2|unique:manufacturers,name_ru,' . $this->manufacturer->id . ',id',
            'name_en' => 'required|string|min:2|unique:manufacturers,name_en,' . $this->manufacturer->id . ',id',
            'slug' => 'nullable|string|min:2|unique:manufacturers,slug,' . $this->manufacturer->id . ',id',
        ];
    }

    public function messages()
    {
        return [
            'name_ru.required' => 'Это поле обязательно для заполнения',
            'name_ru.string' => 'Значение этого поля должно быть строкой',
            'name_ru.min' => 'Длина не менее 2 символов',
            'name_ru.unique' => 'Такой производитель уже существует',

            'name_en.required' => 'Это поле обязательно для заполнения',
            'name_en.string' => 'Значение этого поля должно быть строкой',
            'name_en.min' => 'Длина не менее 2 символов',
            'name_en.unique' => 'Такой производитель уже существует',

            'slug.string' => 'Значение этого поля должно быть строкой',
            'slug.min' => 'Длина не менее 2 символов',
            'slug.unique' => 'Такой слаг уже существует',
        ];
    }
}
