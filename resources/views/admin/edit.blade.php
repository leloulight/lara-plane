@extends('adminlayout')

@section('content')
    <h1>Edit {!! $spaceships->name !!}</h1>
    <hr/>

    <div class="row">
        <div class="col-md-6 col-sm-8 col-xs-12">
            @include('errors.admin.form')

            {!! Form::model($spaceships, array('method' => 'PATCH', 'class' => 'admin-form', 'files' => 'true', 'action' => ['adminController@update', $spaceships->id])) !!}
                @include('admin.form_edit', ['buttontext' => 'Обновить'])
            {!! Form::close() !!}
        </div>
    </div>
@stop