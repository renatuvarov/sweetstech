@extends('layouts.app')

@section('title')
    <title>Thanks!</title>
@endsection

@section('description')
    <meta name="description" content="Thanks!">
@endsection

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
<div class="text-center card-thanks">
<p><img src="img/logo.png" class="logo text-center" alt="">
<h2 class="thanks-title">Thanks!<br> Your application has been sent successfully!<br> Expect feedback on the provided contact details.</h2>
    <button class="col-12 button-neu"><a style="color: white" href="{{ route('user.catalog.index') }}">Comeback to site</a></button>
    </p>
</div>
        </div>
</div>
    @endsection
