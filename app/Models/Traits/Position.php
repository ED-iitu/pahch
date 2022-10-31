<?php


namespace App\Models\Traits;


trait Position
{
    public function getLatestPosition(): int
    {
        if ($item = $this->orderBy('position', 'desc')->pluck('position')->first()) {
            return $item + 1;
        }
        return 1;
    }

    public static function scopePosition($builder){
        return $builder->orderBy('position', 'desc');
    }
}