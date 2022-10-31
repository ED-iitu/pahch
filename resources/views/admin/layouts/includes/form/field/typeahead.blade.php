<div class="field @if ($errors->has($attribute)) is-invalidate @endif">
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
            type="{{ isset($type) ? $type : 'text' }}" name="{{ $attribute }}" id="{{ $attribute }}" class="typeahead"
            @if (isset($forceValue))
            value="{{ $forceValue }}"
            @else
            value="{{ old($attribute, (isset($entity)) ? $entity->{$attribute} : @$value) }}"
            @endif
            typeahead-append-to-body="true"
            @if (isset($placeholder)) placeholder="{{ $placeholder }}" @endif
            @if (isset($tabindex)) tabindex="{{ $tabindex }}" @endif
            @if (isset($disabled) && $disabled) disabled @endif
            @if (isset($required) && $required) required @endif
            @if (isset($autofocus) && $autofocus) autofocus @endif
    />

    @include('layouts.includes.form.error')
</div>
