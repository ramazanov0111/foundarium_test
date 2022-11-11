<h2>{{$title}}</h2>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{$parent}} </a></li>
{{--    <li class="breadcrumb-item active">{{ $page }}</li>--}}
    @if($page = 'users_cars')
        <li class="breadcrumb-item active"><a href="{{ route($page) }}">{{$active}} </a></li>
    @else
        <li class="breadcrumb-item active"><a href="{{ route($page . ".index") }}">{{$active}} </a></li>
    @endif
</ol>
