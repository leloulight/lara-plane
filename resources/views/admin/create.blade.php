@extends('adminlayout')

@section('content')
    <h1>Create Plain</h1>
    <hr/>

    {!! Form::open(array('url' => 'foo/bar')) !!}
        {!! Form::label('name', 'for name') !!}
        {!! Form::text('name') !!}
    {!! Form::close() !!}
@stop