<?php

namespace App\Models;

use App\Casts\Asset;
use App\Filesystem\Local;
use App\Models\Getters\FileGetters;
use App\Models\Traits\FileInfo;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use FileInfo;

    protected $fillable = [
        'entity_type',
        'entity_id',
        'link',
        'data'
    ];

    protected $casts = [
        'link' => Asset::class,
    ];

    protected $appends = [
        'file_name'
    ];

}
