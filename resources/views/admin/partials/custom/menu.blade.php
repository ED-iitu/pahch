<ul class="list-unstyled menu-categories" id="accordionExample">
    <li class="menu">
        <a href="#universities" data-toggle="collapse" aria-expanded="false" class="{{ $accordion['class'] }}">
            <div class="">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                <span>{{ ___('Учебные заведения') }}</span>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </div>
        </a>
        <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled {{ $accordion['show'] }}" id="universities" data-parent="#accordionExample">
            <li {{ isActive($globals['entity'] === "admin.university") }}>
                <a href="{{ route('admin.university.index') }}">{{ ___('Учебные заведения') }}</a>
            </li>
            <li {{ isActive($globals['entity'] === "admin.subject.index") }}>
                <a href="{{ route('admin.subject.index') }}">{{ ___('Предметы') }}</a>
            </li>
            <li {{ isActive($globals['entity'] === "admin.faculty.index") }}>
                <a href="{{ route('admin.faculty.index') }}">{{ ___('Факультеты') }}</a>
            </li>
            <li {{ isActive($globals['entity'] === "admin.speciality.index") }}>
                <a href="{{ route('admin.speciality.index') }}">{{ ___('Специальности') }}</a>
            </li>
        </ul>
    </li>

    <li class="menu">
        <a href="#feed" data-toggle="collapse" aria-expanded="false" class="{{ $accordion['class'] }}">
            <div class="">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                <span>{{ ___('Новостная лента') }}</span>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </div>
        </a>
        <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled {{ $accordion['show'] }}" id="feed" data-parent="#accordionExample">
            <li {{ isActive($globals['entity'] === "admin.feed") }}>
                <a href="{{ route('admin.feed.index') }}">{{ ___('Лента') }}</a>
            </li>
            <li {{ isActive($globals['entity'] === "admin.category") }}>
                <a href="{{ route('admin.category.index') }}">{{ ___('Категории') }}</a>
            </li>
            <li {{ isActive($globals['entity'] === "admin.request.index") }}>
                <a href="{{ route('admin.request.index') }}">{{ ___('Заявки от пользователей') }}</a>
            </li>
        </ul>
    </li>

    <li class="menu">
        <a href="#plan" data-toggle="collapse" aria-expanded="false" class="{{ $accordion['class'] }}">
            <div class="">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                <span>{{ ___('Подготовительный план') }}</span>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </div>
        </a>
        <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled {{ $accordion['show'] }}" id="plan" data-parent="#accordionExample">
            <li {{ isActive($globals['entity'] === "admin.plan.index") }}>
                <a href="{{ route('admin.plan.index') }}">{{ ___('Подготовительный план') }}</a>
            </li>
        </ul>
    </li>

    <li class="menu">
        <a href="#analyze" data-toggle="collapse" aria-expanded="false" class="{{ $accordion['class'] }}">
            <div class="">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                <span>{{ ___('Анализ') }}</span>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </div>
        </a>
        <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled {{ $accordion['show'] }}" id="analyze" data-parent="#accordionExample">
            <li {{ isActive($globals['entity'] === "admin.flow_statistic.index") }}>
                <a href="{{ route('admin.flow_statistic.index') }}">{{ ___('Статистика по потоку') }}</a>
            </li>
        </ul>
    </li>
</ul>
