<?php

use App\Models\Event\Event;
use App\Models\Forum\Thread;
use App\Models\Forum\Topic;
use App\Models\News;
use Tabuna\Breadcrumbs\Breadcrumbs;
use Tabuna\Breadcrumbs\Trail;

function treeForumThreads($trail, $thread) {
    $stack = [];

    if ($parent = $thread->parent) {
        while (true) {
            $stack[] = $parent;
            $parent = $parent->parent;

            if (!$parent) {
                break;
            }
        }
    }

    foreach (array_reverse($stack) as $item) {
        $trail->push($item->title, route('forum.threads', $item->slug));
    }
}

Breadcrumbs::for('home', fn (Trail $trail) =>
    $trail->push('Главная', route('home'))
);

Breadcrumbs::for('auth.login', fn (Trail $trail) =>
    $trail
        ->parent('home')
        ->push('Авторизация', route('auth.login'))
);

Breadcrumbs::for('auth.register', fn (Trail $trail) =>
    $trail
        ->parent('home')
        ->push('Регистрация', route('auth.register'))
);

Breadcrumbs::for('auth.password.request', fn (Trail $trail) =>
    $trail
        ->parent('home')
        ->push('Сброс пароля', route('auth.password.request'))
);

Breadcrumbs::for('auth.password.reset', fn (Trail $trail) =>
    $trail
        ->parent('home')
        ->push('Сброс пароля', route('auth.password.reset'))
);

Breadcrumbs::for('auth.password.confirm', fn (Trail $trail) =>
    $trail
        ->parent('home')
        ->push('Подтверждение пароля', route('auth.password.confirm'))
);

Breadcrumbs::for('auth.verification.notice', fn (Trail $trail) =>
    $trail
        ->parent('home')
        ->push('Подтверждение E-mail', route('auth.verification.notice'))
);

Breadcrumbs::for('auth.verification.verify', fn (Trail $trail) =>
    $trail
        ->parent('home')
        ->push('Подтверждение E-mail', route('auth.verification.verify'))
);

Breadcrumbs::for('static.awards', fn (Trail $trail) =>
    $trail
        ->parent('home')
        ->push('Награды', route('static.awards'))
);

Breadcrumbs::for('static.partners', fn (Trail $trail) =>
    $trail
        ->parent('home')
        ->push('Партнерам', route('static.partners'))
);

Breadcrumbs::for('static.faq', fn (Trail $trail) =>
    $trail
        ->parent('home')
        ->push('Вопрос-ответ', route('static.faq'))
);

Breadcrumbs::for('news.index', fn (Trail $trail) =>
    $trail
        ->parent('home')
        ->push('Новости', route('news.index'))
);

Breadcrumbs::for('news.single', function (Trail $trail, string $slug) {
    $news = News::where('slug', $slug)->first();

    return $trail
        ->parent('news.index')
        ->push($news->title, route('news.single', $news->slug));
});

Breadcrumbs::for('events.index', fn (Trail $trail) =>
    $trail
        ->parent('home')
        ->push('Мероприятия', route('events.index'))
);

Breadcrumbs::for('events.single', function (Trail $trail, string $slug) {
    $news = Event::where('slug', $slug)->first();

    return $trail
        ->parent('events.index')
        ->push($news->title, route('events.single', $news->slug));
});

Breadcrumbs::for('forum.index', function (Trail $trail) {
    $trail
        ->parent('home')
        ->push('Форум', route('forum.index'));
});

Breadcrumbs::for('forum.threads', function (Trail $trail, string $slug) {
    $thread = Thread::where('slug', $slug)->first();

    //$trail->parent('forum.index');
    $trail->parent('home');

    treeForumThreads($trail, $thread);

    $trail->push($thread->title, route('forum.threads', $thread->slug));
});

Breadcrumbs::for('forum.topic', function (Trail $trail, int $topicId) {
    $topic = Topic::where('id', $topicId)->first();

    //$trail->parent('forum.index');
    $trail->parent('home');

    treeForumThreads($trail, $topic->thread);

    $trail->push($topic->thread->title, route('forum.threads', $topic->thread->slug));
    $trail->push($topic->title, route('forum.topic', $topicId));
});
