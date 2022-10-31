@if (isset($label))
    <label for="{{ $attribute }}"
           class="@if(isset($label_class)){{ $label_class }}@else col-xl-2 col-sm-3 col-sm-2 col-form-label @endif">
            <span>
                {{ __($label) }}

                @if (isset($required) && $required == true)
                    <strong>*</strong>
                @endif
            </span>

        @if (isset($helper))
            <span class="is-details">
                    {!! ___($helper) !!}
                </span>
        @endif
    </label>
@endif
<div class="@if(isset($attribute_class)){{ $attribute_class }}@else col-xl-10 col-lg-9 col-sm-10 @endif">
    @if(isset($originName))
        <input
                class="form-control"
                type="{{ isset($type) ? $type : 'text' }}" name="{{ $attribute }}" id="{{ $attribute }}"
                value="{{ old($originName, (isset($entity)) ? $originName: null) }}"
                @if (isset($placeholder)) placeholder="{{ $placeholder }}" @endif
                @if (isset($tabindex)) tabindex="{{ $tabindex }}" @endif
                @if (isset($disabled) && $disabled) disabled @endif
                @if (isset($required) && $required) required @endif
                @if (isset($autofocus) && $autofocus) autofocus @endif
                @if (isset($step)) step="{{ $step }}" @endif
                autocomplete="off"/>
    @else


    <input
        class="form-control"
        type="{{ isset($type) ? $type : 'text' }}" name="{{ $attribute }}" id="{{ $attribute }}"
        value="{{ old($attribute, (isset($entity)) ? $entity->{$attribute} : null) }}"
        @if (isset($placeholder)) placeholder="{{ $placeholder }}" @endif
        @if (isset($tabindex)) tabindex="{{ $tabindex }}" @endif
        @if (isset($disabled) && $disabled) disabled @endif
        @if (isset($required) && $required) required @endif
        @if (isset($autofocus) && $autofocus) autofocus @endif
        @if (isset($step)) step="{{ $step }}" @endif
        autocomplete="off"/>

    @endif
</div>
@include('admin.layouts.includes.form.error')

@if(isset($mask))
    @once
    @push('scripts')
        <script src="{{ asset('panel/plugins/input-mask/jquery.inputmask.bundle.min.js') }}"></script>
    @endpush
    @endonce
    @push('scripts')
        <script>
            $('[name="{{ $attribute }}"]').inputmask("{{$mask}}");
        </script>
    @endpush

@endif
