@extends('layouts.ru-app')

@section('content')
@include('ru.parts.machines-categories')
<div class="container">
    <h1>{{ $tag->name_ru }}</h1>
    <div class="row">
        @foreach($machines as $machine)
            <div class="col col-md-6">
                <a class="d-block" href="{{ route('ru.user.catalog.show', ['slug' => $machine->slug]) }}">
                    <h3>{{ $machine->name_ru }}</h3>
                    <div>
                        <img src="{{ asset($machine->img) }}" alt="" class="img-fluid">
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    {{ $machines->links() }}
</div>
@endsection
