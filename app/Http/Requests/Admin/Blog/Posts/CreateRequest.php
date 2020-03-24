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
            'images.*' => 'nullable|string'
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
