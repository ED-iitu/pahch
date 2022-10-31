@if (!isset($edit) || $edit != false)
    <a class="btn btn-success"
       href="{{ route("{$globals['entity']}.edit",isset($globals['parent']) ? array_merge($globals['parent'],getClassName($entity)) : $entity) }}">{{ ___('Изменить') }}</a>
@endif
@if (!isset($delete) || $delete != false)
    <form method="post"
          action="{{ route("{$globals['entity']}.destroy",isset($globals['parent']) ? array_merge($globals['parent'],getClassName($entity)) : $entity) }}"
          style="display: inline-block">
        @csrf @method('DELETE')
        <a class="btn btn-danger js-is-destroy" href="javascript:void(0)">{{ ___('Удалить') }}</a>
    </form>
    @once
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

