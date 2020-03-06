@extends('layouts.admin')

@section('content')
    <div class="container text-center">
        <h2 class="h2 mb-5">Новый тэг</h2>
        <form class="text-left w-50 m-auto" method="post" action="{{ route('admin.tag.store') }}" enctype="multipart/form-data">
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
                <input value="{{ old('slug') }}" type="text" class="form-control @error('slug') is-invalid @enderror" placeholder="Слаг" name="slug">
                @error('slug')
                    <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group required">
                <input value="{{ old('img') }}" type="file" class="form-control @error('img') is-invalid @enderror" name="img">
                @error('img')
                <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                @enderror
            </div>
            <p class="text-left font-weight-bold mt-3"><span class="text-danger">*</span> - обязательные поля</p>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
