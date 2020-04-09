<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @section('description')
        <meta name="description" content="{{ config('site.user.app.description') }}">
    @show
    @section('title')
        <title>{{ config('site.user.app.name') }}</title>
    @show
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @stack('css')
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
</head>
<body id="page-top">
<nav class="navbar fixed-top navbar-expand-lg">
    <img class="navbar-logo" width="18pt" height="18pt" src="{{ asset('assets/img/favicon.png') }}" alt="logo">
    <a id="logo" class="navbar-brand" href="{{ route('main') }}">Sweets Technologies</a>
    <button class="navbar-toggler" type="button">
    <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i>
  </span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul itemscope itemtype="https://www.schema.org/SiteNavigationElement" class="navbar-nav right">
            <li itemprop="name" class="nav-item">
                <a  itemprop="url" class="nav-link" href="{{ route('main') }}">Home</a>
            </li>
            <li itemprop="name" class="nav-item">
                <a itemprop="url" class="nav-link" href="{{ route('user.catalog.index') }}">Equipment</a>
            </li>
            <li itemprop="name" class="nav-item">
                <a itemprop="url" class="nav-link" href="{{ route('user.blog.news.index') }}">News</a>
            </li>
            <li itemprop="name" class="nav-item">
                <a itemprop="url" class="nav-link" href="{{ route('user.exhibitions.news.index') }}">Exhibitions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/#contacts">Contacts</a>
            </li>
            @auth
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Админ <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" id="layout-menu">
                        <a href="{{ route('admin.home') }}" class="dropdown-item">Админ</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Выйти
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endauth
        </ul>
        <div class="lang_search right ml-auto">
            <ul class="navbar-nav navbar-nav-lang">
                <li class="nav-item">
                    <a class="nav-link-lang nav-link-active">
                        <img width="18pt" height="18pt" src="{{ asset('assets/img/en_flag.png') }}" alt="language-en"><span
                            class="language">EN</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link-lang" href="/{{ config('site.user.routes.prefix.path') }}{{ request()->getRequestUri() }}">
                        <img width="18pt" height="18pt" src="{{ asset('assets/img/ru_flag.png') }}" alt="language-ru"><span
                            class="language">RU</span></a>
                </li>
            </ul>
            <div class="form-inline form-inline-search">
                <button class="show-search my-2 my-sm-0 js-show-search" type="button"><svg style="width:16px;margin-right:3px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                                                           viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve">
<path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23
	s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92
	c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17
	s-17-7.626-17-17S14.61,6,23.984,6z"/>
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
</svg>Search</button>
            </div>
        </div>
    </div>
</nav>

@yield('content')
<section class="sect-mt4">
    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-4 align-self-center">
                    <a href="{{ route('main') }}" class="logo-link">
                        <img src="{{ asset('assets/img/logo_footer.png') }}" alt="sweets technologies logo" class="footer-logo-img">
                    </a>
                </div>
                <div class="col-md-4 col-4 align-self-center text-center social">
                    <div class="social-icon">
                        <a href="https://www.instagram.com/sweetstech" target="_blank">
                            <svg class="instagram-icon" height="18pt" viewBox="0 0 511 511.9" width="18pt"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="m510.949219 150.5c-1.199219-27.199219-5.597657-45.898438-11.898438-62.101562-6.5-17.199219-16.5-32.597657-29.601562-45.398438-12.800781-13-28.300781-23.101562-45.300781-29.5-16.296876-6.300781-34.898438-10.699219-62.097657-11.898438-27.402343-1.300781-36.101562-1.601562-105.601562-1.601562s-78.199219.300781-105.5 1.5c-27.199219 1.199219-45.898438 5.601562-62.097657 11.898438-17.203124 6.5-32.601562 16.5-45.402343 29.601562-13 12.800781-23.097657 28.300781-29.5 45.300781-6.300781 16.300781-10.699219 34.898438-11.898438 62.097657-1.300781 27.402343-1.601562 36.101562-1.601562 105.601562s.300781 78.199219 1.5 105.5c1.199219 27.199219 5.601562 45.898438 11.902343 62.101562 6.5 17.199219 16.597657 32.597657 29.597657 45.398438 12.800781 13 28.300781 23.101562 45.300781 29.5 16.300781 6.300781 34.898438 10.699219 62.101562 11.898438 27.296876 1.203124 36 1.5 105.5 1.5s78.199219-.296876 105.5-1.5c27.199219-1.199219 45.898438-5.597657 62.097657-11.898438 34.402343-13.300781 61.601562-40.5 74.902343-74.898438 6.296876-16.300781 10.699219-34.902343 11.898438-62.101562 1.199219-27.300781 1.5-36 1.5-105.5s-.101562-78.199219-1.300781-105.5zm-46.097657 209c-1.101562 25-5.300781 38.5-8.800781 47.5-8.601562 22.300781-26.300781 40-48.601562 48.601562-9 3.5-22.597657 7.699219-47.5 8.796876-27 1.203124-35.097657 1.5-103.398438 1.5s-76.5-.296876-103.402343-1.5c-25-1.097657-38.5-5.296876-47.5-8.796876-11.097657-4.101562-21.199219-10.601562-29.398438-19.101562-8.5-8.300781-15-18.300781-19.101562-29.398438-3.5-9-7.699219-22.601562-8.796876-47.5-1.203124-27-1.5-35.101562-1.5-103.402343s.296876-76.5 1.5-103.398438c1.097657-25 5.296876-38.5 8.796876-47.5 4.101562-11.101562 10.601562-21.199219 19.203124-29.402343 8.296876-8.5 18.296876-15 29.398438-19.097657 9-3.5 22.601562-7.699219 47.5-8.800781 27-1.199219 35.101562-1.5 103.398438-1.5 68.402343 0 76.5.300781 103.402343 1.5 25 1.101562 38.5 5.300781 47.5 8.800781 11.097657 4.097657 21.199219 10.597657 29.398438 19.097657 8.5 8.300781 15 18.300781 19.101562 29.402343 3.5 9 7.699219 22.597657 8.800781 47.5 1.199219 27 1.5 35.097657 1.5 103.398438s-.300781 76.300781-1.5 103.300781zm0 0"/>
                                <path d="m256.449219 124.5c-72.597657 0-131.5 58.898438-131.5 131.5s58.90343 131.5 131.5 131.5c72.601562 0 131.5-58.898438 131.5-131.5s-58.898438-131.5-131.5-131.5zm0 216.800781c-47.097657 0-85.300781-38.199219-85.300781-85.300781s38.203124-85.300781 85.300781-85.300781c47.101562 0 85.300781 38.199219 85.300781 85.300781s-38.199219 85.300781-85.300781 85.300781zm0 0"/>
                                <path d="m423.851562 119.300781c0 16.953125-13.746093 30.699219-30.703124 30.699219-16.953126 0-30.699219-13.746094-30.699219-30.699219 0-16.957031 13.746093-30.699219 30.699219-30.699219 16.957031 0 30.703124 13.742188 30.703124 30.699219zm0 0"/>
                            </svg>
                        </a>
                    </div>
                    <div class="social-icon">
                        <a href="https://www.youtube.com/channel/UCISaAQ5WmmMtvU7-_g_diDQ" target="_blank">
                            <svg class="youtube-icon" version="1.1" height="18pt" width="18pt" id="Capa_1"
                                 xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<g><g><path d="M490.24,113.92c-13.888-24.704-28.96-29.248-59.648-30.976C399.936,80.864,322.848,80,256.064,80
            c-66.912,0-144.032,0.864-174.656,2.912c-30.624,1.76-45.728,6.272-59.744,31.008C7.36,138.592,0,181.088,0,255.904
            C0,255.968,0,256,0,256c0,0.064,0,0.096,0,0.096v0.064c0,74.496,7.36,117.312,21.664,141.728
            c14.016,24.704,29.088,29.184,59.712,31.264C112.032,430.944,189.152,432,256.064,432c66.784,0,143.872-1.056,174.56-2.816
            c30.688-2.08,45.76-6.56,59.648-31.264C504.704,373.504,512,330.688,512,256.192c0,0,0-0.096,0-0.16c0,0,0-0.064,0-0.096
            C512,181.088,504.704,138.592,490.24,113.92z M192,352V160l160,96L192,352z"/>
    </g></g>
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
                    </div>
                    <div class="social-icon">
                        <a href="https://facebook.com/sweetstec" target="_blank">
                            <svg class="facebook-icon" height="18pt" width="18pt" viewBox="0 0 512 512"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="m437 0h-362c-41.351562 0-75 33.648438-75 75v362c0 41.351562 33.648438 75 75 75h151v-181h-60v-90h60v-61c0-49.628906 40.371094-90 90-90h91v90h-91v61h91l-15 90h-76v181h121c41.351562 0 75-33.648438 75-75v-362c0-41.351562-33.648438-75-75-75zm0 0"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-4 align-self-center copy">
                    <p>All rights reserved. © <a href="./">Sweets Technologies</a></p>
                </div>
            </div>
        </div>
    </footer>
</section>
@include('parts.search')
@include('parts.to-top')
@include('parts.cookies')
<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
@stack('js')
</body>
</html>
