@if(isset($errors) && !is_array($errors) && $errors)
@if ($errors->has($attribute))
    <div class="help">
        <span>{{ $errors->first($attribute) }}</span>
    </div>
@endif
@endif
