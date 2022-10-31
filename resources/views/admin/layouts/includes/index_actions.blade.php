@if (isset($globals['create_url']) && !empty($globals['create_url']))
        <div class="mb-4 mt-4">
            <a class="btn btn-success float-left" style="margin:15px" href="{{ $globals['create_url'] }}">{{ __('Добавить') }}</a>
        </div>
        <div class="clearfix"></div>
@endif

