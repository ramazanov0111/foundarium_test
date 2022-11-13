<?php

namespace App\Models;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use OpenApi\Annotations as OA;

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
/**
 * @OA\Schema(
 *     title="User",
 *     description="User model",
 *     @OA\Xml(
 *         name="User"
 *     )
 * )
 */
class User extends Model
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
    public $id;

    /**
     * @OA\Property(
     *      title="FIO",
     *      description="ФИО пользователя",
     *      example="Иванов Иван Иванович"
     * )
     *
     * @var string
     */
    public $fio;

    /**
     * @OA\Property(
     *      title="Age",
     *      description="Возраст пользователя",
     *      example=25
     * )
     *
     * @var int
     */
    public $age;

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
