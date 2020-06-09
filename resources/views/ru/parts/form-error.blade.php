@if($message = session('error'))
    <div class="form-error-layout js-form-error-layout">
        <div class="order-form_error js-order-form_error">
            <div class="order-form">
                <h3 class="order-form_title">
                    <span class="equipment-title order-form_title-text">Ошибка!</span>
                </h3>
                <div class="order-form_body text-center">
                    <p> Извините, что-то пошло не так. Попробуйте позже.</p>
                    <p class="text-center">
                        <button type="button" class="button-neu js-form-error_close">Ok</button>
                    </p>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            $('.js-form-error_close').on('click', function () {
                $('.js-form-error-layout').addClass('hide');
            });
        </script>
    @endpush
@endif
