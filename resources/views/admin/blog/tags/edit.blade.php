@extends('layouts.admin')

@section('title')
    <title>Редактировать тэг</title>
@endsection

@section('content')
    <div class="container">
        <h2 class="display-4 text-center mb-5">Редактировать тэг</h2>
        <form action="{{ route('admin.blog.tags.update', ['tag' => $tag->id]) }}" method="post" class="w-50 m-auto pb-5">
            @csrf
            @method('put')
            <div class="form-group">
                <input type="text" name="name_ru" value="{{ old('name_ru', $tag->name_ru) }}" class="form-control" placeholder="Название (русское)">
                @error('name_ru')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" name="name_en" value="{{ old('name_en', $tag->name_en) }}" class="form-control" placeholder="Название (английское)">
                @error('name_en')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" name="slug" value="{{ old('slug', $tag->slug) }}" class="form-control" placeholder="Слаг">
                @error('slug')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-success btn-block w-50">Сохранить</button>
        </form>
    </div>
@endsection

