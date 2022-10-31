<div class="action">
    <div class="gr-12">
        <button type="submit" class="btn is-primary" id="submit-{{ (isset($entity) && $entity->id) ? 'update' : 'create' }}">
            @if (isset($label))
                {{ $label }}
            @else
                {{ (isset($entity)) ? ___('Обновить') : __('Добавить') }} {{ __('запись') }}
            @endif
        </button>

        <span class="btn-between">{{ __('или') }}</span>
         <a href="{{ \URL::previous() }}" class="btn is-small">{{ __('Отменить') }}</a>
    </div>
</div>
