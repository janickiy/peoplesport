@extends('web.layouts.app')

@section('body')
    <section class="page">
        <div class="page__inner">
            <x-breadcrumbs />

            <h1 class="heading heading--upper">{{ $page->title }}</h1>

            <div class="panel">
                <div class="panel__inner">
                    <div class="faq-page">
                        <div class="faq-page__action action">
                            <div class="action__heading heading heading--center">Не нашли ответа на вопрос?</div>
                            <div class="action__content content">
                                {!! $page->content !!}
                            </div>
                            <div class="action__more">
                                <a class="button button--primary" href="#" style="pointer-events: none;opacity: .7;">
                                    <span class="button__label">Задать вопрос</span>
                                </a>
                            </div>
                        </div>

                        <div class="faq-page__questions">
                            @if ($items->isNotEmpty())
                                @foreach($items as $item)
                                    <div class="spoiler spoiler--m">
                                        <a class="spoiler__title" href="#">{{ $item->title }}</a>

                                        <div class="spoiler__content content">
                                            {!! $item->content !!}
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                {{-- Ничего не найдено --}}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
