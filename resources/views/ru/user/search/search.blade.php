@extends('layouts.ru-app')

@section('title')
    <title>Catalog | {{ config('site.user.app.name') }}</title>
@endsection

@section('description')
    <meta name="description" content="equipment manufactured by {{ config('site.user.app.name') }}">
@endsection

@section('content')
    <div class="intro intro-single equipment-back route">
        <div class="intro-equipment  display-table">
            <div class="table-cell">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="equipment-title equipment-title-all mb-4">Поиск</h2>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('ru.main') }}">Главная</a>
                                </li>
                                <li class="breadcrumb-item active">Оборудование</li>
                            </ol>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <div class="phone-none">
                                <img class="logo-equipment" src="{{ asset('assets/img/logo.png') }}" alt="logo">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="blog-wrapper sect-pt4" id="blog">
        <div class="container equipment-container">
            <div class="row">
                <div class="col-12 row-element">
                    @if(! empty($machines) && $machines->count() > 0)
                        <div class="d-flex post-box post-box-cat">
                            <div class="row-equipment">
                                @foreach($machines as $machine)
                                    <div itemscope itemtype="https://schema.org/Product" class="back-partners oborudovanie">
                                        <a href="{{ route('ru.user.catalog.show', ['slug' => $machine->slug]) }}" class="d-block">
                                            <div class="col-12 equipment-card">
                                                <div class="d-flex flex-column">
                                                    <div class="img-equipment-card">
                                                        <img width="250" height="250" src="{{ $machine->img }}" itemprop="image" alt="{{ $machine->name_ru }}"
                                                             class="img-fluid ">
                                                    </div>
                                                    <div class="w-100 pl-4 pr-4">
                                                        <h4 itemprop="name" class="title-partners">{{ $machine->name_ru }}</h4>
                                                        <div itemprop="description" class="text-desc">
                                                            {{ $machine->short_description_ru }}
                                                        </div>
                                                        <p class="categories-oborudovanie font-weight-bold m-0">Категории:</p>
                                                        <ul class="equipment-card-categories-list">
                                                            @foreach($machine->tags as $tag)
                                                                <li class="equipment-card-categories-item"><span>{{ $tag->name_ru }}</span></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            @include('ru.parts.machines-categories')
                        </div>
                        <hr>
                        {{ $machines->links('vendor.pagination.default') }}
                    @else
                        <p class="text-center">Ничего не найдено.</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

