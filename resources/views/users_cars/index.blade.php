@extends('layouts.app_admin')

@section('content')

    <div class="container">

        @component('components.breadcrumb')
            @slot('title')
                Список забронированных машин
            @endslot
            @slot('parent')
                Главная
            @endslot
            @slot('active')
                Список бронирований
            @endslot
            @slot('page')
                users_cars
            @endslot
        @endcomponent

        <hr>

        <table class="table table-striped">
            <thead>
            <th>Пользователь</th>
            <th>Машина</th>
            <th class="text-right">Действие</th>
            </thead>
            <tbody>
            @forelse ($users_cars as $userCar)
                <tr>
                    <td>{{ $userCar->user->fio }}</td>
                    <td>{{ $userCar->car->model }}</td>
                    <td class="text-right">
                        <form onsubmit="if(confirm('Удалить?')){ return true }else{ return false }"
                              action="{{ url('/users_cars/' . $userCar->id) }}" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}

                            <a class="btn btn-default" href="{{ url('/users_cars/' . $userCar->user->id) }}">
                                <i class="fa fa-edit" aria-hidden="true"></i>
                            </a>
                            <button type="submit" class="btn">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center"><h2>Данные отсутствуют</h2></td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3">
                    <ul class="pagination pull-right">
                        {{ $users_cars->links() }}
                    </ul>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>

@endsection
