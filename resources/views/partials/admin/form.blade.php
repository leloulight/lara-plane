{!! Form::open(array('url' => 'admin')) !!}
<div class="form-group">
    {!! Form::label('name', 'Название', ['class' => 'add_form__label']) !!}
    {!! Form::text('name', null, ['class' => 'add-form__input form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('assignment', 'Назначение', ['class' => 'add_form__label']) !!}
    {!! Form::text('assignment', null, ['class' => 'add-form__input form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('real', 'Реальность', ['class' => 'add_form__label']) !!}
    {!! Form::checkbox('real') !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Описание', ['class' => 'add_form__label']) !!}
    {!! Form::textarea('description', null, ['class' => 'add-form__input form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('meta-description', 'meta-описание', ['class' => 'add_form__label']) !!}
    {!! Form::text('meta-description', null, ['class' => 'add-form__input form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('country', 'Страна', ['class' => 'add_form__label']) !!}
    {!! Form::text('country', null, ['class' => 'add-form__input form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('video', 'Видео', ['class' => 'add_form__label']) !!}
    {!! Form::text('video', 'dwad', ['class' => 'add-form__input form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('cost', 'Цена', ['class' => 'add_form__label']) !!}
    {!! Form::text('cost', null, ['class' => 'add-form__input form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('crew', 'Экипаж', ['class' => 'add_form__label']) !!}
    {!! Form::text('crew', null, ['class' => 'add-form__input form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('speed', 'Скорость', ['class' => 'add_form__label']) !!}
    {!! Form::text('speed', null, ['class' => 'add-form__input form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('length', 'Длина', ['class' => 'add_form__label']) !!}
    {!! Form::text('length', null, ['class' => 'add-form__input form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('width', 'Ширина', ['class' => 'add_form__label']) !!}
    {!! Form::text('width', null, ['class' => 'add-form__input form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('height', 'Высота', ['class' => 'add_form__label']) !!}
    {!! Form::text('height', null, ['class' => 'add-form__input form-control']) !!}
</div>


{!! Form::submit('Добавить', ['class' => 'add-form__submit btn btn-primary pull-right']) !!}
{!! Form::close() !!}