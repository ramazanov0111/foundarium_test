@extends('layouts.app_admin')

@section('content')

    <div class="container">

        @component('components.breadcrumb')
            @slot('title')
                Редактирование машины
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

        <form class="form-group" action="{{route('car.update', $car)}}" enctype="multipart/form-data"
              method="post">
            <input type="hidden" name="_method" value="put">
            {{ csrf_field() }}

            {{-- Form include --}}
            @include('cars.partials.form')

            <input type="hidden" name="modified_by" value="{{Auth::id()}}">
        </form>
    </div>

@endsection
