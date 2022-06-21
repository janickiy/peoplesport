@extends('web.layouts.app')

@section('body')
    <section class="page">
        <div class="page__inner">
            <x-breadcrumbs />

            <h1 class="heading heading--upper">{{ $page->title }}</h1>

            <div class="panel">
                <div class="panel__inner">
                    <div class="awards-page">
                        <div class="awards-page__content content">
                            {!! $page->content !!}
                        </div>

                        @if ($categories->isNotEmpty())
                            @foreach($categories as $category)
                                <div class="awards-page__category awards-category">
                                    <div class="awards-category__info">
                                        <img class="awards-category__icon" src="{{ $category->image('icon') }}" alt="">
                                        <div class="awards-category__heading heading">{{ $category->title }}</div>
                                    </div>

                                    @if ($category->awards->isNotEmpty())
                                        <div class="awards-category__list">
                                            @foreach($category->awards as $award)
                                                <div class="awards-category__item">
                                                    <div class="awards-item">
                                                        <img class="awards-item__icon" src="{{ $award->image('icon') }}" alt="">
                                                        <div class="awards-item__title">«{{ $award->title }}»</div>
                                                        <div class="awards-item__description">{{ $award->description }}</div>
                                                        <div class="awards-item__counter">Получило: 0 чел</div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        {{-- Ничего не найдено --}}
                                    @endif
                                </div>
                            @endforeach
                        @else
                            {{-- Ничего не найдено --}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
