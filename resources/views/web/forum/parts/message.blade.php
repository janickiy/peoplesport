<div id="message-{{ $post->id }}" class="forum-message">
    <div class="forum-message-heading">
        <div class="forum-message-heading__left">{{ $post->created_at->format('d.m.Y H:i') }}</div>
        <div class="forum-message-heading__right">#{{ $post->id }}</div>
    </div>
    <div class="forum-message-content">
        <div class="forum-message-content__info">
            @include('web.forum.parts.user-card', ['user' => $post->user])
        </div>
        <div class="forum-message-content__body">
            {{--
            <div class="forum-message-rating">
                <a class="forum-message-rating__control" href="#">
                    <i class="icon icon--solid icon--thumbs-up"></i>
                </a>

                <span class="forum-message-rating__value">5</span>

                <a class="forum-message-rating__control" href="#">
                    <i class="icon icon--solid icon--thumbs-down"></i>
                </a>
            </div>
            --}}
            <div class="forum-message__text content">
                @if ($replyPost = $post->replyPost)
                    <blockquote>
                        <p>{!! Str::of($replyPost->content)->limit(250)  !!}</p>
                        <p><a href="{{ route('forum.topic', $post->topic_id) }}#message-{{ $replyPost->id }}">Перейти к сообщению</a></p>
                    </blockquote>
                @endif

                {!! $post->content !!}
            </div>
        </div>
    </div>
    <div class="forum-message-footer">
        <div class="forum-message-footer__left">
            {{--
            <ul class="forum-message-footer-menu forum-message-footer-menu--left">
                <li class="forum-message-footer-menu__item forum-message-footer-menu-item">
                    <a class="forum-message-footer-menu-item__link" href="#">
                        <i class="forum-message-footer-menu-item__icon icon icon--exclamation-triangle icon--solid"></i>
                        <span class="forum-message-footer-menu-item__label">Пожаловаться</span>
                    </a>
                </li>
            </ul>
            --}}
        </div>
        <div class="forum-message-footer__right">
            <ul class="forum-message-footer-menu forum-message-footer-menu--right">
                @if (Auth::check())
                    <li class="forum-message-footer-menu__item forum-message-footer-menu-item">
                        <a class="forum-message-footer-menu-item__link" data-replay-post-button="{{ $post->id }}" href="#">
                            <i class="forum-message-footer-menu-item__icon icon icon--reply icon--solid"></i>
                            <span class="forum-message-footer-menu-item__label">Ответить</span>
                        </a>
                    </li>
                    {{--
                    <li class="forum-message-footer-menu__item forum-message-footer-menu-item">
                        <a class="forum-message-footer-menu-item__link" href="#">
                            <i class="forum-message-footer-menu-item__icon icon icon--comment icon--solid"></i>
                            <span class="forum-message-footer-menu-item__label">Ответить с цитированием</span>
                        </a>
                    </li>
                    --}}
                @endif

                <li class="forum-message-footer-menu__item forum-message-footer-menu-item">
                    <a class="forum-message-footer-menu-item__link" href="#">
                        <i class="forum-message-footer-menu-item__icon icon icon--angle-up icon--solid"></i>
                        <span class="forum-message-footer-menu-item__label">Вверх</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
