<div class="cookies-notification js-cookies-notification">
    <p class="cookie-text">
        Этот сайт использует куки. Cookie - это небольшой текстовый файл, который веб-сайт, который вы посещаете, хранит на вашем компьютере. Файлы cookie используются многими веб-сайтами для предоставления посетителям доступа к различным функциям. Можно использовать информацию в куки, чтобы следить за работой пользователя. Чтобы отключитьо куки, вы можете изменить настройки безопасности в вашем веб-браузере. Настройки зависят от веб-браузера. На этом сайте мы используем куки, чтобы вы как посетитель могли адаптировать внешний вид сайта. Большинство из них - это так называемые «сеансовые куки». Они будут автоматически удалены после посещения сайта. Файлы cookie не наносят вреда вашему компьютеру и не содержат вирусов.    </p>
    <button type="button" class="button-neu js-cookie-ok">Ok</button>
</div>

@push('js')
    <script>
        if (! localStorage.getItem('cookie-notification')) {
            $('.cookies-notification').addClass('cookies-notification-active');
        }

        $('.js-cookie-ok').on('click', function () {
            $('.js-cookies-notification').removeClass('cookies-notification-active');
            localStorage.setItem('cookie-notification', 1);
        });
    </script>
@endpush
