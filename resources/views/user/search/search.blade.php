@extends('layouts.app')

@section('title')
    <title>Search Results | {{ env('APP_NAME') }}</title>
@endsection

@section('content')
    <div class="container">
        @if(! empty($machines) && $machines->count() > 0)
            @foreach($machines as $machine)
                <a href="{{ route('user.catalog.show', ['slug' => $machine->slug]) }}">
                    <h2>{{ $machine->name_en }}</h2>
                    <p>{{ $machine->description_en }}</p>
                </a>
            @endforeach
            {{ $machines->links() }}
        @else
            No results.
        @endif
    </div>
@endsection
