<?php

namespace App\Http\Requests\Admin\Catalog\Tags;

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
            'name_ru' => 'required|string|min:3|unique:tags',
            'name_en' => 'required|string|min:3|unique:tags',
            'slug' => 'nullable|string|min:3|unique:tags',
            'img' => 'required|file|max:1024|mimes:jpeg,jpg,png',
        ];
    }

    public function messages()
    {
        return [
            'name_ru.required' => 'Это поле обязательно для заполнения',
            'name_ru.string' => 'Значение этого поля должно быть строкой',
            'name_ru.min' => 'Длина не менее 3 символов',
            'name_ru.unique' => 'Такой тэг уже существует',

            'name_en.required' => 'Это поле обязательно для заполнения',
            'name_en.string' => 'Значение этого поля должно быть строкой',
            'name_en.min' => 'Длина не менее 3 символов',
            'name_en.unique' => 'Такой тэг уже существует',

            'slug.string' => 'Значение этого поля должно быть строкой',
            'slug.min' => 'Длина не менее 3 символов',
            'slug.unique' => 'Такой слаг уже существует',

            'img.required' => 'Изображение не добавлено',
            'img.file' => 'Некорректный формат изображения',
            'img.max' => 'Максимальный размер изображения - 1 мегабайт',
            'img.mimes' => 'Некорректный формат изображения',
        ];
    }
}
