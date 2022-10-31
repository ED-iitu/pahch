    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/admin" title="Админка">Админка</a>
                </li>
            @if(!empty($globals['breadcrumbs']))
                @foreach($globals['breadcrumbs'] as $breadcrumb)
                <li class="breadcrumb-item">
                    <a href="" title="{{$breadcrumb['title']}}">{{ $breadcrumb['title']}}</a>
                </li>
                @endforeach
            @endif
            @if(!empty($globals['title'] && !empty($globals['global_title'])) && ($globals['title'] !== $globals['global_title']))
                <li class="breadcrumb-item">
                    <a href="{{ $globals['index'] }}" title="{{$globals['global_title'] }}">{{ $globals['global_title'] }}</a>
                </li>
                @endif
            <li class="breadcrumb-item active" aria-current="page">{{ $globals['title']}}</li>
        </ol>
    </nav>

