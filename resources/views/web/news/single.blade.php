@extends('web.layouts.app')

@section('body')
    <section class="page">
        <div class="page__inner">
            <x-breadcrumbs />

            <div class="news-single">
                <div class="news-single__content">
                    <div class="panel">
                        <div class="panel__inner">
                            <div class="news-single__meta news-single-meta">
                                <div class="news-single-meta__item"><i class="icon icon--clock"></i> {{ $news->created_at->format('d.m.Y H:i') }}</div>
                            </div>
                            <h1 class="news-single__heading heading">{{ $news->title }}</h1>
                            <div class="news-single__image preview">
                                <img class="preview__image" src="{{ $news->image('single') }}" alt="{{ $news->title }}">
                            </div>
                            <div class="news-single__text content">
                                {!! $news->content !!}
                            </div>
                            <div class="news-single__footer news-single-footer">
                                <div class="news-single-footer__right">
                                    <x-share />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="news-single__aside aside">
                    @if ($settings['newsBanners'])
                        @foreach($settings['newsBanners'] as $block)
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
