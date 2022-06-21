@if(Breadcrumbs::has())
    <ul class="breadcrumbs">
        @foreach (Breadcrumbs::current() as $crumbs)
            @if ($crumbs->url() && !$loop->last)
                <li class="breadcrumbs__item breadcrumbs-item" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                    <a class="breadcrumbs-item__link" href="{{ $crumbs->url() }}" itemprop="url">
                        <span class="breadcrumbs-item__label" itemprop="title">{{ $crumbs->title() }}</span>
                    </a>
                </li>
            @else
                <li class="breadcrumbs__item breadcrumbs-item" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                    <span class="breadcrumbs-item__label" itemprop="title">{{ $crumbs->title() }}</span>
                </li>
            @endif
        @endforeach
    </ul>
@endif
