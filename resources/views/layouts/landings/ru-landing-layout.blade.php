<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $machine->name_ru . ' | '. config('site.user.app.name')}}</title>
    <meta name="description" content="{{ $machine->meta_description_ru }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/landings.css') }}">
    @stack('css')
{{--    <script>--}}
{{--        !function(f,b,e,v,n,t,s)--}}
{{--        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?--}}
{{--            n.callMethod.apply(n,arguments):n.queue.push(arguments)};--}}
{{--            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';--}}
{{--            n.queue=[];t=b.createElement(e);t.async=!0;--}}
{{--            t.src=v;s=b.getElementsByTagName(e)[0];--}}
{{--            s.parentNode.insertBefore(t,s)}(window, document,'script',--}}
{{--            'https://connect.facebook.net/en_US/fbevents.js');--}}
{{--        fbq('init', '230235861555723');--}}
{{--        fbq('track', 'PageView');--}}
{{--    </script>--}}
</head>
<body>
<header class="header js-header">
    <div class="header-wrapper js-header-wrapper">
        <div class="logo">
            <a href="/" class="logo-link">
                <img src="{{ asset('assets/img/logo.png') }}" alt="sweets technologies logo" class="logo-img">
            </a>
        </div>
        <nav class="main_nav js-main_nav">
            <ul class="main_nav-list js-main_nav-list">
                <li class="main_nav-item">
                    <a data-section="specifications" class="main_nav-link js-main_nav-link">
                        <span class="main_nav-icon">
                            <svg height="512pt" viewBox="0 0 512 512" width="512pt" xmlns="http://www.w3.org/2000/svg"><path
                                    d="m512 452.015625c0-.003906 0-.011719 0-.015625 0-.007812 0-.015625 0-.019531v-350.945313c0-33.082031-26.914062-60-60-60h-362.183594c-2.015625-22.960937-21.339844-41.035156-44.816406-41.035156-24.8125 0-45 20.1875-45 45v317c0 33.085938 26.914062 60 60 60h362.023438v72.433594c0 6.363281 4.007812 12.03125 10.007812 14.144531 6.464844 2.285156 13.195312 3.40625 19.894531 3.40625 12.28125 0 24.464844-3.765625 34.753907-11.046875 15.769531-11.15625 24.925781-28.519531 25.285156-47.769531.011718-.222657.035156-.441407.035156-.667969zm-467-422.015625c8.269531 0 15 6.730469 15 15v257c-10.925781 0-21.167969 2.949219-30 8.070312v-265.070312c0-8.269531 6.730469-15 15-15zm-15 332c0-16.542969 13.457031-30 30-30 3.410156 0 6.769531.574219 9.984375 1.710938 7.8125 2.753906 16.378906-1.34375 19.136719-9.152344.570312-1.613282.832031-3.257813.84375-4.875.011718-.230469.035156-.457032.035156-.6875v-247.960938h362c16.542969 0 30 13.457032 30 30v299.035156c-8.234375-4.773437-17.695312-7.648437-27.792969-8.015624-.359375-.027344-.722656-.054688-1.089843-.054688h-393.117188c-16.542969 0-30-13.457031-30-30zm439.351562 114.449219c-5.210937 3.6875-11.207031 5.578125-17.296874 5.578125-.011719 0-.019532 0-.03125 0v-60.027344h.035156c16.507812.035156 29.929687 13.46875 29.941406 29.980469v.035156c-.007812 9.84375-4.613281 18.75-12.648438 24.433594zm0 0"/><path
                                    d="m391.4375 203.507812-27.164062-10.5625 11.738281-26.675781c2.488281-5.660156 1.25-12.273437-3.125-16.644531l-20.519531-20.519531c-4.375-4.375-10.984376-5.613281-16.644532-3.121094l-26.675781 11.738281-10.5625-27.160156c-2.242187-5.765625-7.792969-9.566406-13.980469-9.566406h-29.015625c-6.183593 0-11.738281 3.800781-13.980469 9.566406l-10.5625 27.160156-26.675781-11.734375c-5.660156-2.492187-12.273437-1.25-16.644531 3.121094l-20.515625 20.519531c-4.375 4.371094-5.617187 10.984375-3.125 16.644532l11.738281 26.675781-27.160156 10.5625c-5.765625 2.246093-9.5625 7.796875-9.5625 13.980469v29.015624c0 6.1875 3.796875 11.738282 9.5625 13.980469l27.164062 10.5625-11.738281 26.675781c-2.488281 5.660157-1.25 12.273438 3.125 16.644532l20.515625 20.519531c4.375 4.375 10.984375 5.617187 16.648438 3.121094l26.675781-11.734375 10.5625 27.160156c2.242187 5.761719 7.792969 9.5625 13.980469 9.5625h29.015625c6.183593 0 11.734375-3.800781 13.976562-9.5625l10.566407-27.164062 26.671874 11.734374c5.664063 2.492188 12.273438 1.253907 16.648438-3.121093l20.515625-20.515625c4.375-4.375 5.617187-10.988282 3.125-16.648438l-11.738281-26.675781 27.160156-10.5625c5.765625-2.242187 9.566406-7.792969 9.566406-13.980469v-29.015625c-.003906-6.183593-3.800781-11.738281-9.566406-13.980469zm-20.4375 32.734376-26.550781 10.328124c-4.085938 1.589844-7.269531 4.882813-8.71875 9.019532-.761719 2.167968-1.640625 4.324218-2.617188 6.414062-1.828125 3.917969-1.878906 8.433594-.140625 12.390625l11.449219 26.019531-6.003906 6.003907-25.695313-11.304688c-4.011718-1.765625-8.597656-1.6875-12.550781.214844-2.175781 1.050781-4.46875 2.007813-6.808594 2.839844-4.105469 1.460937-7.371093 4.632812-8.949219 8.691406l-10.164062 26.136719h-8.492188l-10.167968-26.136719c-1.578125-4.058594-4.84375-7.230469-8.949219-8.691406-2.335937-.832031-4.628906-1.789063-6.8125-2.839844-3.949219-1.902344-8.535156-1.980469-12.546875-.214844l-25.695312 11.308594-6.003907-6.007813 11.445313-26.015624c1.742187-3.960938 1.691406-8.476563-.140625-12.394532-.972657-2.082031-1.855469-4.242187-2.617188-6.414062-1.449219-4.136719-4.636719-7.429688-8.71875-9.015625l-26.550781-10.324219v-8.492188l27.007812-10.507812c4.003907-1.554688 7.148438-4.757812 8.636719-8.789062.71875-1.949219 1.542969-3.898438 2.445313-5.796876 1.875-3.9375 1.945312-8.496093.1875-12.492187l-11.699219-26.585937 6.007813-6.003907 26.910156 11.839844c3.9375 1.730469 8.429687 1.6875 12.332031-.113281 1.785156-.828125 3.605469-1.578125 5.40625-2.230469 4.0625-1.476563 7.289063-4.632813 8.855469-8.664063l10.664062-27.414062h8.492188l10.664062 27.414062c1.566406 4.03125 4.792969 7.1875 8.855469 8.664063 1.800781.652344 3.617187 1.402344 5.402344 2.226563 3.902343 1.804687 8.394531 1.847656 12.335937.113281l26.910156-11.839844 6.003907 6.003906-11.695313 26.589844c-1.757812 3.992187-1.6875 8.550781.1875 12.488281.902344 1.894532 1.726563 3.847656 2.445313 5.800782 1.488281 4.027343 4.632812 7.226562 8.636719 8.785156l27.007812 10.503906zm0 0"/><path
                                    d="m270 184.117188c-26.707031 0-48.433594 21.726562-48.433594 48.433593s21.726563 48.4375 48.433594 48.4375 48.4375-21.730469 48.4375-48.4375-21.730469-48.433593-48.4375-48.433593zm0 66.871093c-10.164062 0-18.433594-8.269531-18.433594-18.4375 0-10.164062 8.269532-18.433593 18.433594-18.433593s18.4375 8.269531 18.4375 18.433593c0 10.167969-8.273438 18.4375-18.4375 18.4375zm0 0"/></svg>
                        </span>
                        <span class="main_nav-txt">Характеристики</span>
                    </a>
                </li>
                <li class="main_nav-item">
                    <a data-section="products" class="main_nav-link js-main_nav-link">
                        <span class="main_nav-icon">
                            <svg height="661pt" viewBox="-20 -40 661.33331 661" width="661pt"
                                 xmlns="http://www.w3.org/2000/svg"><path
                                    d="m10 248.832031h55.476562c3.28125 11.832031 8.007813 23.214844 14.085938 33.882813l-39.265625 39.25c-1.875 1.875-2.929687 4.417968-2.929687 7.074218s1.054687 5.199219 2.929687 7.074219l42.421875 42.433594c3.90625 3.898437 10.234375 3.898437 14.140625 0l39.269531-39.273437c10.667969 6.074218 22.039063 10.804687 33.871094 14.082031v55.476562c0 5.523438 4.476562 10 10 10h60c5.523438 0 10-4.476562 10-10v-55.476562c11.832031-3.277344 23.203125-8.007813 33.871094-14.082031l39.269531 39.273437c3.96875 3.75 10.175781 3.75 14.140625 0l42.429688-42.433594c1.875-1.875 2.929687-4.417969 2.929687-7.074219s-1.054687-5.199218-2.929687-7.074218l-39.273438-39.25c6.078125-10.667969 10.804688-22.050782 14.085938-33.882813h55.476562c5.523438 0 10-4.476562 10-10v-60c0-5.519531-4.476562-10-10-10h-55.476562c-3.28125-11.828125-8.007813-23.210937-14.085938-33.878906l39.265625-39.25c1.875-1.875 2.929687-4.417969 2.929687-7.074219s-1.054687-5.199218-2.929687-7.074218l-42.421875-42.433594c-3.90625-3.902344-10.234375-3.902344-14.140625 0l-39.269531 39.273437c-10.667969-6.070312-22.042969-10.800781-33.871094-14.082031v-55.480469c0-5.519531-4.476562-10-10-10h-60c-5.523438 0-10 4.480469-10 10v55.480469c-11.828125 3.28125-23.203125 8.011719-33.871094 14.082031l-39.269531-39.273437c-3.96875-3.75-10.175781-3.75-14.140625 0l-42.429688 42.433594c-1.875 1.875-2.929687 4.417968-2.929687 7.074218s1.054687 5.199219 2.929687 7.074219l39.273438 39.25c-6.078125 10.667969-10.804688 22.050781-14.085938 33.878906h-55.476562c-5.523438 0-10 4.480469-10 10v60c0 5.523438 4.476562 10 10 10zm10-60h53.300781c4.699219 0 8.765625-3.269531 9.769531-7.859375 3.28125-14.976562 9.214844-29.25 17.519532-42.140625 2.535156-3.953125 1.972656-9.144531-1.351563-12.46875l-37.738281-37.738281 28.289062-28.292969 37.730469 37.738281c3.324219 3.332032 8.519531 3.894532 12.480469 1.355469 12.894531-8.300781 27.164062-14.234375 42.140625-17.519531 4.585937-1.007812 7.859375-5.074219 7.859375-9.773438v-53.300781h40v53.300781c0 4.699219 3.273438 8.765626 7.859375 9.773438 14.976563 3.285156 29.246094 9.21875 42.140625 17.519531 3.960938 2.539063 9.15625 1.976563 12.480469-1.355469l37.730469-37.738281 28.28125 28.292969-37.730469 37.726562c-3.332031 3.328126-3.890625 8.523438-1.351563 12.480469 8.304688 12.898438 14.230469 27.167969 17.507813 42.148438 1.007812 4.589843 5.074219 7.863281 9.769531 7.863281h53.3125v40h-53.3125c-4.695312 0-8.761719 3.269531-9.769531 7.859375-3.277344 14.976563-9.207031 29.246094-17.507813 42.128906-2.535156 3.957031-1.972656 9.148438 1.351563 12.472657l37.738281 37.730468-28.289062 28.300782-37.730469-37.742188c-3.324219-3.328125-8.519531-3.890625-12.480469-1.351562-12.886719 8.304687-27.152344 14.238281-42.128906 17.519531-4.59375 1-7.871094 5.070312-7.871094 9.769531v53.300781h-40v-53.300781c0-4.699219-3.277344-8.769531-7.871094-9.769531-14.976562-3.28125-29.242187-9.214844-42.128906-17.519531-3.960938-2.539063-9.15625-1.976563-12.480469 1.351562l-37.730469 37.742188-28.28125-28.292969 37.730469-37.730469c3.332031-3.324219 3.890625-8.519531 1.351563-12.480469-8.304688-12.894531-14.238282-27.167969-17.519532-42.148437-1.007812-4.589844-5.070312-7.851563-9.769531-7.851563h-53.300781zm0 0"/><path
                                    d="m210 288.832031c44.183594 0 80-35.8125 80-80 0-44.183593-35.816406-80-80-80s-80 35.816407-80 80c.046875 44.160157 35.839844 79.953125 80 80zm0-140c33.132812 0 60 26.867188 60 60 0 33.136719-26.867188 60-60 60s-60-26.863281-60-60c.035156-33.125 26.875-59.964843 60-60zm0 0"/><path
                                    d="m210 318.832031c60.75 0 110-49.246093 110-110 0-60.75-49.25-110-110-110s-110 49.25-110 110c.074219 60.722657 49.277344 109.929688 110 110zm0-200c49.707031 0 90 40.292969 90 90s-40.292969 90-90 90-90-40.292969-90-90c.054688-49.679687 40.316406-89.945312 90-90zm0 0"/><path
                                    d="m570 458.832031v-80c0-5.519531-4.476562-10-10-10h-20v-80c0-5.519531-4.476562-10-10-10h-90c-5.523438 0-10 4.480469-10 10v80h-50c-5.523438 0-10 4.480469-10 10v80h-320c-27.601562.035157-49.9648438 22.398438-50 50v20c.0351562 27.605469 22.398438 49.96875 50 50h520c27.601562-.03125 49.964844-22.394531 50-50v-20c-.035156-27.601562-22.398438-49.964843-50-50zm-20 0h-70v-70h70zm-100-160h70v70h-70zm-60 90h70v70h-70zm210 140c0 16.570313-13.433594 30-30 30h-520c-16.566406 0-30-13.429687-30-30v-20c0-16.566406 13.433594-30 30-30h520c16.566406 0 30 13.433594 30 30zm0 0"/><path
                                    d="m310 488.832031c-16.566406 0-30 13.433594-30 30 0 16.570313 13.433594 30 30 30s30-13.429687 30-30c0-16.566406-13.433594-30-30-30zm0 40c-5.523438 0-10-4.476562-10-10 0-5.519531 4.476562-10 10-10s10 4.480469 10 10c0 5.523438-4.476562 10-10 10zm0 0"/><path
                                    d="m210 488.832031c-16.566406 0-30 13.433594-30 30 0 16.570313 13.433594 30 30 30s30-13.429687 30-30c0-16.566406-13.433594-30-30-30zm0 40c-5.523438 0-10-4.476562-10-10 0-5.519531 4.476562-10 10-10s10 4.480469 10 10c0 5.523438-4.476562 10-10 10zm0 0"/><path
                                    d="m410 488.832031c-16.566406 0-30 13.433594-30 30 0 16.570313 13.433594 30 30 30s30-13.429687 30-30c0-16.566406-13.433594-30-30-30zm0 40c-5.523438 0-10-4.476562-10-10 0-5.519531 4.476562-10 10-10s10 4.480469 10 10c0 5.523438-4.476562 10-10 10zm0 0"/><path
                                    d="m110 488.832031c-16.566406 0-30 13.433594-30 30 0 16.570313 13.433594 30 30 30s30-13.429687 30-30c0-16.566406-13.433594-30-30-30zm0 40c-5.523438 0-10-4.476562-10-10 0-5.519531 4.476562-10 10-10s10 4.480469 10 10c0 5.523438-4.476562 10-10 10zm0 0"/><path
                                    d="m510 488.832031c-16.566406 0-30 13.433594-30 30 0 16.570313 13.433594 30 30 30s30-13.429687 30-30c0-16.566406-13.433594-30-30-30zm0 40c-5.523438 0-10-4.476562-10-10 0-5.519531 4.476562-10 10-10s10 4.480469 10 10c0 5.523438-4.476562 10-10 10zm0 0"/></svg>
                        </span>
                        <span class="main_nav-txt">Продукты</span>
                    </a>
                </li>
                <li class="main_nav-item">
                    <a data-section="line" class="main_nav-link js-main_nav-link">
                        <span class="main_nav-icon">
                            <svg height="512pt" viewBox="0 0 511 512" width="512pt" xmlns="http://www.w3.org/2000/svg"><path
                                    d="m512.441406 382.957031c0-41.351562-33.640625-74.992187-74.992187-74.992187h-16v-44.996094c0-8.28125-6.714844-14.996094-14.996094-14.996094h-59.992187c-8.285157 0-15 6.714844-15 14.996094v44.996094h-29.996094v-44.996094c0-8.28125-6.714844-14.996094-15-14.996094h-59.992188c-8.28125 0-14.996094 6.714844-14.996094 14.996094v44.996094h-29.996093v-44.996094c0-8.28125-6.71875-14.996094-15-14.996094h-59.992188c-8.285156 0-15 6.714844-15 14.996094v44.996094h-15.996093c-41.351563 0-74.992188 33.640625-74.992188 74.992187 0 35.5 24.808594 65.296875 57.992188 73.023438v41.019531c0 8.285156 6.714843 15 15 15 8.28125 0 14.996093-6.714844 14.996093-15v-38.054688h29.996094v37.972657c0 8.28125 6.71875 14.996093 15 14.996093s15-6.714843 15-14.996093v-38.972657h215.972656v38.964844c0 8.285156 6.714844 15 15 15 8.28125 0 14.996094-6.714844 14.996094-15v-37.964844h29.996094v37.964844c0 8.285156 6.714843 15 15 15 8.28125 0 14.996093-6.714844 14.996093-15v-40.929687c33.1875-7.722657 57.996094-37.523438 57.996094-73.023438zm-150.984375-104.988281h29.996094v29.996094h-29.996094zm-119.984375 0h29.996094v29.996094h-29.996094zm-119.988281 0h29.996094v29.996094h-29.996094zm315.964844 149.980469h-361.957031c-24.8125 0-44.996094-20.183594-44.996094-44.992188 0-24.8125 20.183594-44.996093 44.996094-44.996093h361.957031c24.808593 0 44.996093 20.183593 44.996093 44.996093 0 24.808594-20.1875 44.992188-44.996093 44.992188zm0 0"/><path
                                    d="m81.492188 367.957031c-8.261719 0-15 6.738281-15 15 0 8.257813 6.738281 14.996094 15 14.996094 8.261718 0 14.996093-6.738281 14.996093-14.996094 0-8.261719-6.738281-15-14.996093-15zm0 0"/><path
                                    d="m141.484375 367.957031c-8.261719 0-15 6.738281-15 15 0 8.257813 6.738281 14.996094 15 14.996094s15-6.738281 15-14.996094c-.003906-8.261719-6.738281-15-15-15zm0 0"/><path
                                    d="m201.476562 367.957031c-8.261718 0-15 6.738281-15 15 0 8.257813 6.738282 14.996094 15 14.996094 8.261719 0 15-6.738281 15-14.996094 0-8.261719-6.738281-15-15-15zm0 0"/><path
                                    d="m261.46875 367.957031c-8.257812 0-14.996094 6.738281-14.996094 15 0 8.257813 6.738282 14.996094 14.996094 14.996094 8.261719 0 15-6.738281 15-14.996094 0-8.261719-6.738281-15-15-15zm0 0"/><path
                                    d="m321.460938 367.957031c-8.257813 0-14.996094 6.738281-14.996094 15 0 8.257813 6.738281 14.996094 14.996094 14.996094 8.261718 0 15-6.738281 15-14.996094 0-8.261719-6.738282-15-15-15zm0 0"/><path
                                    d="m381.457031 367.957031c-8.261719 0-15 6.738281-15 15 0 8.257813 6.738281 14.996094 15 14.996094 8.257813 0 14.996094-6.738281 14.996094-14.996094 0-8.261719-6.738281-15-14.996094-15zm0 0"/><path
                                    d="m441.449219 367.957031c-8.261719 0-15 6.738281-15 15 0 8.257813 6.738281 14.996094 15 14.996094 8.257812 0 14.996093-6.738281 14.996093-14.996094 0-8.261719-6.738281-15-14.996093-15zm0 0"/><path
                                    d="m44.996094 59.992188h196.476562v57.992187h-20c-3.976562 0-7.789062 1.582031-10.605468 4.394531l-22.996094 23c-2.8125 2.8125-4.390625 6.625-4.390625 10.601563v51.996093c0 8.28125 6.714843 14.996094 14.996093 14.996094 8.285157 0 15-6.714844 15-14.996094v-45.78125l14.210938-14.210937h57.566406l14.210938 14.210937v45.78125c0 8.28125 6.714844 14.996094 15 14.996094 8.28125 0 14.996094-6.714844 14.996094-14.996094v-51.996093c0-3.976563-1.582032-7.792969-4.394532-10.601563l-22.996094-23c-2.8125-2.8125-6.625-4.394531-10.605468-4.394531h-19.996094v-57.992187h196.472656c8.285156 0 15-6.714844 15-15v-29.992188c0-8.285156-6.714844-15-15-15-8.28125 0-14.996094 6.714844-14.996094 15v14.996094h-392.949218v-14.996094c0-8.285156-6.714844-15-15-15-8.28125 0-14.996094 6.714844-14.996094 15v29.992188c0 8.285156 6.714844 15 14.996094 15zm0 0"/></svg>
                        </span>
                        <span class="main_nav-txt">Линия</span>
                    </a>
                </li>
                <li class="main_nav-item">
                    <a data-section="contacts" class="main_nav-link js-main_nav-link">
                        <span class="main_nav-icon">
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<g>
  <g>
    <path d="M482,233.808V225C482,99.803,378.544,0,255,0C130.643,0,30,100.632,30,225v8.808C10.78,251.61,0,276.097,0,302
      c0,49.626,40.374,90,90,90c14.061,0,5.523,0,45,0c24.813,0,45-20.187,45-45v-92c0-24.813-20.187-45-45-45h-14.162
      C128.324,142.595,185.631,90,255,90c70.396,0,128.553,52.595,136.15,120H377c-24.813,0-45,20.187-45,45v92
      c0,24.813,20.187,45,45,45h15v15c0,24.813-20.187,45-45,45h-17.58c-6.192-17.458-22.865-30-42.42-30h-32
      c-24.813,0-45,20.187-45,45s20.187,45,45,45h32c19.555,0,36.228-12.542,42.42-30H347c41.355,0,75-33.645,75-75v-15
      c49.626,0,90-40.374,90-90C512,276.139,501.25,251.638,482,233.808z M287,482h-32c-8.271,0-15-6.729-15-15s6.729-15,15-15h32
      c8.271,0,15,6.729,15,15S295.271,482,287,482z M90,362c-33.084,0-60-26.916-60-60c0-33.607,27.477-62,60-62V362z M135,240
      c8.271,0,15,6.729,15,15v92c0,8.271-6.729,15-15,15h-15V240H135z M392,362h-15c-8.271,0-15-6.729-15-15v-92
      c0-8.271,6.729-15,15-15h15V362z M421.303,210C413.634,126.44,341.763,60,255,60c-85.925,0-156.707,66.022-164.311,150H90
      c-10.276,0-20.302,1.796-29.755,5.236C65.349,112.231,150.751,30,255,30c105.318,0,191.595,82.23,196.753,185.235
      C442.3,211.796,432.275,210,422,210H421.303z M422,362V240c32.523,0,60,28.393,60,62C482,335.084,455.084,362,422,362z"/>
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
</svg>
                        </span>
                        <span class="main_nav-txt">Контакты</span>
                    </a>
                </li>
            </ul>
        </nav>
        <button class="main_nav-show js-main_nav-show" type="button">
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                 x="0px" y="0px"
                 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<g>
    <g>
        <path d="M467,61H165c-24.813,0-45,20.187-45,45s20.187,45,45,45h302c24.813,0,45-20.187,45-45S491.813,61,467,61z M467,121H165
      c-8.271,0-15-6.729-15-15s6.729-15,15-15h302c8.271,0,15,6.729,15,15S475.271,121,467,121z"/>
    </g>
</g>
                <g>
                    <g>
                        <path d="M467,211H165c-24.813,0-45,20.187-45,45s20.187,45,45,45h302c24.813,0,45-20.187,45-45S491.813,211,467,211z M467,271H165
      c-8.271,0-15-6.729-15-15s6.729-15,15-15h302c8.271,0,15,6.729,15,15S475.271,271,467,271z"/>
                    </g>
                </g>
                <g>
                    <g>
                        <path d="M467,361H165c-24.813,0-45,20.187-45,45s20.187,45,45,45h302c24.813,0,45-20.187,45-45S491.813,361,467,361z M467,421H165
      c-8.271,0-15-6.729-15-15s6.729-15,15-15h302c8.271,0,15,6.729,15,15S475.271,421,467,421z"/>
                    </g>
                </g>
                <g>
                    <g>
                        <path d="M45,61C20.187,61,0,81.187,0,106s20.187,45,45,45s45-20.187,45-45S69.813,61,45,61z M45,121c-8.271,0-15-6.729-15-15
      s6.729-15,15-15s15,6.729,15,15S53.271,121,45,121z"/>
                    </g>
                </g>
                <g>
                    <g>
                        <path d="M45,211c-24.813,0-45,20.187-45,45s20.187,45,45,45s45-20.187,45-45S69.813,211,45,211z M45,271c-8.271,0-15-6.729-15-15
      s6.729-15,15-15s15,6.729,15,15S53.271,271,45,271z"/>
                    </g>
                </g>
                <g>
                    <g>
                        <path d="M45,361c-24.813,0-45,20.187-45,45s20.187,45,45,45s45-20.187,45-45S69.813,361,45,361z M45,421c-8.271,0-15-6.729-15-15
      s6.729-15,15-15s15,6.729,15,15S53.271,421,45,421z"/>
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
</svg>
        </button>
    </div>
</header>
<main class="main">
    @yield('landing-content')
    <section class="contacts js-contacts" id="contacts">
        <div class="contacts-bg js-contacts-bg">
            <img src="{{ asset('assets/img/background.jpg') }}" alt="" class="contact-bg-img">
        </div>
        <div class="contacts-content">
            <h2 class="section-title">Контакты</h2>
            <div class="contacts-wrapper">
                <ul class="contacts-list">
                    <li class="contacts-item">
                        <h6>
                            <svg height="16pt" viewBox="0 -1 512 512" width="16pt" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink">
                                <linearGradient id="a" gradientUnits="userSpaceOnUse" x1="256.0002597504"
                                                x2="256.0002597504"
                                                y1=".0001997504" y2="510.7493837504">
                                    <stop offset="0" stop-color="#2af598"/>
                                    <stop offset="1" stop-color="#009efd"/>
                                </linearGradient>
                                <path d="m204.5 458.605469v51.855469l-12.539062-10.128907c-1.9375-1.566406-48.035157-38.992187-94.78125-92.660156-64.484376-74.035156-97.179688-140.492187-97.179688-197.519531v-5.652344c0-112.761719 91.738281-204.5 204.5-204.5s204.5 91.738281 204.5 204.5v5.652344c0 4.789062-.253906 9.652344-.714844 14.574218l-39.992187-36.484374c-8.191407-83.15625-78.519531-148.339844-163.792969-148.339844-90.757812 0-164.597656 73.839844-164.597656 164.597656v5.652344c0 96.367187 124.164062 213.027344 164.597656 248.453125zm122.699219-28.660157h59.851562v-59.851562h-59.851562zm-122.699219-310.238281c46.753906 0 84.792969 38.039063 84.792969 84.792969s-38.039063 84.792969-84.792969 84.792969-84.792969-38.039063-84.792969-84.792969 38.039063-84.792969 84.792969-84.792969zm0 39.902344c-24.753906 0-44.890625 20.136719-44.890625 44.890625 0 24.75 20.136719 44.890625 44.890625 44.890625 24.75 0 44.890625-20.140625 44.890625-44.890625 0-24.753906-20.140625-44.890625-44.890625-44.890625zm280.609375 243.222656-11.21875-10.234375v64.058594c0 29.828125-24.269531 54.09375-54.097656 54.09375h-126.332031c-29.828126 0-54.097657-24.265625-54.097657-54.09375v-64.058594l-11.21875 10.234375-26.890625-29.476562 155.371094-141.746094 155.375 141.746094zm-51.121094-46.636719-77.363281-70.574218-77.359375 70.574218v100.457032c0 7.828125 6.367187 14.195312 14.195313 14.195312h126.332031c7.828125 0 14.195312-6.367187 14.195312-14.195312zm0 0"
                                      fill="url(#a)"/>
                            </svg>
                            <span>Россия, Ставропольский край, Кочебеевский райнон,
<br>х. Новозеленчукский, ул. Гагарина, 1</span>
                        </h6>
                    </li>
                    <li class="contacts-item">
                        <svg height="16pt" width="16pt" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="256.2437" y1="513.822" x2="256.2437" y2="1.547"
                gradientTransform="matrix(0.9992 0 0 -0.9992 -0.0391 513.4789)">
    <stop offset="0" style="stop-color:#2AF598"/>
    <stop offset="1" style="stop-color:#009EFD"/>
</linearGradient>
                            <path style="fill:url(#SVGID_1_);" d="M385.22,511.933c-12.434,0-24.949-2.751-36.609-8.414
  c-49.209-23.902-123.478-68.002-197.837-142.36C76.414,286.798,32.314,212.53,8.414,163.321
  c-15.662-32.248-9.054-71.047,16.445-96.546L92.011,0.067l136.304,137.121l-53.979,54.676c9.194,16.219,29.054,47.218,62.524,80.688
  c33.464,33.465,64.239,53.102,80.305,62.151l55.77-54.001L512,419.999l-66.843,67.074
  C428.878,503.353,407.176,511.933,385.22,511.933z M431.028,472.942h0.01H431.028z M91.833,56.581L53.074,95.083
  c-13.415,13.415-16.933,33.84-8.708,50.775c22.561,46.451,64.238,116.606,134.671,187.039
  c70.43,70.431,140.586,112.108,187.039,134.67c16.926,8.221,37.341,4.709,50.805-8.739l38.669-38.804l-83.09-83.227l-47.467,45.962
  l-12.295-5.404c-2.008-0.882-49.799-22.238-104.101-76.54c-54.267-54.266-76.075-102.463-76.978-104.489l-5.55-12.462l45.984-46.579
  L91.833,56.581z"/>
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
</svg>
                        <span>Тел. +7 (86554) 9-53-17 EXT. 500/504/104/501/506</span>
                    </li>
                    <li class="contacts-item">
                        <svg width="16pt" height="16pt" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="256" y1="446" x2="256" y2="70"
                gradientTransform="matrix(1 0 0 -1 0 514)">
    <stop offset="0" style="stop-color:#2AF598"/>
    <stop offset="1" style="stop-color:#009EFD"/>
</linearGradient>
                            <path style="fill:url(#SVGID_1_);" d="M452,68H60C26.916,68,0,94.916,0,128v256c0,33.084,26.916,60,60,60h392
	c33.084,0,60-26.916,60-60V128C512,94.916,485.084,68,452,68z M448.354,108L256,251.074L63.646,108H448.354z M452,404H60
	c-11.028,0-20-8.972-20-20V140.263l216,160.663l216-160.663V384C472,395.028,463.028,404,452,404z"/>
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
</svg>
                        <span><a href="mailto:info@sweetstech.com">info@sweetstech.com</a></span>
                    </li>
                </ul>
                <div class="map-wrapper">
                    <iframe class="map-wrapper-iframe"
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5819944.899191486!2d41.9003569!3d44.5812749!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcceb78920dd5d98!2s%22Sweets%20technologies%22%20Ltd.!5e0!3m2!1sru!2sru!4v1581571868237!5m2!1sru!2sru"
                            width="100%" height="320" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </section>
</main>

<div class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 logo">
                <a href="{{ route('main') }}" class="logo-link">
                    <img src="{{ asset('assets/img/logo_footer.png') }}" alt="sweets technologies logo" class="footer-logo-img">
                </a>
            </div>
            <div class="col-md-4 text-center social">
                <a href="https://www.instagram.com/sweetstech" target="_blank">
                    <svg height="18pt" viewBox="0 0 511 511.9" width="18pt" xmlns="http://www.w3.org/2000/svg">
                        <path d="m510.949219 150.5c-1.199219-27.199219-5.597657-45.898438-11.898438-62.101562-6.5-17.199219-16.5-32.597657-29.601562-45.398438-12.800781-13-28.300781-23.101562-45.300781-29.5-16.296876-6.300781-34.898438-10.699219-62.097657-11.898438-27.402343-1.300781-36.101562-1.601562-105.601562-1.601562s-78.199219.300781-105.5 1.5c-27.199219 1.199219-45.898438 5.601562-62.097657 11.898438-17.203124 6.5-32.601562 16.5-45.402343 29.601562-13 12.800781-23.097657 28.300781-29.5 45.300781-6.300781 16.300781-10.699219 34.898438-11.898438 62.097657-1.300781 27.402343-1.601562 36.101562-1.601562 105.601562s.300781 78.199219 1.5 105.5c1.199219 27.199219 5.601562 45.898438 11.902343 62.101562 6.5 17.199219 16.597657 32.597657 29.597657 45.398438 12.800781 13 28.300781 23.101562 45.300781 29.5 16.300781 6.300781 34.898438 10.699219 62.101562 11.898438 27.296876 1.203124 36 1.5 105.5 1.5s78.199219-.296876 105.5-1.5c27.199219-1.199219 45.898438-5.597657 62.097657-11.898438 34.402343-13.300781 61.601562-40.5 74.902343-74.898438 6.296876-16.300781 10.699219-34.902343 11.898438-62.101562 1.199219-27.300781 1.5-36 1.5-105.5s-.101562-78.199219-1.300781-105.5zm-46.097657 209c-1.101562 25-5.300781 38.5-8.800781 47.5-8.601562 22.300781-26.300781 40-48.601562 48.601562-9 3.5-22.597657 7.699219-47.5 8.796876-27 1.203124-35.097657 1.5-103.398438 1.5s-76.5-.296876-103.402343-1.5c-25-1.097657-38.5-5.296876-47.5-8.796876-11.097657-4.101562-21.199219-10.601562-29.398438-19.101562-8.5-8.300781-15-18.300781-19.101562-29.398438-3.5-9-7.699219-22.601562-8.796876-47.5-1.203124-27-1.5-35.101562-1.5-103.402343s.296876-76.5 1.5-103.398438c1.097657-25 5.296876-38.5 8.796876-47.5 4.101562-11.101562 10.601562-21.199219 19.203124-29.402343 8.296876-8.5 18.296876-15 29.398438-19.097657 9-3.5 22.601562-7.699219 47.5-8.800781 27-1.199219 35.101562-1.5 103.398438-1.5 68.402343 0 76.5.300781 103.402343 1.5 25 1.101562 38.5 5.300781 47.5 8.800781 11.097657 4.097657 21.199219 10.597657 29.398438 19.097657 8.5 8.300781 15 18.300781 19.101562 29.402343 3.5 9 7.699219 22.597657 8.800781 47.5 1.199219 27 1.5 35.097657 1.5 103.398438s-.300781 76.300781-1.5 103.300781zm0 0"/>
                        <path d="m256.449219 124.5c-72.597657 0-131.5 58.898438-131.5 131.5s58.902343 131.5 131.5 131.5c72.601562 0 131.5-58.898438 131.5-131.5s-58.898438-131.5-131.5-131.5zm0 216.800781c-47.097657 0-85.300781-38.199219-85.300781-85.300781s38.203124-85.300781 85.300781-85.300781c47.101562 0 85.300781 38.199219 85.300781 85.300781s-38.199219 85.300781-85.300781 85.300781zm0 0"/>
                        <path d="m423.851562 119.300781c0 16.953125-13.746093 30.699219-30.703124 30.699219-16.953126 0-30.699219-13.746094-30.699219-30.699219 0-16.957031 13.746093-30.699219 30.699219-30.699219 16.957031 0 30.703124 13.742188 30.703124 30.699219zm0 0"/>
                    </svg>
                </a>
                <a href="https://www.youtube.com/channel/UCISaAQ5WmmMtvU7-_g_diDQ" target="_blank">
                    <svg version="1.1" height="18pt" width="18pt" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<g>
    <g>
        <path d="M490.24,113.92c-13.888-24.704-28.96-29.248-59.648-30.976C399.936,80.864,322.848,80,256.064,80
            c-66.912,0-144.032,0.864-174.656,2.912c-30.624,1.76-45.728,6.272-59.744,31.008C7.36,138.592,0,181.088,0,255.904
            C0,255.968,0,256,0,256c0,0.064,0,0.096,0,0.096v0.064c0,74.496,7.36,117.312,21.664,141.728
            c14.016,24.704,29.088,29.184,59.712,31.264C112.032,430.944,189.152,432,256.064,432c66.784,0,143.872-1.056,174.56-2.816
            c30.688-2.08,45.76-6.56,59.648-31.264C504.704,373.504,512,330.688,512,256.192c0,0,0-0.096,0-0.16c0,0,0-0.064,0-0.096
            C512,181.088,504.704,138.592,490.24,113.92z M192,352V160l160,96L192,352z"/>
    </g>
</g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g></svg>
                </a>
                <a href="https://facebook.com/sweetstec" target="_blank">
                    <svg height="18pt" width="18pt" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                        <path d="m437 0h-362c-41.351562 0-75 33.648438-75 75v362c0 41.351562 33.648438 75 75 75h151v-181h-60v-90h60v-61c0-49.628906 40.371094-90 90-90h91v90h-91v61h91l-15 90h-76v181h121c41.351562 0 75-33.648438 75-75v-362c0-41.351562-33.648438-75-75-75zm0 0"/>
                    </svg>
                </a>
            </div>
            <div class="col-md-4 copy">
                <p>Все права защищены. © <a href="https://sweetstech.com/ru/">Sweets Technologies</a></p>
            </div>
        </div>
    </div>
</div>
<div class="order-success">
    <p class="order-success-txt">
        <span></span>
        <button type="button" class="order-success-close"></button>
    </p>
</div>

@include('ru.parts.form')

<button type="button" class="show-form js-show-form">Узнать больше</button>

<div class="to-top js-to-top">
    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24">
        <path fill="none" d="M0 0h24v24H0V0z"></path>
        <path d="M4 12l1.41 1.41L11 7.83V20h2V7.83l5.58 5.59L20 12l-8-8-8 8z"></path>
    </svg>
</div>
<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/landings.js') }}"></script>

@stack('js')
</body>
</html>
