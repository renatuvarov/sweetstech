<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex, nofollow">
    <title>Управление</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    @stack('css')
</head>
<body>
    <header class="header fixed-top" style="background: white">
            <div class="d-flex justify-content-between">
                <div class="user ml-4 mt-3">{{\Illuminate\Support\Facades\Auth::user()->email}}</div>
                <nav class="navbar navbar-expand-lg navbar-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Лэндинги
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('mmc-200') }}" target="_blank">ММС-200</a>
                                    <a class="dropdown-item" href="{{ route('admin.tag.index') }}" target="_blank">РФМ</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Каталог
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
{{--                                    <a class="dropdown-item" href="{{ route('admin.types.index') }}">Категории</a>--}}
                                    <a class="dropdown-item" href="{{ route('admin.tag.index') }}">Тэги</a>
                                    <a class="dropdown-item" href="{{ route('admin.properties.index') }}">Параметры</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item font-weight-bold" href="{{ route('admin.machines.index') }}">Оборудование</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Блог
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('admin.blog.categories.index') }}">Категории</a>
                                    <a class="dropdown-item" href="{{ route('admin.blog.tags.index') }}">Тэги</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item font-weight-bold" href="{{ route('admin.blog.posts.index') }}">Посты</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <form action="{{route('logout')}}" method="post">
                                    @csrf
                                    <button type="submit" class="nav-link logout">Выход</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
    </header>
    <div class="content-wrapper pt-5 mt-4"></div>
    @yield('content')
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/all.min.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
    @stack('js')
</body>
</html>
