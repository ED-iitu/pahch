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
                            <li><a href="#" class="path-active"><span>О нас</span></a></li>
                        </ol>
                    </div>
                    <h1 class="page-name">О нас</h1>
                </div>
                <div class="page-content">
                    <article class="page-article">
                        <div class="page-content-text">
                            <h2>Проект Ага Хана Человековедение</h2>
                            <p>Проект Ага Хана Человековедение (ПАХЧ) был учрежден в 1997 г. Трастом Ага Хана по культуре (AKTC), является подразделением Высшей школы развития Университета Центральной Азии  с 2007 г. Основной частью миссии ПАХЧ является продвижение идеи человечности, человеческих ценностей и плюрализм в идеях, культурах и народах через инициирования и поддержки создания и реализации междисциплинарных учебных программ бакалавриата по гуманитарным наукам, педагогического и профессионального развития педагогов университетов Центральной Азии и через социальные проекты.</p>
                            <p>Головной офис ПАХЧ находится в г.Душанбе с координаторами в г.г.Алматы и Бишкек. Мы сотрудничаем с шестьюдесятью учебными заведениями Таджикистана, Казахстана и Кыргызстана. Партнерство основано на меморандумах о взаимопонимании, подписанных с этими учебными заведениями, инициированных преподавателями, в соответствии с которыми учебное заведение обязуется включать курсы ПАХЧ в учебную программу, способствовать привлечению преподавателей к возможностям профессионального развития, организации семинаров и других подобных мероприятий. Наши курсы имеют разные статусы: они могут быть элективными или факультативными, или компонентами других курсов. Другие активности ПАХЧ включают курсы «Человековедение на английском языке» для молодежи, Серию публичных лекций, ежегодные конференции, академические публикации, магистерский курс и дискуссионный клуб.</p>
                        </div>
                        <div class="page-content-image">
                            <div>
                                <img src="../img/img-page-image-1.jpg" alt="">
                            </div>
                            <div>
                                <img src="../img/img-page-image-2.jpg" alt="">
                            </div>
                        </div>
                        <div class="page-content-text">
                            <h2>Наша цифровая платформа</h2>
                            <p>Цифровая платформа ПАХЧ — это независимая платформа со ссылками на веб-сайты УЦА и университетов-партнеров. На нем размещены оцифрованные учебники и пособия ПАХЧ для педагогов; есть доступ к:</p>
                            <ul>
                                <li>соответствующим дополнительным учебным ресурсам, разработанным педагогами или учеными, с соответствующими аудио- видео материалами;</li>
                                <li>возможности проведения форумов для обсуждения вопросов, связанных с преподаванием гуманитарных наук и размещению к информации о том, где можно пройти обучение по этим курсам;</li>
                                <li>получению педагогам передового педагогического опыта и знаний;</li>
                                <li>сформированной базе данных преподавательской сети, которая включает их области знаний и научных интересов;</li>
                                <li>опубликованным соответствующим исследованиям и серии исследовательских статей ПАХЧ;</li>
                                <li>проводимым онлайн-курсам повышения квалификации и лекциям.</li>
                            </ul>
                        </div>
                    </article>
                    <aside class="page-aside">
                        <div>
                            <a href="#" class="aside-active">О нас</a>
                            <a href="{{route('aboutTwo')}}" class="">Что мы делаем</a>
                            <a href="{{route('aboutThree')}}" class="">Сотрудники</a>
                        </div>
                    </aside>
                </div>
            </div>
        </section>

        <!-- News Section -->
        <section class="news-section" id="news-section">
            <div class="container">
                <div class="section__header">
                    <h1 class="section__name">Новости</h1>
                    <a href="#" class="section__header-link">
                        Все новости
                        <svg width="17" height="12" viewBox="0 0 17 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.5303 6.53033C16.8232 6.23744 16.8232 5.76256 16.5303 5.46967L11.7574 0.6967C11.4645 0.403807 10.9896 0.403807 10.6967 0.6967C10.4038 0.989593 10.4038 1.46447 10.6967 1.75736L14.9393 6L10.6967 10.2426C10.4038 10.5355 10.4038 11.0104 10.6967 11.3033C10.9896 11.5962 11.4645 11.5962 11.7574 11.3033L16.5303 6.53033ZM-6.55671e-08 6.75L16 6.75L16 5.25L6.55671e-08 5.25L-6.55671e-08 6.75Z" fill="#002568"/>
                        </svg>
                    </a>
                </div>
                <div class="section__content">
                    <div class="swiper newsSwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="swiper-img-block">
                                    <img src="../img/img-news-section-1.png" alt="">
                                </div>
                                <div class="swiper-content-block">
                                    <h3 class="swiper-content-name">Пересмотр учебной программы и перевод</h3>
                                    <p class="swiper-content-text">В апреле 2022 года ПАХЧ приступил к реализации нового проекта, который включает рецензирование...</p>
                                    <a href="#" class="swiper-content-link">
                                        Подробнее
                                        <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.5303 7.03033C16.8232 6.73744 16.8232 6.26256 16.5303 5.96967L11.7574 1.1967C11.4645 0.903807 10.9896 0.903807 10.6967 1.1967C10.4038 1.48959 10.4038 1.96447 10.6967 2.25736L14.9393 6.5L10.6967 10.7426C10.4038 11.0355 10.4038 11.5104 10.6967 11.8033C10.9896 12.0962 11.4645 12.0962 11.7574 11.8033L16.5303 7.03033ZM-6.55671e-08 7.25L16 7.25L16 5.75L6.55671e-08 5.75L-6.55671e-08 7.25Z" fill="#002568"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="swiper-img-block">
                                    <img src="../img/img-news-section-2.png" alt="">
                                </div>
                                <div class="swiper-content-block">
                                    <h3 class="swiper-content-name">Восстановление связей с партнерами ПАХЧ</h3>
                                    <p class="swiper-content-text">С февраля по май 2022 года Директор ПАХЧ и его команда ...</p>
                                    <a href="#" class="swiper-content-link">
                                        Подробнее
                                        <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.5303 7.03033C16.8232 6.73744 16.8232 6.26256 16.5303 5.96967L11.7574 1.1967C11.4645 0.903807 10.9896 0.903807 10.6967 1.1967C10.4038 1.48959 10.4038 1.96447 10.6967 2.25736L14.9393 6.5L10.6967 10.7426C10.4038 11.0355 10.4038 11.5104 10.6967 11.8033C10.9896 12.0962 11.4645 12.0962 11.7574 11.8033L16.5303 7.03033ZM-6.55671e-08 7.25L16 7.25L16 5.75L6.55671e-08 5.75L-6.55671e-08 7.25Z" fill="#002568"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="swiper-img-block">
                                    <img src="../img/img-news-section-3.png" alt="">
                                </div>
                                <div class="swiper-content-block">
                                    <h3 class="swiper-content-name">Выступление Мин. образования Кыргызской Республики г-на </h3>
                                    <p class="swiper-content-text">Сейчас Синдзо Абэ находится в больнице. Его состояние оценивается как крайне тяжелое...</p>
                                    <a href="#" class="swiper-content-link">
                                        Подробнее
                                        <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.5303 7.03033C16.8232 6.73744 16.8232 6.26256 16.5303 5.96967L11.7574 1.1967C11.4645 0.903807 10.9896 0.903807 10.6967 1.1967C10.4038 1.48959 10.4038 1.96447 10.6967 2.25736L14.9393 6.5L10.6967 10.7426C10.4038 11.0355 10.4038 11.5104 10.6967 11.8033C10.9896 12.0962 11.4645 12.0962 11.7574 11.8033L16.5303 7.03033ZM-6.55671e-08 7.25L16 7.25L16 5.75L6.55671e-08 5.75L-6.55671e-08 7.25Z" fill="#002568"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="swiper-img-block">
                                    <img src="../img/img-news-section-4.png" alt="">
                                </div>
                                <div class="swiper-content-block">
                                    <h3 class="swiper-content-name">Класс 2022 года празднует выпускной</h3>
                                    <p class="swiper-content-text">В апреле 2022 года ПАХЧ приступил к реализации нового проекта, который включает рецензирование...</p>
                                    <a href="#" class="swiper-content-link">
                                        Подробнее
                                        <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.5303 7.03033C16.8232 6.73744 16.8232 6.26256 16.5303 5.96967L11.7574 1.1967C11.4645 0.903807 10.9896 0.903807 10.6967 1.1967C10.4038 1.48959 10.4038 1.96447 10.6967 2.25736L14.9393 6.5L10.6967 10.7426C10.4038 11.0355 10.4038 11.5104 10.6967 11.8033C10.9896 12.0962 11.4645 12.0962 11.7574 11.8033L16.5303 7.03033ZM-6.55671e-08 7.25L16 7.25L16 5.75L6.55671e-08 5.75L-6.55671e-08 7.25Z" fill="#002568"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection