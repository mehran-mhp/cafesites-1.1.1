<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>پنل مدیریت</title>
    <link rel="icon" type="image/x-icon" href="/photos/admin-icon.png"/>
    <link href="/admin-files/assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="/admin-files/assets/js/loader.js"></script>
    <link href="/admin-files/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/admin-files/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <style>.layout-px-spacing {min-height: calc(100vh - 166px)!important;}</style>
    @yield('CSS')
</head>
<body>
<!-- BEGIN LOADER -->
<div id="load_screen"> <div class="loader"> <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div></div></div>
<!--  END LOADER -->

<!--  BEGIN NAVBAR  -->
<div class="header-container fixed-top">
    <header class="header navbar navbar-expand-sm">

        <ul class="navbar-item theme-brand flex-row  text-center">
            <li class="nav-item theme-logo">
                <a href="{{ route('dashboard.index') }}">
                    <img src="/photos/cafesites.jpg" class="navbar-logo" alt="logo">
                </a>
            </li>
            <li class="nav-item theme-text">
                <a href="{{ route('dashboard.index') }}" class="nav-link">کافه سایت</a>
            </li>
        </ul>

        <ul class="navbar-item flex-row ml-md-auto">

            <li class="nav-item dropdown user-profile-dropdown">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <img src="/admin-files/assets/img/90x90.jpg" alt="avatar">
                </a>
                <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                    <div class="">
                        <div class="dropdown-item">
                            <a href="user_profile.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> پروفایل من</a>
                        </div>
                        <div class="dropdown-item">
                            <a href="apps_mailbox.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg> صندوق ورودی</a>
                        </div>
                        <div class="dropdown-item">
                            <a href="auth_lockscreen.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>قفل صفحه</a>
                        </div>
                        <div class="dropdown-item">
                            <a href="auth_login.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> خروج</a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </header>
</div>
<!--  END NAVBAR  -->

<!--  BEGIN NAVBAR  -->
<div class="sub-header-container">
    <header class="header navbar navbar-expand-sm">
        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>
        <ul class="navbar-nav flex-row">
            <li>
                <div class="page-header">
                    <div class="page-title">
                        @yield('breadcrumb')
                    </div>
                </div>
            </li>
        </ul>
    </header>
</div>
<!--  END NAVBAR  -->

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>

    <!--  BEGIN SIDEBAR  -->
    <div class="sidebar-wrapper sidebar-theme">

        <nav id="sidebar">
            <div class="shadow-bottom"></div>

            <ul class="list-unstyled menu-categories" id="accordionExample">

                <li class="menu">
                    <a href="{{ route('dashboard.index') }}" aria-expanded="false" class="dropdown-toggle">
                        <div>
                            <i data-feather="home"></i>
                            <span>داشبرد</span>
                        </div>
                    </a>
                </li>

                <li class="menu">
                    <a href="{{ route('sites.index') }}" aria-expanded="false" class="dropdown-toggle">
                        <div>
                            <i data-feather="globe"></i>
                            <span>سایت ها</span>
                        </div>
                    </a>
                </li>

                <li class="menu">
                    <a href="{{ route('categories.index') }}" aria-expanded="false" class="dropdown-toggle">
                        <div>
                            <i data-feather="database"></i>
                            <span>دسته بندی</span>
                        </div>
                    </a>
                </li>

                <li class="menu">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" aria-expanded="false" class="dropdown-toggle">
                        <div>
                            <i data-feather="log-out"></i>
                            <span>خروج</span>
                        </div>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

            </ul>

        </nav>

    </div>
    <!--  END SIDEBAR  -->

    <!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                @yield('content')
            </div>
        </div>
    </div>
    <!--  END CONTENT PART  -->

</div>
<!-- END MAIN CONTAINER -->
<script src="/admin-files/assets/js/libs/jquery-3.1.1.min.js"></script>
<script src="/admin-files/bootstrap/js/popper.min.js"></script>
<script src="/admin-files/bootstrap/js/bootstrap.min.js"></script>
<script src="/admin-files/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="/admin-files/assets/js/app.js"></script>
<script src="/admin-files/plugins/font-icons/feather/feather.min.js"></script>
<script type="text/javascript">feather.replace();</script>
<script>$(document).ready(function() {App.init();});</script>
@yield('JS')
</body>
</html>
