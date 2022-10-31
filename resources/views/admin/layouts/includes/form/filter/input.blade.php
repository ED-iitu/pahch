@if (isset($label))
    <label for="{{ $attribute }}">
            <span>
                {{ ___($label) }}

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

<input
        type="{{ isset($type) ? $type : 'text' }}" name="{{ $attribute }}" id="{{ $attribute }}"
        value="{{ (isset($_GET[$attribute])) ? $_GET[$attribute] : null }}{{ $value ?? null }}"
        @if (isset($placeholder)) placeholder="{{ $placeholder }}" @endif
        @if (isset($tabindex)) tabindex="{{ $tabindex }}" @endif
        @if (isset($disabled) && $disabled) disabled @endif
        @if (isset($required) && $required) required @endif
        @if (isset($autofocus) && $autofocus) autofocus @endif
        @if (isset($readonly) && $readonly) readonly @endif
        @if (isset($class)) class="{{$class}}" @endif
        data-index="0"
/>