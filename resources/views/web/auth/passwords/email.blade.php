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

                        @if (session('status'))
                            <div class="auth-page__message">
                                <div class="alert alert--success">
                                    {{ session('status') }}
                                </div>
                            </div>
                        @endif

                        {!! Form::open(['url' =>  URL::route('auth.password.email'), 'method' => 'post', 'class' => 'auth-page__form auth-form form']) !!}


                            <div class="auth-form__layout">
                                <div class="auth-form__col">
                                    <div class="form-item form-item--required">
                                        <label class="form-item__label">E-mail:</label>
                                        <input class="form-item__control @error('email') form-item__control--invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    </div>
                                </div>
                            </div>

                            <div class="form-item form-item--last">
                                <button class="button button--s button--accent" type="submit"><span class="button__label">Отправить ссылку для сброса пароля</span></button>
                            </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
