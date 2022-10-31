<?php

namespace App\Models;

use App\Filesystem\Validator\ImageValidator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Filesystem\File;
use App\Filesystem\Source;


class Partner extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = [
        'name', 'description'
    ];

    protected $fillable = [
        'name', 'image', 'description'
    ];

    protected static function booted()
    {
        static::creating(function (Partner $news) {
            if (request()->hasFile('image')) {
                $validator = (new ImageValidator(['image']));
                $image = (new File(new Source('image')))->load('image')->validate($validator)->save();
                if (!$image->failed) {
                    $news->image = $image->getStoredPath();
                } else {
                    unset($news->image);
                }
            }
        });

        static::updating(function (Partner $news) {
            if (request()->hasFile('image')) {
                $validator = (new ImageValidator(['image']));
                $image = (new File(new Source('image')))->load('image')->validate($validator)->save();
                if (!$image->failed) {
                    $news->image = $image->getStoredPath();
                } else {
                    unset($news->image);
                }
            }
        });
    }
}
