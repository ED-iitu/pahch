@extends('layouts.app')

@section('content')
    <main class="main">
        <div class="swiper mainSwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="main-img-block">
                        <img src="../img/img-main-1.jpg" alt="">
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="main-img-block">
                        <img src="../img/img-main-1.jpg" alt="">
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="main-img-block">
                        <img src="../img/img-main-1.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="panel-mainSwiper">
                <div class="panel-swiper-btns">
                    <div class="swiper-button-prev-1">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle r="15" transform="matrix(-1 0 0 1 15 15)" fill="#002568"/>
                            <path d="M8.46967 15.5303C8.17678 15.2374 8.17678 14.7626 8.46967 14.4697L13.2426 9.6967C13.5355 9.40381 14.0104 9.40381 14.3033 9.6967C14.5962 9.98959 14.5962 10.4645 14.3033 10.7574L10.0607 15L14.3033 19.2426C14.5962 19.5355 14.5962 20.0104 14.3033 20.3033C14.0104 20.5962 13.5355 20.5962 13.2426 20.3033L8.46967 15.5303ZM20 15.75L9 15.75L9 14.25L20 14.25L20 15.75Z" fill="white"/>
                        </svg>
                    </div>

                    <div class="pag-swiper">
                        <div class="swiper-pagination-1"></div>
                    </div>

                    <div class="swiper-button-next-1">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="15" cy="15" r="15" fill="#002568"/>
                            <path d="M20.5303 15.5303C20.8232 15.2374 20.8232 14.7626 20.5303 14.4697L15.7574 9.6967C15.4645 9.40381 14.9896 9.40381 14.6967 9.6967C14.4038 9.98959 14.4038 10.4645 14.6967 10.7574L18.9393 15L14.6967 19.2426C14.4038 19.5355 14.4038 20.0104 14.6967 20.3033C14.9896 20.5962 15.4645 20.5962 15.7574 20.3033L20.5303 15.5303ZM9 15.75L20 15.75L20 14.25L9 14.25L9 15.75Z" fill="white"/>
                        </svg>
                    </div>


                </div>
            </div>
        </div>


    </main>

    <!-- About Section -->
    <section class="about-section" id="about-section">
        <div class="container">
            <div class="section__header">
                <h1 class="section__name">О нас</h1>
            </div>
            <div class="section__content">
                <div class="section__images">
                    <div class="section__img-block">
                        <img src="../img/img-about-section-1.jpg" alt="">
                    </div>
                    <div class="section__img-block">
                        <img src="../img/img-about-section-2.jpg" alt="">
                    </div>
                </div>
                <div class="section__content-block">
                    <h2 class="section__content-name">Проект Ага Хана Человековедение</h2>
                    <p class="section__content-text">
                        Проект Ага Хана Человековедение (ПАХЧ) был учрежден в 1997 г. Трастом Ага Хана по культуре (AKTC), является подразделением Высшей школы развития Университета Центральной Азии  с 2007 г. Основной частью миссии ПАХЧ является продвижение идеи человечности, человеческих ценностей и плюрализм в идеях, культурах и народах через инициирования и поддержки создания и реализации междисциплинарных учебных программ бакалавриата по гуманитарным наукам, педагогического и профессионального развития педагогов университетов Центральной Азии и через социальные проекты.
                    </p>
                    <a href="#" class="section__content-link">
                        Подробнее
                        <svg width="17" height="12" viewBox="0 0 17 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.5303 6.53033C16.8232 6.23744 16.8232 5.76256 16.5303 5.46967L11.7574 0.6967C11.4645 0.403807 10.9896 0.403807 10.6967 0.6967C10.4038 0.989593 10.4038 1.46447 10.6967 1.75736L14.9393 6L10.6967 10.2426C10.4038 10.5355 10.4038 11.0104 10.6967 11.3033C10.9896 11.5962 11.4645 11.5962 11.7574 11.3033L16.5303 6.53033ZM-6.55671e-08 6.75L16 6.75L16 5.25L6.55671e-08 5.25L-6.55671e-08 6.75Z" fill="#002568"/>
                        </svg>
                    </a>
                </div>
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

    <!-- Books Section -->
    <section class="books-section" id="books-section">
        <div class="container">
            <div class="section__header">
                <h1 class="section__name">Учебные материалы</h1>
                <a href="#" class="section__header-link">
                    Все новости
                    <svg width="17" height="12" viewBox="0 0 17 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.5303 6.53033C16.8232 6.23744 16.8232 5.76256 16.5303 5.46967L11.7574 0.6967C11.4645 0.403807 10.9896 0.403807 10.6967 0.6967C10.4038 0.989593 10.4038 1.46447 10.6967 1.75736L14.9393 6L10.6967 10.2426C10.4038 10.5355 10.4038 11.0104 10.6967 11.3033C10.9896 11.5962 11.4645 11.5962 11.7574 11.3033L16.5303 6.53033ZM-6.55671e-08 6.75L16 6.75L16 5.25L6.55671e-08 5.25L-6.55671e-08 6.75Z" fill="#002568"/>
                    </svg>
                </a>
            </div>
            <div class="section__content">
                <div class="swiper booksSwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="swiper-img-block">
                                <img src="../img/img-books-section-1.png" alt="">
                            </div>
                            <div class="swiper-content-block">
                                <h3 class="swiper-content-name">Введение в человековедение</h3>
                                <p class="swiper-content-text">Человековедение; гуманитарные науки; содержание и методика..</p>
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
                                <img src="../img/img-books-section-2.png" alt="">
                            </div>
                            <div class="swiper-content-block">
                                <h3 class="swiper-content-name">Традиции и изменения</h3>
                                <p class="swiper-content-text">Человековедение; гуманитарные науки; содержание и методика..</p>
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
                                <img src="../img/img-books-section-3.png" alt="">
                            </div>
                            <div class="swiper-content-block">
                                <h3 class="swiper-content-name">Личность и общество</h3>
                                <p class="swiper-content-text">Человековедение; гуманитарные науки; содержание и методика...</p>
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
                                <img src="../img/img-books-section-4.png" alt="">
                            </div>
                            <div class="swiper-content-block">
                                <h3 class="swiper-content-name">Понимание искусства</h3>
                                <p class="swiper-content-text">Человековедение; гуманитарные науки; содержание и методика..</p>
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

    <!-- Partners Section -->
    <section class="partners-section" id="partners-section">
        <div class="container">
            <div class="section__header">
                <h1 class="section__name">Наши партнеры</h1>
            </div>
            <div class="section__content">
                <div class="swiper partnersSwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="swiper-img-block">
                                <img src="../img/img-partners-section-1.png" alt="">
                            </div>
                            <div class="swiper-content-block">
                                <h3 class="swiper-content-name">Таджикистан</h3>
                                <p class="swiper-content-text">Государство в Центральной Азии, расположенное в предгорьях Памира и не имеющее выхода к морю...</p>
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
                                <img src="../img/img-partners-section-2.png" alt="">
                            </div>
                            <div class="swiper-content-block">
                                <h3 class="swiper-content-name">Казахстан</h3>
                                <p class="swiper-content-text">Государство в центре Евразии, большая часть которого относится к Азии, меньшая - к Европе.</p>
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
                                <img src="../img/img-partners-section-3.png" alt="">
                            </div>
                            <div class="swiper-content-block">
                                <h3 class="swiper-content-name">Кыргызстан</h3>
                                <p class="swiper-content-text">Государство в Средней Азии, расположенное в западной и центральной части горной системы </p>
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
