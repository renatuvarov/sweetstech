@extends('layouts.admin')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/multi-select.dist.css') }}">
@endpush

@section('content')
<div class="container">
    <h2 class="display-4 text-center mb-5">Редактировать пост (выставку)</h2>
    <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="post" class="add-item-form">
        @csrf
        @method('put')
        <div class="form-group">
            <input type="text" name="title_ru" value="{{ old('title_ru', $post->title_ru) }}" class="form-control" placeholder="заголовок (русский)">
            @error('title_ru')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <input type="text" name="title_en" value="{{ old('title_en', $post->title_en) }}" class="form-control" placeholder="заголовок (английский)">
            @error('title_en')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <input type="text" name="slug" value="{{ old('slug', $post->slug) }}" class="form-control" placeholder="слаг">
            @error('slug')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <select name="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{$category->id}}" @if($category->id === $post->category_id) selected @endif>{{$category->name_ru}}</option>
                @endforeach
            </select>
            @error('category_id')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <select name="tags[]" multiple class="form-control">
                <option value="" @if($post->tags->count() === 0) selected @endif>Тэги (не выбрано)</option>
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}" @if(in_array($tag->id, $post->tags->pluck('id')->toArray())) selected @endif>{{$tag->name_ru}}</option>
                @endforeach
            </select>
            @error('tags')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <textarea class="summernote"
                  name="content_en"
                  data-image-url="{{ route('post.images.upload') }}"
                  cols="130"
                  rows="30"
                  data-image-delete="{{ route('post.images.delete') }}">{{old('content_en', $post->content_en)}}</textarea><br>
        @error('content_en')
        {{ $message }}
        @enderror
        <textarea class="summernote"
                  name="content_ru"
                  data-image-url="{{ route('post.images.upload') }}"
                  cols="130"
                  rows="30"
                  data-image-delete="{{ route('post.images.delete') }}">{{old('content_ru', $post->content_ru)}}</textarea><br>
        @error('content_ru')
        {{ $message }}
        @enderror
        @if(! empty($post->images))
            @foreach($post->images as $image)
                <input type="hidden" class="old-image" name="images[]" value="{{ $image }}">
            @endforeach
        @endif
        @if($errors->count() > 0 && ! empty(old('images')))
            @foreach(old('images') as $image)
                <input type="hidden" class="new-image" name="images[]" value="{{ $image }}">
            @endforeach
        @endif
        <button type="submit" class="btn btn-success w-25">Сохранить</button>
    </form>
</div>
@endsection


<script>
    var submited = false;

    function loadNewImages(url, data, success, error) {
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            processData: false,
            cache: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            },
            success: success,
            error: error
        });
    }

    $('.summernote').summernote({
        tabsize: 2,
        height: 500,
        width: 1280,
        callbacks: {
            onImageUpload: function (files) {
                var editor = $(this);
                var url = editor.data('image-url');
                var data = new FormData();
                data.append('file', files[0]);

                loadNewImages(url, data, function (res) {
                        editor.summernote('insertImage', res);
                        $('<input>', {
                            type: 'hidden',
                            name: 'images[]',
                            value: res,
                            class: 'new-image'
                        }).appendTo('.add-item-form');
                    }, function (error) {
                        console.log(error);
                    }
                );
            },
            onMediaDelete: function(target) {
                var src = target[0].src;
                src = src.replace(new URL(src).origin, '');
                var newImage = $('.new-image[value="' + src + '"]');
                var imgCount = $('img[src="' + src + '"]').length;

                if (imgCount === 0) {
                    if (newImage.get().length === 0) {
                        $('<input>', {
                            type: 'hidden',
                            name: 'for_removing[]',
                            value: src
                        }).appendTo('.add-item-form');
                        return;
                    }

                    var editor = $(this);
                    var url = editor.data('image-delete');
                    var data = new FormData();

                    data.append('files', JSON.stringify([src]));

                    loadNewImages(url, data, function (res) {
                        newImage.remove();
                    }, function (error) {
                        console.log(error);
                    });
                }
            }
        }
    });

    $('.add-item-form').on('submit', function () {
        submited = true;
    });

    $(window).on('beforeunload', function () {
        if (! submited) {
            var url = $('.summernote').data('image-delete');
            var data = new FormData();
            var urls = $('.new-image').map(function () {
                return $(this).val();
            }).get();

            data.append('files', JSON.stringify([urls]));

            loadNewImages(url, data, function(res) {
                console.log(res)
            }, function (error) {
                console.log(error)
            });
        }
    });
</script>
