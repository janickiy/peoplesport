@extends('web.layouts.app')

@section('body')
    <section class="page">
        <div class="page__inner">
            <x-breadcrumbs />

            @if ($children->count() > 0)
                <div class="forum-categories">
                    <div class="panel">
                        <div class="panel__inner">
                            <div class="forum-categories__header">
                                <div class="forum-categories__heading heading">{{ $thread->title }}</div>
                                <div class="forum-categories__description content">{!! $thread->description !!}</div>
                            </div>
                            <div class="forum-categories__grid forum-categories-grid">
                                @if ($thread->show_alphabet)
                                    @foreach($children as $latter => $items)
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
                                @else
                                    @foreach($children as $item)
                                        <a class="forum-category-item" href="{{ route('forum.threads', $item->slug) }}">
                                            <div class="forum-category-item__image">
                                                <img class="forum-category-item__icon" src="{{ $item->image('icon') }}" alt="">
                                            </div>
                                            <div class="forum-category-item__title">{{ $item->title }}</div>
                                        </a>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="forum-threads">
                    <div class="panel">
                        <div class="panel__inner">
                            <div class="forum-threads__header">
                                <div class="forum-threads__heading heading">{{ $thread->title }}</div>
                            </div>
                            <form class="forum-threads__filters forum-filters-form form">
                                <div class="forum-filters-form__layout">
                                    <div class="forum-filters-form__col">
                                        <div class="form-item form-control--select">
                                            <div class="form-select">
                                                <div class="form-select__trigger form-item__group form-item__group--icon-left"><i class="form-item__icon form-item__icon--left icon icon--calendar-alt"></i>
                                                    <input class="form-select__placeholder form-item__control" type="text" autocomplete="off" value="По дате" readonly>
                                                    <input class="form-select__control form-item__control" type="text" name="sort" value="date" autocomplete="off"><i class="form-select__arrow"></i>
                                                </div>
                                                <div class="form-select__items">
                                                    <a class="form-select__option" href="#" data-value="created_at">По дате</a>
                                                    <a class="form-select__option" href="#" data-value="posts_count">По популярности</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="forum-filters-form__col">
                                        <div class="form-item form-item--last">
                                            <button class="button button--primary" type="submit">
                                                <span class="button__label">Применить</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="forum-threads__table table-responsive">
                                <div class="table-responsive__mobile">
                                    <div class="table">
                                        <div class="table__inner">
                                            <table class="table__element">
                                                <thead>
                                                    <tr>
                                                        <th class="table__col table__col--left">Тема</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($topics as $topic)
                                                        <tr>
                                                            <td class="table__col">
                                                                <div class="forum-threads-topic">
                                                                    {{--
                                                                    <div class="forum-threads-topic__action">
                                                                        <div class="tooltip tooltip--position-left">
                                                                            <div class="tooltip__label"><a class="forum-threads-topic__favorite" href="#"><i class="icon icon--heart"></i></a></div>
                                                                            <div class="tooltip__content">В избранное</div>
                                                                        </div>
                                                                    </div>
                                                                    --}}
                                                                    <div class="forum-threads-topic__info">
                                                                        {{--
                                                                        <div class="forum-threads-topic__tags">
                                                                            <div class="forum-threads-topic__tag">
                                                                                <i class="icon icon--light icon--fire"></i> Самая обсуждаемая
                                                                            </div>
                                                                        </div>
                                                                        --}}

                                                                        <a class="forum-threads-topic__link" href="{{ route('forum.topic', $topic->id) }}">{{ $topic->title }}</a>
                                                                        <div class="forum-threads-topic__description">{{ $topic->description }}</div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive__desktop">
                                    <div class="table">
                                        <div class="table__inner">
                                            <table class="table__element">
                                                <thead>
                                                <tr>
                                                    <th class="table__col table__col--left">Тема</th>
                                                    <th class="table__col">Дата</th>
                                                    <th class="table__col">Автор</th>
                                                    <th class="table__col">Ответов</th>
                                                    <th class="table__col">Последний ответ</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($topics as $topic)
                                                        <tr>
                                                            <td class="table__col">
                                                                <div class="forum-threads-topic">
                                                                    {{--
                                                                    <div class="forum-threads-topic__action">
                                                                        <div class="tooltip tooltip--position-left">
                                                                            <div class="tooltip__label">
                                                                                <a class="forum-threads-topic__favorite" href="#"><i class="icon icon--heart"></i></a>
                                                                            </div>
                                                                            <div class="tooltip__content">В избранное</div>
                                                                        </div>
                                                                    </div>
                                                                    --}}
                                                                    <div class="forum-threads-topic__info">
                                                                        {{--
                                                                        <div class="forum-threads-topic__tags">
                                                                            <div class="forum-threads-topic__tag">
                                                                                <i class="icon icon--light icon--fire"></i> Самая обсуждаемая
                                                                            </div>
                                                                        </div>
                                                                        --}}

                                                                        <a class="forum-threads-topic__link" href="{{ route('forum.topic', $topic->id) }}">{{ $topic->title }}</a>
                                                                        <div class="forum-threads-topic__description">{{ $topic->description }}</div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="table__col">
                                                                {{ $topic->created_at->format('d.m.Y H:i') }}
                                                            </td>
                                                            <td class="table__col">
                                                                <a class="link" href="{{ route('users.profile', $topic->user->id) }}">{{ $topic->user->name }}</a>
                                                            </td>
                                                            <td class="table__col">{{ $topic->posts->count() }}</td>
                                                            <td class="table__col">
                                                                {{ $topic->posts->last()->created_at->format('d.m.Y H:i') }}<br>
                                                                <a class="link" href="{{ route('users.profile', $topic->posts->last()->user->id) }}">{{ $topic->posts->last()->user->name }}</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <x-pagination :paginator="$topics" />
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
