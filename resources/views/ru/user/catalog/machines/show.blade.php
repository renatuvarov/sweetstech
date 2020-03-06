@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $machine->name_ru }}</h1>
        <div class="row">
            <div class="col col-md-6">
                <p>{{ $machine->description_ru }}</p>
            </div>
            <div class="col col-md-6">
                <img src="{{ asset($machine->img) }}" alt="" class="img-fluid">
            </div>
        </div>
        {{--    <div>Category: <a href="{{ route('user.categories.show', ['slug' => $machine->type->slug]) }}">{{ $machine->type->name_en }}</a></div>--}}
        @if($machine->tags->count() > 0)
            <ul>
                @foreach($machine->tags as $tag)
                    <li><a href="{{ route('user.tags.show', ['slug' => $tag->slug]) }}">{{ $tag->name_ru }}</a></li>
                @endforeach
            </ul>
        @endif
        <ul>
            @foreach($machine->properties as $property)
                <li><span class="font-weight-bold">{{ $property->name_ru }}:</span> {{ $property->pivot->value }} {{ $property->measure_ru }}</li>
            @endforeach
        </ul>
        <form action="{{ route('ru.user.order') }}" method="post" enctype="multipart/form-data" id="form">
            @csrf
            <input type="text" name="sh_nsp" required>
            @error('sh_nsp')
            <p>{{ $message }}</p>
            @enderror
            <input type="text" name="sh_company" required>
            @error('sh_company')
            <p>{{ $message }}</p>
            @enderror
            <input type="email" name="sh_email" required>
            @error('sh_email')
            <p>{{ $message }}</p>
            @enderror
            <input type="tel" name="sh_phone">
            @error('sh_phone')
            <p>{{ $message }}</p>
            @enderror
            <input type="hidden" name="sh_id" value="{{ $machine->id }}">
            @error('sh_id')
            <p>{{ $message }}</p>
            @enderror
            <input type="checkbox" class="js-form-accept" checked>
            <button type="submit" class="js-form-btn">get</button>
        </form>
    </div>
@endsection

@push('js')
    <script>
        $('#form').on('submit', function (e) {
            e.preventDefault();

            if (! $('.js-form-accept').is(':checked')) {
                return;
            }

            var $form = $(this);
            var $btn = $('.js-form-btn');
            $btn.attr('disabled', true);

            $.ajax({
                type: $form.attr('method'),
                url: $form.attr('action'),
                data: $form.serialize(),
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                success: function(response) {
                    console.log(response)
                    $('.js-form-btn').removeAttr('disabled');

                },
                error: function(response) {
                    $btn.attr('disabled', false);
                    var errors = response.responseJSON;
                    $.each(errors, function (key, value) {
                        if (key === 'sh_id') {
                            $('<p>' + value[0] + '</p>').insertBefore('.js-form-btn')
                            return;
                        }
                        $('<p>' + value[0] + '</p>').insertAfter($('input[name=' + key + ']'));
                    })
                }
            });
        });

        $('.js-form-accept').on('change', function () {
            $('.js-form-btn').attr('disabled', ! $(this).is(':checked'));
        });

    </script>
@endpush
