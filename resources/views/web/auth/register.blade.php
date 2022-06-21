@extends('web.layouts.app')

@section('body')
    <section class="page">
        <div class="page__inner">
            <x-breadcrumbs />

            <div class="panel">
                <div class="panel__inner">
                    <div class="auth-page">
                        @include('web.auth.parts.tab-menu')

                        @if($errors->any())
                            <div class="alert alert--danger">
                                <div class="alert__content">
                                    {!! implode('', $errors->all('<div>:message</div>')) !!}
                                </div>
                            </div>
                        @endif

                        <form class="auth-page__form auth-form form" method="post" action="{{ route('auth.register') }}">
                            @csrf

                            <div class="auth-form__layout">
                                <div class="auth-form__col">
                                    <div class="form-item form-item--required">
                                        <label class="form-item__label">E-mail:</label>
                                        <input class="form-item__control @error('email') form-item__control--invalid @enderror" type="email" name="email" value="{{ old('email') }}" required>
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
                            <div class="auth-form__hr"></div>
                            <div class="auth-form__layout">
                                <div class="auth-form__col">
                                    <div class="form-item form-item--required">
                                        {{--<div class="form-item__info">
                                            <div class="tooltip">
                                                <div class="tooltip__label icon icon--light icon--question-circle"></div>
                                                <div class="tooltip__content">Lorem</div>
                                            </div>
                                        </div>--}}
                                        <label class="form-item__label">Логин:</label>
                                        <input class="form-item__control @error('login') form-item__control--invalid @enderror" type="text" name="login" value="{{ old('login') }}" required>
                                    </div>
                                </div>
                                <div class="auth-form__col">
                                    <div class="form-item form-item--required">
                                        <label class="form-item__label">ФИО:</label>
                                        <input class="form-item__control @error('name') form-item__control--invalid @enderror" type="text" name="name" value="{{ old('name') }}" required>
                                    </div>
                                </div>
                                <div class="auth-form__col">
                                    <div class="form-item">
                                        <label class="form-item__label">Дата рождения:</label>
                                        <div class="form-item__group form-item__group--icon-right">
                                            <input class="form-item__control" type="text" name="birthday" value="{{ old('birthday') }}">
                                            <i class="form-item__icon form-item__icon--right icon icon--calendar-alt"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="auth-form__col">
                                    <div class="form-item form-control--select">
                                        <label class="form-item__label">Пол:</label>
                                        <div class="form-select">
                                            <div class="form-select__trigger form-item__group">
                                                <input class="form-select__placeholder form-item__control" type="text" autocomplete="off" readonly>
                                                <input class="form-select__control form-item__control" type="number" name="gender_id" autocomplete="off" value="{{ old('gender_id') }}">
                                                <i class="form-select__arrow"></i>
                                            </div>
                                            <div class="form-select__items">
                                                @foreach($dictionary['genders'] as $gender)
                                                    <a class="form-select__option" href="#" data-value="{{ $gender->id }}">{{ $gender->title }}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="auth-form__col">
                                    <div class="form-item form-control--select">
                                        <label class="form-item__label">Город:</label>
                                        <div class="form-select">
                                            <div class="form-select__trigger form-item__group">
                                                <input class="form-select__placeholder form-item__control" type="text" autocomplete="off" readonly>
                                                <input class="form-select__control form-item__control" type="number" name="city_id" autocomplete="off" value="{{ old('city_id') }}">
                                                <i class="form-select__arrow"></i>
                                            </div>
                                            <div class="form-select__items">
                                                @foreach($dictionary['cities'] as $city)
                                                    <a class="form-select__option" href="#" data-value="{{ $city->id }}">{{ $city->title }}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="auth-form__col">
                                    <div class="form-item">
                                        <label class="form-item__label">Образование:</label>
                                        <input class="form-item__control" type="text" name="education" value="{{ old('education') }}">
                                    </div>
                                </div>
                                {{--
                                <div class="auth-form__col">
                                    <div class="form-item form-item--required form-control--select">
                                        <label class="form-item__label">Род занятий:</label>
                                        <div class="form-select">
                                            <div class="form-select__trigger form-item__group">
                                                <input class="form-select__placeholder form-item__control" type="text" autocomplete="off" readonly>
                                                <input class="form-select__control form-item__control" type="text" name="occupation" autocomplete="off" required><i class="form-select__arrow"></i>
                                            </div>
                                            <div class="form-select__items"><a class="form-select__option" href="#" data-value="1">Вариант №1</a><a class="form-select__option" href="#" data-value="2">Вариант №2</a><a class="form-select__option" href="#" data-value="3">Вариант №3</a><a class="form-select__option" href="#" data-value="4">Вариант №4</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="auth-form__col">
                                    <div class="form-item form-item--required form-control--select">
                                        <label class="form-item__label">Вид спорта:</label>
                                        <div class="form-select">
                                            <div class="form-select__trigger form-item__group">
                                                <input class="form-select__placeholder form-item__control" type="text" autocomplete="off" readonly>
                                                <input class="form-select__control form-item__control" type="text" name="kind-of-sport" autocomplete="off" required><i class="form-select__arrow"></i>
                                            </div>
                                            <div class="form-select__items"><a class="form-select__option" href="#" data-value="1">Вариант №1</a><a class="form-select__option" href="#" data-value="2">Вариант №2</a><a class="form-select__option" href="#" data-value="3">Вариант №3</a><a class="form-select__option" href="#" data-value="4">Вариант №4</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="auth-form__col">
                                    <div class="form-item form-item--required form-control--select">
                                        <label class="form-item__label">Вид деятельности:</label>
                                        <div class="form-select">
                                            <div class="form-select__trigger form-item__group">
                                                <input class="form-select__placeholder form-item__control" type="text" autocomplete="off" readonly>
                                                <input class="form-select__control form-item__control" type="text" name="kind-of-activity" autocomplete="off" required><i class="form-select__arrow"></i>
                                            </div>
                                            <div class="form-select__items"><a class="form-select__option" href="#" data-value="1">Вариант №1</a><a class="form-select__option" href="#" data-value="2">Вариант №2</a><a class="form-select__option" href="#" data-value="3">Вариант №3</a><a class="form-select__option" href="#" data-value="4">Вариант №4</a></div>
                                        </div>
                                    </div>
                                </div>
                                --}}
                            </div>
                            <div class="form-item">
                                <label class="form-item__label">О себе:</label>
                                <textarea class="form-item__control form-item__control--textarea" name="biography" rows="5">{{ old('biography') }}</textarea>
                            </div>
                            <div class="form-item form-control--checkbox">
                                <div class="form-checkbox">
                                    <input class="form-checkbox__control" type="checkbox" name="privacy-policy" id="auth-register-privacy-policy" checked required>
                                    <label class="form-checkbox__label" for="auth-register-privacy-policy">Настоящим подтверждаю, что я ознакомлен и согласен с условиями <a href="/pages/privacy-policy">политики конфиденциальности</a></label>
                                </div>
                            </div>
                            <div class="form-item form-control--checkbox">
                                <div class="form-checkbox">
                                    <input class="form-checkbox__control" type="checkbox" name="subscribe-news" id="auth-register-subscribe-news" checked>
                                    <label class="form-checkbox__label" for="auth-register-subscribe-news">Подписаться на новостную рассылку. Выбрав вариант подписки, даю согласие на получение рассылки рекламно-информационного характера.</label>
                                </div>
                            </div>
                            <div class="form-item form-item--last">
                                <button class="button button--s button--accent" type="submit"><span class="button__label">Зарегистрироваться</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
