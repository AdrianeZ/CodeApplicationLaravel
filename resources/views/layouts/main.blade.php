<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <script src="{{asset("js/app.js")}}" defer></script>

    <!--Font Awaseome Icons-->
    <script src="https://kit.fontawesome.com/a40f4d5595.js" crossorigin="anonymous"></script>

    <!--CSS styles-->
    <link rel="stylesheet" href="{{asset("css/app.css")}}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@1,300&family=Permanent+Marker&display=swap"
        rel="stylesheet">

</head>
<body>
<header class="main-header">

    <div class="main-header__logo">
        <a href="#">Code Generator</a>
    </div>
    <ul class="main-header__menu">
        <li class="main-header__menu__item"><a href="#">View</a></li>
        <li class="main-header__menu__item"><a href="#">Create</a></li>
        <li class="main-header__menu__item"><a href="#">Remove</a></li>
        <li class="main-header__menu__item"><a href="#"><span class="fa-solid fa-id-card" aria-hidden="true"></span> Register</a></li>
        <li class="main-header__menu__item"><a href="#"><span class="fa-solid fa-user" aria-hidden="true"></span> Login</a></li>
    </ul>

    <div class="main-header__burger">
        <div class="main-header__burger__line"></div>
    </div>

    <div class="main-header__close">
        <span class="fa-solid fa-x"></span>
    </div>

</header>

    <main>
        @yield('info')
        @yield('content')
    </main>

</body>
</html>
