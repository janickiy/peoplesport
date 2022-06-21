@extends('web.layouts.app')

@section('body')
    <section class="page">
        <div class="page__inner">
            <x-breadcrumbs />

            <div class="events-single">
                <div class="events-single__content">
                    <div class="panel panel--space">
                        <div class="panel__inner">
                            <div class="events-single__header events-single-header">
                                <div class="events-single-header__left">

                                    <div class="event-profile">
                                        <div class="event-profile__card event-profile-card">
                                            <img class="event-profile-card__image" src="{{ $event->user->avatar() }}" alt="{{ $event->user->name }}">
                                            @if ($event->user->isOnline())
                                                <div class="event-profile-card__status event-profile-card__status--online"></div>
                                            @else
                                                <div class="event-profile-card__status"></div>
                                            @endif
                                        </div>
                                        <div class="event-profile__info event-profile-info">
                                            <a class="event-profile-info__name" href="{{ route('users.profile', $event->user->id) }}">{{ $event->user->login }}</a>
                                            <div class="event-profile-info__meta">
                                                <i class="icon icon--clock"></i> {{ $event->created_at->format('d.m.Y') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="events-single-header__right">
                                    {{--<ul class="menu-link menu-link--secondary">
                                        <li class="menu-link__item menu-link-item">
                                            <a class="menu-link-item__link" href="#">
                                                <i class="menu-link-item__icon icon icon--solid icon--user-plus"></i>
                                                <span class="menu-link-item__label">Подписаться</span>
                                            </a>
                                        </li>
                                        <li class="menu-link__item menu-link-item">
                                            <a class="menu-link-item__link" href="#">
                                                <i class="menu-link-item__icon icon icon--solid icon--envelope"></i>
                                                <span class="menu-link-item__label">Написать личное сообщение</span>
                                            </a>
                                        </li>
                                    </ul>--}}
                                </div>
                            </div>
                            <div class="events-single__card events-single-card">
                                <div class="events-single-card__preview">
                                    <div class="preview">
                                        <img class="preview__image" src="{{ $event->image('card') }}" alt="{{ $event->title }}">
                                        <div class="events-single-card__date">{{ $event->started_at->format('d.m.Y') }}</div>
                                    </div>
                                </div>
                                <div class="events-single-card__info">
                                    <h1 class="events-single-card__heading heading heading--h2">{{ $event->title }}</h1>
                                    <ul class="events-single-card__list events-single-card-list">
                                        <li class="events-single-card-list__item events-single-card-list-item">
                                            <i class="events-single-card-list-item__icon icon icon--light icon--clock"></i>
                                            <span class="events-single-card-list-item__label">Состоится:</span>
                                            <span class="events-single-card-list-item__value">{{ $event->started_at->format('d.m.Y') }}</span></li>
                                        <li class="events-single-card-list__item events-single-card-list-item">
                                            <i class="events-single-card-list-item__icon icon icon--light icon--user-circle"></i>
                                            <span class="events-single-card-list-item__label">Проводит:</span>
                                            <span class="events-single-card-list-item__value">{{ $event->speaker }}</span>
                                        </li>
                                        {{--<li class="events-single-card-list__item events-single-card-list-item">
                                            <i class="events-single-card-list-item__icon icon icon--light icon--video-plus"></i>
                                            <span class="events-single-card-list-item__value">Ссылка для участия: <a href="#">https://www.youtube.com/embed/k1MBQvP9rhk</a></span>
                                        </li>--}}
                                    </ul>
                                    <ul class="events-single-card__meta event-meta">
                                        {{--<li class="event-meta__item event-meta-item">
                                            <a class="event-meta-item__link" href="#">
                                                <i class="event-meta-item__icon icon icon--heart icon--solid"></i>
                                                <span class="event-meta-item__value">Отслеживать</span>
                                            </a>
                                        </li>--}}
                                    </ul>
                                </div>
                            </div>
                            <div class="events-single__text content">
                                {!! $event->content !!}
                            </div>
                            <div class="events-single__footer events-single-footer">
                                <div class="events-single-footer__left">
                                    <ul class="events-single__meta event-meta">
                                        <li class="event-meta__item event-meta-item">
                                            <i class="event-meta-item__icon event-meta-item__icon--like icon icon--thumbs-up icon--solid"></i>
                                            <span class="event-meta-item__value">0</span>
                                        </li>
                                        <li class="event-meta__item event-meta-item">
                                            <i class="event-meta-item__icon event-meta-item__icon--comment icon icon--comment icon--solid"></i>
                                            <span class="event-meta-item__value">0</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="events-single-footer__right">
                                    <x-share />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="comments panel">
                        <div class="panel__inner">
                            <div class="comments__heading heading">0 комментариев</div>
                            {{--
                            <div class="comments__action">
                                <button class="button button--s button--accent" type="submit"><i class="button__icon icon icon--light icon--plus"></i><span class="button__label">Добавить комментарий</span></button>
                            </div>
                            <div class="comments__list">
                                <div class="comment">
                                    <div class="comment__header comment-header">
                                        <div class="comment-header__profile comment-profile">
                                            <div class="comment-profile__card comment-profile-card"><img class="comment-profile-card__image" src="_temp/avatar-xs.png" alt="">
                                                <div class="comment-profile-card__status comment-profile-card__status--online"></div>
                                            </div>
                                            <div class="comment-profile__info comment-profile-info"><a class="comment-profile-info__name" href="#">Lookattme</a></div>
                                        </div>
                                        <div class="comment-header__date"><i class="icon icon--clock"></i> 20 июня, 2020 г.</div>
                                    </div>
                                    <div class="comment__content content">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                            Asperiores commodi cupiditate deserunt dolore ipsam iusto
                                            molestias nam pariatur quae sapiente soluta, tenetur. Doloremque
                                            facere ipsam ipsum maxime nisi quasi rerum.
                                        </p>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                            Asperiores commodi cupiditate deserunt dolore ipsam iusto
                                            molestias nam pariatur quae sapiente soluta, tenetur. Doloremque
                                            facere ipsam ipsum maxime nisi quasi rerum.
                                        </p>
                                    </div>
                                    <div class="comment__footer">
                                        <ul class="comment-meta">
                                            <li class="comment-meta__item comment-meta-item"><a class="comment-meta-item__link" href="#"><i class="comment-meta-item__icon comment-meta-item__icon--like icon icon--thumbs-up icon--solid"></i><span class="comment-meta-item__value">8</span></a></li>
                                            <li class="comment-meta__item comment-meta-item"><a class="comment-meta-item__link" href="#"><i class="comment-meta-item__icon comment-meta-item__icon--comment icon icon--comment icon--solid"></i><span class="comment-meta-item__value">Ответить</span></a></li>
                                        </ul>
                                    </div>
                                    <div class="comment__child">
                                        <div class="comment">
                                            <div class="comment__header comment-header">
                                                <div class="comment-header__profile comment-profile">
                                                    <div class="comment-profile__card comment-profile-card"><img class="comment-profile-card__image" src="_temp/avatar-xs.png" alt="">
                                                        <div class="comment-profile-card__status comment-profile-card__status--online"></div>
                                                    </div>
                                                    <div class="comment-profile__info comment-profile-info"><a class="comment-profile-info__name" href="#">Lookattme</a></div>
                                                </div>
                                                <div class="comment-header__date"><i class="icon icon--clock"></i> 20 июня, 2020 г.</div>
                                            </div>
                                            <div class="comment__content content">
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                    Asperiores commodi cupiditate deserunt dolore ipsam iusto
                                                    molestias nam pariatur quae sapiente soluta, tenetur. Doloremque
                                                    facere ipsam ipsum maxime nisi quasi rerum.
                                                </p>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                    Asperiores commodi cupiditate deserunt dolore ipsam iusto
                                                    molestias nam pariatur quae sapiente soluta, tenetur. Doloremque
                                                    facere ipsam ipsum maxime nisi quasi rerum.
                                                </p>
                                            </div>
                                            <div class="comment__footer">
                                                <ul class="comment-meta">
                                                    <li class="comment-meta__item comment-meta-item"><a class="comment-meta-item__link" href="#"><i class="comment-meta-item__icon comment-meta-item__icon--like icon icon--thumbs-up icon--solid"></i><span class="comment-meta-item__value">8</span></a></li>
                                                    <li class="comment-meta__item comment-meta-item"><a class="comment-meta-item__link" href="#"><i class="comment-meta-item__icon comment-meta-item__icon--comment icon icon--comment icon--solid"></i><span class="comment-meta-item__value">Ответить</span></a></li>
                                                </ul>
                                            </div>
                                            <div class="comment__child">
                                                <div class="comment">
                                                    <div class="comment__header comment-header">
                                                        <div class="comment-header__profile comment-profile">
                                                            <div class="comment-profile__card comment-profile-card"><img class="comment-profile-card__image" src="_temp/avatar-xs.png" alt="">
                                                                <div class="comment-profile-card__status comment-profile-card__status--online"></div>
                                                            </div>
                                                            <div class="comment-profile__info comment-profile-info"><a class="comment-profile-info__name" href="#">Lookattme</a></div>
                                                        </div>
                                                        <div class="comment-header__date"><i class="icon icon--clock"></i> 20 июня, 2020 г.</div>
                                                    </div>
                                                    <div class="comment__content content">
                                                        <p>
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                            Asperiores commodi cupiditate deserunt dolore ipsam iusto
                                                            molestias nam pariatur quae sapiente soluta, tenetur. Doloremque
                                                            facere ipsam ipsum maxime nisi quasi rerum.
                                                        </p>
                                                        <p>
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                            Asperiores commodi cupiditate deserunt dolore ipsam iusto
                                                            molestias nam pariatur quae sapiente soluta, tenetur. Doloremque
                                                            facere ipsam ipsum maxime nisi quasi rerum.
                                                        </p>
                                                    </div>
                                                    <div class="comment__footer">
                                                        <ul class="comment-meta">
                                                            <li class="comment-meta__item comment-meta-item"><a class="comment-meta-item__link" href="#"><i class="comment-meta-item__icon comment-meta-item__icon--like icon icon--thumbs-up icon--solid"></i><span class="comment-meta-item__value">8</span></a></li>
                                                            <li class="comment-meta__item comment-meta-item"><a class="comment-meta-item__link" href="#"><i class="comment-meta-item__icon comment-meta-item__icon--comment icon icon--comment icon--solid"></i><span class="comment-meta-item__value">Ответить</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="comment">
                                        <div class="comment__header comment-header">
                                            <div class="comment-header__profile comment-profile">
                                                <div class="comment-profile__card comment-profile-card"><img class="comment-profile-card__image" src="_temp/avatar-xs.png" alt="">
                                                    <div class="comment-profile-card__status comment-profile-card__status--online"></div>
                                                </div>
                                                <div class="comment-profile__info comment-profile-info"><a class="comment-profile-info__name" href="#">Lookattme</a></div>
                                            </div>
                                            <div class="comment-header__date"><i class="icon icon--clock"></i> 20 июня, 2020 г.</div>
                                        </div>
                                        <div class="comment__content content">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                Asperiores commodi cupiditate deserunt dolore ipsam iusto
                                                molestias nam pariatur quae sapiente soluta, tenetur. Doloremque
                                                facere ipsam ipsum maxime nisi quasi rerum.
                                            </p>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                Asperiores commodi cupiditate deserunt dolore ipsam iusto
                                                molestias nam pariatur quae sapiente soluta, tenetur. Doloremque
                                                facere ipsam ipsum maxime nisi quasi rerum.
                                            </p>
                                        </div>
                                        <div class="comment__footer">
                                            <ul class="comment-meta">
                                                <li class="comment-meta__item comment-meta-item"><a class="comment-meta-item__link" href="#"><i class="comment-meta-item__icon comment-meta-item__icon--like icon icon--thumbs-up icon--solid"></i><span class="comment-meta-item__value">8</span></a></li>
                                                <li class="comment-meta__item comment-meta-item"><a class="comment-meta-item__link" href="#"><i class="comment-meta-item__icon comment-meta-item__icon--comment icon icon--comment icon--solid"></i><span class="comment-meta-item__value">Ответить</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pagination">
                                <div class="pagination__group"><a class="pagination__item pagination__item--start" href="#"><i class="icon icon--angle-double-left"></i></a><a class="pagination__item pagination__item--prev" href="#"><i class="icon icon--angle-left"></i></a></div>
                                <div class="pagination__group"><a class="pagination__item" href="#">1</a><span class="pagination__item pagination__item--dots">...</span><a class="pagination__item" href="#">4</a><a class="pagination__item pagination__item--active" href="#">5</a><a class="pagination__item" href="#">6</a><span class="pagination__item pagination__item--dots">...</span><a class="pagination__item" href="#">23</a></div>
                                <div class="pagination__group"><a class="pagination__item pagination__item--next" href="#"><i class="icon icon--angle-right"></i></a><a class="pagination__item pagination__item--end" href="#"><i class="icon icon--angle-double-right"></i></a></div>
                            </div>--}}
                        </div>
                    </div>
                </div>
                <div class="events-single__aside aside">
                    <div class="aside__widget">
                        @include('web.shared.widgets.events-list', ['events' => $relatedEvents])
                    </div>

                    @if ($settings['eventsBanners'])
                        @foreach($settings['eventsBanners'] as $block)
                            <div class="aside__widget">
                                @include('web.shared.widgets.commercial', ['banner' => $block])
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
