@extends('adminlayout')

@section('content')
    <h1>Create NEW Spaceship</h1>
    <hr/>

    {!! Form::open(array('url' => 'admin')) !!}
        {!! Form::label('name', 'Name', ['class' => 'add_form__label']) !!}
        {!! Form::text('name', null, ['class' => 'add-form__input']) !!}

        {!! Form::submit('Добавить', ['class' => 'add-form__submit']) !!}
    {!! Form::close() !!}
@stop