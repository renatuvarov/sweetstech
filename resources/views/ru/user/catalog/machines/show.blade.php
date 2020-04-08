@extends('layouts.ru-app')

@section('title')
    <title>{{ $machine->name_ru }}</title>
@endsection

@section('description')
    <meta name="description" content="{{ $machine->meta_description_ru ?? $machine->name_ru }}">
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
                                <h1 class="equipment-title">{{ $machine->name_ru }}</h1>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('ru.main') }}">Главная</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ route('ru.user.catalog.index') }}">Оборудование</a></li>
                                    <li class="breadcrumb-item"><a>{{ $machine->short_name_ru }}</a></li>
                                </ol>
                                <h4 class="categories-single-title">Категории:</h4>
                                <ul class="categories-single">
                                    @foreach($categories as $category)
                                    <li class="categories-single-all">
                                        <a href="{{ route('ru.user.tags.show', ['slug' => $category->slug]) }}">{{ $category->name_ru }}</a>
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
                        <h2>Характеристики</h2>
                        <div class="characteristics_group">
                            @foreach($properties as $property)
                                <p>
                                    <span class="characteristic">{{ $property->name_ru }}:</span>
                                    <span class="characteristic_value">{{ $property->pivot->value }} {{ $property->measure_ru ?? '' }}</span>
                                </p>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6 img-equipment justify-content-center d-flex">
                        <img src="{{ $machine->img }}"
                             class="img-fluid" itemprop="image" alt="{{ $property->name_ru }}">
                    </div>
                </div>
                <div class="row-custom">
                    <div class="col-md-12 text-equipment">
                        <h2>Подробнее</h2>
                        <div itemprop="description" class="text-about-equipment js-content">
                            {!! $machine->description_ru !!}
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="show-form js-show-form">Узнать больше</button>
        </section>
    </div>
    <div class="fixed-backdrop-wrapper js-fixed-backdrop-wrapper">
        <button type="button" class="fixed-backdrop-wrapper_close js-fixed-backdrop-wrapper_close"></button>
        <div class="order-form js-order-form">
            <h3 class="order-form_title">
                <span class="equipment-title order-form_title-text">{{ $machine->short_name_ru }}</span>
                <span class="order-form_title-logo_wrapper">
                    <img src="{{ asset('assets/img/logo_footer.png') }}" alt="{{ config('site.user.app.name') }}">
                </span>
            </h3>
            <form class="order-form_body" action="{{ route('ru.user.order') }}" method="post" enctype="multipart/form-data" id="form">
                @csrf
                <div class="order-form_input-wrapper">
                    <label for="st_nsp">Имя</label>
                    <input type="text" name="st_nsp" class="form-equipment" id="st_nsp" autofocus>
                </div>
                <div class="order-form_input-wrapper">
                    <label for="st_company">Компания</label>
                    <input type="text" name="st_company" class="form-equipment" id="st_company">
                </div>
                <div class="order-form_input-wrapper">
                    <label for="st_email">E-mail</label>
                    <input type="text" name="st_email" class="form-equipment" id="st_email">
                </div>
                <div class="order-form_input-wrapper">
                    <label for="st_phone">Телефон</label>
                    <input type="text" name="st_phone" class="form-equipment" id="st_phone">
                </div>
                <input type="hidden" name="st_id" value="{{ $machine->id }}" >
                <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
                <p class="order-form_wrapper text-center">
                    <label style="cursor:pointer;"><input type="checkbox" class="js-form-accept" checked> Согласен на обработку персональных данных</label>
                    <button type="submit" class="button-neu js-button-neu">Отправить</button>
                    <br>
                <span style="font-size: 8px; opacity: 0.5; margin: 3px auto; color: #cbcbcb;">
                    Этот сайт использует reCAPTCHA от Google <a href="https://policies.google.com/privacy">Политика безопасности</a> и <a href="https://policies.google.com/terms">Условия использования</a>
                </span>
                </p>
            </form>
        </div>
        <div class="order-form_success js-order-form_success hide">
            <div class="order-form">
                <h3 class="order-form_title">
                    <span class="equipment-title order-form_title-text">Успешно!</span>
                </h3>
                <div class="order-form_body text-center">
                    <p>Спасибо! Ваше сообщение было доставлено! Ожидайте ответа по предоставленным контактным данным.</p>
                    <p class="text-center">
                        <button type="button" class="button-neu js-fixed-backdrop-wrapper_close">Ok</button>
                    </p>
                </div>
            </div>
        </div>
        <div class="order-form_error js-order-form_error hide">
            <div class="order-form">
                <h3 class="order-form_title">
                    <span class="equipment-title order-form_title-text">Ошибка!</span>
                </h3>
                <div class="order-form_body text-center">
                    <p> Извините, что-то пошло не так. Попробуйте позже.</p>
                <p class="text-center">
                    <button type="button" class="button-neu js-fixed-backdrop-wrapper_close">Ok</button>
                </p>
                </div>
            </div>
        </div>
    </div>
    @include('parts.recaptcha')
@endsection

@push('js')
<script src="{{ asset('js/js-content.js') }}"></script>
{{--<script>--}}
{{--    --}}{{--grecaptcha.ready(function() {--}}
{{--    --}}{{--    grecaptcha.execute('', {action: 'homepage'}).then(function(token) {--}}
{{--    --}}{{--        document.getElementById('g-recaptcha-response').value=token;--}}
{{--    --}}{{--    });--}}
{{--    --}}{{--});--}}
{{--</script>--}}
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

    $('#form').on('submit', function (e) {
        e.preventDefault();

        $(this).find('.invalid-feedback').remove();

        if (! $('.js-form-accept').is(':checked')) {
            return;
        }

        var $form = $(this);
        var $btn = $('.js-button-neu');
        $btn.attr('disabled', true);

        $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize(),
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            success: function(response) {
                $('.js-button-neu').removeAttr('disabled');
                $('input.form-equipment').val('');
                $('.js-order-form').addClass('hide');
                $('.js-order-form_success').removeClass('hide');
            },
            error: function(response, textStatus, xhr) {
                $btn.attr('disabled', false);
                if (xhr.status === 422) {
                    var errors = response.responseJSON;

                    $.each(errors, function (key, value) {
                        $('<p>', {
                            class: 'invalid-feedback',
                            text: value[0],
                        }).insertAfter('input[name="' + key + '"]');
                    });
                } else {
                    $('.js-order-form').addClass('hide');
                    $('.js-order-form_error').removeClass('hide');
                }
            }
        });
    });

    $('.js-form-accept').on('change', function () {
        $('.js-button-neu').attr('disabled', ! $(this).is(':checked'));
    });

</script>
@endpush
