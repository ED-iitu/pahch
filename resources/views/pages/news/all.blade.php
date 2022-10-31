@extends('layouts.app')

@section('content')
    <section class="page-section" id="page-section">
        <div class="container">
            <div class="page-header">
                <div class="page-path">
                    <ol>
                        <li><a href="#" class=""><span>Главная</span></a></li>
                        <li><a href="#" class="path-active"><span>Все новости</span></a></li>
                    </ol>
                </div>
                <h1 class="page-name">Новости</h1>
            </div>
            <div class="page-content">
                <article class="page-article no-aside">
                    <div class="page-card -news">
                        @foreach($entities as $entity)
                        <div class="page-card-items">
                            <div class="page-card-image">
                                <img src="{{$entity->image}}" alt="">
                            </div>
                            <div class="page-card-info">
                                <h3 class="page-card-name">{{$entity->title}}</h3>
                                <p class="page-card-subname">{{$entity->description}}</p>
                                <a href="{{route('newsOne', $entity)}}" class="page-card-link">
                                    Подробнее
                                    <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.5303 7.03033C16.8232 6.73744 16.8232 6.26256 16.5303 5.96967L11.7574 1.1967C11.4645 0.903807 10.9896 0.903807 10.6967 1.1967C10.4038 1.48959 10.4038 1.96447 10.6967 2.25736L14.9393 6.5L10.6967 10.7426C10.4038 11.0355 10.4038 11.5104 10.6967 11.8033C10.9896 12.0962 11.4645 12.0962 11.7574 11.8033L16.5303 7.03033ZM-6.55671e-08 7.25L16 7.25L16 5.75L6.55671e-08 5.75L-6.55671e-08 7.25Z" fill="#002568"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    {{$entities->links()}}
                </article>
            </div>
        </div>
    </section>
@endsection