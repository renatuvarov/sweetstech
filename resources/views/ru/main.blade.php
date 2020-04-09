@extends('layouts.ru-app')

@section('content')
<div class="home-main-page text-center">
    <p><img class="logo" src="{{ asset('assets/img/logo.png') }}" itemprop="logo" width="300px" alt=""></p>
    <h1>Sweets Technologies</h1>
    <hr class="w-25 m-auto mb-3 d-block" style="color: white; background-color:#fff; margin-bottom: 30px !important;">
    <p class="brief">Бренд «Сладкие технологии» (Sweets Technologies) создан более 15 лет назад!
                                Sweets Technologies выпускает кондитерское оборудование,  соответствующее международным стандартам.
                                Мы поможем вашей компании завоевать лидирующие позиции на рынке своей высококачественной продукцией!</p>
</div>
    <div class="container-fluid main-back main-page-equipment">
        <section id="categories" class="blog-mf route">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-box text-center">
                            <h3 class="title-a main-page-title">Оборудование для производства:</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @if(! empty($categories) && $categories->count() > 0)
                        @foreach($categories as $category)
                            <div class="col-md-4 col-6 mb-30">
                                <div class="categories card-blog">
                                    <div class="categories-img">
                                        @if($category->machines->count() > 0)
                                            <a href="{{ route('ru.user.tags.show', ['slug' => $category->slug]) }}">
                                                <img src="{{ $category->img }}" alt="{{ $category->name_ru }}" class="categories-img-wrapper">
                                            </a>
                                        @else
                                            <a>
                                                <img src="{{ $category->img }}" alt="{{ $category->name_ru }}" class="categories-img-wrapper">
                                            </a>
                                        @endif
                                    </div>
                                    <div class="card-body">
                                        <div class="card-category-box">
                                            <div class="card-category">
                                                <h6 class="category">{{ $category->name_ru }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
        <section class="about-mf">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="about" class="box-shadow-full about-us">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="about-me pt-4 pt-md-0">
                                        <h3 class="title-a text-center main-page-title">О компании</h3>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-md-6 align-self-center">
                                    <p class="lead">
                                        Бренд «Сладкие технологии» (Sweets Technologies) был создан более 15 лет назад как цех, с целью предоставления и замещения услуг зарубежных компаний по ремонту кондитерского оборудования на российском и международном рынке. Накапливая опыт и связи, компания увеличилась до размеров промышленного производства. Постепенно компания начала выпуск собственного кондитерского оборудования, соответствующего международным стандартам.
                                    </p>
                                    <p class="lead">
                                        Производство оснащено большим парком металлообрабатывающего оборудования: токарные, фрезерные, металлорежущие и листообрабатывающие станки.
                                    </p>
                                    <p class="lead">
                                        Наличие универсального оборудования позволяет выполнять широкий спектр сложных операций, требующих точности, без привлечения услуг сторонних организаций.
                                    </p>
                                    <p class="lead">
                                        Разработка нового оборудования осуществляется собственным конструкторским бюро, работу которых дополняют собственными разработками специалисты-электронщики.
                                    </p>
                                    <p class="lead">
                                        Сложившийся за многие годы коллектив отличается профессионализмом, ответственностью и постоянным развитием, и улучшением подхода к выпускаемому оборудованию.
                                    </p>
                                    <p class="lead">
                                        Мы поможем вашей компании завоевать лидирующие позиции на рынке своей высококачественной продукцией!
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <img src="{{ asset('assets/img/about.jpg') }}" class="img-fluid" alt="about {{ config('site.user.app.name') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @if(! empty($post) || (! empty($exhibitions) && $exhibitions->count() > 0 ))
        <section id="news" class="blog-mf route">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-box text-center">
                            <h3 class="title-a main-page-title">Новости</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @if(! empty($post))
                        <div class="col-md-4">
                            <div class="card card-blog">
                                <div class="card-img">
                                    <a href="{{ route('ru.user.blog.news.show', ['slug' => $post->slug]) }}">
                                        <img src="{{ $post->img }}" alt="{{ $post->title_ru }}" class="img-fluid">
                                    </a>
                                </div>
                                <div class="card-body news-main-text">
                                    <div class="card-category-box">
                                        <div class="card-category">
                                            <h6 class="category">{{ $post->category->name_ru }}</h6>
                                        </div>
                                    </div>
                                    <h3 class="card-title"><a href="news-single.html">{{ $post->title_ru }}</a></h3>
                                    <p class="card-description">
                                        {{ $post->short_description_ru }}
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <div class="post-date">
                                        <span class="fa fa-calendar"></span>
                                        <span class="date">{{ $post->created_at->format('Y-m-d') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(! empty($exhibitions) && $exhibitions->count() > 0)
                        @foreach($exhibitions as $exhibition)
                            <div class="col-md-4">
                                <div class="card card-blog">
                                    <div class="card-img">
                                        <a href="{{ route('ru.user.exhibitions.news.show', ['slug' => $exhibition->slug]) }}">
                                            <img src="{{ $exhibition->img }}" alt="{{ $exhibition->title_ru }}" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="card-body news-main-text">
                                        <div class="card-category-box">
                                            <div class="card-category">
                                                <h6 class="category">{{ $exhibition->category->name_ru }}</h6>
                                            </div>
                                        </div>
                                        <h3 class="card-title">{{ $exhibition->title_ru }}</h3>
                                        <p class="card-description">
                                            {{ $exhibition->short_description_ru }}
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="post-date">
                                            <span class="fa fa-calendar"></span>
                                            <span class="date">{{ $exhibition->created_at->format('Y-m-d') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
        @endif
        <section id="partners" class="sect-pt4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-box text-center">
                            <h3 class="title-a main-page-title">Наши партнеры</h3>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel owl-theme">
                    <div><img src="{{ asset('assets/img/partners/1.jpg') }}" alt=""></div>
                    <div><img src="{{ asset('assets/img/partners/2.jpg') }}" alt=""></div>
                    <div><img src="{{ asset('assets/img/partners/3.jpg') }}" alt=""></div>
                    <div><img src="{{ asset('assets/img/partners/4.jpg') }}" alt=""></div>
                    <div><img src="{{ asset('assets/img/partners/5.jpg') }}" alt=""></div>
                    <div><img src="{{ asset('assets/img/partners/6.jpg') }}" alt=""></div>
                    <div><img src="{{ asset('assets/img/partners/7.jpg') }}" alt=""></div>
                    <div><img src="{{ asset('assets/img/partners/8.jpg') }}" alt=""></div>
                    <div><img src="{{ asset('assets/img/partners/9.jpg') }}" alt=""></div>
                    <div><img src="{{ asset('assets/img/partners/10.jpg') }}" alt=""></div>
                    <div><img src="{{ asset('assets/img/partners/11.jpg') }}" alt=""></div>
                    <div><img src="{{ asset('assets/img/partners/12.jpg') }}" alt=""></div>
                    <div><img src="{{ asset('assets/img/partners/13.jpg') }}" alt=""></div>
                    <div><img src="{{ asset('assets/img/partners/14.jpg') }}" alt=""></div>
                    <div><img src="{{ asset('assets/img/partners/15.jpg') }}" alt=""></div>
                    <div><img src="{{ asset('assets/img/partners/16.jpg') }}" alt=""></div>
                    <div><img src="{{ asset('assets/img/partners/17.jpg') }}" alt=""></div>
                    <div><img src="{{ asset('assets/img/partners/18.jpg') }}" alt=""></div>
                    <div><img src="{{ asset('assets/img/partners/19.jpg') }}" alt=""></div>
                    <div><img src="{{ asset('assets/img/partners/20.jpg') }}" alt=""></div>
                </div>
            </div>
        </section>
    </div>
    <section class="bg-image sect-mt4">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="contacts" class="box-shadow-full-contacts">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="title-box-2">
                                    <h5 class="title-left">Обратная связь</h5>
                                </div>
                                <div>
                                    <form action="{{ route('ru.user.contact-form') }}" method="post" class="contactForm" id="contact-form">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group required">
                                                    <input type="text" name="st_nsp" class="form-equipment" placeholder="Имя">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-equipment" name="st_company" placeholder="Компания">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group required">
                                                    <input type="email" class="form-equipment" name="st_email" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="phone" class="form-equipment" name="st_phone" placeholder="Телефон">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group required">
                                                <textarea class="form-equipment" name="st_message" rows="5" placeholder="Сообщение"></textarea>
                                                </div>
                                            </div>
                                            <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
                                            <p class="text-center"><span class="required"> - обязательные поля</span></p>
                                            <p class="order-form_wrapper text-center">
                                                <label style="cursor:pointer;"><input type="checkbox" class="js-form-accept" checked> Согласен на обработку персональных данных</label>
                                                <button type="submit" class="button-neu js-button-neu">Отправить</button>
                                                <br>
                                                <span style="font-size: 8px; opacity: 0.5; margin: 3px auto; color: #cbcbcb;">
                    Этот сайт использует reCAPTCHA от Google <a href="https://policies.google.com/privacy">Политика безопасности</a> и <a href="https://policies.google.com/terms">Условия использования</a>
                </span>
                                            </p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="title-box-2 pt-4 pt-md-0">
                                    <h5 class="title-left">
                                        Контакты
                                    </h5>
                                </div>
                                <div class="more-info">
                                    <ul class="list-ico">
                                        <li><span class="fa fa-map-marker"></span><span class="contacts">Россия, Ставропольский край, Кочубеевский район, х. Новозеленчукский, ул. Гагарина, 1</span>
                                        </li>
                                        <li><span class="fa fa-phone"></span><span class="contacts">+7(86554)9-53-17 доб. 500/504/104/501/506</span>
                                        </li>
                                        <li><span class="fa fa-envelope"></span><span
                                                class="contacts">info@sweetstech.com</span></li>
                                    </ul>
                                </div>
                                <div class="map-wrapper">
                                    <iframe class="map-wrapper-iframe"
                                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5819944.899191486!2d41.9003569!3d44.5812749!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcceb78920dd5d98!2s%22Sweets%20technologies%22%20Ltd.!5e0!3m2!1sru!2sru!4v1581571868237!5m2!1sru!2sru"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="order-form_success js-order-form_success hide main-page-form-message">
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
    <div class="order-form_error js-order-form_error hide main-page-form-message">
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
    @include('parts.recaptcha')
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
@endpush

@push('js')
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script>
        $('.js-fixed-backdrop-wrapper_close').on('click', function () {
            $('#contact-form input.form-equipment').val('');
            $('.js-order-form_success').addClass('hide');
            $('.js-order-form_error').addClass('hide');
            $('html, body').css({'overflow-y': 'auto'});
        });

        $('#contact-form').on('submit', function (e) {
            e.preventDefault();

            $(this).find('.invalid-feedback').remove();

            if (! $('.js-form-accept').is(':checked')) {
                return;
            }

            var $form = $(this);
            var $btn = $('#contact-form .js-button-neu');
            $btn.attr('disabled', true);

            $.ajax({
                type: $form.attr('method'),
                url: $form.attr('action'),
                data: $form.serialize(),
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                success: function(response) {
                    $('#contact-form .js-button-neu').removeAttr('disabled');
                    $('#contact-form input.form-equipment').val('');
                    $('.js-order-form_success').removeClass('hide');
                },
                error: function(response, textStatus, xhr) {
                    $btn.attr('disabled', false);
                    if (xhr === 'Unprocessable Entity') {
                        var errors = response.responseJSON;
                        $.each(errors, function (key, value) {
                            var errorMessage = $('<p>', {
                                class: 'invalid-feedback',
                                text: value[0],
                            });

                            if (key === 'st_message') {
                                errorMessage.insertAfter('textarea[name="' + key + '"]');
                                return;
                            }
                            errorMessage.insertAfter('input[name="' + key + '"]');
                        });
                    } else {
                        $('.js-order-form_error').removeClass('hide');
                    }
                }
            });
        });

        $('.js-form-accept').on('change', function () {
            $('#contact-form .js-button-neu').attr('disabled', ! $(this).is(':checked'));
        });
    </script>
@endpush

