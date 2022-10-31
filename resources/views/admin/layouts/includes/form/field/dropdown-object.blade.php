<option value="{{ $option->id }}" @if((old($attribute, (isset($entity)) ? $entity->{$attribute} : null) == $option->id) || (isset($multiple_selected) && in_array($option->id,$multiple_selected))) selected @endif>
    {{ (isset($display)) ? ___($option->{$display}) : ___($option->title) }}
</option>
