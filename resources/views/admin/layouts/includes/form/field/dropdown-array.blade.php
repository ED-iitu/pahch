<option value="{{ $key }}" @if(old($attribute, (isset($entity)) ? (is_array($entity) ? $entity[$attribute] : $entity->{$attribute}) : null) == $key) selected @endif>
    {{ ___($option) }}
</option>
