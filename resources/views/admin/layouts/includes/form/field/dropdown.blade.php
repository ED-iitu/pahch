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
    <select
            name="{{ $attribute }}" id="{{ str_replace("[]","",$attribute) }}"
            class="form-control"
            @if (isset($tabindex)) tabindex="{{ $tabindex }}" @endif
            @if (isset($disabled) && $disabled) disabled @endif
            @if (isset($required) && $required) required @endif
            @if (isset($autofocus) && $autofocus) autofocus @endif
            @if (isset($multiple) && $multiple) multiple @endif
    >
        @if(isset($placeholder))
        <option value="" selected>{{ (isset($placeholder)) ? ___($placeholder) : null }}</option>
        @endif
            @if(isset($set_default))
                <option value="">{{ (isset($set_default)) ? ___($set_default) : null }}</option>
            @endif
        @if(isset($options))
            @foreach($options as $key => $option)
            @include('admin.layouts.includes.form.field.dropdown-' . ((is_object($option)) ?  'object' : 'array'))
        @endforeach
            @endif
    </select>

    @include('admin.layouts.includes.form.error')
