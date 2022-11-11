<h5>Пользователь: </h5>
<h6>
    {{ $user->fio ?? ''}}
</h6>

<input type="text" class="form-control" name="user_id"
       value="{{ $user->id ?? ''}}" required="" hidden>


<label for="car_id">Машина</label>
<select class="form-control" name="car_id">
    @include('users_cars.partials.cars', ['cars' => $cars])
</select>

<button class="btn btn-primary" type="submit">
    <i class="fa fa-check-square-o" aria-hidden="true"></i>
    Сохранить
</button>
