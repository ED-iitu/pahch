@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    @if (isset($phones) && count($phones))
        <script>
            @foreach($phones as $selector)
            $('{{$selector}}').mask('+9(999)9999999');
            @endforeach
        </script>
    @endif
@endpush
