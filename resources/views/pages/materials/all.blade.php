@extends('layouts.app')

@section('content')
    <!-- Page Section -->
    <section class="page-section" id="page-section">
        <div class="container">
            <div class="page-header">
                <div class="page-path">
                    <ol>
                        <li><a href="#" class=""><span>Главная</span></a></li>
                        <li><a href="#" class="path-active"><span>Учебные материалы</span></a></li>
                    </ol>
                </div>
                <h1 class="page-name">Учебные материалы</h1>
            </div>
            <div class="page-content">
                <article class="page-article no-aside">
                    <div class="page-card -edu-materials">
                        <div class="page-card-items">
                            @foreach($entities as $entity)
                                <div id="area">
                                    <a id="prev" href="#prev" class="arrow">‹</a>
                                    <a id="next" href="#next" class="arrow">›</a>
                                </div>
                            <div id="epubLink">{{$entity->files[0]->link}}</div>
                            <div class="page-card-image">
                                <img src="{{$entity->poster}}" alt="">
                            </div>
                            <a href="{{route('materialOne', $entity)}}" class="page-card-info">
                                <h3 class="page-card-name">{{$entity->title}}</h3>
                                <p class="page-card-subname">{!! $entity->description !!}.</p>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.5/jszip.min.js"></script>

    <script>
        var link = document.getElementById('epubLink')
        var book = ePub("https://s3.amazonaws.com/epubjs/books/alice.epub");
        var rendition = book.renderTo("area", { flow: "paginated", width: "900", height: "600" });
        var displayed = rendition.display();

        next.addEventListener("click", function(e){
            book.package.metadata.direction === "rtl" ? rendition.prev() : rendition.next();
            e.preventDefault();
        }, false);

        var prev = document.getElementById("prev");
        prev.addEventListener("click", function(e){
            book.package.metadata.direction === "rtl" ? rendition.next() : rendition.prev();
            e.preventDefault();
        }, false);
    </script>

@endsection