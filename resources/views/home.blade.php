@extends('layout')

@section('content')
    <h3>Последние добавленные</h3>
   	<ul class="recent">
        @foreach($spaceships as $ship)
            <li class="recent__item">
                <a href="">
                    <img src="{!! $ship->preview !!}" alt="">
                    {!! $ship->name !!}
                </a>
            </li>
        @endforeach
   	</ul>
@stop