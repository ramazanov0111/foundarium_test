<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Автомобили
 *
 * Class Car
 * @package App\Models
 *
 * @property int id
 * @property string model
 * @property string|null color
 * @property string|null number
 * @property Carbon|null created_at - Дата создания
 * @property Carbon|null updated_at - Дата обновления
 *
 * @property-read UserCar|null $users
 *
 */
class Car extends Model
{
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */
    public const TABLE = 'cars';

    /** @var string */
    protected $table = self::TABLE;

    protected $fillable = [
        'model',
        'color',
        'number',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'model' => 'string',
        'color' => 'string',
        'number' => 'string',
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
    public function scopeLastCars($query, $count)
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
    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'users_cars', 'car_id', 'user_id');
    }

}
