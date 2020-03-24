@extends('layouts.admin')

@section('content')
    <div class="container text-center">
        <h2 class="h2 mb-5 display-4">Новый параметр</h2>
        <form class="text-left w-50 m-auto" method="post" action="{{ route('admin.properties.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group required">
                <input value="{{ old('name_ru') }}" type="text" class="form-control @error('name_ru') is-invalid @enderror" placeholder="Наименование (ru)" name="name_ru">
                @error('name_ru')
                    <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group required">
                <input value="{{ old('name_en') }}" type="text" class="form-control  @error('name_en') is-invalid @enderror" placeholder="Наименование (eng)" name="name_en">
                @error('name_en')
                    <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <input value="{{ old('measure_en') }}" type="text" class="form-control @error('measure_en') is-invalid @enderror" placeholder="Ед. изм. (eng)" name="measure_en">
                @error('measure_en')
                    <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <input value="{{ old('measure_ru') }}" type="text" class="form-control @error('measure_ru') is-invalid @enderror" placeholder="Ед. изм. (ru)" name="measure_ru">
                @error('measure_ru')
                <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                @enderror
            </div>
            <p class="text-left font-weight-bold mt-3"><span class="text-danger">*</span> - обязательные поля</p>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
