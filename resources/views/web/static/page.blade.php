@extends('web.layouts.app')

@section('body')
    <section class="page">
        <div class="page__inner">
            <div class="panel">
                <div class="panel__inner">
                    <x-breadcrumbs />

                    <h1 class="heading heading--center heading--upper">{{ $page->title }}</h1>
                    <div class="content">
                        {!! $page->content !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
