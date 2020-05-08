<?php

namespace App\Http\Requests\Admin\Catalog\Machines;

use App\Entities\Catalog\Property;
use App\Entities\Catalog\Tag;
use App\Rules\PropertiesNotEmpty;
use App\Rules\UniqueValues;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
//        dd($this->input('properties'));
        $tags = implode(',', Tag::pluck('id')->toArray());
        $props = implode(',', Property::pluck('id')->toArray());

        return [
            'tags.*' => ['nullable', 'integer', 'in:' . $tags, new UniqueValues($this, 'tags')],
            'properties' => [new PropertiesNotEmpty($this)],
            'properties.*.name' => ['nullable', 'integer', 'in:' . $props, new UniqueValues($this)],
            'properties.*.value_en' => 'nullable|string|min:1',
            'properties.*.value_ru' => 'nullable|string|min:1',
            'name_ru' => 'nullable|string|min:3|unique:machines,name_ru,' . $this->machine . ',id',
            'name_en' => 'nullable|string|min:3|unique:machines,name_en,' . $this->machine . ',id',
            'short_name_ru' => 'required|string|min:3|unique:machines,short_name_ru,' . $this->machine . ',id',
            'short_name_en' => 'required|string|min:3|unique:machines,short_name_en,' . $this->machine . ',id',
            'slug' => 'nullable|string|min:3|unique:machines,slug,' . $this->machine . ',id',
            'img' => 'nullable|file|max:1024|mimes:jpeg,jpg,png',
            'pdf_en' => 'nullable|mimes:pdf|max:10000',
            'pdf_ru' => 'nullable|mimes:pdf|max:10000',
            'short_description_en' => 'required|string|min:10',
            'short_description_ru' => 'required|string|min:10',
            'meta_description_en' => 'nullable|string|min:10|max:255',
            'meta_description_ru' => 'nullable|string|min:10|max:255',
            'description_en' => 'required|string|min:3',
            'description_ru' => 'required|string|min:3',
            'mail_en' => 'nullable|string|min:3',
            'mail_ru' => 'nullable|string|min:3',
            'images.*' => 'nullable|string',
            'gallery_id' => 'nullable|integer|exists:galleries,id',
        ];
    }

    public function messages()
    {
        return [
            'properties.*.name.integer' => 'Значение должно быть целым числом.',
            'properties.*.name.in' => 'Неизвестный параметр.',

            'properties.*.value_en.string' => 'Значение этого поля должно быть строкой.',
            'properties.*.value_en.min' => 'Длина не менее 1 символа',

            'properties.*.value_ru.string' => 'Значение этого поля должно быть строкой.',
            'properties.*.value_ru.min' => 'Длина не менее 1 символа',

            'tags.*.integer' => 'Значение должно быть целым числом.',
            'tags.*.in' => 'Неизвестный тэг.',

            'name_ru.string' => 'Значение этого поля должно быть строкой',
            'name_ru.min' => 'Длина не менее 3 символов',
            'name_ru.unique' => 'Такое оборудование уже существует',

            'name_en.string' => 'Значение этого поля должно быть строкой',
            'name_en.min' => 'Длина не менее 3 символов',
            'name_en.unique' => 'Такое оборудование уже существует',

            'short_name_ru.required' => 'Это поле обязательно для заполнения',
            'short_name_ru.string' => 'Значение этого поля должно быть строкой',
            'short_name_ru.min' => 'Длина не менее 3 символов',
            'short_name_ru.unique' => 'Такое наименование уже существует',

            'short_name_en.required' => 'Это поле обязательно для заполнения',
            'short_name_en.string' => 'Значение этого поля должно быть строкой',
            'short_name_en.min' => 'Длина не менее 3 символов',
            'short_name_en.unique' => 'Такое наименование уже существует',

            'short_description_en.required' => 'Обязательный параметр',
            'short_description_en.string' => 'Некорректное значение',
            'short_description_en.min' => 'Минимум 10 символов',

            'short_description_ru.required' => 'Обязательный параметр',
            'short_description_ru.string' => 'Некорректное значение',
            'short_description_ru.min' => 'Минимум 10 символов',

            'meta_description_en.max' => 'Максимум 255 символов',
            'meta_description_en.string' => 'Некорректное значение',
            'meta_description_en.min' => 'Минимум 10 символов',

            'meta_description_ru.max' => 'Максимум 255 символов',
            'meta_description_ru.string' => 'Некорректное значение',
            'meta_description_ru.min' => 'Минимум 10 символов',

            'description_en.string' => 'Значение этого поля должно быть строкой',
            'description_en.min' => 'Длина не менее 3 символов',

            'description_ru.string' => 'Значение этого поля должно быть строкой',
            'description_ru.min' => 'Длина не менее 3 символов',

            'mail_en.string' => 'Значение этого поля должно быть строкой',
            'mail_en.min' => 'Длина не менее 3 символов',

            'mail_ru.string' => 'Значение этого поля должно быть строкой',
            'mail_ru.min' => 'Длина не менее 3 символов',

            'slug.string' => 'Значение этого поля должно быть строкой',
            'slug.min' => 'Длина не менее 3 символов',
            'slug.unique' => 'Такой слаг уже существует',

            'img.file' => 'Некорректный формат изображения',
            'img.max' => 'Максимальный размер изображения - 1 мегабайт',
            'img.mimes' => 'Некорректный формат изображения',

            'pdf_en.file' => 'Некорректный формат',
            'pdf_en.max' => 'Максимальный размер изображения - 10 мегабайт',
            'pdf_en.mimes' => 'Некорректный формат',

            'pdf_ru.file' => 'Некорректный формат',
            'pdf_ru.max' => 'Максимальный размер изображения - 10 мегабайт',
            'pdf_ru.mimes' => 'Некорректный формат',
			
			'gallery_id.integer' => 'Значение должно быть целым числом.',
            'gallery_id.exists' => 'Неизвестная галлерея.',
        ];
    }
}
