@extends('layouts.ru-app')

@section('title')
    <title>{{ $post->title_ru . ' | ' . env('APP_NAME') }}</title>
@endsection

@section('content')
    <div class="container">
        <h2>{{ $post->title_ru }}</h2>
        <p>{!! $post->content_ru !!}</p>
        <p>Категория: <a href="{{ route('ru.user.blog.categories.show', ['slug' => $post->category->slug]) }}">{{ $post->category->name_ru }}</a></p>
        @if(! empty($post->tags) && $post->tags->count() > 0)
            Тэги:
            <ul>
                @foreach($post->tags as $tag)
                    <li><a href="{{ route('ru.user.blog.tags.show', ['slug' => $tag->slug]) }}">{{ $tag->name_ru }}</a></li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
