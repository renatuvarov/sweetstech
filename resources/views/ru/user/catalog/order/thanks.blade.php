@extends('layouts.ru-app')

@section('title')
    <title>Спасибо!</title>
@endsection

@section('description')
    <meta name="description" content="Спасибо!">
@endsection

@section('content')
    <h1>Спасибо!</h1>
    <a href="{{ route('user.catalog.index') }}">назад</a>
@endsection
