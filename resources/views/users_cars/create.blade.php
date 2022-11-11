@extends('layouts.app_admin')

@section('content')

    <div class="container">

        @component('components.breadcrumb')
            @slot('title')
                Прикрепление машины к пользователю
            @endslot
            @slot('parent')
                Главная
            @endslot
            @slot('active')
                Пользователи
            @endslot
            @slot('page')
                    users_cars
            @endslot
        @endcomponent

        <hr/>

        <form class="form-group" action="{{route('user.car.store')}}" method="post">
            {{ csrf_field() }}

            {{-- Form include --}}
            @include('users_cars.partials.form')

            <input type="hidden" name="created_by" value="{{ Auth::id() }}">
        </form>
    </div>

@endsection
