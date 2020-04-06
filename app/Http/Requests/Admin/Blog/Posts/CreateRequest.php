<?php

namespace App\Http\Requests\Admin\Blog\Posts;

use App\Entities\Blog\Category;
use App\Entities\Blog\Tag;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $categories = implode(',', Category::pluck('id')->toArray());
        $tags = implode(',', Tag::pluck('id')->toArray());

        return [
            'title_ru' => 'required|string|min:3|max:255|unique:posts,title_ru',
            'title_en' => 'required|string|min:3|max:255|unique:posts,title_en',
            'slug' => 'nullable|string|min:3|max:255|unique:posts,slug',
            'category_id' => 'required|integer|in:' . $categories,
            'tags.*' => 'nullable|integer|in:' . $tags,
            'content_ru' => 'required|string|min:10',
            'content_en' => 'required|string|min:10',
            'short_description_en' => 'required|string|min:10',
            'short_description_ru' => 'required|string|min:10',
            'meta_description_en' => 'nullable|string|min:10|max:255',
            'meta_description_ru' => 'nullable|string|min:10|max:255',
            'images.*' => 'nullable|string',
            'type' => 'nullable',
            'img' => 'required|file|max:1024|mimes:jpeg,jpg,png',
        ];
    }

    public function messages()
    {
        return [
            'title_ru.required' => 'Обязательный параметр',
            'title_ru.string' => 'Некорректное значение',
            'title_ru.min' => 'Минимум 3 символа',
            'title_ru.max' => 'Максимум 30 символов',
            'title_ru.unique' => 'Такое наименование уже существует',

            'title_en.required' => 'Обязательный параметр',
            'title_en.string' => 'Некорректное значение',
            'title_en.min' => 'Минимум 3 символа',
            'title_en.max' => 'Максимум 30 символов',
            'title_en.unique' => 'Такое наименование уже существует',

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

            'slug.string' => 'Некорректное значение',
            'slug.min' => 'Минимум 3 символа',
            'slug.max' => 'Максимум 30 символов',
            'slug.unique' => 'Такое наименование уже существует',

            'category_id.required' => 'Обязательный параметр',
            'category_id.integer' => 'Некорректное значение',
            'category_id.in' => 'Такой категории не существует',

            'tags.*.required' => 'Обязательный параметр',
            'tags.*.integer' => 'Некорректное значение',
            'tags.*.in' => 'Такого тэга не существует',

            'content_ru.required' => 'Обязательный параметр',
            'content_ru.string' => 'Некорректное значение',
            'content_ru.min' => 'Минимум 10 символов',

            'content_en.required' => 'Обязательный параметр',
            'content_en.string' => 'Некорректное значение',
            'content_en.min' => 'Минимум 10 символов',
        ];
    }
}
