@extends('web.layouts.app')

@section('body')
    <section class="page">
        <div class="page__inner">
            <x-breadcrumbs />

            <div class="panel">
                <div class="panel__inner">
                    <div class="user-profile">
                        <div class="user-profile__aside">
                            @yield('aside')
                        </div>
                        <div class="user-profile__content">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
