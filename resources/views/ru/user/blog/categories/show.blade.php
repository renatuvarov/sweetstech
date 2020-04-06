@extends('layouts.ru-app')

@section('title')
    <title>All Posts | {{ config('site.user.app.name') }}</title>
@endsection

@section('description')
    <meta content="последние новости" name="description">
@endsection

@section('content')
    <div class="intro news-bg intro-single route">
        <div class="intro-content-news  display-table">
            <div class="table-cell">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="equipment-title equipment-title-all mb-4">Категория: {{ $category->name_ru }}</h1>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('ru.main') }}">Главная</a>
                                </li>
                                <li class="breadcrumb-item active">Новости</li>
                            </ol>
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
    <section>
        <div class="container all-news">
            @if(! empty($posts) && $posts->count() > 0)
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-md-12 card-news">
                            <div class="row">
                                <div class="col-md-7 text-news">
                                    <span class="date-news">{{ $post->created_at->format('d.m.Y') }}</span>
                                    <span class="title-news">{{ $post->title_ru }}</span>
                                    <div class="description-news _hidden">
                                        <div class="inner-text">
                                            <p>
                                                <span>
                                                    {{ $post->short_description_ru }}
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                    <a href="{{ route('ru.user.blog.news.show', ['slug' => $post->slug]) }}" class="news-button" aria-label="Читать полностью">
                                        <span>Читать...</span>
                                    </a>
                                </div>
                                <div class="col-md-5 main-img-news">
                                    <img src="{{ $post->img }}" class="img-fluid" alt="{{ $post->title_ru }}">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr>
                {{ $posts->links('vendor.pagination.default') }}
            @else
                <div class="col-md-12 card-news text-center d-flex justify-content-center align-items-center" style="min-height: 300px">
                    <div class="row">
                        <div class="col-md-12 text-news m-0" style="font-size: 35px;">
                            <p class="align-self-center">Постов не найдено.</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
