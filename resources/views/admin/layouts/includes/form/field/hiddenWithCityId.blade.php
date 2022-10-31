<input
        type="hidden" name="{{ $attribute }}" id="{{ $attribute }}"
        value="{{ $attribute === 'city_id' ? session()->get('location.id') : session()->get('location.country_id')  }}"
/>
