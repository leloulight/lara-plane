@extends('pagelayout')

@section('content')
    <div class="row">
        <div class="detail-image-container col-md-24">
            <img src="http://lorempixel.com/1160/300/" alt=""/>
        </div>

        <div class="col-md-24">
            <div class="row">
                <div class="detail col-md-17">
                    <h4 class="detail__name">{!! $spaceship->name !!}</h4>
                    <p class="detail__text">{!! $spaceship->description !!}</p>
                    
                    <div class="detail-carousel">
                        @foreach($carousel as $image)
                            <img src="/uploads/spaceships/{!! $image !!}" alt=""/>
                        @endforeach
                    </div>

                    <div class="video">
                        place for Video from Youtube
                    </div>
                </div>
                <div class="detail-sidebar col-md-7">
                    <div class="detail-social-share">social share</div>
                    <ul class="prop-list">
                        <li class="prop-list__item">Реальный <span class="prop-list__prop">{!! $spaceship->real !!}</span></li>
                        <li class="prop-list__item">Назначение <span class="prop-list__prop">{!! $spaceship->assignment !!}</span></li>
                        <li class="prop-list__item">Страна <span class="prop-list__prop">{!! $spaceship->country !!}</span></li>
                        <li class="prop-list__item">Цена <span class="prop-list__prop">{!! $spaceship->cost !!}</span></li>
                        <li class="prop-list__item">Экипаж <span class="prop-list__prop">{!! $spaceship->crew !!}</span></li>
                        <li class="prop-list__item">Скорость <span class="prop-list__prop">{!! $spaceship->speed !!}</span></li>
                        <li class="prop-list__item">Ширина <span class="prop-list__prop">{!! $spaceship->width !!}</span></li>
                        <li class="prop-list__item">Длина <span class="prop-list__prop">{!! $spaceship->length !!}</span></li>
                        <li class="prop-list__item">Высота <span class="prop-list__prop">{!! $spaceship->height !!}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection