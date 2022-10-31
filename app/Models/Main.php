<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Main extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = [
        'about_text'
    ];

    protected $fillable = [
      'about_text'
    ];
}
