<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Мой интернет магазин</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <script src="/assets/js/bootstrap.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Интернет-магазин</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Главная</a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Авторизация</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                        </li>
                    @endguest
                    @auth
                        <li class="nav-item"><a class="nav-link" href="#">Мои заказы</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('cabinet') }}">Мой аккаунт</a></li>
                        @if(Auth::user()->role == 'admin')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Администрирование
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item" href="{{ route('admin.product.create') }}">Добавить товар</a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin.product.index') }}">Все товары</a></li>
                                    <li><a class="dropdown-item" href="#">Просмотр заказов</a></li>
                                    <li><a class="dropdown-item" href="#">Пользователи</a></li>
                                </ul>
                            </li>
                        @endif
                        <li class="nav-item"><a class="nav-link" href="{{ route('order.basket') }}">Корзина</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}">Выход</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
</body>
</html>
