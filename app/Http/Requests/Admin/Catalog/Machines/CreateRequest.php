<?php

namespace App\Http\Requests\Admin\Catalog\Machines;

use App\Entities\Catalog\Property;
use App\Entities\Catalog\Tag;
use App\Entities\Catalog\Type;
use App\Rules\UniqueValues;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'properties.*.name' => ['required', 'integer', 'in:' . $props, new UniqueValues($this)],
            'type' => ['required', 'integer', 'in:' . $types],
            'properties.*.value' => 'required|string|min:1',
            'name_ru' => 'required|string|min:3|unique:machines',
            'name_en' => 'required|string|min:3|unique:machines',
            'slug' => 'nullable|string|min:3|unique:machines',
            'img' => 'required|file|max:1024|mimes:jpeg,jpg,png',
            'description_en' => 'required|string|min:3',
            'description_ru' => 'required|string|min:3',
        ];
    }

    public function messages()
    {
        return [
            'properties.*.name.required' => 'Это поле обязательно для заполнения.',
            'properties.*.name.integer' => 'Значение должно быть целым числом.',
            'properties.*.name.in' => 'Неизвестный параметр.',

            'properties.*.value.required' => 'Это поле обязательно для заполнения.',
            'properties.*.value.string' => 'Значение этого поля должно быть строкой.',
            'properties.*.value.min' => 'Длина не менее 1 символа',

            'tags.*.required' => 'Это поле обязательно для заполнения.',
            'tags.*.integer' => 'Значение должно быть целым числом.',
            'tags.*.in' => 'Неизвестный тэг.',

            'type.required' => 'Это поле обязательно для заполнения.',
            'type.integer' => 'Значение должно быть целым числом.',
            'type.in' => 'Неизвестная категория.',

            'name_ru.required' => 'Это поле обязательно для заполнения',
            'name_ru.string' => 'Значение этого поля должно быть строкой',
            'name_ru.min' => 'Длина не менее 3 символов',
            'name_ru.unique' => 'Такая категория уже существует',

            'name_en.required' => 'Это поле обязательно для заполнения',
            'name_en.string' => 'Значение этого поля должно быть строкой',
            'name_en.min' => 'Длина не менее 3 символов',
            'name_en.unique' => 'Такая категория уже существует',

            'description_en.required' => 'Это поле обязательно для заполнения',
            'description_en.string' => 'Значение этого поля должно быть строкой',
            'description_en.min' => 'Длина не менее 3 символов',

            'description_ru.required' => 'Это поле обязательно для заполнения',
            'description_ru.string' => 'Значение этого поля должно быть строкой',
            'description_ru.min' => 'Длина не менее 3 символов',

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
