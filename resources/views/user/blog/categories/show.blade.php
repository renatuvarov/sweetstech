@extends('layouts.app')

@section('title')
    <title>{{ $category->name_en . ' | ' . env('APP_NAME') }}</title>
@endsection

@section('content')
    <div class="container">
        <h2>{{ $category->name_en }}</h2>
        @foreach($posts as $post)
            <div>
                <h3><a href="{{ route('user.blog.news.show', ['slug' => $post->slug]) }}">{{ $post->title_en }}</a></h3>
            </div>
        @endforeach
    </div>
@endsection
