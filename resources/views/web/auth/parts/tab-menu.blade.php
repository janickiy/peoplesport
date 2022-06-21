<ul class="auth-page__menu tab-menu">
    <li class="tab-menu__item tab-menu-item @if (Route::currentRouteName() === 'auth.login') tab-menu-item--active @endif">
        <a class="tab-menu-item__link" href="{{ route('auth.login') }}">Вход</a>
    </li>
    <li class="tab-menu__item tab-menu-item @if (Route::currentRouteName() === 'auth.register') tab-menu-item--active @endif">
        <a class="tab-menu-item__link" href="{{ route('auth.register') }}">Регистрация</a>
    </li>
</ul>
