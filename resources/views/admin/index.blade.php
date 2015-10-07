@extends('adminlayout')

@section('content')
    <h1>Admin Panel</h1>

    <a href="/admin/create">Create SpaceShip</a>

    <h2>Recent Spaceships</h2>

    @foreach($spaceships as $value)
        <a href="/admin/{{ $value->id }}">{{ $value->name }}</a>
    @endforeach
@stop
