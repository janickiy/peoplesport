@extends('web.layouts.app')

@section('body')
    <section class="page">
        <div class="page__inner">
            <div class="home-promo">
                <div class="home-promo-grid">
                    @if (isset($settings['promoBlocks'][0]))
                        @foreach($settings['promoBlocks'][0] as $block)
                            <div class="home-promo-grid__item">
                                <a class="home-promo-banner" href="{{ $block['attributes']['url'] }}">
                                    <img class="home-promo-banner__image" src="{{ $block['attributes']['image'] }}" alt="">
                                    <span class="home-promo-banner__title">
                                        <img src="{{ $block['attributes']['icon'] }}" class="home-promo-banner__icon" alt="">
                                        {{ $block['attributes']['title'] }}
                                    </span>
                                </a>
                            </div>
                        @endforeach
                    @endif

                    @if ($settings['promoSlider'])
                        <div class="home-promo-grid__item home-promo-grid__item--middle">
                            <div class="home-promo-slider splide splide--pagination-right-abs">
                                <div class="splide__track">
                                    <ul class="splide__list">
                                        @foreach($settings['promoSlider'] as $slide)
                                            <li class="splide__slide">
                                                <a class="home-promo-slider__item" href="{{ $slide['attributes']['url'] }}">
                                                    <img class="home-promo-slider__image" src="{{ $slide['attributes']['image'] }}" alt="">
                                                    <div class="home-promo-slider__info">
                                                        <div class="home-promo-slider__heading heading heading--upper">{{ $slide['attributes']['title'] }}</div>
                                                        <div class="home-promo-slider__more">Перейти <i class="icon icon--long-arrow-right"></i></div>
                                                    </div>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (isset($settings['promoBlocks'][1]))
                        @foreach($settings['promoBlocks'][1] as $block)
                            <div class="home-promo-grid__item">
                                <a class="home-promo-banner" href="{{ $block['attributes']['url'] }}">
                                    <img class="home-promo-banner__image" src="{{ $block['attributes']['image'] }}" alt="">
                                    <span class="home-promo-banner__title">
                                        <img src="{{ $block['attributes']['icon'] }}" class="home-promo-banner__icon" alt="">
                                        {{ $block['attributes']['title'] }}
                                    </span>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="home-events">
                <div class="home-events__content">
                    <div class="panel">
                        @if ($latestEventsCategories->isNotEmpty())
                            <div class="panel__inner">
                                <div class="heading-nav">
                                    <div class="heading-nav__left heading heading--upper">Новые публикации</div>
                                    <div class="heading-nav__right">
                                        <ul class="heading-nav__list">
                                            @foreach($latestEventsCategories as $key => $category)
                                                <li class="heading-nav__item heading-nav-item @if ($key == 0 ) heading-nav-item--active @endif">
                                                    <a class="heading-nav-item__link" href="javascript:void(0)" data-items-id="{{ $category->slug }}">{{ $category->title }}</a>
                                                </li>
                                            @endforeach
                                         </ul>
                                    </div>
                                </div>
                                <div class="events-archive-grid">
                                    @foreach($latestEventsCategories as $key => $category)
                                        @foreach($category->items as $keyEvent => $event)
                                            @if ($keyEvent == 0)
                                                <div data-id="{{ $category->slug }}" class="events-archive-grid__item events-archive-grid__item--full" @if ($key != 0 ) style="display: none" @endif">
                                                    @include('web.static.parts.event-card-full', ['event' => $event])
                                                </div>
                                            @else
                                                <div data-id="{{ $category->slug }}" class="events-archive-grid__item" @if ($key != 0 ) style="display: none" @endif">
                                                    @include('web.static.parts.event-card', ['event' => $event])
                                                </div>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        @else
                            {{-- Ничего не найдено --}}
                        @endif
                    </div>
                </div>
                <div class="home-events__aside aside">
                    <div class="aside__widget">
                        @include('web.shared.widgets.calendar')
                    </div>
                    <div class="aside__widget">
                        @include('web.shared.widgets.subscribe')
                    </div>
                </div>
            </div>

            <div class="home-news">
                <div class="home-news__aside aside">
                    <div class="aside__widget">
                        <div class="widget-top-users">
                            <div class="widget-top-users__heading heading heading--upper heading--h2">Топ блоггеры</div>

                            @if ($topBloggers->isNotEmpty())
                                @include('web.shared.widgets.top-users', ['users' => $topBloggers])
                            @else
                                {{-- Ничего не найдено --}}
                            @endif
                        </div>
                    </div>
                </div>
                <div class="home-news__content">
                    <div class="panel">
                        <div class="panel__inner">
                            <div class="heading-nav">
                                <div class="heading-nav__left heading heading--upper">Главные новости</div>
                                <div class="heading-nav__right">
                                    <a class="link" href="{{ route('news.index') }}">Смотреть все новости</a>
                                </div>
                            </div>

                            @if ($news->isNotEmpty())
                                <div class="home-news__slider splide splide--arrows-right splide--pagination-left">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            @foreach($news as $index => $entity)
                                                <li class="splide__slide">
                                                    @include('web.static.parts.news-card', ['news' => $entity])
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @else
                                {{-- Ничего не найдено --}}
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="home-events">
                <div class="home-events__content">
                    <div class="panel">
                        @if ($popularEventsCategories->isNotEmpty())
                            <div class="panel__inner">
                                <div class="heading-nav">
                                    <div class="heading-nav__left heading heading--upper">Популярные публикации</div>
                                    <div class="heading-nav__right">
                                        <ul class="heading-nav__list">
                                            @foreach($popularEventsCategories as $key => $category)
                                                <li class="heading-nav__item heading-nav-item @if ($key == 0 ) heading-nav-item--active @endif">
                                                    <a class="heading-nav-item__link" href="javascript:void(0)" data-items-id="{{ $category->slug }}">{{ $category->title }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="events-archive-grid">
                                    @foreach($popularEventsCategories as $key => $category)
                                        @foreach($category->items as $event)
                                            <div data-id="{{ $category->slug }}" class="events-archive-grid__item" @if ($key != 0 ) style="display: none" @endif">
                                                @include('web.static.parts.event-card', ['event' => $event])
                                            </div>
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        @else
                            {{-- Ничего не найдено --}}
                        @endif
                    </div>
                </div>
                <div class="home-events__aside aside">
                    @if ($settings['homeBanners'])
                        @foreach($settings['homeBanners'] as $block)
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
