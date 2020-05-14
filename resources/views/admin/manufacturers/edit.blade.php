@extends('layouts.admin')

@section('title')
    <title>Редактировать производителя</title>
@endsection

@section('content')
    <div class="container text-center">
        <h2 class="h2 mb-5 display-4">Редактировать производителя</h2>
        <form class="text-left w-50 m-auto" method="post" action="{{ route('admin.manufacturer.update', ['manufacturer' => $manufacturer->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <input value="{{ old('name_ru', $manufacturer->name_ru) }}" type="text" class="form-control @error('name_ru') is-invalid @enderror" placeholder="Наименование (ru)" name="name_ru">
                @error('name_ru')
                <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <input value="{{ old('name_en', $manufacturer->name_en) }}" type="text" class="form-control  @error('name_en') is-invalid @enderror" placeholder="Наименование (eng)" name="name_en">
                @error('name_en')
                <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <input value="{{ old('slug', $manufacturer->slug) }}" type="text" class="form-control @error('slug') is-invalid @enderror" placeholder="Слаг" name="slug">
                @error('slug')
                <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Обновить</button>
        </form>
    </div>
@endsection
