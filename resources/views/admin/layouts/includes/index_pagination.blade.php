@if (count($entities))
    {{ $entities->appends(getNotEmptyQueryParameters())->links('layouts.includes.pagination') }}
@endif
