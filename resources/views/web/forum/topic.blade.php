@extends('web.layouts.app')

@section('body')
    <section class="page">
        <div class="page__inner">
            <x-breadcrumbs />

            <div class="forum-threads">
                <div class="panel">
                    <div class="panel__inner">
                        <div class="forum-threads__header">
                            <div class="forum-threads__heading heading">{{ $topic->title }}</div>
                        </div>

                        @foreach($posts as $post)
                            @include('web.forum.parts.message', ['post' => $post])
                        @endforeach

                        <div class="forum-threads__meta">
                            <x-pagination :paginator="$posts" />
                        </div>

                        @if (Auth::check())
                            <form class="forum-publish-form form" method="post" action="{{ route('forum.create-post', $topic->id) }}">
                                @csrf
                                <div class="form-item">
                                    <div class="forum-panel">
                                        <div class="forum-panel-heading">
                                            <div class="forum-panel-heading__left">Ответ</div>
                                        </div>
                                        <div class="forum-panel__content content">
                                            <div id="reply_post_field" class="form-item" style="display: none;">
                                                <label class="form-item__label">Ответ на сообщение: <span></span> <a href="#">Отменить</a></label>
                                                <input type="hidden" name="reply_post_id" value="">
                                            </div>
                                            <div class="form-item">
                                                <label class="form-item__label">Сообщение:</label>
                                                <textarea class="form-item__control form-item__control--editor" name="message" rows="5">{{ old('message') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-item form-item--last" style="text-align:right;">
                                    <button class="button button--s button--primary" type="submit"><span class="button__label">Отправить</span></button>
                                    {{--
                                    <button class="button button--s button--primary" type="submit"><span class="button__label">Расширенный режим</span></button>
                                    --}}
                                </div>
                            </form>
                        @endif

                        {{--
                        <div class="forum-panel">
                            <div class="forum-panel-heading">
                                <div class="forum-panel-heading__left">Быстрый ответ</div>
                            </div>
                            <div class="forum-panel__content content">
                                <p>Эту тему просматривают: 5 ( пользователей: 2; гостей: 3)</p>
                                <p><a href="#">Lookattme</a>, <a href="#">Floyd</a></p>
                            </div>
                        </div>
                        --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
