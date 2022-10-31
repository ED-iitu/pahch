@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css">
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
    <script>
        $.datetimepicker.setLocale('ru');

        @if (isset($dates) && count($dates))
        @foreach($dates as $selector)
        $('{{ $selector }}').datetimepicker({
            dayOfWeekStart: 1,
            timepicker: false,
            format: 'd.m.Y',
            mask: true,
        });

        if ($('{{ $selector }}').val() == '__.__.____') {
            $('{{ $selector }}').val('');
        }
        @endforeach
        @endif

        @if (isset($dates_crt) && count($dates_crt))
        @foreach($dates_crt as $selector)
        $('{{ $selector }}').datetimepicker({
            dayOfWeekStart: 1,
            timepicker: false,
            format: 'd.m.Y',
            mask: true,
            allowBlank: true
            @if ( ! isset($update) || $update == false)
            , minDate: 0
            @endif
        });

        if ($('{{ $selector }}').val() == '__.__.____') {
            $('{{ $selector }}').val('');
        }
        @endforeach
        @endif

        @if (isset($times) &&count($times))
        @foreach($times as $selector)
        var setMin = function( currentDateTime ){
            this.setOptions({
                minDate:new Date()
            });
            this.setOptions({
                minTime: new Date()
            });
        };
        $('{{ $selector }}').datetimepicker({
            datepicker: false,
            format: 'H:i',
            mask: true,
            step: 5,
            onShow:setMin
        });

        if ($('{{ $selector }}').val() == '__:__') {
            $('{{ $selector }}').val('');
        }
        @endforeach
        @endif
    </script>
@endpush
