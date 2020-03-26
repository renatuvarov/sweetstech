@extends('layouts.app')

@section('title')
    <title>Catalog | {{ env('APP_NAME') }}</title>
@endsection

@section('content')
    @include('parts.machines-categories')
    @foreach($machines as $machine)
        <div class="border">
            <h3><a href="{{ route('user.catalog.show', ['slug' => $machine->slug]) }}">{{ $machine->name_en }}</a></h3>
            <ul>
                @foreach($machine->tags as $tag)
                    <li>
                        {{ $tag->name_en }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
    {{ $machines->links() }}
@endsection
