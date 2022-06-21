@extends('web.layouts.app')

@section('body')
    <section class="page">
        <div class="page__inner">
            <x-breadcrumbs />

            <h1 class="heading heading--upper">Новости</h1>

            <div class="news-archive">
                <div class="news-archive__content">
                    @if ($news->isNotEmpty())
                        <div class="news-archive-grid">
                            @foreach($news as $index => $entity)
                                @if ($index !== 0 && $index % 6 === 0)
                                    {{--<div class="news-archive-grid__item news-archive-grid__item--full">
                                        <div class="commercial commercial--horizontal"><a class="commercial__link" href="#"><img class="commercial__image" src="_temp/commercial--horizontal.png" alt=""></a></div>
                                    </div>--}}
                                @endif

                                <div class="news-archive-grid__item">
                                    @include('web.news.parts.card', ['news' => $entity])
                                </div>
                            @endforeach
                        </div>
                    @else
                        {{-- Ничего не найдено --}}
                    @endif
                </div>
                <div class="news-archive__aside aside">
                    @if ($settings['newsBanners'])
                        @foreach($settings['newsBanners'] as $block)
                            <div class="aside__widget">
                                @include('web.shared.widgets.commercial', ['banner' => $block])
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <x-pagination :paginator="$news" />
        </div>
    </section>
@endsection
