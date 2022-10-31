
    @if (isset($label))
        <label for="{{ $attribute }}">
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
    <textarea
            class="form-control"
            name="{{ $attribute }}" id="{{ $attribute }}" rows="{{ $rows ?? '3' }}"
            @if (isset($placeholder)) placeholder="{{ $placeholder }}" @endif
            @if (isset($tabindex)) tabindex="{{ $tabindex }}" @endif
            @if (isset($required) && $required) required @endif
            @if (isset($disabled) && $disabled) disabled @endif
            @if (isset($autofocus) && $autofocus) autofocus @endif
            @if (isset($add)) {{ $add }} @endif
    >{{ old($attribute, (isset($entity)) ? $entity->{$attribute} : null) }}</textarea>

    @include('admin.layouts.includes.form.error')
