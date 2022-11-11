@extends('layouts.app_admin')

@section('content')

    <div class="container">
        <div class="row">
        </div>

        <div class="row">
            <div class="col-sm-4">
                <a href="{{route('user.create')}}" class="badge-dark btn btn-block btn-default">Добавить пользователя</a>
                @foreach($users as $user)
                    <a href="{{route('user.edit', $user)}}" class="badge badge-light list-group-item">
                        <h4 class="list-group-item-heading">{{ $user->fio }}</h4>
                    </a>
                @endforeach
            </div>
            <div class="col-sm-4">
                <a href="{{route('car.create')}}" class="badge-dark btn btn-block btn-default">Добавить машину</a>
                @foreach($cars as $car)
                    <a href="{{route('car.edit', $car)}}" class="badge badge-light list-group-item">
                        <h4 class="list-group-item-heading">{{ $car->title }}</h4>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

@endsection
