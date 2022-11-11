<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Пользователи
 *
 * Class User
 * @package App\Models
 *
 * @property int id
 * @property string fio
 * @property integer|null age
 * @property Carbon|null created_at - Дата создания
 * @property Carbon|null updated_at - Дата обновления
 *
 * @property-read UserCar|null $cars
 */
class User extends Model
{
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */
    public const TABLE = 'users';

    /** @var string */
    protected $table = self::TABLE;

    protected $fillable = [
        'fio',
        'age',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'fio' => 'string',
        'age' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /**
     * @param $query
     * @param $count
     * @return mixed
     */
    public function scopeLastUsers($query, $count)
    {
        return $query->orderBy('created_at', 'desc')->take($count)->get();
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /**
     * @return BelongsToMany
     */
    public function cars(): BelongsToMany
    {
        return $this->belongsToMany(Car::class, 'users_cars', 'user_id', 'car_id');
    }

}
