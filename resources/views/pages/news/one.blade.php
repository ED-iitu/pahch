@extends('layouts.app')

@section('content')
    <!-- Page Section -->
    <section class="page-section" id="page-section">
        <div class="container">
            <div class="page-header">
                <div class="page-path">
                    <ol>
                        <li><a href="#" class=""><span>Главная</span></a></li>
                        <li><a href="#" class=""><span>Все новости</span></a></li>
                        <li><a href="#" class="path-active"><span>Пересмотр учебной программы и перевод</span></a></li>
                    </ol>
                </div>
                <h1 class="page-name">{{$news->title}}</h1>
            </div>
            <div class="page-content">
                <article class="page-article no-aside">
                    <div class="page-content-image">
                        <div class="page-image-full type2">
                            <img src="{{$news->image}}" alt="">
                        </div>
                    </div>
                    <div class="page-content-text">
                        {!! $news->description !!}
                    </div>
                    <div class="page-content-image">
                        @foreach($news->sliders as $slider)
                        <div class="col-3">
                            <img src="{{$slider->link}}" alt="">
                        </div>
                        @endforeach
                    </div>
                </article>
            </div>
        </div>
    </section>

@endsection