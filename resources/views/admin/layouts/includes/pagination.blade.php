<div class="paginating-container pagination-default">
@if($paginator->count())
    @if ($paginator->hasPages())
        <!-- Paginator Begin -->
            <ul class="pagination">
                @foreach ($elements as $element)
                    @if (is_array($element))
                        <li class="prev {{ $paginator->onFirstPage() ? "is-disabled" : "" }}">
                            <a href="{{ $paginator->previousPageUrl() }}">«</a>
                        </li>
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="active">
                                    <a href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach
                        <li class="next {{ $paginator->hasMorePages() ? "" : "is-disabled" }}">
                            <a href="{{ $paginator->nextPageUrl() }}">»</a>
                        </li>
                    @endif
                @endforeach
            </ul><!--/. Paginator End -->
        @endif
    @endif
    @push('styles')
        <link href="{{ asset('panel/assets/css/elements/custom-pagination.css') }}" rel="stylesheet" type="text/css" />
@endpush