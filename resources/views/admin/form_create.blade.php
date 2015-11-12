
<div class="form-group">
    {!! Form::label('name', 'Название', ['class' => 'add_form__label']) !!}
    {!! Form::text('name', null, ['class' => 'add-form__input form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('detail_image', 'Главное фото', ['class' => 'add_form__label']) !!}
    {!! Form::file('detail_image', null) !!}
</div>

<div class="form-group">
    {!! Form::label('preview', 'Фото анонса', ['class' => 'add_form__label']) !!}
    {!! Form::file('preview', null) !!}
</div>

<hr/>
<h2>Карусель</h2>
<div class="admin-carousel-container" ng-controller="CreateController">
    <div class="form-group"  ng-repeat="item in fileFormList" data-id="@{{ item.id  }}">
        <label for="@{{item.name}}" class="@{{item.class}}">Изображение для карусели</label>
        <input name="@{{ item.name }}" type="file" id="@{{ item.name }}">
        <i class="fa fa-times delete-image" ng-click="delCarouselField(item)"></i>
    </div>
    <i class="fa fa-plus add-image-form" ng-click="addCarouselField()"></i>
</div>
<hr/>

<div class="form-group">
    {!! Form::label('assignment', 'Назначение', ['class' => 'add_form__label']) !!}
    {!! Form::text('assignment', null, ['class' => 'add-form__input form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('real', 'Реальность', ['class' => 'add_form__label']) !!}
    {!! Form::hidden('real', false) !!}
    {!! Form::checkbox('real', true) !!}
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
    {!! Form::text('video', null, ['class' => 'add-form__input form-control']) !!}
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


{!! Form::submit($buttontext, ['class' => 'add-form__submit btn btn-primary pull-right']) !!}
{!! Form::close() !!}