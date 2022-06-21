<ul class="user-profile__menu tab-menu tab-menu--right">
    <li class="tab-menu__item tab-menu-item">
        <a class="tab-menu-item__link" href="{{ route('users.questionnaire', ['id' => $user->id]) }}">Анкета</a>
    </li>
    <li class="tab-menu__item tab-menu-item">
        <a class="tab-menu-item__link" href="{{ route('users.subscriptions', ['id' => $user->id]) }}">Подписки</a>
    </li>
    <li class="tab-menu__item tab-menu-item">
        <a class="tab-menu-item__link" href="{{ route('users.subscribers', ['id' => $user->id]) }}">Подписчики</a>
    </li>
    <li class="tab-menu__item tab-menu-item">
        <a class="tab-menu-item__link" href="{{ route('users.awards', ['id' => $user->id]) }}">Награды</a>
    </li>
</ul>
