@extends('adminlayout')

@section('content')
    <h1>Create NEW Spaceship</h1>
    <hr/>

    <div class="row">
        <div class="col-md-6 col-sm-8 col-xs-12">
            {!! Form::open(array('url' => 'admin')) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name', ['class' => 'add_form__label']) !!}
                {!! Form::text('name', null, ['class' => 'add-form__input form-control']) !!}
            </div>
            {!! Form::submit('Добавить', ['class' => 'add-form__submit btn btn-primary pull-right']) !!}
            {!! Form::close() !!}

            @if($errors->any())
                @foreach($errors->all() as $error)
                    {{ $error }}
                @endforeach
            @endif
        </div>
    </div>
@stop