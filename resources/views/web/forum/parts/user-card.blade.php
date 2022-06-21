<div class="user-card">
    <div class="user-card__preview">
        <div class="user-card__name">{{ $user->name }}</div>
        @if ($user->isOnline())
            <div class="user-card__status user-card__status--online">В сети</div>
        @else
            <div class="user-card__status">Не в сети</div>
        @endif
        <div class="user-card__avatar user-card-avatar">
            <img class="user-card-avatar__image" src="{{ $user->avatar() }}">
        </div>
    </div>
    <ul class="user-card__info user-card-info">
        <li class="user-card-info__item user-card-info-item">
            <span class="user-card-info-item__label">Регистрация:</span>
            <span class="user-card-info-item__value">{{ $user->created_at->format('d.m.Y') }} г.</span>
        </li>
        <li class="user-card-info__item user-card-info-item">
            <span class="user-card-info-item__label">Был в сети:</span>
            <span class="user-card-info-item__value">{{ $user->seen_at ? $user->seen_at->format('d.m.Y') . ' г.': 'Неизвестно' }}</span>
        </li>
        <li class="user-card-info__item user-card-info-item">
            <span class="user-card-info-item__label">Рейтинг:</span>
            <span class="user-card-info-item__value">0</span>
        </li>
    </ul>

    @if ($user->awards->count() > 0)
        <div class="user-card__hr"></div>

        <ul class="user-card__info user-card-info">
            <li class="user-card-info__item user-card-info-item">
                <span class="user-card-info-item__label">Награды:</span>
            </li>
        </ul>

        <ul class="user-card-awards">
            @foreach($user->awards as $award)
                <li class="user-card-awards__item" title="{{ $award->title }}">
                    <img class="user-card-awards__icon" src="{{ $award->image('icon') }}" alt="">
                </li>
            @endforeach
        </ul>
    @endif
</div>
