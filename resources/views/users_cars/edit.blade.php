@extends('layouts.app_admin')

@section('content')

    <div class="container">

        @component('components.breadcrumb')
            @slot('title')
                Управление бронированием
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

        <hr/>

        @if($userCar)
            <form class="form-group" action="{{ url('/users_cars/' . $userCar->id) }}" method="post">
                {{ method_field('PATCH') }}
                @else
                    <form class="form-group" action="{{ url('/users_cars') }}" method="post">
                        @endif
                        {{ csrf_field() }}

                        {{-- Form include --}}
                        @include('users_cars.partials.form')

                    </form>
    </div>

@endsection
