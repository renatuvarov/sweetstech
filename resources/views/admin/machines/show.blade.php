@extends('layouts.admin')

@section('content')
    <div class="container text-left">
        <h2>{{ $machine->name_ru }}</h2>
        <h2>{{ $machine->name_en }}</h2>
        <div><img src="{{ asset($machine->img) }}" alt="" class="img-fluid"></div>
        <h3>Описание (ru)</h3>
        <p>{{ $machine->description_ru }}</p>
        <h3>Описание (eng)</h3>
        <p>{{ $machine->description_en }}</p>
        <h3>Слаг</h3>
        <p>{{ $machine->slug }}</p>
        <h3>Категория (ru)</h3>
        <p>{{ $machine->type->name_ru }}</p>
        <h3>Категория (eng)</h3>
        <p>{{ $machine->type->name_en }}</p>
        <h3>Тэги</h3>
        <ul class="list-group">
            @foreach($machine->tags as $tag)
                <li class="list-group-item">
                    <p><span class="text-primary font-weight-bold">ru:</span> {{ $tag->name_ru }}</p>
                    <p><span class="text-primary font-weight-bold">eng:</span> {{ $tag->name_en }}</p>
                </li>
            @endforeach
        </ul>
        <h3>Свойства</h3>
        <ul class="list-group">
            @foreach($machine->properties as $prop)
                <li class="list-group-item">
                    <p><span class="text-primary font-weight-bold">ru:</span> {{ $prop->name_ru }}: {{ $prop->pivot->value }} {{ $prop->measure_ru ?? '' }}</p>
                    <p><span class="text-primary font-weight-bold">eng:</span> {{ $prop->name_en }}: {{ $prop->pivot->value }} {{ $prop->measure_en ?? '' }}</p>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
