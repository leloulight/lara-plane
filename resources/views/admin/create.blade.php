@extends('adminlayout')

@section('content')
    <h1>Create NEW Spaceship</h1>
    <hr/>

    <div class="row">
        <div class="col-md-6 col-sm-8 col-xs-12">
            @include('errors.admin.form')

            {!! Form::open(array('url' => 'admin', 'files' => 'true', 'class' => 'admin-form',)) !!}
                @include('admin.form_create', ['buttontext' => 'Добавить'])
            {!! Form::close() !!}
        </div>
    </div>
@stop