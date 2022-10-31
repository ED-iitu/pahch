<label class="col-xl-6 col-sm-6 col-sm-6 col-form-label">{{ __($label) }} </label>
    <div class="col-xl-4 col-lg-4 col-sm-4">
        <input type="checkbox" {{ isset($entity) ? ($entity->{$attribute} ? 'checked' : '') : '' }} data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="{{ isset($data_on) ? __($data_on) : __('Да') }}" data-off="{{ isset($data_off) ? __($data_off) : __('Нет') }}" value="1"
           id="{{ $attribute }}" name="{{ $attribute }}" type="checkbox" disable-filter
           @if(isset($checked) && $checked) checked @endif
           @if (isset($tabindex)) tabindex="{{ $tabindex }}" @endif
           @if (isset($disabled) && $disabled) disabled @endif
           @if (isset($required) && $required) required @endif
           @if (isset($autofocus) && $autofocus) autofocus @endif
           @if (isset($checked) && $checked) checked @endif
    >
   </div>
   @once
 @push('styles')
     <link href="{{ asset('panel/assets/js/toggleButton/bootstrap-toggle.min.css') }}" rel="stylesheet">
 @endpush
 @push('scripts')
     <script src="{{ asset('panel/assets/js/toggleButton/bootstrap-toggle.min.js') }}"></script>
 @endpush
 @endonce