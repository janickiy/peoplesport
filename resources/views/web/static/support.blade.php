@extends('web.layouts.app')

@section('body')
    <section class="page">
        <div class="page__inner">
            <x-breadcrumbs/>

            <h1 class="heading heading--upper">{{ $page->title }}</h1>

            @include('web.layouts.notifications')

            @if (!session('success'))

                <div class="panel">
                    <div class="panel__inner">
                        <div class="support-page">
                            <div class="support-page__info support-info">
                                <div class="support-info__heading heading heading--center">Обратная связь</div>
                                <div class="support-info__content content">
                                    {!! $page->content !!}
                                </div>
                            </div>

                            {!! Form::open(['url' =>  URL::route('support'), 'method' => 'post', 'class' => 'support-page__form support-form form']) !!}

                            <div class="support-form__left">
                                <div class="form-item form-item--required">
                                    <label class="form-item__label">Ваше имя:</label>
                                    <input class="form-item__control" type="text" name="name" required>
                                </div>
                                <div class="form-item form-item--required">
                                    <label class="form-item__label">E-mail:</label>
                                    <input class="form-item__control" type="email" name="email" required>
                                </div>
                                <div class="form-item form-item--required form-control--select">
                                    <label class="form-item__label">Выберите тему обращения:</label>
                                    <div class="form-select">
                                        <div class="form-select__trigger form-item__group">
                                            <input class="form-select__placeholder form-item__control" type="text"
                                                   autocomplete="off" readonly>
                                            <input class="form-select__control form-item__control" type="text"
                                                   name="subject" autocomplete="off" required><i
                                                class="form-select__arrow"></i>
                                        </div>
                                        <div class="form-select__items"><a class="form-select__option" href="#"
                                                                           data-value="1">Заказ и предложение
                                                услуг</a><a class="form-select__option" href="#" data-value="2">Настройки
                                                аккаунта/профиля</a><a class="form-select__option" href="#"
                                                                       data-value="3">Пакеты размещений (лимиты)</a><a
                                                class="form-select__option" href="#" data-value="4">Уведомления</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="support-form__right">
                                <div class="form-item form-item--required">
                                    <label class="form-item__label">Сообщение:</label>
                                    <textarea class="form-item__control form-item__control--textarea" name="message"
                                              rows="10" required></textarea>
                                </div>
                            </div>
                            <div class="support-form__middle">
                                <div class="form-item form-control--checkbox">
                                    <div class="form-checkbox">
                                        <input class="form-checkbox__control" type="checkbox" name="privacy-policy"
                                               id="support-privacy-policy" checked required>
                                        <label class="form-checkbox__label" for="support-privacy-policy">Настоящим
                                            подтверждаю, что я ознакомлен и согласен с условиями <a
                                                href="page-privacy-policy.html">политики конфиденциальности</a></label>
                                    </div>
                                </div>
                                <div class="form-item form-item--center form-item--last">
                                    <button class="button button--primary" type="submit"><span class="button__label">Задать вопрос</span>
                                    </button>
                                </div>
                            </div>

                            {!! Form::close() !!}

                        </div>
                    </div>

                </div>

        @endif

    </section>
@endsection
