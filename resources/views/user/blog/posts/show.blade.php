@extends('layouts.app')

@section('title')
    <title>{{ $post->title_en . ' | ' . env('APP_NAME') }}</title>
@endsection

@section('content')
    <div class="container">
        <h2>{{ $post->title_en }}</h2>
        <p>{!! $post->content_en !!}</p>
        <p>Category: <a href="{{ route('user.blog.categories.show', ['slug' => $post->category->slug]) }}">{{ $post->category->name_en }}</a></p>
        @if(! empty($post->tags) && $post->tags->count() > 0)
            tags:
            <ul>
                @foreach($post->tags as $tag)
                    <li><a href="{{ route('user.blog.tags.show', ['slug' => $tag->slug]) }}">{{ $tag->name_en }}</a></li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
