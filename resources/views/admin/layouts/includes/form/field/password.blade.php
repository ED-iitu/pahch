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
            class="form-control"
            type="password" name="{{ $attribute }}" id="{{ $attribute }}"
            value=""
            @if (isset($placeholder)) placeholder="{{ $placeholder }}" @endif
            @if (isset($tabindex)) tabindex="{{ $tabindex }}" @endif
            @if (isset($disabled) && $disabled) disabled @endif
            @if (isset($required) && $required) required @endif
            @if (isset($autofocus) && $autofocus) autofocus @endif
    />

    @if (isset($entity))
        <input type="hidden" name="{{ "old_{$attribute}" }}" value="{{ $entity->$attribute }}"/>
    @endif

    @include('admin.layouts.includes.form.error')
