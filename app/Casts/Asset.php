<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class Asset implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @param  string $key
     * @param  mixed $value
     * @param  array $attributes
     * @return string
     */

    public function get($model, string $key, $value, array $attributes)
    {
        if ($key === "poster" && !request()->is('*/edit') && empty($value)) {
            return asset($this->getDefaultImage());
        }
        if ($key === "preview" && !request()->is('*/edit') && empty($value)) {
            return asset("/img/no-preview.jpg");
        }
        return empty($value) ? $value : asset($value);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @param  string $key
     * @param  array $value
     * @param  array $attributes
     * @return mixed
     */
    public function set($model, string $key, $value, array $attributes)
    {
        return $value;
    }

    private function getDefaultImage(){
        return settings('default_image');
    }
}