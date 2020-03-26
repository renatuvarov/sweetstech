@extends('layouts.app')

@section('content')
@include('parts.machines-categories')
<div class="container">
    <h1>{{ $tag->name_en }}</h1>
    <div class="row">
        @foreach($machines as $machine)
            <div class="col col-md-6">
                <a class="d-block" href="{{ route('user.catalog.show', ['slug' => $machine->slug]) }}">
                    <h3>{{ $machine->name_en }}</h3>
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
