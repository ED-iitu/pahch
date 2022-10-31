    <input
            id="{{ $attribute }}" name="{{ $attribute }}" type="checkbox" disable-filter
            @if(isset($checked) && $checked) checked @endif
            @if (isset($tabindex)) tabindex="{{ $tabindex }}" @endif
            @if (isset($disabled) && $disabled) disabled @endif
            @if (isset($required) && $required) required @endif
            @if (isset($autofocus) && $autofocus) autofocus @endif
    >
