@extends('layouts.ru-app')

@section('title')
    <title>{{ $category->name_ru . ' | ' . env('APP_NAME') }}</title>
@endsection

@section('content')
    <div class="container">
        <h2>{{ $category->name_ru }}</h2>
        @foreach($posts as $post)
            <div>
                <h3><a href="{{ route('ru.user.blog.news.show', ['slug' => $post->slug]) }}">{{ $post->title_ru }}</a></h3>
            </div>
        @endforeach
    </div>
@endsection
