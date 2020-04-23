@extends('layouts.app')

@section('title')
    <title>Thanks!</title>
@endsection

@section('description')
    <meta name="description" content="Thanks!">
@endsection

@section('content')
    <h1>Thanks!</h1>
    <a href="{{ route('user.catalog.index') }}">back</a>
@endsection
