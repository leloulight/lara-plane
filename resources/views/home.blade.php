@extends('layout')

@section('content')
    <h3>Последние добавленные</h3>
   	<ul class="recent">
        @if(count($spaceships) > 0)
            @foreach($spaceships as $ship)
                <li class="recent__item">
                    <a href="/spaceships/{!! $ship->id !!}">
                        <img src="{!! $ship->preview !!}" alt="">
                        {!! $ship->name !!}
                    </a>
                </li>
            @endforeach
        @endif
   	</ul>

    {{-- PAGINATION --}}
    {!! $spaceships->render() !!}
@stop