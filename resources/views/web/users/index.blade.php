@extends('web.layouts.app')

@section('body')
    <section class="page">
        <div class="page__inner">
            <x-breadcrumbs />

            <h1 class="heading heading--upper">{{ $page->title }}</h1>

            <div class="users-page">
                {{--
                <div class="users-page__search users-search panel">
                    <div class="panel__inner">
                        <form class="users-search-form form">
                            <div class="form-item">
                                <label class="form-item__label">Поиск по имени или никнейму:</label>
                                <input class="form-item__control" type="text" name="name">
                            </div>
                            <div class="users-search-form__layout">
                                <div class="users-search-form__col">
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
                                <div class="users-search-form__col">
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
                                <div class="users-search-form__col">
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
                            <div class="users-search-form__action">
                                <div class="form-item form-item--last">
                                    <button class="button button--primary" type="submit"><span class="button__label">Применить</span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                --}}

                <div class="users-page__list panel">
                    <div class="panel__inner">
                        @if ($users->isNotEmpty())
                            <div class="users-list-grid">
                                @foreach($users as $user)
                                    <div class="users-list-grid__item">
                                        @include('web.users.parts.search-card', ['user' => $user])
                                    </div>
                                @endforeach
                            </div>
                        @else
                            {{-- Ничего не найдено --}}
                        @endif

                        <x-pagination :paginator="$users" />
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
