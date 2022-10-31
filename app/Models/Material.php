<?php

namespace App\Models;

use App\Filesystem\File;
use App\Filesystem\Source;
use App\Filesystem\Validator\ImageValidator;
use App\Models\Traits\Fileable;
use App\Models\Traits\FileInfo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Material extends Model
{
    use HasFactory, Fileable, FileInfo, HasTranslations;

    public $translatable = [
        'title', 'description'
    ];

    protected $fillable = [
        'poster', 'title', 'description', 'video_links', 'file'
    ];

    protected $with = [
        'files'
    ];

    protected static function booted()
    {
        static::creating(function (Material $material) {
            if (request()->hasFile('poster')) {
                $validator = (new ImageValidator(['poster']));
                $image = (new File(new Source('image')))->load('poster')->validate($validator)->save();
                if (!$image->failed) {
                    $material->poster = $image->getStoredPath();
                } else {
                    unset($material->poster);
                }
            }
        });

        static::updating(function ($material) {
            if (request()->hasFile('poster')) {
                $validator = (new ImageValidator(['poster']));
                $image = (new File(new Source('image')))->load('poster')->validate($validator)->save();
                if (!$image->failed) {
                    $material->image = $image->getStoredPath();
                } else {
                    unset($material->image);
                }
            }
        });
    }
}
