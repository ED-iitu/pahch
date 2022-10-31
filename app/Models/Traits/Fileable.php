<?php


namespace App\Models\Traits;

use App\Models\Slider;
use App\Models\File;

trait Fileable
{
    public function files(){
        return $this->morphMany(File::class,'entity');
    }

    public function sliders()
    {
        return $this->morphMany(Slider::class, 'entity');
    }
}