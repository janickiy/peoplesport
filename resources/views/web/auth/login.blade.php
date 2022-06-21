@extends('web.layouts.app')

@section('body')
    <section class="page">
        <div class="page__inner">
            <x-breadcrumbs />

            <div class="panel">
                <div class="panel__inner">
                    <div class="auth-page">
                        @include('web.auth.parts.tab-menu')

                        <form class="auth-page__form auth-form form" method="post" action="{{ route('auth.login') }}">
                            @csrf

                            <div class="auth-form__layout">
                                <div class="auth-form__col">
                                    <div class="form-item form-item--required">
                                        <label class="form-item__label">E-mail:</label>
                                        <input class="form-item__control @error('email') form-item__control--invalid @enderror" type="email" name="email" value="{{ old('email') }}" required>
                                    </div>
                                    <div class="form-item form-item--required">
                                        <div class="form-item__info"><a class="auth-form__forgot-link" href="{{ route('auth.password.request') }}">Забыли пароль?</a></div>
                                        <label class="form-item__label">Пароль:</label>
                                        <input class="form-item__control @error('password') form-item__control--invalid @enderror" type="password" name="password" required>
                                    </div>
                                    <div class="auth-form__layout auth-form__layout--center">
                                        <div class="auth-form__action">
                                            <div class="form-item">
                                                <button class="button button--s button--accent" type="submit"><span class="button__label">Войти</span></button>
                                            </div>
                                        </div>
                                        <div class="auth-form__remember">
                                            <div class="form-item form-control--checkbox">
                                                <div class="form-checkbox">
                                                    <input class="form-checkbox__control" type="checkbox" name="remember" id="auth-login-remember" {{ old('remember') ? 'checked' : '' }}>
                                                    <label class="form-checkbox__label" for="auth-login-remember">Запомнить меня</label>
                                                </div>
                                            </div>
                                        </div>
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
