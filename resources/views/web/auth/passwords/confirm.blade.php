@extends('web.layouts.app')

@section('body')
    <section class="page">
        <div class="page__inner">
            <x-breadcrumbs />

            <div class="panel">
                <div class="panel__inner">
                    <div class="auth-page">
                        <ul class="auth-page__menu tab-menu">
                            <li class="tab-menu__item tab-menu-item tab-menu-item--active">
                                <a class="tab-menu-item__link" href="javascript:void(0)">Подтверждение пароля</a>
                            </li>
                        </ul>

                        <div class="content">
                            <p>Пожалуйста, подтвердите свой пароль, прежде чем продолжить.</p>
                        </div>

                        <form class="auth-page__form auth-form form" method="post" action="{{ route('auth.password.confirm') }}">
                            @csrf

                            <div class="auth-form__layout">
                                <div class="auth-form__col">
                                    <div class="form-item form-item--required">
                                        <div class="form-item__info">
                                            <div class="tooltip">
                                                <div class="tooltip__label icon icon--light icon--question-circle"></div>
                                                <div class="tooltip__content">
                                                    Пароль должен содержать <br>
                                                    не менее 8-ми символов, <br>
                                                    в том числе цифры, одну <br>
                                                    заглавную букву, одну <br>
                                                    строчную, без пробелов.
                                                </div>
                                            </div>
                                        </div>
                                        <label class="form-item__label">Пароль:</label>
                                        <input class="form-item__control @error('password') form-item__control--invalid @enderror" type="password" name="password" autocomplete="current-password" required>
                                    </div>

                                    <div class="auth-form__layout auth-form__layout--center">
                                        <div class="auth-form__action">
                                            <button class="button button--s button--accent" type="submit"><span class="button__label">Подтвердить пароль</span></button>
                                        </div>

                                        @if (Route::has('auth.password.request'))
                                            <div class="auth-form__remember">
                                                <a class="auth-form__forgot-link" href="{{ route('auth.password.request') }}">Забыли пароль?</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
