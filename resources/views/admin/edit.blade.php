@extends('adminlayout')

@section('content')
    <h1>Edit {!! $spaceship->name !!}</h1>
    <hr/>

    <div class="row">
        <div class="col-md-6 col-sm-8 col-xs-12">
            @include('errors.admin.form')

            {!! Form::model($spaceship, array('method' => 'PATCH', 'class' => 'admin-form', 'files' => 'true', 'action' => ['adminController@update', $spaceship->id])) !!}
                @include('admin.form_edit', ['buttontext' => 'Обновить'])
            {!! Form::close() !!}
        </div>
    </div>
@stop