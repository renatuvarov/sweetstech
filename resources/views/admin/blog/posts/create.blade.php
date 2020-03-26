@extends('layouts.admin')

@section('title')
    <title>Новый пост</title>
@endsection

@section('content')
<div class="pt-5 pb-5">
    <h2 class="display-4 text-center mb-5">Новый пост (выставка)</h2>
    <form action="{{ route('admin.blog.posts.store') }}" method="post" class="add-item-form mb-5">
        @csrf
        <div class="form-group w-50 ml-auto mr-auto mb-5">
            <input type="text" name="title_ru" value="{{ old('title_ru') }}" class="form-control" placeholder="заголовок (русский)">
            @error('title_ru')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group w-50 ml-auto mr-auto mb-5">
            <input type="text" name="title_en" value="{{ old('title_en') }}" class="form-control" placeholder="заголовок (английский)">
            @error('title_en')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group w-50 ml-auto mr-auto mb-5">
            <input type="text" name="slug" value="{{ old('slug') }}" class="form-control" placeholder="слаг">
            @error('slug')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group w-50 ml-auto mr-auto mb-5">
            <select name="category_id" class="form-control">
                <option value="" disabled  @if(empty(old('category_id'))) selected @endif>Категория (не выбрано)</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}" @if(! empty(old('category_id')) && $category->id == old('category_id')) selected @endif>{{$category->name_ru}}</option>
                @endforeach
            </select>
            @error('category_id')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group w-25 ml-auto mr-auto mb-5 text-center">
            <label for="tags-select" class="label h4">Тэги</label>
            <select name="tags[]" multiple class="form-control" id="tags-select">
                <option value="" disabled @if(empty(old('tags'))) selected @endif class="empty-value">не выбрано</option>
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}" @if(! empty(old('tags')) && in_array($tag->id, old('tags'))) selected @endif>{{$tag->name_ru}}</option>
                @endforeach
            </select>
            @error('tags')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <textarea class="summernote"
                  name="content_en"
                  data-image-url="{{ route('admin.blog.images.upload') }}"
                  cols="130"
                  rows="30"
                  data-image-delete="{{ route('admin.blog.images.delete') }}" placeholder="Контент (английский)">{{old('content_en')}}</textarea><br>
        @error('content_en')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
        <textarea class="summernote"
                  name="content_ru"
                  data-image-url="{{ route('admin.blog.images.upload') }}"
                  cols="130"
                  rows="30"
                  data-image-delete="{{ route('admin.blog.images.delete') }}" placeholder="Контент (русский)">{{old('content_ru')}}</textarea><br>
        @error('content_ru')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
        @if($errors->count() > 0 && ! empty(old('images')))
            @foreach(old('images') as $image)
                <input type="hidden" class="new-image" name="images[]" value="{{ $image }}">
            @endforeach
        @endif
        <button class="btn btn-success btn-block w-25 m-auto" type="submit">Создать</button>
    </form>
</div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/multi-select.dist.css') }}">
@endpush

@push('js')
<script src="{{ asset('js/jquery.multi-select.js') }}"></script>
<script src="{{ asset('js/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('js/summernote-create-item.js') }}"></script>
<script>
    $('#tags-select').multiSelect({
        afterSelect: function () {
            $('.ms-selection .empty-value').css({'display': 'none'});
        },
        afterDeselect: function () {
            var values = $('.ms-selection .ms-selected');
            if (values.length === 1 && values.hasClass('empty-value')) {
                values.css({'display': 'list-item'})
            }
        },
        selectableHeader: "<div class='custom-header'>Выберите тэг</div>",
        selectionHeader: "<div class='custom-header'>Выбранные тэги</div>",
    });
</script>
@endpush