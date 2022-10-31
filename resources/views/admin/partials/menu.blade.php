<ul class="list-unstyled menu-categories" id="accordionExample">
    @php $accordion = isAccordionActive([$globals['entity'],$globals['section']],["admin.home","admin.reports.sales","admin.reports.index"]); @endphp
    <li class="menu">
        <a href="#analytics" data-toggle="collapse" aria-expanded="{{ $accordion['expanded'] }}" class="{{ $accordion['class'] }}">
            <div class="">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                <span>{{ __('Отчеты') }}</span>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </div>
        </a>
        <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled {{ $accordion['show'] }}" id="analytics" data-parent="#accordionExample">
            <li {{ isActive($globals['entity'] === "admin.home") }}>
                <a href="{{ route('admin.home') }}">{{ __('Аналитика') }}</a>
            </li>
        </ul>
    </li>
    @php $accordion = isAccordionActive([$globals['entity'],$globals['section']],["admin.news", "admin.main", "admin.partners", 'admin.employees', 'admin.materials']); @endphp
    <li class="menu">
        <a href="#pages" data-toggle="collapse" aria-expanded="{{ $accordion['expanded'] }}" class="{{ $accordion['class'] }}">
            <div class="">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                <span>{{ __('Старницы') }}</span>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </div>
        </a>
        <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled {{ $accordion['show'] }}" id="pages" data-parent="#accordionExample">
            <li {{ isActive($globals['entity'] === "admin.main") }}>
                <a href="{{ route('admin.main.index') }}">{{ __('Главная') }}</a>
            </li>
            <li {{ isActive($globals['entity'] === "admin.news") }}>
                <a href="{{ route('admin.news.index') }}">{{ __('Новости') }}</a>
            </li>
            <li {{ isActive($globals['entity'] === "admin.partners") }}>
                <a href="{{ route('admin.partners.index') }}">{{ __('Партнеры') }}</a>
            </li>
            <li {{ isActive($globals['entity'] === "admin.materials") }}>
                <a href="{{ route('admin.materials.index') }}">{{ __('Материалы') }}</a>
            </li>
            <li {{ isActive($globals['entity'] === "admin.employees") }}>
                <a href="{{ route('admin.employees.index') }}">{{ __('Сотрудники') }}</a>
            </li>
        </ul>
    </li>
</ul>