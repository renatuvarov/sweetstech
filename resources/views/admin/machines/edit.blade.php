@extends('layouts.admin')

@section('title')
    <title>Редактировать оборудование</title>
@endsection

@section('content')
    <div>
        <h2 class="h2 mb-5 display-4 text-center">Редактировать</h2>
        <form class="add-item-form text-left pb-5" method="post" action="{{ route('admin.machines.update', ['machine' => $machine->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group w-50 ml-auto mr-auto mb-5 d-flex">
                <label for="is_redirect" class="form-check-label font-weight-bold">Редирект?</label>
                @if(! empty($machine->is_redirect))
                    <input type="checkbox" name="is_redirect" style="width: 30px; height: 30px; margin-left: 30px;" id="is_redirect" checked>
                @else
                    <input type="checkbox" name="is_redirect" class="form-control" id="is_redirect">
                @endif
                @error('is_redirect')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="container w-50 m-auto">
                <div class="form-group required">
                    <label for="name_ru" class="form-label">Наименование (ru)</label>
                    <input value="{{ old('name_ru', $machine->name_ru) }}" type="text" id="name_ru" class="form-control @error('name_ru') is-invalid @enderror" placeholder="Наименование (ru)" name="name_ru">
                    @error('name_ru')
                    <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group required border-bottom pb-5">
                    <label for="name_en" class="form-label">Наименование (eng)</label>
                    <input value="{{ old('name_en', $machine->name_en) }}" id="name_en" type="text" class="form-control  @error('name_en') is-invalid @enderror" placeholder="Наименование (eng)" name="name_en">
                    @error('name_en')
                    <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group required border-bottom pb-4">
                    <input value="{{ old('short_name_en', $machine->short_name_en) }}" type="text" class="form-control  @error('short_name_en') is-invalid @enderror" placeholder="Короткое наименование (eng)" name="short_name_en">
                    @error('short_name_en')
                    <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group required border-bottom pb-4">
                    <input value="{{ old('short_name_ru', $machine->short_name_ru) }}" type="text" class="form-control  @error('short_name_ru') is-invalid @enderror" placeholder="Короткое наименование (ru)" name="short_name_ru">
                    @error('short_name_ru')
                    <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group required border-bottom pb-4">
                    <input value="{{ old('short_description_en', $machine->short_description_en) }}" type="text" class="form-control  @error('short_description_en') is-invalid @enderror" placeholder="Короткое описание (eng)" name="short_description_en">
                    @error('short_description_en')
                    <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group required border-bottom pb-4">
                    <input value="{{ old('short_description_ru', $machine->short_description_ru) }}" type="text" class="form-control  @error('short_description_ru') is-invalid @enderror" placeholder="Короткое описание (ru)" name="short_description_ru">
                    @error('short_description_ru')
                    <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group border-bottom pb-4">
                    <input value="{{ old('meta_description_en', $machine->meta_description_en) }}" type="text" class="form-control  @error('meta_description_en') is-invalid @enderror" placeholder="SEO описание (en)" name="meta_description_en">
                    @error('meta_description_en')
                    <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group border-bottom pb-4">
                    <input value="{{ old('meta_description_ru', $machine->meta_description_ru) }}" type="text" class="form-control  @error('meta_description_ru') is-invalid @enderror" placeholder="SEO описание (ru)" name="meta_description_ru">
                    @error('meta_description_ru')
                    <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group border-bottom pb-5">
                    <label for="slug-input" class="form-label">Слаг</label>
                    <input value="{{ old('slug', $machine->slug) }}" type="text" id="slug-input" class="form-control @error('slug') is-invalid @enderror" placeholder="Слаг" name="slug">
                    @error('slug')
                    <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group required border-bottom pb-5">
                    <label for="img-input" class="form-label">Изображение оборудования</label>
                    <input type="file" class="form-control @error('img') is-invalid @enderror" name="img" id="img-input">
                    @error('img')
                    <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                    @enderror
                </div>
                @if( ! empty($galleries) && $galleries->count() > 0)
                    <div class="form-group required border-bottom pb-5">
                        <label for="gallery_id">Галерея</label>
                        <select name="gallery_id" id="gallery_id">
                            @if(empty(old('gallery_id')) && ! $machine->gallery_id)
                                <option value="" selected>---</option>
                            @else
                                <option value="">---</option>
                            @endif
                            @foreach($galleries as $gallery)
                                @if(old('gallery_id') == $gallery->id)
                                    <option value="{{ $gallery->id }}" selected>{{ $gallery->name }}</option>
                                @elseif($machine->gallery_id === $gallery->id)
                                    <option value="{{ $gallery->id }}" selected>{{ $gallery->name }}</option>
                                @else
                                    <option value="{{ $gallery->id }}">{{ $gallery->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('gallery_id')
                        <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                        @enderror
                    </div>
                @endif
                <div class="form-group border-bottom pb-5">
                    <label for="pdf_en">PDF (английский)</label>
                    <input type="file" class="form-control @error('pdf_en') is-invalid @enderror" name="pdf_en" id="pdf_en">
                    @error('pdf_en')
                    <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group w-50 ml-auto mr-auto mb-5 d-flex">
                    <label for="remove_pdf_en" class="form-check-label font-weight-bold">Удалить pdf (английский)?</label>
                    <input type="checkbox" name="remove_pdf_en" class="form-control" id="remove_pdf_en">
                </div>
                <div class="form-group border-bottom pb-5">
                    <label for="pdf_ru">PDF (русский)</label>
                    <input type="file" class="form-control @error('pdf_ru') is-invalid @enderror" name="pdf_ru" id="pdf_ru">
                    @error('pdf_ru')
                    <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group w-50 ml-auto mr-auto mb-5 d-flex">
                    <label for="remove_pdf_ru" class="form-check-label font-weight-bold">Удалить pdf (русский)?</label>
                    <input type="checkbox" name="remove_pdf_ru" class="form-control" id="remove_pdf_ru">
                </div>
            </div>
            <div class="form-group">
                <label for="description_en" class="form-label d-block text-center required h4">Описание (eng)</label>
                <textarea id="description_en"
                          class="form-control  @error('description_en') is-invalid @enderror summernote"
                          placeholder="Описание (eng)"
                          name="description_en"
                          data-image-url="{{ route('admin.images.upload') }}"
                          data-image-delete="{{ route('admin.images.delete') }}">{{ old('description_en') ?: $machine->description_en }}</textarea>
                @error('description_en')
                <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group border-bottom pb-5">
                <label for="description_ru" class="form-label d-block text-center required h4">Описание (ru)</label>
                <textarea id="description_ru"
                          class="form-control  @error('description_ru') is-invalid @enderror summernote"
                          placeholder="Описание (ru)"
                          name="description_ru"
                          data-image-url="{{ route('admin.images.upload') }}"
                          data-image-delete="{{ route('admin.images.delete') }}">{{ old('description_ru') ?: $machine->description_ru }}</textarea>
                @error('description_ru')
                <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                @enderror
            </div>
            <div class="container w-50 m-auto">
                <div class="form-group border-bottom pb-5 text-center">
                    <label for="tags-select">Категории</label>
                    <select id='tags-select' multiple='multiple' name="tags[]" class="@error('tags.*') is-invalid @enderror">
                        @if($machine->tags->count() === 0)
                            <option selected value=""></option>
                        @endif
                        @foreach($tags as $tag)
                            @if(in_array($tag->id, array_column($machine->tags->toArray(), 'id')))
                                <option selected value="{{ $tag->id }}">{{ $tag->name_ru }}</option>
                            @else
                                <option value="{{ $tag->id }}">{{ $tag->name_ru }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('tags.*')
                    <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                    @enderror
                </div>
                <h6>Параметры</h6>
                @foreach($machine->properties as $propertyNum => $propertyName)
                    <div class="form-row"  data-id="{{ $propertyNum }}">
                        <div class="form-group required col-3">
                            <select class="form-control @error('properties.*.name') is-invalid @enderror" name="properties[{{ $propertyNum }}][name]">
                                @foreach($properties as $property)
                                    @if($property->id === $propertyName->id)
                                        <option selected value="{{ $propertyName->id }}">{{ $propertyName->name_ru }}</option>
                                    @else
                                        <option value="{{ $property->id }}">{{ $property->name_ru }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('properties.*.name')
                            <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group required col-3 ml-5">
                            <input type="text"
                                   class="form-control js-prop-en @error('properties.*.value_en') is-invalid @enderror"
                                   placeholder="Значение"
                                   name="properties[{{ $propertyNum }}][value_en]"
                                   value="{{ old('properties.*.value_en', $propertyName->pivot->value_en) }}">
                            @error('properties.*.value_en')
                            <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group required col-3 ml-5">
                            <input type="text"
                                   class="form-control js-prop-ru @error('properties.*.value_ru') is-invalid @enderror"
                                   placeholder="Значение"
                                   name="properties[{{ $propertyNum }}][value_ru]"
                                   value="{{ old('properties.*.value_ru', $propertyName->pivot->value_ru) }}">
                            @error('properties.*.value_ru')
                            <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col ml-1 del-property-wrapper">
                            <button type="button" class="btn btn-danger del-property">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </div>
                @endforeach
                <div class="form-group mb-3 mt-3">
                    <button type="button" class="btn btn-success btn-block w-50" id="add">Добавить параметр</button>
                </div>
                @error('properties')
                <small class="form-text text-muted ml-2 border-bottom pb-3" style="color: #c82333 !important;">{{$message}}</small>
                @enderror
                <div class="form-group required">
                    <textarea id="mail_en" class="form-control  @error('mail_en') is-invalid @enderror" placeholder="Текст в письме (eng)" name="mail_en" rows="10">{{ old('mail_en', $machine->mail_en) }}</textarea>
                    @error('mail_en')
                    <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group required">
                    <textarea id="mail_ru" class="form-control  @error('mail_ru') is-invalid @enderror" placeholder="Текст в письме (ru)" name="mail_ru" rows="10">{{ old('mail_ru', $machine->mail_ru) }}</textarea>
                    @error('mail_ru')
                    <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                    @enderror
                </div>
                <p class="text-left font-weight-bold mt-3"><span class="text-danger">*</span> - обязательные поля</p>
            </div>
            @if(! empty($machine->images))
                @foreach($machine->images as $image)
                    <input type="hidden" class="old-image" name="images[]" value="{{ $image }}">
                @endforeach
            @endif

            @include('parts.admin.check-image')

            <div class="text-center container">
                <button type="submit" class="btn btn-primary w-50">Сохранить</button>
            </div>
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
    <script src="{{ asset('js/summernote-tags.js') }}"></script>
    <script src="{{ asset('js/summernote-edit-item.js') }}"></script>
    <script>
        $('#tags-select').multiSelect({
            afterSelect: function () {
                $('#tags-select option[value=""]').removeAttr('selected');
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
            $('.js-prop-en', props).attr('name', 'properties[' + id + '][value_en]').val('');
            $('.js-prop-ru', props).attr('name', 'properties[' + id + '][value_ru]').val('');
            props.insertBefore($(this).closest('.form-group'));
        });

        $('form').on('click', '.del-property',  function () {
            $(this).closest('.form-row').remove();
        });
    </script>
@endpush
