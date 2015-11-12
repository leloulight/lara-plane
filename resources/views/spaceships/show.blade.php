@extends('pagelayout')

@section('content')
    <div class="row">
        @if($spaceship->detail_image)
            <div class="detail-image-container col-md-24">
                <img src="/uploads/spaceships/{!! $spaceship->detail_image !!}" alt=""/>
            </div>
        @endif

        <div class="detail-container col-md-24">
            <div class="row">
                <div class="detail col-md-17 col-sm-15">
                    <h4 class="detail__name">{!! $spaceship->name !!}</h4>
                    <p class="detail__text">{!! $spaceship->description !!}</p>
                    
                    <div class="detail-carousel">
                        @foreach($carousel as $image)
                            <a href="/uploads/spaceships/{!! $image !!}" class="detail-carousel__container">
                                <img class="detail-carousel__item" src="/uploads/spaceships/{!! $image !!}" alt=""/>
                            </a>
                        @endforeach
                    </div>

                    @if($spaceship->video)
                        <div class="video">
                            <iframe width="100%" height="350" src="{!! $spaceship->video !!}" frameborder="0" allowfullscreen></iframe>
                        </div>
                    @endif

                </div>
                <div class="detail-sidebar col-md-7 col-sm-9">
                    {{--Social share--}}
                    <div class="detail-social-share">
                        <script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script><div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="small" data-yashareQuickServices="vkontakte,facebook,twitter,odnoklassniki,moimir" data-yashareTheme="counter"></div>
                    </div>
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