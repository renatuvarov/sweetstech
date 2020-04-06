@extends('layouts.app')

@section('title')
    <title>{{ $post->short_description_en ?? $post->title_en . ' | ' . env('APP_NAME') }}</title>
@endsection

@section('description')
    <meta content="{{ $post->short_description_en ?? $post->title_en }}" name="description">
@endsection

@section('content')
    <div class="intro news-bg intro-single route mt-5">
        <div class="intro-content-news display-table pt-5">
            <div class="table-cell-news">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <h1 class="single-news-title equipment-title-all mb-4">{{ $post->title_en }}</h1>
{{--                            <ul class="breadcrumb">--}}
{{--                                <li class="breadcrumb-item">--}}
{{--                                    <a href="{{ route('main') }}">Home</a>--}}
{{--                                </li>--}}
{{--                                <li class="breadcrumb-item"><a href="{{ route('user.blog.news.index') }}">News</a></li>--}}
{{--                            </ul>--}}
                            <div class="d-flex justify-content-start">
                                <ul class="categories-single mb-0">
                                    <h4 class="categories-single-title text-left">Category:</h4>
                                    <li class="categories-single-all">
                                        <a href="{{ route('user.exhibitions.categories.show', ['slug' => $post->category->slug]) }}">{{ $post->category->name_en }}</a>
                                    </li>
                                </ul>
                            </div>
                            @if(! empty($post->tags) && $post->tags->count() > 0)
                                <h4 class="categories-single-title text-left">Tags:</h4>
                                <ul class="categories-single">
                                    @foreach($post->tags as $tag)
                                        <li class="categories-single-all">
                                            <a href="{{ route('user.exhibitions.tags.show', ['slug' => $tag->slug]) }}">{{ $tag->name_en }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <div class="phone-none">
                                <img class="logo-equipment logo-news" src="{{ asset('assets/img/logo.png') }}" alt="{{ config('site.user.app.name') }} logo">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="mt-5">
        <div class="row-custom">
            <div class="col-md-12 text-equipment ml-auto mr-auto" style="max-width: 1280px">
                <div itemprop="description" class="text-about-equipment js-content">
                    <img src="{{ $post->img }}" alt="{{ $post->title_en }}">
                    {!! $post->content_en !!}
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script src="{{ asset('js/js-content.js') }}"></script>
@endpush
