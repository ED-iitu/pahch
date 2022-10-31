@extends('layouts.app')

@section('content')
    <!-- Page Section -->
    <section class="page-section" id="page-section">
        <div class="container">
            <div class="page-header">
                <div class="page-path">
                    <ol>
                        <li><a href="#" class=""><span>Главная</span></a></li>
                        <li><a href="#" class="path-active"><span>Личный кабинет</span></a></li>
                    </ol>
                </div>
                <h1 class="page-name">Личный кабинет партнера AKHP	</h1>
            </div>
            <div class="page-content">
                <article class="page-article no-aside">
                    <div class="page-cabinet">
                        <div class="cabinet-card type1">
                            <div class="profile-main">
                                <img src="../img/img-profile-avatar.png" alt="" class="img-profile-avatar">
                                <div class="profile-name">
                                    <h3>Кани
                                        Любовь Ораловна</h3>
                                    <a href="{{route('editProfile')}}">Редактировать профиль</a>
                                </div>
                            </div>
                            <div class="profile-info">
                                <div><span>Телефон:</span><a href="#">+ 705 579 79 21</a></div>
                                <div><span>Email:</span><a href="#">01@ucentralasia.org</a></div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

@endsection