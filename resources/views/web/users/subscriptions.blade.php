@extends('web.users.layouts.profile')

@section('aside')
    @include('web.users.parts.user-card', ['user' => $user])
@endsection

@section('content')
    @include('web.users.parts.tab-menu', ['user' => $user])

    <div class="user-profile__subscriptions">

    </div>
@endsection
