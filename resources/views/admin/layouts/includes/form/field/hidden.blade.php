<input
        type="hidden" name="{{ $attribute }}" id="{{ $attribute }}"
        @if (isset($forceValue)) value="{{ $forceValue }}" @else  value="{{ (isset($entity)) ? $entity->{$attribute} : @$value }}" @endif
/>
