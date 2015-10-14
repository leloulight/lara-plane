@extends('adminlayout')

@section('content')
    <h1>Admin Panel</h1>

    <a href="/admin/create" class="btn btn-primary">Create SpaceShip</a>

    <h2>Recent Spaceships</h2>

    @if(count($spaceships) > 0)
        <div class="recent">
            <ul class="recent__list">
                @foreach($spaceships as $value)
                    <li class="recent__item">
                        <a href="/admin/{{ $value->id }}" class="recent__link">{{ $value->name }}</a>
                        <a class="recent__edit fa fa-pencil" href="/admin/{{ $value->id }}/edit"></a>

{{--                        {!! Form::model($spaceships, array('method' => 'DELETE', 'action' => ['adminController@destroy', $value->id])) !!}--}}
                        {{--<a class="fa fa-times recent__remove" href=""></a>--}}
                        {!! Form::open(array('method' => 'DELETE', 'action' => ['adminController@destroy', $value->id])) !!}
                        {!! Form::submit('Удалить', ['class' => "btn btn-danger recent__remove"]) !!}
                        {!! Form::close() !!}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
@stop
