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
            'name_ru' => 'nullable|string|min:3|unique:tags,name_ru,' . $this->tag->id . ',id',
            'name_en' => 'nullable|string|min:3|unique:tags,name_en,' . $this->tag->id . ',id',
            'slug' => 'nullable|string|min:3|unique:tags,slug,' . $this->tag->id . ',id',
            'img' => 'nullable|file|max:1024|mimes:jpeg,jpg,png',
        ];
    }

    public function messages()
    {
        return [
            'name_ru.string' => 'Значение этого поля должно быть строкой',
            'name_ru.min' => 'Длина не менее 3 символов',
            'name_ru.unique' => 'Такой тэг уже существует',

            'name_en.string' => 'Значение этого поля должно быть строкой',
            'name_en.min' => 'Длина не менее 3 символов',
            'name_en.unique' => 'Такой тэг уже существует',

            'slug.string' => 'Значение этого поля должно быть строкой',
            'slug.min' => 'Длина не менее 3 символов',
            'slug.unique' => 'Такой слаг уже существует',

            'img.file' => 'Некорректный формат изображения',
            'img.max' => 'Максимальный размер изображения - 1 мегабайт',
            'img.mimes' => 'Некорректный формат изображения',
        ];
    }
}
