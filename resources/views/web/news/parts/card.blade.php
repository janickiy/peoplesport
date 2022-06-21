<div class="news-card panel">
    <div class="panel__inner">
        <a class="news-card__preview news-card-preview" href="{{ route('news.single', $news->slug) }}">
            <img class="news-card-preview__image" src="{{ $news->image('card') }}" alt="{{ $news->title }}">
        </a>
        <div class="news-card__meta news-card-meta">
            <div class="news-card-meta__item"><i class="icon icon--clock"></i> {{ $news->created_at->format('d.m.Y H:i') }}</div>
        </div>
        <div class="news-card__title">{{ $news->title }}</div>
        <div class="news-card__more">
            <a class="link link--to-base" href="{{ route('news.single', $news->slug) }}">Узнать больше <i class="icon icon--long-arrow-right"></i></a>
        </div>
    </div>
</div>
