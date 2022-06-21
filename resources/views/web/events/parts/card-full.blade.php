<div class="event-card event-card--full panel">
    <div class="panel__inner">
        {{--<div class="event-card__promo">ПРОМО</div>--}}
        <div class="event-card__layout">
            <a class="event-card__preview event-card-preview" href="{{ route('events.single', $event->slug) }}">
                <img class="event-card-preview__image" src="{{ $event->image('card') }}" alt="{{ $event->title }}">
                <div class="event-card-preview__date">{{ $event->started_at->format('d.m.Y') }}</div>
            </a>
            <div class="event-card__info">
                <div class="event-card__profile event-profile">
                    <div class="event-profile__card event-profile-card">
                        <img class="event-profile-card__image" src="{{ $event->user->avatar() }}" alt="{{ $event->user->name }}">
                        @if ($event->user->isOnline())
                            <div class="event-profile-card__status event-profile-card__status--online"></div>
                        @else
                            <div class="event-profile-card__status"></div>
                        @endif
                    </div>
                    <div class="event-profile__info event-profile-info">
                        <a class="event-profile-info__name" href="#">Lookattme</a>
                        <div class="event-profile-info__meta">Осталось 20:00</div>
                    </div>
                </div>
                <div class="event-card__date event-card-date">
                    <span class="event-card-date__label">
                        <i class="icon icon--clock"></i> Состоится:</span> <span class="event-card-date__value"> {{ $event->started_at->format('d.m.Y') }}
                    </span>
                </div>
                <a class="event-card__title" href="{{ route('events.single', $event->slug) }}">{{ $event->title }}</a>
                <div class="event-card__description content">
                    <p>{{ Str::of($event->content)->limit(50) }}</p>
                </div>
                <ul class="event-card__meta event-meta">
                    <li class="event-meta__item event-meta-item">
                        <i class="event-meta-item__icon event-meta-item__icon--like icon icon--thumbs-up icon--solid"></i>
                        <span class="event-meta-item__value">0</span>
                    </li>
                    <li class="event-meta__item event-meta-item">
                        <i class="event-meta-item__icon event-meta-item__icon--comment icon icon--comment icon--solid"></i>
                        <span class="event-meta-item__value">0</span>
                    </li>
                    {{--<li class="event-meta__item event-meta-item event-meta-item--right">
                        <a class="event-meta-item__link" href="#">
                            <i class="event-meta-item__icon icon icon--heart icon--solid"></i><span class="event-meta-item__value">Отслеживать</span>
                        </a>
                    </li>--}}
                </ul>
            </div>
        </div>
    </div>
</div>
