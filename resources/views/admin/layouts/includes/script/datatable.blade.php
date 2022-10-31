@once
    @push('styles')
        <link rel="stylesheet" type="text/css" href="{{ asset('panel/plugins/table/datatable/datatables.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('panel/plugins/table/datatable/dt-global_style.css') }}">
    @endpush
    @push('scripts')
        <script src="{{ asset('panel/plugins/table/datatable/datatables.js') }}"></script>
        <script src="{{ asset('https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js') }}"></script>
    @endpush
@endonce
@if(isset($reorder))
    <link rel="stylesheet" type="text/css"
          href="{{ asset('https://cdn.datatables.net/rowreorder/1.2.7/css/rowReorder.dataTables.min.css') }}">
@endif
@push('scripts')
    <script>
        var datatable = $('#zero-config').DataTable({
            rowReorder: {{ isset($reorder) ? (string) $reorder : 'false' }},
            paging: {{ isset($pagination) ? (string) $pagination : 'false' }},
            searching: {{ isset($search) ? (string) $search : 'false' }},
            "bInfo": {{ isset($pagination) ? (string) $pagination : 'false' }},
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "{{ __('Страница _PAGE_ из _PAGES_') }}",
                "sInfoEmpty": "{{ __('Страница 0 из 0') }}",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "{{ __('Поиск...') }}",
                "sLengthMenu": "{{ __('Показать :  _MENU_') }}",
            },
            "stripeClasses": [],
            "lengthMenu": [30, 60, 90, 120],
            "pageLength": 30,
        });
    </script>
    @if(isset($reorder))
        <script>
            // $reorder_state_url is required variable, if reorder enabled. Even crash :/
            var reorder_state_url = "{{ $reorder_state_url }}";
            datatable.on("row-reordered", function (e, diff, edit) {
                var actual_rowData = $(e.target).closest('table').find("tbody tr");
                let rowdata = [];
                let _pos = 1;
                for (let data of actual_rowData) {
                    let pos = parseInt($(data).find('[data-position]').text().trim());
                    pos = _pos
                    rowdata.push({
                        id: parseInt($(data).attr('data-id')),
                        pos: pos,
                    });
                    _pos++;
                }
                $.post(reorder_state_url, {data: rowdata}).done(function () {
                    Snackbar.show({
                        text: '{{ __('Данные успешно обновлены') }}',
                        actionTextColor: '#fff',
                        backgroundColor: '#8dbf42'
                    });
                }).fail(function () {
                    Snackbar.show({
                        text: '{{ __('Не удалось обновить данные') }}',
                        actionTextColor: '#fff',
                        backgroundColor: '#e7515a'
                    });
                });
            });
        </script>
    @endif
@endpush
