<?php

namespace Tests\Feature;

use App\Models\Car;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CarsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test  */
    public function getCarsList(): void
    {
        $car = new Car([
            'model' => 'kia rio',
            'color' => 'white',
            'number' => 'a111a',
        ]);

        $car->save();

        $response = $this->get('/cars');
        $response->assertSee($car->model);
    }
}
