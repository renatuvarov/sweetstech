@extends('layouts.admin')

@section('title')
    <title>Новое оборудование</title>
@endsection

@section('content')
    <div class="text-center">
        <h2 class="h2 mb-5 display-4">Новое оборудование</h2>
        <form class="add-item-form text-left mb-5" method="post" action="{{ route('admin.machines.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="container w-50 m-auto">
                <div class="form-group required">
                    <input value="{{ old('name_ru') }}" type="text" class="form-control @error('name_ru') is-invalid @enderror" placeholder="Наименование (ru)" name="name_ru">
                    @error('name_ru')
                    <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group required border-bottom pb-4">
                    <input value="{{ old('name_en') }}" type="text" class="form-control  @error('name_en') is-invalid @enderror" placeholder="Наименование (eng)" name="name_en">
                    @error('name_en')
                    <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group border-bottom pb-3">
                    <input value="{{ old('slug', \Illuminate\Support\Str::slug(old('name_en'))) }}" type="text" class="form-control @error('slug') is-invalid @enderror" placeholder="Слаг" name="slug">
                    @error('slug')
                    <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="description_en" class="h4 d-block text-center required">Описание (eng)</label>
                <textarea id="description_en"
                          class="form-control  @error('description_en') is-invalid @enderror summernote"
                          name="description_en"
                          data-image-url="{{ route('admin.images.upload') }}"
                          data-image-delete="{{ route('admin.images.delete') }}">{{ old('description_en') }}</textarea>
                @error('description_en')
                <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group border-bottom pb-5">
                <label for="description_ru" class="h4 d-block text-center required">Описание (ru)</label>
                <textarea id="description_ru"
                          class="form-control  @error('description_ru') is-invalid @enderror summernote"
                          name="description_ru"
                          data-image-url="{{ route('admin.images.upload') }}"
                          data-image-delete="{{ route('admin.images.delete') }}">{{ old('description_ru') }}</textarea>
                @error('description_ru')
                <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                @enderror
            </div>
            <div class="container w-50 m-auto">
                <div class="form-group required border-bottom pb-5">
                    <input type="file" class="form-control @error('img') is-invalid @enderror" name="img">
                    @error('img')
                    <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                    @enderror
                </div>
                {{--            <div class="form-group required border-bottom pb-5">--}}
                {{--                <label for="type">Категория</label>--}}
                {{--                <select class="form-control" id="type" name="type">--}}
                {{--                    <option disabled selected value="0"></option>--}}
                {{--                    @foreach($types as $type)--}}
                {{--                        <option value="{{ $type->id }}">{{ $type->name_ru }}</option>--}}
                {{--                    @endforeach--}}
                {{--                </select>--}}
                {{--                @error('type')--}}
                {{--                <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>--}}
                {{--                @enderror--}}
                {{--            </div>--}}
                <div class="form-group border-bottom pb-5">
                    <label for="tags-select">Категории</label>
                    <select id='tags-select' multiple='multiple' name="tags[]" class="@error('tags.*') is-invalid @enderror">
                        <option selected value="" class="empty-value"></option>
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name_ru }}</option>
                        @endforeach
                    </select>
                    @error('tags.*')
                    <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-row"  data-id="0">
                    <div class="form-group required col-5">
                        <select class="form-control @error('properties.*.name') is-invalid @enderror" name="properties[0][name]">
                            <option disabled selected value="">Параметр</option>
                            @foreach($properties as $property)
                                <option value="{{ $property->id }}">{{ $property->name_ru }}</option>
                            @endforeach
                        </select>
                        @error('properties.*.name')
                        <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group required col-5 ml-3">
                        <input type="text" class="form-control @error('properties.*.value') is-invalid @enderror" placeholder="Значение" name="properties[0][value]" value="{{ old('properties.*.value') }}">
                        @error('properties.*.value')
                        <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col ml-1 del-property-wrapper">
                        <button type="button" class="btn btn-danger del-property">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                </div>
                <div class="form-group border-bottom pb-5 mt-3">
                    <button type="button" class="btn btn-success btn-block w-50" id="add">Добавить параметр</button>
                </div>
                <div class="form-group required">
                    <textarea id="mail_en" class="form-control  @error('mail_en') is-invalid @enderror" placeholder="Текст в письме (eng)" name="mail_en" rows="10">{{ old('mail_en') }}</textarea>
                    @error('mail_en')
                    <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group required">
                    <textarea id="mail_ru" class="form-control  @error('mail_ru') is-invalid @enderror" placeholder="Текст в письме (ru)" name="mail_ru" rows="10">{{ old('mail_ru') }}</textarea>
                    @error('mail_ru')
                    <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                    @enderror
                </div>
                <p class="text-left font-weight-bold mt-3"><span class="text-danger">*</span> - обязательные поля</p>
                <button type="submit" class="btn btn-primary d-block w-50">Создать</button>
            </div>
            @if($errors->count() > 0 && ! empty(old('images')))
                @foreach(old('images') as $image)
                    <input type="hidden" class="new-image" name="images[]" value="{{ $image }}">
                @endforeach
            @endif
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
                $('#tags-select .empty-value').removeAttr('selected');
            },
            selectableHeader: "<div class='custom-header'>Выберите категорию</div>",
            selectionHeader: "<div class='custom-header'>Выбранные категории</div>",
        });

        $('#add').on('click', function (e) {
            var props = $(e.target).closest('.form-group').prev().clone();
            var id = props.data('id');
            id++;
            props.attr('data-id', id);
            $('select', props)
                .attr('name', 'properties[' + id + '][name]')
                .find('option:selected').removeAttr('selected');
            $('select', props).prepend('<option disabled selected value="">Параметр</option>');
            $('input', props).attr('name', 'properties[' + id + '][value]').val('');
            props.insertBefore($(this).closest('.form-group'));
        });

        $('form').on('click', '.del-property',  function () {
            if ($('.form-row').length === 1) {
                return;
            }
            $(this).closest('.form-row').remove();
        });
    </script>
@endpush
