@extends('pagelayout')

@section('content')
    @if(count($spaceships) > 0)
        <ul class="spaceships">
            @foreach($spaceships as $ship)
                <li class="recent__item">
                    <a href="/spaceships/{!! $ship->id !!}">
                        <img src="{!! $ship->preview !!}" alt="">
                        {!! $ship->name !!}
                    </a>
                </li>
            @endforeach
        </ul>

        {{-- PAGINATION --}}
        {!! $spaceships->render() !!}
    @endif
@endsection