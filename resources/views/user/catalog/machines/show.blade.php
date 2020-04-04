@extends('layouts.app')

@section('title')
    <title>{{ $machine->name_en }}</title>
@endsection

@section('description')
    <meta name="description" content="{{ $machine->meta_description_en ?? $machine->name_en }}">
@endsection

@section('content')
    <div itemscope itemtype="https://schema.org/Product">
        <div class="thumbnail equipment-single route">
            <div class="overlay-mf"></div>
            <div class="intro-content-news display-table">
                <div class="table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 align-self-center">
                                <h3 class="equipment-title">{{ $machine->name_en }}</h3>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('main') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ route('user.catalog.index') }}">Equipment</a></li>
                                    <li class="breadcrumb-item"><a>{{ $machine->short_name_en }}</a></li>
                                </ol>
                                <h4 class="categories-single-title">Categories:</h4>
                                <ul class="categories-single">
                                    @foreach($categories as $category)
                                    <li class="categories-single-all">
                                        <a href="{{ route('user.tags.show', ['slug' => $category->slug]) }}">{{ $category->name_en }}</a>
                                    </li>
                                    @endforeach
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="photo-tech pt-5">
            <div class="container">
                <div class="row-custom row-custom-top">
                    <div class="col-md-6 product_features">
                        <h2>Specifications</h2>
                        <div class="characteristics_group">
                            @foreach($properties as $property)
                                <p>
                                    <span class="characteristic">{{ $property->name_en }}:</span>
                                    <span class="characteristic_value">{{ $property->pivot->value }} {{ $property->measure_en ?? '' }}</span>
                                </p>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6 img-equipment justify-content-center d-flex">
                        <img src="{{ $machine->img }}"
                             class="img-fluid" itemprop="image" alt="{{ $property->name_en }}">
                    </div>
                </div>
                <div class="row-custom">
                    <div class="col-md-12 text-equipment">
                        <h2>About</h2>
                        <div itemprop="description" class="text-about-equipment js-content">
                            {!! $machine->description_en !!}
                        </div>
                    </div>
                </div>
            </div>

            <button type="button" class="show-form js-show-form">Get quotation</button>
        </section>
    </div>
{{--    <form action="{{ route('user.order') }}" method="post" enctype="multipart/form-data" id="form">--}}
{{--        @csrf--}}
{{--        <input type="text" name="sh_nsp" required>--}}
{{--        @error('sh_nsp')--}}
{{--            <p>{{ $message }}</p>--}}
{{--        @enderror--}}
{{--        <input type="text" name="sh_company" required>--}}
{{--        @error('sh_company')--}}
{{--        <p>{{ $message }}</p>--}}
{{--        @enderror--}}
{{--        <input type="email" name="sh_email" required>--}}
{{--        @error('sh_email')--}}
{{--        <p>{{ $message }}</p>--}}
{{--        @enderror--}}
{{--        <input type="tel" name="sh_phone">--}}
{{--        @error('sh_phone')--}}
{{--        <p>{{ $message }}</p>--}}
{{--        @enderror--}}
{{--        <input type="hidden" name="sh_id" value="{{ $machine->id }}">--}}
{{--        @error('sh_id')--}}
{{--        <p>{{ $message }}</p>--}}
{{--        @enderror--}}
{{--        <input type="checkbox" class="js-form-accept" checked>--}}
{{--        <button type="submit" class="js-form-btn">get</button>--}}
{{--    </form>--}}
@endsection

@push('js')
    <script src="{{ asset('js/js-content.js') }}"></script>
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
