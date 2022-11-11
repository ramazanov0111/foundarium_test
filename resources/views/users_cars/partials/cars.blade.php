@foreach ($cars as $car)

    <option value="{{$car->id ?? ""}}"

            @isset($userCar->id)
                    @if ($car->id == $userCar->car_id)
                        selected="selected"
            @endif
            @endisset
    >
       {{$car->model ?? ""}}
    </option>

@endforeach
