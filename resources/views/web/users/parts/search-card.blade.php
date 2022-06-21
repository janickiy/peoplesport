<div class="user-search-card">
    <div class="user-search-card__info">
        <img class="user-search-card__avatar" src="{{ $user->avatar() }}" alt="{{ $user->name }}">

        {{--
        <div class="user-search-card-control">
            <div class="user-search-card-control__item user-search-card-control-item">
                <div class="tooltip">
                    <div class="tooltip__label"><a class="user-search-card-control-item__link user-search-card-control-item__link--active" href="#"><i class="user-search-card-control-item__icon icon icon--user-plus"></i></a></div>
                    <div class="tooltip__content">Вы подписаны</div>
                </div>
            </div>
            <div class="user-search-card-control__item user-search-card-control-item">
                <div class="tooltip">
                    <div class="tooltip__label"><a class="user-search-card-control-item__link" href="#"><i class="user-search-card-control-item__icon icon icon--ban"></i></a></div>
                    <div class="tooltip__content">Добавить в черный список</div>
                </div>
            </div>
        </div>
        --}}
    </div>

    <a class="user-search-card__link" href="{{ route('users.questionnaire', $user->id) }}">{{ $user->name }}</a>
</div>
