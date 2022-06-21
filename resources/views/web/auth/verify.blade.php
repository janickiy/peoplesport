@extends('web.layouts.app')

@section('body')
    <section class="page">
        <div class="page__inner">
            <x-breadcrumbs />

            <div class="panel">
                <div class="panel__inner">
                    <div class="auth-page">
                        <ul class="auth-page__menu tab-menu">
                            <li class="tab-menu__item tab-menu-item tab-menu-item--active">
                                <a class="tab-menu-item__link" href="javascript:void(0)">Подтверждение E-mail</a>
                            </li>
                        </ul>

                        @if (session('resent'))
                            <div class="auth-page__message">
                                <div class="alert alert--success">
                                    На ваш E-mail отправлена ссылка на подтверждение
                                </div>
                            </div>
                        @endif

                        <div class="content">
                            <p>Прежде чем продолжить, проверьте свою электронную почту на наличие ссылки для подтверждения.</p>
                            <p>
                                Если вы не получили письмо

                                <form method="post" action="{{ route('auth.verification.resend') }}">
                                    @csrf
                                    <button class="button button--s button--accent" type="submit"><span class="button__label">нажмите здесь, чтобы запросить другой</span></button>
                                </form>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
