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
    <script>
        $("[name=date_at]").on("change",function () {
            let val = (($(this).val().split("_").join("")).split(".").reverse()).join("-");
            if(val.length >= 10){
                var selectedDate = Date.parse(val);
                var now = new Date(new Date().toDateString());
                if (selectedDate < now) {
                    $(this).val(('0' + now.getDate()).slice(-2)+'.'+('0' + (now.getMonth()+1)).slice(-2)+'.'+now.getFullYear());
                }
            }
        });
        $("[name=time_at]").on("change",function () {
            let val = $(this).val().split(":").join("").split("_").join("");
            if(val.length >= 4){
                let time = $(this).val().split(":");
                var selectedDate = new Date().setHours(time[0],time[1]);
                let date = (($("[name=date_at]").val().split("_").join("")).split(".").reverse()).join("-");
                if(date.length >= 10){
                    selectedDate = (new Date(date)).setHours(time[0],time[1]);
                }
                var now = new Date();
                if (selectedDate < now) {
                    $(this).val(now.getHours()+':'+ ('0' + now.getMinutes()).slice(-2));
                }
            }
        });
    </script>
@endpush
