
<label for="">ФИО</label>
<input type="text" class="form-control" name="fio" placeholder="ФИО"
       value="{{ $user->fio ?? ''}}" required="">

<label for="">Возраст</label>
<input type="text" class="form-control" name="age" placeholder="18-60"
       value="{{ $user->age ?? ''}}" required="">


<button class="btn btn-primary" type="submit">
    <i class="fa fa-check-square-o" aria-hidden="true"></i>
    Сохранить
</button>
