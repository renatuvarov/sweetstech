@extends('layouts.app')

@section('title')
    <title>Thanks!</title>
@endsection

@section('description')
    <meta name="description" content="Thanks!">
@endsection

@section('content')
    <div class="mt-5 text-center">
        <p><img src="img/logo.png" class="logo text-center" alt="">
        <h2 class="thanks-title" style="margin-bottom: 20px;">Thanks!</h2>
        <button class="col-12 button-neu"><a style="color: white" href="{{ route('user.catalog.index') }}">Comeback to site</a></button>
        </p>
    </div>
@endsection
