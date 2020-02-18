@extends('layouts.admin')

@section('content')
    <div class="container text-center">
        <h2 class="h2 mb-5">Обновить</h2>
        <form class="text-left w-50 mr-auto ml-auto mb-5" method="post" action="{{ route('admin.machines.update', ['machine' => $machine->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group required">
                <input value="{{ old('name_ru', $machine->name_ru) }}" type="text" class="form-control @error('name_ru') is-invalid @enderror" placeholder="Наименование (ru)" name="name_ru">
                @error('name_ru')
                <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group required border-bottom pb-5">
                <input value="{{ old('name_en', $machine->name_en) }}" type="text" class="form-control  @error('name_en') is-invalid @enderror" placeholder="Наименование (eng)" name="name_en">
                @error('name_en')
                <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group required">
                <textarea id="description_en" class="form-control  @error('description_en') is-invalid @enderror" placeholder="Описание (eng)" name="description_en" rows="10">{{ old('description_en', $machine->description_en) }}</textarea>
                @error('description_en')
                <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group required border-bottom pb-5">
                <textarea id="description_ru" class="form-control  @error('description_ru') is-invalid @enderror" placeholder="Описание (ru)" name="description_ru" rows="10">{{ old('description_ru', $machine->description_ru) }}</textarea>
                @error('description_ru')
                <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group border-bottom pb-5">
                <input value="{{ old('slug', $machine->slug) }}" type="text" class="form-control @error('slug') is-invalid @enderror" placeholder="Слаг" name="slug">
                @error('slug')
                <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group required border-bottom pb-5">
                <input type="file" class="form-control @error('img') is-invalid @enderror" name="img">
                @error('img')
                <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group required border-bottom pb-5">
                <label for="type">Категория</label>
                <select class="form-control" id="type" name="type">
                    @foreach($types as $type)
                        @if($machine->type->id === $type->id)
                            <option selected value="{{ $type->id }}">{{ $type->name_ru }}</option>
                        @else
                            <option value="{{ $type->id }}">{{ $type->name_ru }}</option>
                        @endif
                    @endforeach
                </select>
                @error('type')
                <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                @enderror
            </div>
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
            @foreach($machine->properties as $propertyNum => $propertyName)
                <div class="form-row"  data-id="{{ $propertyNum }}">
                    <div class="form-group required col">
                        <select class="form-control @error('properties.*.name') is-invalid @enderror" name="properties[{{ $propertyNum }}][name]">
                            @foreach($properties as $property)
                                @if(in_array($property->id, array_column($machine->properties->toArray(), 'id')))
                                    <option selected value="{{ $propertyName->id }}">{{ $propertyName->name_ru }}</option>
                                @else
                                    <option value="{{ $propertyName->id }}">{{ $propertyName->name_ru }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('properties.*.name')
                        <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group required col ml-5">
                        <input type="text"
                               class="form-control @error('properties.*.value') is-invalid @enderror"
                               placeholder="Значение"
                               name="properties[{{ $propertyNum }}][value]"
                               value="{{ old('properties.*.value', $propertyName->pivot->value) }}">
                        @error('properties.*.value')
                        <small class="form-text text-muted ml-2" style="color: #c82333 !important;">{{$message}}</small>
                        @enderror
                    </div>
                </div>
            @endforeach
            <div class="form-group border-bottom pb-5 mt-3">
                <button type="button" class="btn btn-success btn-block w-50" id="add">Добавить параметр</button>
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
            $('select', props).attr('name', 'properties[' + id + '][name]');
            $('input', props).attr('name', 'properties[' + id + '][value]');
            props.insertBefore($(this).closest('.form-group'));
        })
    </script>
@endpush
