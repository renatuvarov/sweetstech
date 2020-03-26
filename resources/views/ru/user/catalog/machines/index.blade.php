@extends('layouts.ru-app')

@section('title')
    <title>Каталог | {{ env('APP_NAME') }}</title>
@endsection

@section('content')
    @include('ru.parts.machines-categories')
    @foreach($machines as $machine)
        <div class="border">
            <h3><a href="{{ route('user.catalog.show', ['slug' => $machine->slug]) }}">{{ $machine->name_ru }}</a></h3>
            <ul>
                @foreach($machine->tags as $tag)
                    <li>
                        {{ $tag->name_ru }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
    {{ $machines->links() }}
@endsection
