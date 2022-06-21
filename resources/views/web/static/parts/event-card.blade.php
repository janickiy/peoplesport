<div class="event-card">
    <a class="event-card__preview event-card-preview" href="{{ route('events.single', $event->slug) }}">
        <img class="event-card-preview__image" src="{{ $event->image('card') }}" alt="{{ $event->title }}">
        <div class="event-card-preview__date">{{ $event->created_at->format('d.m') }}</div>
    </a>
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
            <a class="event-profile-info__name" href="{{ route('users.profile', $event->user->id) }}">{{ $event->user->login }}</a>
        </div>
    </div>
    <div class="event-card__date event-card-date">
        <span class="event-card-date__label">
            <i class="icon icon--clock"></i> Состоится:</span> <span class="event-card-date__value">{{ $event->started_at->format('d.m.Y') }}</span>
    </div>
    <a class="event-card__title" href="{{ route('events.single', $event->slug) }}">{{ $event->title }}</a>
    <ul class="event-card__meta event-meta">
        <li class="event-meta__item event-meta-item">
            <i class="event-meta-item__icon event-meta-item__icon--like icon icon--thumbs-up icon--solid"></i>
            <span class="event-meta-item__value">0</span>
        </li>
        <li class="event-meta__item event-meta-item">
            <i class="event-meta-item__icon event-meta-item__icon--comment icon icon--comment icon--solid"></i>
            <span class="event-meta-item__value">0</span>
        </li>
    </ul>
</div>
