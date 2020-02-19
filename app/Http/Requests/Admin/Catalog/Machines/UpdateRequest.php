<?php

namespace App\Http\Requests\Admin\Catalog\Machines;

use App\Entities\Catalog\Property;
use App\Entities\Catalog\Tag;
use App\Entities\Catalog\Type;
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
        $types = implode(',', Type::pluck('id')->toArray());
        $tags = implode(',', Tag::pluck('id')->toArray());
        $props = implode(',', Property::pluck('id')->toArray());

        return [
            'tags.*' => ['nullable', 'integer', 'in:' . $tags, new UniqueValues($this, 'tags')],
            'properties' => [new PropertiesNotEmpty($this)],
            'properties.*.name' => ['nullable', 'integer', 'in:' . $props, new UniqueValues($this)],
            'type' => ['nullable', 'integer', 'in:' . $types],
            'properties.*.value' => 'nullable|string|min:1',
            'name_ru' => 'nullable|string|min:3|unique:machines,name_ru,' . $this->machine . ',id',
            'name_en' => 'nullable|string|min:3|unique:machines,name_en,' . $this->machine . ',id',
            'slug' => 'nullable|string|min:3|unique:machines,slug,' . $this->machine . ',id',
            'img' => 'nullable|file|max:1024|mimes:jpeg,jpg,png',
            'description_en' => 'nullable|string|min:3',
            'description_ru' => 'nullable|string|min:3',
        ];
    }

    public function messages()
    {
        return [
            'properties.*.name.integer' => 'Значение должно быть целым числом.',
            'properties.*.name.in' => 'Неизвестный параметр.',

            'properties.*.value.string' => 'Значение этого поля должно быть строкой.',
            'properties.*.value.min' => 'Длина не менее 1 символа',

            'tags.*.integer' => 'Значение должно быть целым числом.',
            'tags.*.in' => 'Неизвестный тэг.',

            'type.integer' => 'Значение должно быть целым числом.',
            'type.in' => 'Неизвестная категория.',

            'name_ru.string' => 'Значение этого поля должно быть строкой',
            'name_ru.min' => 'Длина не менее 3 символов',
            'name_ru.unique' => 'Такое оборудование уже существует',

            'name_en.string' => 'Значение этого поля должно быть строкой',
            'name_en.min' => 'Длина не менее 3 символов',
            'name_en.unique' => 'Такое оборудование уже существует',

            'description_en.string' => 'Значение этого поля должно быть строкой',
            'description_en.min' => 'Длина не менее 3 символов',

            'description_ru.string' => 'Значение этого поля должно быть строкой',
            'description_ru.min' => 'Длина не менее 3 символов',

            'slug.string' => 'Значение этого поля должно быть строкой',
            'slug.min' => 'Длина не менее 3 символов',
            'slug.unique' => 'Такой слаг уже существует',

            'img.file' => 'Некорректный формат изображения',
            'img.max' => 'Максимальный размер изображения - 1 мегабайт',
            'img.mimes' => 'Некорректный формат изображения',
        ];
    }
}
