<?php

namespace App\Models;

use App\Filesystem\File;
use App\Filesystem\Source;
use App\Filesystem\Validator\FileValidator;
use App\Filesystem\Validator\ImageValidator;
use App\Models\Traits\Fileable;
use App\Models\Traits\FileInfo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class News extends Model
{
    use HasFactory, Fileable, FileInfo, HasTranslations;

    public $translatable = [
        'title', 'description'
    ];

    protected $fillable = [
        'title', 'image', 'description'
    ];

    protected $with = [
        'sliders'
    ];

    protected static function booted()
    {
        static::creating(function (News $news) {
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

        static::updating(function ($news) {
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
