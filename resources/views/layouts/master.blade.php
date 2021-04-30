<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="/photos/cafesites.jpg"/>
    <!-- App.css -->
    <link rel="stylesheet" href="/frontend-files/css/app.css">
    <!-- fontawesome CSS -->
    <link rel="stylesheet" href="/frontend-files/plugins/fontawesome/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/frontend-files/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/frontend-files/plugins/bootstrap/css/offcanvas.css">
    <!-- slick CSS -->
    <link rel="stylesheet" href="/frontend-files/plugins/slick/css/slick.css">
    <link rel="stylesheet" href="/frontend-files/plugins/slick/css/slick-theme.css">
    <link rel="stylesheet" href="/frontend-files/plugins/slick/css/slide.css">
    @yield('CSS')
    <style>@font-face {font-family: "Vazir";  src: url("/frontend-files/fonts/Vazir.eot");  src: url("/frontend-files/fonts/Vazir.woff") format("woff"), url("/frontend-files/fonts/Vazir.otf") format("opentype"), url("/frontend-files/fonts/Vazir.svg") format("svg");}body{font-family: 'Vazir' !important;font-weight:normal;}</style>
    @yield('title-page')
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
    <img src="/photos/cafesites.jpg" class="rounded" width="40" alt="">
    <a class="navbar-brand text-center" href="{{ route('home.index') }}">کافه سایت</a>
    <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div id="nav-size" class="navbar-collapse offcanvas-collapse" dir="rtl" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home.index') }}">خانه</a>
            </li>
            @auth
                @foreach(\Illuminate\Support\Facades\Auth::user()->roles as $role)
                    @if($role->name == 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard.index') }}">پنل مدیریت</a>
                        </li>
                    @endif
                @endforeach
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }} " onclick="event.preventDefault();document.getElementById('logout-form').submit();">خروج</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">ورود</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">عضویت</a>
                </li>
            @endauth
        </ul>
        <hr>
        <div class="" dir="ltr">
            <form action="/search/sites" method="get" class="d-flex">
                <input class="form-control me-2" name="title" dir="rtl" type="search" placeholder="جستجو سایت">
                <button class="btn btn-outline-secondary mr-1" type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <hr>
    </div>
</nav>

<div class="container">
    <div id="breadcrumb" class="row" dir="rtl">
        <div class="col-12 mt-2">
            <ol class="breadcrumb">
                @yield('breadcrumb')
            </ol>
        </div>
    </div>
    @yield('content')
    <h1 class="text-center" style="visibility: hidden;">کافه سایت</h1>
</div>

<footer class="card-footer text-light mt-5 bg-dark" dir="rtl">
    <div class="row">
        <div id="cafe-sites-description" class="col-md-6 col-12">
            <h4>کافه سایت</h4>
            <p class="text-justify">اولین سایت در ایران که به معرفی سایر سایت ها می پردازد ، تیم تک نفره کافه سایت در تلاش برای این است که به کاربران ، انواع سایت ها بر اساس دسته بندی های متنوع معرفی کند . در کافه سایت روزانه اطلاعات ده ها سایت مختلف بر اساس دسته بندی های گوناگون به ثبت میرسد . امید است که کافه سایت بتواند بر اطلاعات شما کاربران گرامی در خصوص سایت های ایران و جهان بیافزاید . </p>
        </div>
        <div class="col-md-6 col-12">
            <div id="symbol">
                <img src="/photos/cafesites.jpg" class="rounded m-1" width="100">
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div id="copyright" class="col-md-10 text-left">
            <p>تمامی حقوق این سایت محفوظ میباشد <i class="fa fa-copyright"></i> 2021</p>
        </div>
        <div class="social-media col-md-2 text-center">
            <a href="https://t.me/cafesites" target="_blank"><i class="fab fa-telegram"></i></a>
            <a href="https://www.instagram.com/cafe.sites" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
</footer>

<script src="/frontend-files/plugins/bootstrap/js/jquery-3.1.1.min.js"></script>
<script src="/frontend-files/plugins/bootstrap/js/popper.min.js"></script>
<script src="/frontend-files/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="/frontend-files/plugins/bootstrap/js/holder.min.js"></script>
<script src="/frontend-files/plugins/bootstrap/js/offcanvas.js"></script>
<script src="/frontend-files/plugins/slick/js/jquery.js"></script>
<script src="/frontend-files/plugins/slick/js/slick.js"></script>
<script src="/frontend-files/js/app.js"></script>
@yield('JS')
</body>
</html>
