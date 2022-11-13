<?php

namespace App\Models;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use OpenApi\Annotations as OA;

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
 * @property-read UserCar|null $users
 *
 */
/**
 * @OA\Schema(
 *     title="Car",
 *     description="Car model",
 *     @OA\Xml(
 *         name="Car"
 *     )
 * )
 */
class Car extends Model
{
    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var int
     */
    protected $id;

    /**
     * @OA\Property(
     *      title="Model",
     *      description="Модель машины",
     *      example="Kia Rio"
     * )
     *
     * @var string
     */
    protected $model;

    /**
     * @OA\Property(
     *      title="Color",
     *      description="Цвет машины",
     *      example="белый"
     * )
     *
     * @var string
     */
    protected $color;

    /**
     * @OA\Property(
     *      title="Number",
     *      description="Гос номер машины",
     *      example="а111аа"
     * )
     *
     * @var string
     */
    protected $number;

    /**
     * @OA\Property(property="created_at", type="datetime", example="2021-05-03T16:29:10.000000Z")
     * @var datetime
     */
    protected $created_at;

    /**
     * @OA\Property(property="updated_at", type="datetime", example="2021-05-03T16:29:10.000000Z")
     * @var datetime
     */
    protected $updated_at;

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
