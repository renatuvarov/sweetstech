@extends('layouts.ru-app')

@section('title')
    <title>Результаты поиска | {{ env('APP_NAME') }}</title>
@endsection

@section('content')
    <div class="container">
        @if(! empty($machines) && $machines->count() > 0)
            @foreach($machines as $machine)
                <a href="{{ route('user.catalog.show', ['slug' => $machine->slug]) }}">
                    <h2>{{ $machine->name_ru }}</h2>
                    <p>{{ $machine->description_ru }}</p>
                </a>
            @endforeach
            {{ $machines->links() }}
        @else
            No results.
        @endif
    </div>
@endsection
