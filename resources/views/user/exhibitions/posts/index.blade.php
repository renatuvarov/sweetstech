@extends('layouts.app')

@section('title')
    <title>All Posts</title>
@endsection

@section('content')
    <div class="container">
        @foreach($posts as $post)
            <a href="{{ route('user.exhibitions.news.show', ['slug' => $post->slug]) }}">
                <h2>{{ $post->title_en }}</h2>
                <p>{!! $post->content_en !!}</p>
            </a>
        @endforeach
        {{ $posts->links() }}
    </div>
@endsection
