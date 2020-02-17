@extends('layouts.admin')

@section('content')
    <div class="container text-center">
        <h2 class="h2 mb-5">Обновить параметр</h2>
        <form class="text-left w-50 m-auto" method="post" action="{{ route('admin.properties.update', ['property' => $property->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <input value="{{ old('name_ru', $property->name_ru) }}" type="text" class="form-control @error('name_ru') is-invalid @enderror" placeholder="Наименование (ru)" name="name_ru">
                @error('name_ru')
                <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <input value="{{ old('name_en', $property->name_en) }}" type="text" class="form-control  @error('name_en') is-invalid @enderror" placeholder="Наименование (eng)" name="name_en">
                @error('name_en')
                <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <input value="{{ old('measure_en', $property->measure_en) }}" type="text" class="form-control  @error('measure_en') is-invalid @enderror" placeholder="Ед. изм. (eng)" name="measure_en">
                @error('measure_en')
                <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <input value="{{ old('measure_ru', $property->measure_ru) }}" type="text" class="form-control  @error('measure_ru') is-invalid @enderror" placeholder="Ед. изм. (eng)" name="measure_ru">
                @error('measure_ru')
                <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Обновить</button>
        </form>
    </div>
@endsection
