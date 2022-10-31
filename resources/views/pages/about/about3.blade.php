@extends('layouts.app')

@section('content')
        <!-- Page Banner -->
        <section class="page-banner" id="page-banner">
            <img src="../img/img-banner-1.jpg" alt="" class="img-banner">
            <h1 class="banner-name">Образование, которое меняет жизни</h1>
        </section>

        <!-- Page Section -->
        <section class="page-section" id="page-section">
            <div class="container">
                <div class="page-header">
                    <div class="page-path">
                        <ol>
                            <li><a href="#" class=""><span>Главная</span></a></li>
                            <li><a href="#" class=""><span>О нас</span></a></li>
                            <li><a href="#" class="path-active"><span>Сотрудники</span></a></li>
                        </ol>
                    </div>
                    <h1 class="page-name">Сотрудники</h1>
                </div>
                <div class="page-content">
                    <article class="page-article">
                        <div class="page-card -employee">
                            <a href="#" class="page-card-items">
                                <div class="page-card-image">
                                    <img src="../img/img-employee-1.png" alt="">
                                </div>
                                <div class="page-card-info">
                                    <h3 class="page-card-name">Доктор Абдулмамад Илолиев</h3>
                                    <p class="page-card-subname">Директор, Гуманитарный проект Ага Хана</p>
                                </div>
                            </a>
                            <a href="#" class="page-card-items">
                                <div class="page-card-image">
                                    <img src="../img/img-employee-2.png" alt="">
                                </div>
                                <div class="page-card-info">
                                    <h3 class="page-card-name">Д-р Нуржауар Исаева</h3>
                                    <p class="page-card-subname">Координатор программы развития профессорско-преподавательского состава в Казахстане</p>
                                </div>
                            </a>
                            <a href="#" class="page-card-items">
                                <div class="page-card-image">
                                    <img src="../img/img-employee-3.png" alt="">
                                </div>
                                <div class="page-card-info">
                                    <h3 class="page-card-name">Марифат Алифбекова</h3>
                                    <p class="page-card-subname">Lorem ipsum</p>
                                </div>
                            </a>
                            <a href="#" class="page-card-items">
                                <div class="page-card-image">
                                    <img src="../img/img-employee-4.png" alt="">
                                </div>
                                <div class="page-card-info">
                                    <h3 class="page-card-name">Д-р Пулат Шозимов</h3>
                                    <p class="page-card-subname">Старший научный сотрудник, ПАХП</p>
                                </div>
                            </a>
                            <a href="#" class="page-card-items">
                                <div class="page-card-image">
                                    <img src="../img/img-employee-5.png" alt="">
                                </div>
                                <div class="page-card-info">
                                    <h3 class="page-card-name">Обидхон Курбонхонов</h3>
                                    <p class="page-card-subname">Координатор программы</p>
                                </div>
                            </a>
                        </div>
                    </article>
                    <aside class="page-aside">
                        <div>
                            <a href="{{route('aboutOne')}}" class="">О нас</a>
                            <a href="{{route('aboutTwo')}}" class="">Что мы делаем</a>
                            <a href="#" class="aside-active">Сотрудники</a>
                        </div>
                    </aside>
                </div>
            </div>
        </section>

@endsection