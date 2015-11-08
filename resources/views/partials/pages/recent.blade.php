<ul class="recent">
 @if(count($spaceships) > 0)
     @foreach($spaceships as $ship)
         <li class="recent__item">
             <a class="recent__link" href="/spaceships/{!! $ship->id !!}">
             <img class="recent__image" src="uploads/spaceships/{!! $ship->preview !!}" alt="">
                 <span class="recent__name">{!! $ship->name !!}</span>
             </a>
         </li>
     @endforeach
 @endif
</ul>

{{-- PAGINATION --}}
<div class="pagination-container">
 {!! $spaceships->render() !!}
</div>