<?php

namespace Tests\Feature;

use App\Models\Car;
use App\Models\User;
use App\Models\UserCar;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class UsersCarsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * UsersCars test.
     *
     * @return void
     */

    /** @test */
    public function getUsersCarsList(): void
    {
        $user = new User([
            'fio' => 'Ivan Ivanov',
            'age' => 25,
        ]);
        $user->save();

        $car = new Car([
            'model' => 'kia rio',
            'color' => 'white',
            'number' => 'a111a',
        ]);
        $car->save();

        $userCar = new UserCar([
            'user_id' => $user->id,
            'car_id' => $car->id,
        ]);
        $userCar->save();

        $response = $this->get('/users_cars');

        $response->assertStatus(200);
    }
}
