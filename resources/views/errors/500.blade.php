@extends('template')
@section('content')
    <div class="error-view">
        <div class="error-view__container container">
            <div class="error-view__view lazy" data-bg="/static/images/common/error-server.svg"></div>
            <div class="error-view__title">Что‑то происходит…</div>
            <div class="error-view__text">Кажется, у нас проблемы с сервером, пожалуйста, не покидайте страницу, мы посылаем за помощью.</div>
        </div>
    </div>
@stop
