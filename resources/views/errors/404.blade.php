@extends('app-nosidebar')

@section('content')
    <main class="page-error">
        <div class="page-error__content">
            <div class="page-error__type">404</div>
            <h1 class="page-error__title">{{ trans('text.errors.got_lost') }}</h1>
            <p class="text-large">{{ trans('text.errors.page_not_exists') }}</p>
            <div class="page-error__bottom">
                <a class="button button--primary" href="{{ route('home') }}">
                    <span class="button__text">{{ trans('text.errors.back_to_home') }}</span>
                </a>
            </div>
        </div>
    </main>
@endsection
