@extends('web.layouts.app')

@section('body')
    <section class="page">
        <div class="page__inner">
            <x-breadcrumbs />

            <div class="forum-categories">
                <div class="panel">
                    <div class="panel__inner">
                        <div class="forum-categories__header">
                            <div class="forum-categories__heading heading">Форум</div>
                        </div>
                        <div class="forum-categories__grid forum-categories-grid">
                            @foreach($threads as $latter => $items)
                                <div class="forum-categories-grid__item forum-categories-grid-item">
                                    <div class="forum-categories-grid-item__header">{{ $latter }}</div>
                                    <div class="forum-categories-grid-item__content">
                                        @foreach($items as $item)
                                            <a class="forum-category-item" href="{{ route('forum.threads', $item->slug) }}">
                                                <div class="forum-category-item__image">
                                                    <img class="forum-category-item__icon" src="{{ $item->image('icon') }}" alt="">
                                                </div>
                                                <div class="forum-category-item__title">{{ $item->title }}</div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
