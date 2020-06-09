@extends('layouts.ru-app')

@section('title')
    <title>Tag: {{ $tag->name_ru }} | {{ config('site.user.app.name') }}</title>
@endsection

@section('description')
    <meta content="Последние новости" name="description">
@endsection

@section('content')
    <div class="intro news-bg intro-single route">
        <div class="intro-content-news  display-table">
            <div class="table-cell">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="equipment-title equipment-title-all mb-4">{{ $tag->name_ru }}</h1>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('ru.main') }}">Главная</a>
                                </li>
                                <li class="breadcrumb-item active">Новости</li>
                            </ol>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <div class="phone-none">
                                <a href="{{ route('ru.main') }}"><img class="logo-equipment logo-news" src="{{ asset('assets/img/logo.png') }}" alt="{{ config('site.user.app.name') }} logo"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section>
        <div class="container all-news">
                        <div class="col-md-12 card-news">
                            <div class="row">
                                @if(! empty($posts) && $posts->count() > 0)
                                    @foreach($posts as $post)
                                        <a class="card-news-square card-news-square-all" href="{{ route('ru.user.blog.news.show', ['slug' => $post->slug]) }}">
                                            <img src="{{ $post->img }}" alt="{{ $post->title_ru }}" class="img-fluid">
                                            <div class="card-news-square-2">
                                                <h3>{{ $post->title_ru }}</h3>
                                                <div class="card-news-square-info">
                                                    <div class="card-news-btn-wrapper">
                                                        <div class="news-more text-uppercase">Подробнее</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-news-footer">
                                                <div class="card-news-category">{{ $post->category->name_ru }}</div>
                                                <div class="card-news-date">{{ $post->created_at->format('Y-m-d') }}</div>
                                            </div>
                                        </a>
                                    @endforeach
                            </div>
                        </div>
                </div>
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
    </section>
@endsection
