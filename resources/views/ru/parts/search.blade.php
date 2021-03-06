<div class="fixed-backdrop-wrapper js-fixed-backdrop-wrapper-search">
    <button type="button" class="fixed-backdrop-wrapper_close js-close-search"></button>
    <div class="order-form js-order-form">
        <h3 class="order-form_title">
            <span class="equipment-title order-form_title-text">Поиск</span>
            <span class="order-form_title-logo_wrapper">
                    <img src="{{ asset('assets/img/logo_footer.png') }}" alt="{{ config('site.user.app.name') }}">
                </span>
        </h3>
        <form class="order-form_body" action="{{ route('ru.user.search.count') }}" method="get" enctype="multipart/form-data">
            <h4>Наименование:</h4>
            <div class="order-form_input-wrapper">
                <input type="text" name="st_title" class="form-equipment" autofocus>
            </div>
            <h4>Категории:</h4>
            @foreach($categories  as $category)
                <div class="control-group">
                    <label class="control control-checkbox">
                        <input type="checkbox" name="st_categories[]" value="{{ $category['id'] }}"> {{ $category['name_ru'] }}
                        <div class="control_indicator"></div>
                    </label>
                </div>
            @endforeach
            <p class="order-form_wrapper text-center">
                <button type="submit" class="button-neu js-button-neu">Поиск</button>
            </p>
        </form>
    </div>
</div>

@push('js')
    <script>
        $('.js-show-search').on('click', function () {
            $('.js-fixed-backdrop-wrapper-search').addClass('fixed-backdrop-wrapper-active');
        });

        $('.js-close-search').on('click', function () {
            $('.js-fixed-backdrop-wrapper-search').removeClass('fixed-backdrop-wrapper-active');
        });
    </script>
@endpush
