<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('cars.index', [
            'cars' => Car::query()->orderBy('created_at', 'desc')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('cars.create', [
            'car' => [],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        Car::create([
            'model' => $request['model'],
            'color' => $request['color'],
            'number' => $request['number'],
        ]);

        return redirect()->route('car.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Car $car
     * @return Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Car $car
     * @return Application|Factory|View
     */
    public function edit(Car $car)
    {
        return view('cars.edit', [
            'car' => $car
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Car $car
     * @return RedirectResponse
     */
    public function update(Request $request, Car $car): RedirectResponse
    {
        $car->model = $request['model'];
        $car->color = $request['color'];
        $car->number = $request['number'];
        $car->save();

        return redirect()->route('car.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Car $car
     * @return RedirectResponse
     */
    public function destroy(Car $car): RedirectResponse
    {
        $car->delete();

        return redirect()->route('user.index');
    }
}
