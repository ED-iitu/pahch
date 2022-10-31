@if ($paginator->hasPages())
    <div class="page-control-panel">
        @if ($paginator->onFirstPage())
            <a href="#" class="page-pag-prev-btn">
                Назад
            </a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="page-pag-prev-btn">
                Назад
            </a>
        @endif

        <div class="page-pagination">
            @foreach ($elements as $element)

                @if (is_string($element))
                    <li class="disabled"><span>{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a href="#" class="page-pag-number page-active">{{$page}}</a>
                        @else
                            <a href="{{$url}}" class="page-pag-number">{{$page}}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="page-pag-next-btn">
                    Вперед
                </a>
        @else
            <a href="#" class="page-pag-next-btn">
                Вперед
            </a>
        @endif
    </div>
@endif
