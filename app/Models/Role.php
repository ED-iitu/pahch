<?php
/**
 * Copyright 2020, shakidevcom
 */

namespace App\Models;

/**
 * App\Models\Role
 *
 * @property integer        $id
 * @property string         $title
 * @property string         $system_key
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereSystemKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Role extends \Eloquent
{

    const ADMINISTRATOR = 1;
    const TEACHER = 2;
    const USER = 3;
    const CURATOR = 4;

    /**
     * @var string
     */
    protected $table = 'roles';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'system_key',
    ];

    /**
     * @var array
     */
    protected $rules = [
        'name' => 'required|max:80',
        'system_key' => 'required|max:80',
        '_unique' => 'name|system_key',
    ];


    /**
     * @return bool
     */
    public function isTeacher(): bool
    {
    }


    /**
     * @return array
     */
    public static function getOptions(): array
    {
        return Role::oldest()->pluck('name', 'id')->toArray();
    }

}
