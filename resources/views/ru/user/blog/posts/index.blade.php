@extends('layouts.ru-app')

@section('title')
    <title>Все посты</title>
@endsection

@section('content')
    <div class="container">
        @foreach($posts as $post)
            <a href="{{ route('ru.user.blog.news.show', ['slug' => $post->slug]) }}">
                <h2>{{ $post->title_ru }}</h2>
                <p>{!! $post->content_ru !!}</p>
            </a>
        @endforeach
        {{ $posts->links() }}
    </div>
@endsection
