<?php

namespace App\Http\Requests\Admin\Catalog\Tags;

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
            'name_ru' => 'nullable|string|min:3',
            'name_en' => 'nullable|string|min:3',
            'slug' => 'nullable|string|min:3',
        ];
    }

    public function messages()
    {
        return [
            'name_ru.string' => 'Значение этого поля должно быть строкой',
            'name_ru.min' => 'Длина не менее 3 символов',

            'name_en.string' => 'Значение этого поля должно быть строкой',
            'name_en.min' => 'Длина не менее 3 символов',

            'slug.string' => 'Значение этого поля должно быть строкой',
            'slug.min' => 'Длина не менее 3 символов',
        ];
    }
}
