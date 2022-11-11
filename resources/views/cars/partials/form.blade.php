
<label for="">Модель</label>
<input type="text" class="form-control" name="model" placeholder="Модель" value="{{ $car->model ?? ''}}"
       required="">

<label for="">Цвет</label>
<input type="text" class="form-control" name="color" placeholder="Цвет"
       value="{{ $car->color ?? ''}}">

<label for="">Гос Номер</label>
<input type="text" class="form-control" name="number" placeholder="Гос Номер"
       value="{{ $car->number ?? ''}}">
<hr/>

<button class="btn btn-primary" type="submit">
    <i class="fa fa-check-square-o" aria-hidden="true"></i>
    Сохранить
</button>
