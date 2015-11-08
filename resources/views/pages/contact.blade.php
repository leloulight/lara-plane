@extends('pagelayout')

@section('content')
	<h2>Контакты</h2>
    <h3>Отправить сообщение</h3>
    <p>Все вопросы, пожелания касающиеся сайта, можно отправить мне на почту. Отвечу всем.</p>
    {!! Form::open(array('url' => 'foo/bar', 'class' => 'contact-form')) !!}
        <div class="float-label">
            {!! Form::label('name', 'Имя', ['class' => 'contact-form__label']) !!}
            {!! Form::text('name', null, ['class' => 'contact-form__text', 'placeholder' => 'Имя']) !!}
        </div>

        <div class="float-label">
            {!! Form::label('email', 'Email (Обязательное поле)', ['class' => 'contact-form__label']) !!}
            {!! Form::email('email', null, ['class' => 'contact-form__text', 'placeholder' => 'Email*']) !!}
        </div>

        <div class="float-label">
            {!! Form::label('message', 'Сообщение', ['class' => 'contact-form__label']) !!}
            {!! Form::textarea('message', null, ['class' => 'contact-form__text', 'placeholder' => 'Сообщение']) !!}
        </div>

    {!! Form::submit('Отправить', ['class' => 'btn contact-form__btn']) !!}
    {!! Form::close() !!}
@stop