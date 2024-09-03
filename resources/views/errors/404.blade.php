@extends('template_error')
@section('content')
    <main>
        <div class="error-view">
            <div class="error-view__container container">
                <div class="error-view__body">
                    <img class="error-view__pic no-select" src="/static/images/common/error-view.png"
                         width="503" height="204" alt="error_image">
                    <div class="error-view__title">Страница не найдена</div>
                    <a class="btn btn--white" href="{{ route('main') }}">
                        <span>Перейти на главную</span>
                    </a>
                </div>
                <img class="error-view__map no-select" src="/static/images/common/map.svg"
                     width="1318" height="783" alt="map_image">
            </div>
        </div>
    </main>
@stop
