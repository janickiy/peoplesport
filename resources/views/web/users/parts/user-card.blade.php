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
    <div class="user-card__info">
        {{--
        <div class="user-card__menu-link">
            <ul class="menu-link menu-link--center menu-link--secondary">
                <li class="menu-link__item menu-link-item"><a class="menu-link-item__link" href="#"><i class="menu-link-item__icon icon icon--solid icon--user-plus"></i><span class="menu-link-item__label">Подписаться</span></a></li>
                <li class="menu-link__item menu-link-item"><a class="menu-link-item__link" href="#"><i class="menu-link-item__icon icon icon--solid icon--envelope"></i><span class="menu-link-item__label">Написать личное сообщение</span></a></li>
                <li class="menu-link__item menu-link-item"><a class="menu-link-item__link" href="#"><i class="menu-link-item__icon icon icon--solid icon--ban"></i><span class="menu-link-item__label">Добавить в черный список</span></a></li>
            </ul>
        </div>
        <div class="user-card__hr"></div>
        <div class="user-card__menu-link">
            <ul class="menu-link menu-link--center">
                <li class="menu-link__item menu-link-item"><a class="menu-link-item__link" href="#"><i class="menu-link-item__icon icon icon--solid icon--comments-alt"></i><span class="menu-link-item__label">Темы пользователя</span></a></li>
                <li class="menu-link__item menu-link-item"><a class="menu-link-item__link" href="#"><i class="menu-link-item__icon icon icon--solid icon--sticky-note"></i><span class="menu-link-item__label">Записи пользователя</span></a></li>
                <li class="menu-link__item menu-link-item"><a class="menu-link-item__link" href="#"><i class="menu-link-item__icon icon icon--solid icon--heart"></i><span class="menu-link-item__label">Избранные темы</span></a></li>
            </ul>
        </div>
        --}}
        <div class="user-card__hr"></div>
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
    </div>
</div>
