@extends('layouts.app_admin')

@section('content')

    <div class="container">

        @component('components.breadcrumb')
            @slot('title')
                Список машин
            @endslot
            @slot('parent')
                Главная
            @endslot
            @slot('active')
                Машины
            @endslot
            @slot('page')
                car
            @endslot
        @endcomponent

        <hr>

        <a href="{{route('car.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-square"></i> Добавить
            машину </a>
        <table class="table table-striped">
            <thead>
            <th>Модель</th>
            <th>Цвет</th>
            <th>Гос Номер</th>
            <th class="text-right">Действие</th>
            </thead>
            <tbody>
            @forelse ($cars as $car)
                <tr>
                    <td>{{$car->model}}</td>
                    <td>{{$car->color}}</td>
                    <td>{{$car->number}}</td>
                    <td class="text-right">
                        <form onsubmit="if(confirm('Удалить?')){ return true }else{ return false }" action="{{ route('car.destroy',
                        $car) }}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            {{ csrf_field() }}

                            <a class="btn btn-default" href="{{route('car.edit', $car)}}">
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
                    <td colspan="4" class="text-center"><h2>Данные отсутствуют</h2></td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3">
                    <ul class="pagination pull-right">
                        {{ $cars->links() }}
                    </ul>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>

@endsection
