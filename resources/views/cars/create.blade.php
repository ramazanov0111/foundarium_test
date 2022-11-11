@extends('layouts.app_admin')

@section('content')

    <div class="container">

        @component('components.breadcrumb')
            @slot('title')
                Добавление машины
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

        <hr/>

        <form class="form-group" action="{{route('car.store')}}" enctype="multipart/form-data" method="post">
            {{ csrf_field() }}

            {{-- Form include --}}
            @include('cars.partials.form')

            <input type="hidden" name="created_by" value="{{ Auth::id() }}">
        </form>
    </div>

@endsection
