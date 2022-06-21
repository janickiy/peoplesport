@extends('web.users.layouts.profile')

@section('aside')
    @include('web.users.parts.user-card', ['user' => $user])
@endsection

@section('content')
    @include('web.users.parts.tab-menu', ['user' => $user])

    <div class="user-profile__questionnaire user-questionnaire">
        <div class="user-questionnaire__list">
            <div class="user-questionnaire__item">
                <div class="user-questionnaire-item">
                    <div class="user-questionnaire-item__label">Имя:</div>
                    <div class="user-questionnaire-item__value content">
                        {{ $user->name }}
                    </div>
                </div>
            </div>
            <div class="user-questionnaire__item">
                <div class="user-questionnaire-item">
                    <div class="user-questionnaire-item__label">Дата рождения:</div>
                    <div class="user-questionnaire-item__value content">{{ $user->birthday->format('d.m.Y') }} г.</div>
                </div>
            </div>
            <div class="user-questionnaire__item">
                <div class="user-questionnaire-item">
                    <div class="user-questionnaire-item__label">Пол:</div>
                    <div class="user-questionnaire-item__value content">
                        {{ $user->gender ? $user->gender->title : 'Не заполнено' }}
                    </div>
                </div>
            </div>
            <div class="user-questionnaire__item">
                <div class="user-questionnaire-item">
                    <div class="user-questionnaire-item__label">Город:</div>
                    <div class="user-questionnaire-item__value content">
                        {{ $user->city ? $user->city->title : 'Не заполнено' }}
                    </div>
                </div>
            </div>
            <div class="user-questionnaire__item">
                <div class="user-questionnaire-item">
                    <div class="user-questionnaire-item__label">Род занятий:</div>
                    <div class="user-questionnaire-item__value content">
                        {{ $user->occupation ? $user->occupation->title : 'Не заполнено' }}
                    </div>
                </div>
            </div>
            <div class="user-questionnaire__item">
                <div class="user-questionnaire-item">
                    <div class="user-questionnaire-item__label">Вид спорта:</div>
                    <div class="user-questionnaire-item__value content">
                        {{ $user->activityType ? $user->activityType->title : 'Не заполнено' }}
                    </div>
                </div>
            </div>
            <div class="user-questionnaire__item">
                <div class="user-questionnaire-item">
                    <div class="user-questionnaire-item__label">Вид деятельности:</div>
                    <div class="user-questionnaire-item__value content">
                        {{ $user->position ? $user->position->title : 'Не заполнено' }}
                    </div>
                </div>
            </div>
            <div class="user-questionnaire__item">
                <div class="user-questionnaire-item">
                    <div class="user-questionnaire-item__label">Образование:</div>
                    <div class="user-questionnaire-item__value content">
                        {{ $user->education ?: 'Не заполнено' }}
                    </div>
                </div>
            </div>
            <div class="user-questionnaire__item">
                <div class="user-questionnaire-item">
                    <div class="user-questionnaire-item__label">Обо мне:</div>
                    <div class="user-questionnaire-item__value content">
                        {{ $user->biography ?: 'Не заполнено' }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
