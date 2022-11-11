@extends('layouts.app_admin')

@section('content')

    <div class="container">

        @component('components.breadcrumb')
            @slot('title')
                Редактирование пользователя
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

        <form class="form-group" action="{{route('user.update', $user)}}" method="post">
            {{ method_field('PUT') }}
            {{ csrf_field() }}

            {{-- Form include --}}
            @include('users.partials.form')

        </form>
    </div>

@endsection
