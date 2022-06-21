@extends('web.layouts.app')

@section('body')
    <section class="page">
        <div class="page__inner">
            <x-breadcrumbs />

            <div class="panel">
                <div class="panel__inner">
                    <div class="partners-page">
                        <div class="partners-page__banner partners-banner">
                            <div class="partners-banner__heading">
                                Хотите стать нашим партнером?
                            </div>
                            <div class="partners-banner__text">
                                Мы рады приветствовать вас!
                            </div>
                        </div>

                        <div class="partners-page__layout partners-layout">
                            <div class="partners-layout__contacts">
                                <div class="heading">{!! $contacts['title'] !!}</div>

                                @if ($contacts['items'])
                                    @foreach($contacts['items'] as $contact)
                                        <div class="partners-contacts">
                                            <div class="partners-contacts__heading">{{ $contact['attributes']['title'] }}</div>
                                            <ul class="partners-contacts__list">
                                                @foreach($contact['attributes']['list'] as $item)
                                                    <li class="partners-contacts__item">
                                                        <i class="partners-contacts__icon icon icon--{{ $item['attributes']['icon'] }}"></i>
                                                        <span class="partners-contacts__label">{{ $item['attributes']['label'] }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="partners-layout__feedback">
                                <div class="heading">{!! $feedback['title'] !!}</div>
                                <div class="partners-page__feedback-description content">{!! $feedback['description'] !!}</div>

                                @if ($page->sendEmail)
                                    <div class="alert alert--accent">
                                        <div class="alert__content">Ваше сообщение отправлено</div>
                                    </div>
                                @else
                                    <form class="auth-page__form auth-form form" method="post" action="{{ route('static.partners') }}">
                                        @csrf

                                        <div class="form-item form-item--required">
                                            <label class="form-item__label">Ваше имя:</label>
                                            <input class="form-item__control @error('name') form-item__control--invalid @enderror" type="text" name="name" value="{{ old('name') }}" required>
                                        </div>

                                        <div class="form-item form-item--required">
                                            <label class="form-item__label">Номер телефона:</label>
                                            <input class="form-item__control @error('phone') form-item__control--invalid @enderror" type="text" name="phone" value="{{ old('phone') }}" required>
                                        </div>

                                        <div class="form-item form-control--checkbox">
                                            <div class="form-checkbox">
                                                <input class="form-checkbox__control" type="checkbox" name="privacy-policy" id="auth-register-privacy-policy" checked required>
                                                <label class="form-checkbox__label" for="auth-register-privacy-policy">Настоящим подтверждаю, что я ознакомлен и согласен с условиями <a href="/pages/privacy-policy">политики конфиденциальности</a></label>
                                            </div>
                                        </div>

                                        <div class="form-item">
                                            <button class="button button--s button--accent" type="submit"><span class="button__label">Отправить</span></button>
                                        </div>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
