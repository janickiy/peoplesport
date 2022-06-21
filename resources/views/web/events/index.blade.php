@extends('web.layouts.app')

@section('body')
    <section class="page">
        <div class="page__inner">
            <x-breadcrumbs />

            <h1 class="heading heading--upper">Мероприятия</h1>

            {{--
            <div class="events-search panel">
                <div class="panel__inner">
                    <form class="events-search__form events-search-form form">
                        <div class="form-item">
                            <label class="form-item__label">Поиск по мероприятию или никнейму:</label>
                            <input class="form-item__control" type="text" name="name">
                        </div>
                        <div class="events-search-form__layout">
                            <div class="events-search-form__col">
                                <div class="form-item form-control--select">
                                    <label class="form-item__label">Род занятий:</label>
                                    <div class="form-select">
                                        <div class="form-select__trigger form-item__group">
                                            <input class="form-select__placeholder form-item__control" type="text" autocomplete="off" readonly>
                                            <input class="form-select__control form-item__control" type="text" name="occupation" autocomplete="off"><i class="form-select__arrow"></i>
                                        </div>
                                        <div class="form-select__items"><a class="form-select__option" href="#" data-value="1">Вариант №1</a><a class="form-select__option" href="#" data-value="2">Вариант №2</a><a class="form-select__option" href="#" data-value="3">Вариант №3</a><a class="form-select__option" href="#" data-value="4">Вариант №4</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="events-search-form__col">
                                <div class="form-item form-control--select">
                                    <label class="form-item__label">Род занятий:</label>
                                    <div class="form-select">
                                        <div class="form-select__trigger form-item__group">
                                            <input class="form-select__placeholder form-item__control" type="text" autocomplete="off" readonly>
                                            <input class="form-select__control form-item__control" type="text" name="kind-of-sport" autocomplete="off"><i class="form-select__arrow"></i>
                                        </div>
                                        <div class="form-select__items"><a class="form-select__option" href="#" data-value="1">Вариант №1</a><a class="form-select__option" href="#" data-value="2">Вариант №2</a><a class="form-select__option" href="#" data-value="3">Вариант №3</a><a class="form-select__option" href="#" data-value="4">Вариант №4</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="events-search-form__col">
                                <div class="form-item  form-control--select">
                                    <label class="form-item__label">Вид деятельности:</label>
                                    <div class="form-select">
                                        <div class="form-select__trigger form-item__group">
                                            <input class="form-select__placeholder form-item__control" type="text" autocomplete="off" readonly>
                                            <input class="form-select__control form-item__control" type="text" name="kind-of-activity" autocomplete="off"><i class="form-select__arrow"></i>
                                        </div>
                                        <div class="form-select__items"><a class="form-select__option" href="#" data-value="1">Вариант №1</a><a class="form-select__option" href="#" data-value="2">Вариант №2</a><a class="form-select__option" href="#" data-value="3">Вариант №3</a><a class="form-select__option" href="#" data-value="4">Вариант №4</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="events-search-form__action">
                            <div class="form-item form-item--last">
                                <button class="button button--primary" type="submit"><span class="button__label">Применить</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="events-filters">
                <form class="events-filters__form events-filters-form form">
                    <div class="events-filters-form__layout">
                        <div class="events-filters-form__col">
                            <div class="form-item form-control--select">
                                <div class="form-select">
                                    <div class="form-select__trigger form-item__group form-item__group--icon-left"><i class="form-item__icon form-item__icon--left icon icon--calendar-alt"></i>
                                        <input class="form-select__placeholder form-item__control" type="text" autocomplete="off" value="По дате" readonly>
                                        <input class="form-select__control form-item__control" type="text" name="occupation" autocomplete="off"><i class="form-select__arrow"></i>
                                    </div>
                                    <div class="form-select__items"><a class="form-select__option" href="#" data-value="1">По дате</a><a class="form-select__option" href="#" data-value="2">По популярности</a><a class="form-select__option" href="#" data-value="3">Подписки</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            --}}

            <div class="events-archive">
                <div class="events-archive__content">
                    @if ($events->isNotEmpty())
                        <div class="events-archive-grid">
                            @foreach($events as $index => $entity)
                                @if ($index === 0)
                                    <div class="events-archive-grid__item events-archive-grid__item--full">
                                        @include('web.events.parts.card-full', ['event' => $entity])
                                    </div>
                                @else
                                    <div class="events-archive-grid__item">
                                        @include('web.events.parts.card', ['event' => $entity])
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @else
                        {{-- Ничего не найдено --}}
                    @endif
                </div>
                <div class="events-archive__aside aside">
                    <div class="aside__widget">
                        @include('web.shared.widgets.calendar')
                    </div>

                    <div class="aside__widget">
                        @include('web.shared.widgets.top-users', ['users' => []])
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

            <x-pagination :paginator="$events" />
        </div>
    </section>
@endsection
