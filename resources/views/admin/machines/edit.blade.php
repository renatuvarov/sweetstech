@extends('layouts.admin')

@section('content')
    <div class="container text-center">
        <h2 class="h2 mb-5">Обновить</h2>
        <form class="text-left w-50 mr-auto ml-auto mb-5" method="post" action="{{ route('admin.machines.update', ['machine' => $machine->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
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
            <div class="form-group required">
                <label for="description_en" class="form-label">Описание (eng)</label>
                <textarea id="description_en" class="form-control  @error('description_en') is-invalid @enderror" placeholder="Описание (eng)" name="description_en" rows="10">{{ old('description_en', $machine->description_en) }}</textarea>
                @error('description_en')
                <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group required border-bottom pb-5">
                <label for="description_ru" class="form-label">Описание (ru)</label>
                <textarea id="description_ru" class="form-control  @error('description_ru') is-invalid @enderror" placeholder="Описание (ru)" name="description_ru" rows="10">{{ old('description_ru', $machine->description_ru) }}</textarea>
                @error('description_ru')
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
{{--            <div class="form-group required border-bottom pb-5">--}}
{{--                <label for="type">Категория</label>--}}
{{--                <select class="form-control" id="type" name="type">--}}
{{--                    @foreach($types as $type)--}}
{{--                        @if($machine->type->id === $type->id)--}}
{{--                            <option selected value="{{ $type->id }}">{{ $type->name_ru }}</option>--}}
{{--                        @else--}}
{{--                            <option value="{{ $type->id }}">{{ $type->name_ru }}</option>--}}
{{--                        @endif--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--                @error('type')--}}
{{--                <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>--}}
{{--                @enderror--}}
{{--            </div>--}}
            <div class="form-group border-bottom pb-5">
                <label for="tags-select">Тэги</label>
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
                    <div class="form-group required col-5">
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
                    <div class="form-group required col-5 ml-3">
                        <input type="text"
                               class="form-control @error('properties.*.value') is-invalid @enderror"
                               placeholder="Значение"
                               name="properties[{{ $propertyNum }}][value]"
                               value="{{ old('properties.*.value', $propertyName->pivot->value) }}">
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
            <button type="submit" class="btn btn-primary d-block w-50">Создать</button>
        </form>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/multi-select.dist.css') }}">
@endpush

@push('js')
    <script src="{{ asset('js/jquery.multi-select.js') }}"></script>
    <script>
        $('#tags-select').multiSelect({
            afterSelect: function () {
                $('#tags-select option[value=""]').removeAttr('selected');
            }
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
            $(this).closest('.form-row').remove();
        });
    </script>
@endpush
