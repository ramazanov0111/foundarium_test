<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class UsersTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */

    /** @test */
    public function getUsersList(): void
    {
        $user = new User([
            'fio' => 'Ivan Ivanov',
            'age' => 25,
        ]);

        $user->save();

        $response = $this->get('/users');
        $response->assertSee($user->fio);
    }
}
