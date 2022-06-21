<div class="widget-events">
    <div class="widget-events__heading heading heading--h2">Похожие материалы:</div>

    @if ($events->isNotEmpty())
        <div class="widget-events__list widget-events-list">
            @foreach($events as $index => $entity)
                <div class="widget-events-list__item">
                    @include('web.events.parts.card', ['event' => $entity])
                </div>
            @endforeach
        </div>
    @else
        {{-- Ничего не найдено --}}
    @endif
</div>
