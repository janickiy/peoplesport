<section class="header">
    <div class="header__info">
        <div class="header__inner">
            <div class="header-info">
                <div class="header-info__left">
                    <x-header-menu locate="header-menu" classes="header-menu--left" />
                </div>
                <div class="header-info__right">
                    <ul class="header-menu header-menu--right">
                        @if (Auth::check())
                            {{--<li class="header-menu__item header-menu__item--search header-menu-item">
                                <a class="header-menu-item__link" href="#"><i class="header-menu-item__icon icon icon--search"></i><span class="header-menu-item__label">Поиск</span></a>
                            </li>--}}
                            <li class="header-menu__item">
                                <div class="header-profile">
                                    <a class="header-profile__card header-profile-card header-profile__trigger" href="#">
                                        <img class="header-profile-card__image" src="{{ Auth::user()->avatar() }}" alt="">
                                        <div class="header-profile-card__name">{{ Auth::user()->name }}</div>
                                        <ul class="header-profile__menu header-profile-menu header-profile__popover">
                                            @if (Auth::user()->hasAnyPermission('view admin'))
                                                <li class="header-profile-menu__item header-profile-menu-item">
                                                    <a class="header-profile-menu-item__link" href="{{ route('nova.login') }}"><span class="header-profile-menu-item__label">Административная панель</span></a>
                                                </li>
                                                <li class="header-profile-menu__item header-profile-menu-item">
                                                    <a class="header-profile-menu-item__link" href="{{ route('users.questionnaire', Auth::user()->id) }}"><span class="header-profile-menu-item__label">Профиль</span></a>
                                                </li>
                                            @endif

                                            <li class="header-profile-menu__item header-profile-menu-item header-profile-menu-item--sep">
                                                <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>

                                                <a class="header-profile-menu-item__link" href="{{ route('auth.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><span class="header-profile-menu-item__label">Выход</span></a>
                                            </li>
                                        </ul>
                                    </a>
                                </div>
                            </li>
                        @else
                            <li class="header-menu__item header-menu-item">
                                <i class="header-menu-item__icon icon icon--lock-alt"></i>
                                <a class="header-menu-item__link" href="{{ route('auth.login') }}"><span class="header-menu-item__label">Вход</span></a>
                                &nbsp;/&nbsp;
                                <a class="header-menu-item__link" href="{{ route('auth.register') }}"><span class="header-menu-item__label">Регистрация</span></a>
                            </li>
                        @endif
                    </ul>

                    {{--<ul class="header-menu header-menu--right">
                        <li class="header-menu__item header-menu-item" style="display:none"><i class="header-menu-item__icon icon icon--lock-alt"></i><a class="header-menu-item__link" href="auth-login.html"><span class="header-menu-item__label">Вход</span></a>&nbsp;/&nbsp;<a class="header-menu-item__link" href="auth-register.html"><span class="header-menu-item__label">Регистрация</span></a></li>
                        <li class="header-menu__item">
                            <div class="header-profile">
                            <a class="header-profile__card header-profile-card header-profile__trigger" href="#"><img class="header-profile-card__image" src="_temp/avatar-xs.png" alt="">
                                    <div class="header-profile-card__name">Имя пользователя</div></a>
                                <ul class="header-profile__menu header-profile-menu header-profile__popover">
                                    <li class="header-profile-menu__item header-profile-menu-item"><a class="header-profile-menu-item__link" href="#"><span class="header-profile-menu-item__label">Административная панель</span></a></li>
                                    <li class="header-profile-menu__item header-profile-menu-item header-profile-menu-item--sep"><a class="header-profile-menu-item__link" href="#"><i class="header-profile-menu-item__icon icon icon--plus-square"></i><span class="header-profile-menu-item__label">Создать тему</span></a></li>
                                    <li class="header-profile-menu__item header-profile-menu-item"><a class="header-profile-menu-item__link" href="#"><i class="header-profile-menu-item__icon icon icon--plus-square"></i><span class="header-profile-menu-item__label">Создать запись</span></a></li>
                                    <li class="header-profile-menu__item header-profile-menu-item header-profile-menu-item--sep"><a class="header-profile-menu-item__link" href="#"><span class="header-profile-menu-item__label">Мои бонусы</span><span class="header-profile-menu-item__info">1 000 ₽</span></a></li>
                                    <li class="header-profile-menu__item header-profile-menu-item"><a class="header-profile-menu-item__link" href="#"><span class="header-profile-menu-item__label">Уведомления</span><span class="header-profile-menu-item__info tag tag--accent">0</span></a></li>
                                    <li class="header-profile-menu__item header-profile-menu-item"><a class="header-profile-menu-item__link" href="#"><span class="header-profile-menu-item__label">Новые сообщения</span><span class="header-profile-menu-item__info tag tag--accent">0</span></a></li>
                                    <li class="header-profile-menu__item header-profile-menu-item"><a class="header-profile-menu-item__link" href="user-questionnaire.html"><span class="header-profile-menu-item__label">Профиль (чужой)</span></a></li>
                                    <li class="header-profile-menu__item header-profile-menu-item"><a class="header-profile-menu-item__link" href="user-my-questionnaire.html"><span class="header-profile-menu-item__label">Профиль</span></a></li>
                                    <li class="header-profile-menu__item header-profile-menu-item"><a class="header-profile-menu-item__link" href="#"><span class="header-profile-menu-item__label">Избранные темы</span></a></li>
                                    <li class="header-profile-menu__item header-profile-menu-item"><a class="header-profile-menu-item__link" href="#"><span class="header-profile-menu-item__label">Настройки</span></a></li>
                                    <li class="header-profile-menu__item header-profile-menu-item header-profile-menu-item--sep"><a class="header-profile-menu-item__link" href="#"><span class="header-profile-menu-item__label">Выход</span></a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>--}}
                </div>
            </div>
        </div>
    </div>
    <div class="header__main">
        <div class="header__inner">
            <div class="header-main">
                <div class="header-main__left">
                    <div class="header__logotype logotype">
                        <a class="logotype__link" href="{{ route('home') }}">
                            <img class="logotype__image" src="{{ $settings['headerLogotype'] }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="header-main__right">
                    <x-header-nav locate="header-nav" />
                </div>
            </div>
            <div class="header-mobile"></div>
        </div>
    </div>
</section>
