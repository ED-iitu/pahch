<div class="dropdown">
    <a style="z-index: 1!important;" class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink2" style="will-change: transform;z-index:99999999">
        @if(!request()->has('is_suspicious'))
        <a class="dropdown-item btn-warning" href="{{ route('admin.users.courses',$entity) }}">{{ ___('Курсы') }}</a>
        @if(settings('modules_enabled_tests'))
            <a class="dropdown-item btn-warning" href="{{ route('admin.users.tests',$entity) }}">{{ ___('Тесты') }}</a>
        @endif
        @if(settings('modules_enabled_tasks'))
            <a class="dropdown-item btn-warning" href="{{ route('admin.users.tasks',$entity) }}">{{ ___('Задании') }}</a>
        @endif
        @if(settings('modules_enabled_journals'))
            <a class="dropdown-item btn-warning" href="{{ route('admin.users.journals',$entity) }}">{{ ___('Журналы') }}</a>
        @endif
        @if(settings('enable_redesign'))
            <a class="dropdown-item btn-info" target="_blank" href="/profile/{{ $entity->id }}/progress">{{ ___('Прогресс') }}</a>
        @endif
        @if(settings('modules_enabled_bonus'))
            <a data-bonuses="{{ $entity->bonuses }}" style="background: #5c1ac3" data-id="{{ $entity->id }}" data-name="{{ $entity->name }}" data-avatar="{{ $entity->avatar }}" type="button" class="openProfileModal dropdown-item btn-danger" data-toggle="modal" data-target="#profileModal">
                {{ ___('Бонусы') }}
            </a>
        @endif
        @endif
        @if($entity->is_blocked)
            <a class="dropdown-item btn-default" href="{{ route('admin.users.unblock',$entity) }}">{{ ___('Разблокировать') }}</a>
        @else
            <a class="dropdown-item btn-danger" href="{{ route('admin.users.block',$entity) }}">{{ ___('Заблокировать') }}</a>
        @endif

        @if(!request()->has('is_suspicious'))
        @include('admin.layouts.includes.show_actions_dropdown')
            @endif
    </div>
</div>