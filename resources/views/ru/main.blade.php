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
                            <h3 class="title-a main-page-title">Оборудование для производства</h3>
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
                </div>
                <div class="news-container">
                @if(! empty($post))
                    <!--<a class="col-md-4"  href="{{ route('ru.user.blog.news.show', ['slug' => $post->slug]) }}">-->
                        <!--    <div class="card card-blog">-->
                        <!--        <div class="card-img">-->
                    <!--            <img src="{{ $post->img }}" alt="{{ $post->title_ru }}" class="img-fluid">-->
                        <!--        </div>-->
                        <!--        <div class="card-body news-main-text">-->
                        <!--            <div class="card-category-box">-->
                        <!--                <div class="card-category">-->
                    <!--                    <h6 class="category">{{ $post->category->name_ru }}</h6>-->
                        <!--                </div>-->
                        <!--            </div>-->
                    <!--            <h3 class="card-title">{{ $post->title_ru }}</h3>-->
                        <!--            <p class="card-description">-->
                    <!--                {{ $post->short_description_ru }}-->
                        <!--            </p>-->
                        <!--        </div>-->
                        <!--        <div class="card-footer">-->
                        <!--            <div class="post-date">-->
                    <!--                <span class="date">{{ $post->created_at->format('Y-m-d') }}</span>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</a>-->
                        <a class="card-news-square" href="{{ route('ru.user.blog.news.show', ['slug' => $post->slug]) }}">
                            <img src="{{ $post->img }}" alt="{{ $post->title_ru }}" class="img-fluid">
                            <div class="card-news-square-2">
                                <h3>{{ $post->title_ru }}</h3>
                                <div class="card-news-square-info">
                                    <div class="card-news-btn-wrapper">
                                        <div class="news-more text-uppercase">Подробнее</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-news-footer">
                                <div class="card-news-category">{{ $post->category->name_ru }}</div>
                                <div class="card-news-date">{{ $post->created_at->format('Y-m-d') }}</div>
                            </div>
                        </a>
                    @endif
                    @if(! empty($exhibitions) && $exhibitions->count() > 0)
                        @foreach($exhibitions as $exhibition)
                            <a class="card-news-square" href="{{ route('ru.user.exhibitions.news.show', ['slug' => $exhibition->slug]) }}">
                                <img src="{{ $exhibition->img }}" alt="{{ $exhibition->title_ru }}" class="img-fluid">
                                <div class="card-news-square-2">
                                    <h3>{{ $exhibition->title_ru }}</h3>
                                    <div class="card-news-square-info">
                                        <div class="card-news-btn-wrapper">
                                            <div class="news-more text-uppercase">Подробнее</div>
                                        </div>
                                    </div>
                                    <div class="card-news-footer">
                                        <div class="card-news-category">{{ $exhibition->category->name_ru }}</div>
                                        <div class="card-news-date">{{ $exhibition->created_at->format('Y-m-d') }}</div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    @endif
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
                                        <li><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<g>
    <g>
        <path d="M256,0C153.755,0,70.573,83.182,70.573,185.426c0,126.888,165.939,313.167,173.004,321.035
			c6.636,7.391,18.222,7.378,24.846,0c7.065-7.868,173.004-194.147,173.004-321.035C441.425,83.182,358.244,0,256,0z M256,278.719
			c-51.442,0-93.292-41.851-93.292-93.293S204.559,92.134,256,92.134s93.291,41.851,93.291,93.293S307.441,278.719,256,278.719z"/>
    </g>
</g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
</svg><span class="contacts">Россия, Ставропольский край, Кочубеевский район, х. Новозеленчукский, ул. Гагарина, 1</span>
                                        </li>
                                        <li><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                 viewBox="0 0 480 480" style="enable-background:new 0 0 480 480;" xml:space="preserve">
<g>
    <g>
        <path d="M256,128c-8.832,0-16,7.168-16,16c0,8.832,7.168,16,16,16c35.296,0,64,28.704,64,64c0,8.832,7.168,16,16,16
			c8.832,0,16-7.168,16-16C352,171.072,308.928,128,256,128z"/>
    </g>
</g>
                                                <g>
                                                    <g>
                                                        <path d="M256,64c-8.832,0-16,7.168-16,16c0,8.832,7.168,16,16,16c70.592,0,128,57.408,128,128c0,8.832,7.168,16,16,16
			c8.832,0,16-7.168,16-16C416,135.776,344.224,64,256,64z"/>
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path d="M256,0c-8.832,0-16,7.168-16,16c0,8.832,7.168,16,16,16c105.888,0,192,86.112,192,192c0,8.832,7.168,16,16,16
			c8.832,0,16-7.168,16-16C480,100.48,379.488,0,256,0z"/>
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path d="M432,352c-46.464,0-90.72-10.112-131.52-30.048c-3.84-1.92-8.256-2.144-12.256-0.736c-4.032,1.408-7.328,4.352-9.184,8.16
			l-25.152,52.064C188.8,345.12,134.912,291.264,98.624,226.176l52.032-25.216c3.84-1.856,6.752-5.152,8.16-9.184
			c1.376-4,1.12-8.416-0.768-12.256C138.112,138.72,128,94.464,128,48c0-8.832-7.168-16-16-16H16C7.168,32,0,39.168,0,48
			c0,238.208,193.792,432,432,432c8.832,0,16-7.168,16-16v-96C448,359.168,440.832,352,432,352z"/>
                                                    </g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
</svg><span class="contacts">+7(86554)9-53-17 доб. 500/504/104/501/506</span>
                                        </li>
                                        <li><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<g>
    <g>
        <g>
            <path d="M10.688,95.156C80.958,154.667,204.26,259.365,240.5,292.01c4.865,4.406,10.083,6.646,15.5,6.646
				c5.406,0,10.615-2.219,15.469-6.604c36.271-32.677,159.573-137.385,229.844-196.896c4.375-3.698,5.042-10.198,1.5-14.719
				C494.625,69.99,482.417,64,469.333,64H42.667c-13.083,0-25.292,5.99-33.479,16.438C5.646,84.958,6.313,91.458,10.688,95.156z"/>
            <path d="M505.813,127.406c-3.781-1.76-8.229-1.146-11.375,1.542c-46.021,39.01-106.656,90.552-152.385,129.885
				c-2.406,2.063-3.76,5.094-3.708,8.271c0.052,3.167,1.521,6.156,4,8.135c42.49,34.031,106.521,80.844,152.76,114.115
				c1.844,1.333,4.031,2.01,6.229,2.01c1.667,0,3.333-0.385,4.865-1.177c3.563-1.823,5.802-5.49,5.802-9.49V137.083
				C512,132.927,509.583,129.146,505.813,127.406z"/>
            <path d="M16.896,389.354c46.25-33.271,110.292-80.083,152.771-114.115c2.479-1.979,3.948-4.969,4-8.135
				c0.052-3.177-1.302-6.208-3.708-8.271C124.229,219.5,63.583,167.958,17.563,128.948c-3.167-2.688-7.625-3.281-11.375-1.542
				C2.417,129.146,0,132.927,0,137.083v243.615c0,4,2.24,7.667,5.802,9.49c1.531,0.792,3.198,1.177,4.865,1.177
				C12.865,391.365,15.052,390.688,16.896,389.354z"/>
            <path d="M498.927,418.375c-44.656-31.948-126.917-91.51-176.021-131.365c-4-3.26-9.792-3.156-13.729,0.24
				c-9.635,8.406-17.698,15.49-23.417,20.635c-17.563,15.854-41.938,15.854-59.542-0.021c-5.698-5.135-13.76-12.24-23.396-20.615
				c-3.906-3.417-9.708-3.521-13.719-0.24c-48.938,39.719-131.292,99.354-176.021,131.365c-2.49,1.792-4.094,4.552-4.406,7.604
				c-0.302,3.052,0.708,6.083,2.802,8.333C19.552,443.01,30.927,448,42.667,448h426.667c11.74,0,23.104-4.99,31.198-13.688
				c2.083-2.24,3.104-5.271,2.802-8.323C503.021,422.938,501.417,420.167,498.927,418.375z"/>
        </g>
    </g>
</g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
</svg><span class="contacts">info@sweetstech.com</span></li>
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

