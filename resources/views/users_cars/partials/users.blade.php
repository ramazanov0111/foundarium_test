@foreach ($users as $user)

    <option value="{{$user->id ?? ""}}"

            @isset($userCar->id)
                    @if ($user->id == $userCar->user_id)
                        selected="selected"
            @endif
            @endisset
    >
       {{$user->fio ?? ""}}
    </option>

@endforeach
