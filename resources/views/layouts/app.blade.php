<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon Icon-->

    <!-- Style CSS -->
    <link rel="shortcut icon" href="{{asset('../img/icons/favicon.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('../css/main.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{asset('../js/jquery-3.6.0.min.js')}}"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <!-- <script src="../js/jquery.maskMoney.js" type="text/javascript"></script> -->
    <link rel="stylesheet" href="{{asset('../css/modal-video.min.css')}}">

    <!-- Title -->
    <title>ПАХЧ</title>

    <!-- Style -->
    <style>
        a {
            text-decoration: none;
        }

        p, h1, h2, h3, h4, h5, h6, a {
            margin: 0;
            padding: 0;
        }
    </style>

</head>
<body>
    <div id="app">
        <header class="header">
            <div class="container">
                <a href="index.html" class="header__logo">
                    <img src="{{asset('../img/icons/logo.svg')}}" alt="">
                </a>
                <nav class="header__menu">
                    <div class="header__right_adap">
                        <div class="container">
                            <a href="https://wa.me/+77089874209" class="header__lang_adap">
                                <div class="btn-group">
                                    <button type="button" class="lang-btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ Session::get('locale') }}
                                    </button>
                                    <ul class="lang-drp dropdown-menu dropdown-menu-end">
                                        <li><a href="{{ url('change-language/ru') }}" class="dropdown-item">Русский</a></li>
                                        <li><a href="{{ url('change-language/kk') }}" class="dropdown-item">Казахский</a></li>
                                        <li><a href="{{ url('change-language/en') }}" class="dropdown-item">English</a></li>
                                    </ul>
                                </div>
                            </a>
                            <div class="header__menu-close">
                                <img src="../img/icons/ic-close-menu.svg" alt="">
                            </div>
                        </div>
                    </div>
                    <ul class="header__menu_list">
                        <li><a href="{{route('aboutOne')}}" class="header__menu_items">{{__('home.about_title')}}</a></li>
                        <li><a href="{{route('news')}}" class="header__menu_items">Новости</a></li>
                        <li><a href="{{route('partners')}}" class="header__menu_items">Партнеры</a></li>
                        <li><a href="{{route('materials')}}" class="header__menu_items">Учебные материалы ПАХЧ</a></li>
                        <li><a href="{{route('courses')}}" class="header__menu_items">Учебный центр ПАХЧ HiE</a></li>
                        <li><a href="{{route('contacts')}}" class="header__menu_items">Контакты</a></li>
                    </ul>
                </nav>
                <div class="header__right">
                    <div class="header__lang">
                        <div class="btn-group">
                            <button type="button" class="lang-btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Session::get('locale') }}
                            </button>
                            <ul class="lang-drp dropdown-menu dropdown-menu-end">
                                <li><a href="{{ url('change-language/ru') }}" class="dropdown-item">Русский</a></li>
                                <li><a href="{{ url('change-language/kk') }}" class="dropdown-item">Казахский</a></li>
                                <li><a href="{{ url('change-language/en') }}" class="dropdown-item">English</a></li>
                            </ul>
                        </div>
                    </div>
                    @guest
                        @if (Route::has('login'))
                            <a href="{{route('login')}}" class="header__signIn">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15 12H3" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M3.94702 16C5.42002 18.961 8.46802 21 12 21C16.971 21 21 16.971 21 12C21 7.029 16.971 3 12 3C8.46802 3 5.42002 5.039 3.94702 8" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12 9L15 12L12 15" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <p>Войти</p>
                            </a>
                        @endif
                    @else
                        <div class="btn-group">
                            <button type="button" class="lang-btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                {{Auth::user()->name}}
                            </button>
                            <ul class="lang-drp dropdown-menu dropdown-menu-end">
                                @if(Auth::user()->isAdmin())
                                    <li><a href="{{ url('/admin') }}" class="dropdown-item">Админка</a></li>
                                @endif
                                    <li><a href="{{ route('profile') }}" class="dropdown-item">Профиль</a></li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                            </ul>
                        </div>
                    @endguest
                </div>

                <div class="header__burger">
                    <span></span>
                </div>
            </div>
        </header>
        <main>
            @yield('content')
        </main>

        <footer class="footer" id="footer">
            <div class="footer__up">
                <div class="container">
                    <a href="index.html" class="footer__logo">
                        <img src="../img/icons/logo.svg" alt="">
                        <p class="logo-text">Университет <br>
                            центральной Азии</p>
                    </a>
                    <div class="footer__content">
                        <div class="footer__content-block">
                            <h2 class="footer__content-name">Об университете</h2>
                            <ul class="footer__content-list">
                                <li><a href="{{route('aboutOne')}}">О нас</a></li>
                                <li><a href="../admin/pages/news.html">Новости</a></li>
                                <li><a href="../admin/pages/partners.html">Партнеры</a></li>
                                <li><a href="../admin/pages/edu-materials.html">Учебные материалы</a></li>
                            </ul>
                        </div>
                        <div class="footer__content-block">
                            <h2 class="footer__content-name">Контакты</h2>
                            <ul class="footer__content-list">
                                <li>Кабанбай батыра 164 - школа</li>
                                <li>Наурызбай батыра 94 - офис</li>
                                <li><a href="tel:+77081001010">+7 (708) 100 10 10</a></li>
                                <li><a href="mailto:ghfjv25@gmail.com">ghfjv25@gmail.com</a></li>
                            </ul>
                        </div>
                        <div class="footer__content-block">
                            <h2 class="footer__content-name">График работы</h2>
                            <ul class="footer__content-list">
                                <li>Пн-Пт: с 09:00 до 18:00</li>
                                <li>Сб-Вс: Выходной</li>
                                <li>
                                    <div class="footer__content-images">
                                        <a href="#" target="_blank"><img src="../img/icons/social/ic-social-fb.svg" alt=""></a>
                                        <a href="#" target="_blank"><img src="../img/icons/social/ic-social-ig.svg" alt=""></a>
                                        <a href="#" target="_blank"><img src="../img/icons/social/ic-social-wa.svg" alt=""></a>
                                        <a href="#" target="_blank"><img src="../img/icons/social/ic-social-tg.svg" alt=""></a>
                                        <a href="#" target="_blank"><img src="../img/icons/social/ic-social-tw.png" alt=""></a>
                                    </div>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__down">
                <div class="container">
                    <div class="footer__copyright">
                        University of Central Asia © 2021
                    </div>
                    <div class="footer__dev">
                        Разработка сайта
                        <a href="https://buginsoft.kz" target="_blank">
                            <img src="{{asset('../img/icons/logo-dev.png')}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="{{asset('../js/modal-video.min.js')}}"></script>
    <script src="https://unpkg.com/imask"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- <script src="//code.jquery.com/jquery-3.1.0.js"></script>
    <script src="/examples/libs/jquery/jquery-3.4.1.min.js"></script> -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{asset('../js/main.js')}}"></script>
</body>
</html>
