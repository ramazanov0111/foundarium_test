@extends('layouts.app_admin')

@section('content')

    <div class="container">

        @component('components.breadcrumb')
            @slot('title')
                Создание пользователя
            @endslot
            @slot('parent')
                Главная
            @endslot
            @slot('active')
                Пользователи
            @endslot
            @slot('page')
                user
            @endslot
        @endcomponent

        <hr/>

        <form class="form-group" action="{{route('user.store')}}" method="post">
            {{ csrf_field() }}

            {{-- Form include --}}
            @include('users.partials.form')

            <input type="hidden" name="created_by" value="{{ Auth::id() }}">
        </form>
    </div>

@endsection
