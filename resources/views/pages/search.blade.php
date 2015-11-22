@extends('pagelayout')

@section('content')
    <h1>Поиск</h1>
    @if($spaceships)
        <ul class="search-list">
            @foreach($spaceships as $value)
                <li class="search-list__item">
                    <a class="search-list__link" href="spaceships/{!! $value->id !!}">{!! $value->name !!}</a>
                </li>
            @endforeach
        </ul>

        {{-- PAGINATION --}}
        {!! $spaceships->render() !!}
    @else
        <p>Поиск не дал пезультатов</p>
    @endif
@stop