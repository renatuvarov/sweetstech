<div class="fixed-backdrop-wrapper js-fixed-backdrop-wrapper">
    <button type="button" class="fixed-backdrop-wrapper_close js-fixed-backdrop-wrapper_close"></button>
    <div class="order-form js-order-form">
        <h3 class="order-form_title">
            <span class="equipment-title order-form_title-text">{{ $machine->short_name_ru }}</span>
            <span class="order-form_title-logo_wrapper">
                    <img src="{{ asset('assets/img/logo_footer.png') }}" alt="{{ config('site.user.app.name') }}">
                </span>
        </h3>
        <form class="order-form_body" action="{{ route('ru.user.order', ['slug' => $machine->slug]) }}" method="post" enctype="multipart/form-data" id="form">
            @csrf
            <div class="order-form_input-wrapper required">
                <label for="st_nsp">Имя</label>
                <input type="text" name="st_nsp" class="form-equipment" id="st_nsp" autofocus>
                @error('st_nsp')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="order-form_input-wrapper required">
                <label for="st_company">Компания</label>
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
                <label for="st_phone">Телефон</label>
                <input type="text" name="st_phone" class="form-equipment" id="st_phone">
                @error('st_phone')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <input type="hidden" name="st_id" value="{{ $machine->id }}" >
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
    @include('parts.recaptcha')
</div>

@push('js')
    <script>
        $('.js-show-form').on('click', function () {
            $('.js-fixed-backdrop-wrapper').addClass('fixed-backdrop-wrapper-active');
            $('input.form-equipment')[0].focus();
            $('html, body').css({'overflow-y': 'hidden'});
        });

        $('.js-fixed-backdrop-wrapper_close').on('click', function () {
            $('input.form-equipment').val('');
            $('.js-order-form').removeClass('hide');
            $('.js-order-form_success').addClass('hide');
            $('.js-order-form_error').addClass('hide');
            $('.js-fixed-backdrop-wrapper').removeClass('fixed-backdrop-wrapper-active');
            $('html, body').css({'overflow-y': 'auto'});
        });

        $('.js-form-accept').on('change', function () {
            $('.js-button-neu').attr('disabled', ! $(this).is(':checked'));
        });

    </script>
@endpush
