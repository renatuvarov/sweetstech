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
                                <h1 class="equipment-title">{{ $machine->name_en }}</h1>
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
                <div class="background-equipment-single">
                    <div class="row-custom row-custom-top">
                        <div class="col-md-6 product_features">
                            <h2>Specifications</h2>
                            <div class="characteristics_group">
                                @foreach($properties as $property)
                                    <p>
                                        <span class="characteristic">{{ $property->name_en }}:</span>
                                        <span class="characteristic_value">{{ $property->pivot->value_en }} {{ $property->measure_en ?? '' }}</span>
                                    </p>
                                @endforeach
                                @if( ! empty($manufacturer))
                                    <p>
                                        <span class="characteristic">Manufacturer: </span>
                                        <span class="characteristic_value">
                                            <a class="manufacturer-link" href="{{ route('user.manufacturer.show', ['slug' => $manufacturer->slug]) }}">{{ $manufacturer->name_en }}</a>
                                        </span>
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 img-equipment justify-content-center d-flex">
                            @if($gallery && count($gallery->images) > 0)
                                @if(count($gallery->images) === 1 )
                                    <img src="{{ $gallery->images[0] }}"
                                         class="img-fluid"
                                         itemprop="image"
                                         alt="{{ $machine->name_en }}">
                                @else
                                    <div class="specifications-slider owl-carousel owl-theme">
                                        @foreach($gallery->images as $image)
                                            <div class="img-slider"><img src="{{ $image }}" alt="{{ $machine->name_en }}"></div>
                                        @endforeach
                                    </div>
                                @endif
                            @else
                                <img src="{{ $machine->img }}"
                                     class="img-fluid"
                                     itemprop="image"
                                     alt="{{ $machine->name_en }}">
                            @endif
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
            </div>
        </section>
    </div>
    <div class="fixed-backdrop-wrapper js-fixed-backdrop-wrapper">
        <button type="button" class="fixed-backdrop-wrapper_close js-fixed-backdrop-wrapper_close"></button>
        <div class="order-form js-order-form">
            <h3 class="order-form_title">
                <span class="equipment-title order-form_title-text">{{ $machine->short_name_en }}</span>
                <span class="order-form_title-logo_wrapper">
                    <img src="{{ asset('assets/img/logo_footer.png') }}" alt="{{ config('site.user.app.name') }}">
                </span>
            </h3>
            <form class="order-form_body" action="{{ route('user.order', ['slug' => $machine->slug]) }}" method="post" enctype="multipart/form-data" id="form">
                {{ session('lang') }}
                @csrf
                <div class="order-form_input-wrapper required">
                    <label for="st_nsp">Name {{ session('lang') }}</label>
                    <input type="text" name="st_nsp" class="form-equipment" id="st_nsp" autofocus>
                    @error('st_nsp')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="order-form_input-wrapper required">
                    <label for="st_company">Company</label>
                    <input type="text" name="st_company" class="form-equipment" id="st_company">
                    @error('st_company')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="order-form_input-wrapper required">
                    <label for="st_email">E-mail</label>
                    <input type="text" name="st_email" class="form-equipment" id="st_email">
                    @error('st_email')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="order-form_input-wrapper">
                    <label for="st_phone">Phone</label>
                    <input type="text" name="st_phone" class="form-equipment" id="st_phone">
                    @error('st_phone')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <input type="hidden" name="st_id" value="{{ $machine->id }}" >
                <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
                <input type="hidden" name="lang" value="en">
                <p class="text-center"><span class="required"> - required fields</span></p>
                <p class="order-form_wrapper text-center">
                    <label style="cursor:pointer;"><input type="checkbox" class="js-form-accept" checked> I agree to the processing of personal data</label>
                    <button type="submit" class="button-neu js-button-neu">Send</button>
                    <br>
                    <span style="font-size: 8px; opacity: 0.5; margin: 3px auto; color: #cbcbcb;">
                    This site is protected by reCAPTCHA and the Google <a href="https://policies.google.com/privacy">Privacy Policy</a> and <a href="https://policies.google.com/terms">Terms of Service</a> apply.
                </span>
                </p>
            </form>
        </div>
        <div class="order-form_success js-order-form_success hide">
            <div class="order-form">
                <h3 class="order-form_title">
                    <span class="equipment-title order-form_title-text">Success!</span>
                </h3>
                <div class="order-form_body text-center">
                    <p>Thanks! Your application has been sent successfully! Expect feedback on the provided contact details.</p>
                    <p class="text-center">
                        <button type="button" class="button-neu js-fixed-backdrop-wrapper_close">Ok</button>
                    </p>
                </div>
            </div>
        </div>
        <div class="order-form_error js-order-form_error hide">
            <div class="order-form">
                <h3 class="order-form_title">
                    <span class="equipment-title order-form_title-text">Error!</span>
                </h3>
                <div class="order-form_body text-center">
                    <p> We're sorry, but something went wrong. Please, try again later</p>
                    <p class="text-center">
                        <button type="button" class="button-neu js-fixed-backdrop-wrapper_close">Ok</button>
                    </p>
                </div>
            </div>
        </div>
    </div>

    @can('admin')
        <a class="to-admin btn btn-warning" href="{{ route('admin.machines.edit', ['machine' => $machine->id]) }}">Редактировать</a>
    @endcan

    @include('parts.recaptcha')
@endsection

@push('css')
    <style>

        .img-equipment .owl-carousel img  {
            max-width:100%;
        }

        .owl-carousel .owl-item img {
            display: inline-block;
            width: auto;
        }
    </style>
@endpush

@push('js')
    <script src="{{ asset('js/js-content.js') }}"></script>
    <script>
        $('.js-show-form').on('click', function () {
            $('.js-fixed-backdrop-wrapper').addClass('fixed-backdrop-wrapper-active');
        });

        $('.js-fixed-backdrop-wrapper_close').on('click', function () {
            $('input.form-equipment').val('');
            $('.js-order-form').removeClass('hide');
            $('.js-order-form_success').addClass('hide');
            $('.js-order-form_error').addClass('hide');
            $('.js-fixed-backdrop-wrapper').removeClass('fixed-backdrop-wrapper-active');
        });

        $('.js-fixed-backdrop-wrapper').on('click', function (e) {
            if (e.target === $(this)) {
                $('input.form-equipment').val('');
                $('.js-order-form').removeClass('hide');
                $('.js-order-form_success').addClass('hide');
                $('.js-order-form_error').addClass('hide');
                $('.js-fixed-backdrop-wrapper').removeClass('fixed-backdrop-wrapper-active');
            }
        });

        $('.js-form-accept').on('change', function () {
            $('.js-button-neu').attr('disabled', ! $(this).is(':checked'));
        });

        $('.owl-carousel').owlCarousel({
            loop: true,
            nav: false,
            autoplay: true,
            smartSpeed: 1000,
            autoplayTimeout: 4000,
            items: 1,
        });

    </script>
@endpush
