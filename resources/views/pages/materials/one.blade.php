@extends('layouts.app')

@section('content')

<!-- Page Section -->
<section class="page-section" id="page-section">
    <div class="container">
        <div class="page-header">
            <div class="page-path">
                <ol>
                    <li><a href="#" class=""><span>Главная</span></a></li>
                    <li><a href="#" class=""><span>Учебные материалы</span></a></li>
                    <li><a href="#" class="path-active"><span>Понимание искусства</span></a></li>
                </ol>
            </div>
            <!-- <h1 class="page-name">Учебные материалы</h1> -->
        </div>
        <div class="page-content">
            <article class="page-article no-aside">
                <div class="edu-materials-book">
                    <div class="edu-materials-book-info">
                        <div class="edu-materials-book-left">
                            <div class="edu-materials-book-img">
                                <img src="../img/img-books-section-1.png" alt="" class="">
                            </div>
                            <a href="../docs/testing-file.epub" download>
                                <img src="../img/icons/ic-download-file-epub.png" alt="">
                                Понимание искусства
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.0002 1.20001V14.8889M10.0002 14.8889L7.06686 11.9556M10.0002 14.8889L12.9335 11.9556M6.08908 8.04446H3.15575C2.07531 8.04446 1.2002 8.91957 1.2002 10V16.8445C1.2002 17.9249 2.07531 18.8 3.15575 18.8H16.8446C17.9251 18.8 18.8002 17.9249 18.8002 16.8445V10C18.8002 8.91957 17.9251 8.04446 16.8446 8.04446H13.9113" stroke="#002568" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>
                        <div class="edu-materials-book-content">
                            <div class="edu-materials-book-name page-name">Понимание искусства</div>
                            <div class="edu-materials-book-text">
                                <p>Искусство — это способ понимания и отображения действительности путем создания особого продукта — произведений, способных вызвать эмоциональный отклик у людей.</p>
                                <p>Наряду с наукой, искусство используется человечеством для правильного восприятия и осмысления окружающего мира. </p>
                                <p>Наряду с наукой, искусство используется человечеством для правильного восприятия и осмысления окружающего мира.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
            <!-- <aside class="page-aside">
              <div>
              </div>
            </aside> -->
        </div>
    </div>
</section>

<section class="page-other-section">
    <div class="container">
        <div class="page-multimedia">
            <div class="page-multimedia-video">
                <div class="page-multimedia-video-frame">
                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/bYwYFT1CRWU" title="University of Central Asia Graduation Ceremony - Class of 2022" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <p>Видео-лекция на тему «Понимание искусства»</p>
            </div>
            <div class="page-multimedia-audio">
                <audio src="../audio/mocart_-_lacrimosa.mp3" controls></audio>
            </div>
        </div>
    </div>
</section>

@endsection