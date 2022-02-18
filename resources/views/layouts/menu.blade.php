<?php
use Illuminate\Support\Facades\Route;
Route::currentRouteName();
?>
<header>
<nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">D2R 交換論壇</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                    D2R 交換論壇
                </h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body bg-dark">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link @if (Route::currentRouteName() == 'trade') active @endif" aria-current="page" href="{{ route('trade') }}">交易大廳</a>
                    </li>
                    <li class="nav-item">
                    @if (!empty($user['id']))
                        <a class="nav-link @if (Route::currentRouteName() == 'user.index') active @endif" href="{{ route('user.index') }}">會員中心</a>
                        <a class="nav-link @if (Route::currentRouteName() == 'logout') active @endif" href="{{ route('logout') }}">會員登出</a>
                    @else
                        <a class="nav-link @if (Route::currentRouteName() == 'login') active @endif" href="{{ route('login') }}">會員登入</a>
                        <a class="nav-link @if (Route::currentRouteName() == 'register') active @endif" href="{{ route('register') }}">註冊會員</a>
                    @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
</header>
