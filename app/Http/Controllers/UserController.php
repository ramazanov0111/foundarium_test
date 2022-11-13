<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class UserController extends Controller
{
    /**
     * @OA\Get(
     *      path="/user",
     *      operationId="index",
     *      tags={"UserResources"},
     *      summary="Получить список всех пользователей",
     *      description="Получить список всех пользователей",
     *     @OA\Response(
     *         response=200,
     *          description="successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/User")
     *       ),
     *     )
     *
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $users = User::query()->orderBy('created_at', 'desc')->paginate(10);

        return view('users.index', [
            'users' => $users ?? null,
        ]);
    }

    /**
     * @OA\Get(
     *      path="/user/create",
     *      operationId="create",
     *      tags={"UserResources"},
     *      summary="Страница добавления нового пользователя",
     *      description="Страница добавления нового пользователя",
     *     @OA\Response(
     *         response=200,
     *          description="successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/User")
     *       ),
     *     )
     *
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('users.create', [
            'user' => [],
        ]);
    }

    /**
     * @OA\Post(
     *      path="/user",
     *      operationId="store",
     *      tags={"UserResources"},
     *      summary="Сохранение нового пользователя",
     *      @OA\RequestBody(request="User", description="User data for create", required=true,
     *          @OA\JsonContent(
     *              @OA\Property(property="fio", type="string", example="Ivanov Ivan"),
     *              @OA\Property(property="age", type="integer", example="25"),
     *          ),
     *      ),
     *      @OA\Response(response=200, description="OK")
     * )
     *
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $user = new User([
            'fio' => $request['fio'],
            'age' => $request['age'],
        ]);

        $user->save();

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * @OA\Get(
     *      path="/user/{user_id}/edit",
     *      operationId="edit",
     *      tags={"UserResources"},
     *      summary="Страница редактирования пользователя",
     *      description="Страница редактирования пользователя",
     *     @OA\Parameter(
     *          name="user_id",
     *          description="Пользователь",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Response(
     *         response=200,
     *          description="successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/User")
     *       ),
     *     )
     *
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Application|Factory|View
     */
    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }

    /**
     * @OA\Patch(
     *      path="/user/{user_id}",
     *      operationId="update",
     *      tags={"UserResources"},
     *      summary="update",
     *     @OA\Parameter(
     *          name="user_id",
     *          description="Пользователь",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(request="User", description="User data for update", required=true,
     *          @OA\JsonContent(
     *              @OA\Property(property="fio", type="string", example="Ivanov Ivan"),
     *              @OA\Property(property="age", type="integer", example="25"),
     *          ),
     *      ),
     *      @OA\Response(response=200, description="OK")
     * )
     *
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $user->fio = $request['fio'];
        $user->age = $request['age'];
        $user->save();

        return redirect()->route('user.index');
    }

    /**
     * @OA\Delete(
     *      path="/user/{user_id}",
     *      operationId="destroy",
     *      tags={"UserResources"},
     *      summary="destroy",
     *     @OA\Parameter(
     *          name="user_id",
     *          description="Пользователь",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(response=200, description="OK")
     * )
     *
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('user.index');
    }
}
