<?php

namespace App\Models;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use OpenApi\Annotations as OA;

/**
 * Автомобили пользователей
 *
 * Class UserCar
 * @package App\Models
 *
 * @property int id
 * @property integer user_id
 * @property integer car_id
 * @property Carbon|null created_at - Дата создания
 * @property Carbon|null updated_at - Дата обновления
 * @property-read User|null $user
 * @property-read Car|null $car
 *
 */
/**
 * @OA\Schema(
 *     title="UserCar",
 *     description="UserCar model",
 *     @OA\Xml(
 *         name="UserCar"
 *     )
 * )
 */
class UserCar extends Model
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
     *      title="user ID",
     *      description="Идентификатор пользователя",
     *      example="Иванов Иван Иванович"
     * )
     *
     * @var string
     */
    public $user_id;

    /**
     * @OA\Property(
     *      title="car ID",
     *      description="Идентификатор машины",
     *      example=25
     * )
     *
     * @var int
     */
    public $car_id;

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
    public const TABLE = 'users_cars';

    /** @var string */
    protected $table = self::TABLE;

    protected $fillable = [
        'user_id',
        'car_id',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'car_id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    /**
     * @return BelongsTo
     */
    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class, 'car_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
