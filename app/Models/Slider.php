<?php
namespace App\Models;

use App\Casts\Asset;
use App\Models\Traits\Fileable;
use App\Models\Traits\FileInfo;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use Fileable, FileInfo;

    /**
     * @var array
     */
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