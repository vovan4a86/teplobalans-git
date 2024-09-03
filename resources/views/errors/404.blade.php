@extends('template')
@section('content')
    <div class="error-view">
        <div class="error-view__container container">
            <div class="error-view__view lazy" data-bg="/static/images/common/error.svg"></div>
            <div class="error-view__title">Упс!</div>
            <div class="error-view__text">Страница которую вы ищите не найдена :(</div>
            <div class="error-view__link">
                <a class="btn btn--red" href="{{ route('main') }}" title="На главную">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 17 17 7M7 7h10v10" />
                    </svg>
                    <span>На главную</span>
                </a>
            </div>
        </div>
    </div>
@stop
