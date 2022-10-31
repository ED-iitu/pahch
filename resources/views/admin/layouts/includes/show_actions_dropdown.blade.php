@if (!isset($edit) || $edit != false)
    <a class="dropdown-item btn-success"
       href="{{ route("{$globals['entity']}.edit",isset($globals['parent']) ? array_merge($globals['parent'],getClassName($entity)) : $entity) }}">{{ ___('Изменить') }}</a>
@endif
@if (!isset($delete) || $delete != false)
    <form method="post"
          action="{{ route("{$globals['entity']}.destroy",isset($globals['parent']) ? array_merge($globals['parent'],getClassName($entity)) : $entity) }}"
          style="display: inline-block;width: 100%">
        @csrf @method('DELETE')
        <a class="dropdown-item js-is-destroy btn-danger" href="javascript:void(0)">{{ ___('Удалить') }}</a>
    </form>
    @once
        @push('after-scripts')
            <style>
                .dropdown:not(.custom-dropdown-icon) .dropdown-menu a.dropdown-item:hover {
                    background-color: #7e7a7a;
                }
                .dropdown-item{
                    margin-bottom: 3px!important;
                }
                .table-hover:not(.table-dark) tbody tr:hover{
                    transform: initial;
                }
            </style>
            @endpush
    @push('scripts')
        <script>
            $(".js-is-destroy").on("click", function (e) {
                e.preventDefault();
                if (confirm("{{ ___('Вы действительно хотите удалить эту запись?') }}")) {
                    $(this).closest('form').submit();
                }else{
                    return
                }
            });
        </script>
    @endpush
    @endonce
@endif

