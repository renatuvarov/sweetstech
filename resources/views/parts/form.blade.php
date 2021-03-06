<div class="fixed-backdrop-wrapper js-fixed-backdrop-wrapper @if($errors->any()) fixed-backdrop-wrapper-active @endif">
    <button type="button" class="fixed-backdrop-wrapper_close js-fixed-backdrop-wrapper_close"></button>
    <div class="order-form js-order-form">
        <h3 class="order-form_title">
            <span class="equipment-title order-form_title-text">{{ $machine->short_name_en }}</span>
            <span class="order-form_title-logo_wrapper">
                    <img src="{{ asset('assets/img/logo_footer.png') }}" alt="{{ config('site.user.app.name') }}">
                </span>
        </h3>
        <form class="order-form_body js-form" action="{{ route('user.order', ['slug' => $machine->slug]) }}" method="post" enctype="multipart/form-data" id="form">
            @csrf
            <div class="order-form_input-wrapper required">
                <label for="st_nsp">Name</label>
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
    @include('parts.recaptcha')
</div>

@push('js')
    <script>
        $('.js-show-form').on('click', function () {
            $('.js-fixed-backdrop-wrapper').addClass('fixed-backdrop-wrapper-active');
            $('input.form-equipment')[0].focus();
            $('html, body').css({'overflow-y': 'hidden'});
        });

        $('.js-form').on('submit', function () {
            $('.js-button-neu').prop('disabled', true);
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
