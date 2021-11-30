@extends('voyager::master')

@section('content')

    @foreach ($users as $user)
        <p>{{$user->name}}</p>
        <p>{{$user->email}}</p>
        <br>
    @endforeach

@endsection