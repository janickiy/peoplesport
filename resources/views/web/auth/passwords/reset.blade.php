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
                                <a class="tab-menu-item__link" href="javascript:void(0)">Сброс пароля</a>
                            </li>
                        </ul>

                        <form class="auth-page__form auth-form form" action="{{ route('auth.password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="auth-form__layout">
                                <div class="auth-form__col">
                                    <div class="form-item form-item--required">
                                        <label class="form-item__label">E-mail:</label>
                                        <input class="form-item__control @error('email') form-item__control--invalid @enderror" type="email" name="email" value="{{ $email ?? old('email') }}" required>
                                    </div>
                                </div>
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
                                        <input class="form-item__control @error('password') form-item__control--invalid @enderror" type="password" name="password" autocomplete="new-password" required>
                                    </div>
                                </div>
                                <div class="auth-form__col">
                                    <div class="form-item form-item--required">
                                        <label class="form-item__label">Повторите пароль:</label>
                                        <input class="form-item__control" type="password" name="password_confirmation" autocomplete="new-password" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-item form-item--last">
                                <button class="button button--s button--accent" type="submit"><span class="button__label">Сброс пароля</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

