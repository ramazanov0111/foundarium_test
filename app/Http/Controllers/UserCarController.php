<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use App\Models\UserCar;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserCarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function actionGetUsersCars()
    {
        $usersCars = UserCar::query()->orderBy('created_at', 'desc')->paginate(10);

        return view('users_cars.index', [
            'users_cars' => $usersCars ?? null,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int|null $userId
     * @return Application|Factory|View
     */
    public function actionGetUserCar(int $userId = null)
    {
        $userCar = UserCar::query()
            ->where('user_id', $userId)
            ->first();

        return view('users_cars.edit', [
            'userCar' => $userCar ?? null,
            'user' => User::query()->where('id', $userId)->first(),
            'cars' => Car::query()->orderBy('created_at', 'desc')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function actionCreateUserCar(Request $request)
    {
        $userCar = new UserCar([
            'user_id' => $request['user_id'],
            'car_id' => $request['car_id'],
        ]);

        $userCar->save();

        return view('users.index', [
            'users' => User::query()->orderBy('created_at', 'desc')->paginate(10),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param UserCar $userCar
     * @return Response
     */
    public function show(UserCar $userCar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $userCarId
     * @return Application|Factory|View
     */
    public function actionUpdateUserCar(Request $request, int $userCarId)
    {
        /**
         * @var UserCar|null $userCar
         */
        $userCar = UserCar::query()->where('id', $userCarId)->first();

        if ($userCar) {
            $userCar->user_id = $request['user_id'];
            $userCar->car_id = $request['car_id'];
            $userCar->save();
        }

        return view('users.index', [
            'users' => User::query()->orderBy('created_at', 'desc')->paginate(10),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $userCarId
     * @return Application|Factory|View
     */
    public function actionRemoveUserCar(int $userCarId)
    {
        /**
         * @var UserCar|null $userCar
         */
        $userCar = UserCar::query()->where('id', $userCarId)->first();

        if ($userCar) {
            $userCar->delete();
        }

        return $this->actionGetUsersCars();
    }
}
