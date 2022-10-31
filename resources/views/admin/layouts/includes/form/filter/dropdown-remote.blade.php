<select
  name="{{ $name }}"
  @if (isset($id)) id="{{ $id }}" @endif
  class="{{ $class }}"
  @if (isset($tabindex)) tabindex="{{ $tabindex }}" @endif
  @if (isset($required) && $required) required @endif
  @if (isset($autofocus) && $autofocus) autofocus @endif
  @if (isset($attributes))
    @foreach($attributes as $attribute)
      {{ $attribute }}="{{ $attribute }}"
    @endforeach
  @endif
  @if (isset($placeholder)) placeholder="{{ $placeholder }}" @endif
  >
</select>