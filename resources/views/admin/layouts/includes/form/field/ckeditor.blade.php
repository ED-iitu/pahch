
@if (isset($label))
    <label for="{{ $attribute }}" style="width: 100%">
            <span>
                {{ __($label) }}

                @if (isset($required) && $required == true)
                    <strong>*</strong>
                @endif
            </span>

        @if (isset($helper))
            <span class="is-details">
                    {!! __($helper) !!}
                </span>
        @endif
    </label>
@endif
@if(isset($originName))
    <textarea
            class="form-control"
            id="{{ $attribute }}"
            style="width: 100%;display: block"
            name="{{ $attribute }}" id="{{ $attribute }}" rows="{{ $rows ?? '3' }}"
            @if (isset($placeholder)) placeholder="{{ $placeholder }}" @endif
            @if (isset($tabindex)) tabindex="{{ $tabindex }}" @endif
            @if (isset($required) && $required) @endif
            @if (isset($disabled) && $disabled) disabled @endif
    @if (isset($add)) {{ $add }} @endif
    >{{ old($attribute, $originName) }}</textarea>
@else
<textarea
        class="form-control"
        id="{{ $attribute }}"
        style="width: 100%;display: block"
        name="{{ $attribute }}" id="{{ $attribute }}" rows="{{ $rows ?? '3' }}"
        @if (isset($placeholder)) placeholder="{{ $placeholder }}" @endif
        @if (isset($tabindex)) tabindex="{{ $tabindex }}" @endif
        @if (isset($required) && $required) @endif
        @if (isset($disabled) && $disabled) disabled @endif
@if (isset($add)) {{ $add }} @endif
    >{{ old($attribute, (isset($entity)) ? $entity->{$attribute} : null) }}</textarea>
@endif
@include('admin.layouts.includes.form.error')
@once
@push('head-scripts')
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
@endpush
@endonce
    @push('scripts')
        <script>
            CKEDITOR.replace('{{$attribute}}',{
                language: 'ru',
                height: 200,
                width: '100%',
                display: 'block',
                filebrowserUploadUrl: "/admin/upload?bugfix=true",
                mathJaxLib: '//cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML',
                removePlugins: 'exportpdf'
            });
        </script>
@endpush