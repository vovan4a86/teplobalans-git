@extends('template')
@section('content')
    <!--section.b-objects-->
    <section class="b-objects">
        <div class="b-objects__container container">
            <div class="b-objects__heading">
                <div class="title">{{ $h1 }}</div>
            </div>
            <div class="b-objects__list">
                @foreach($images as $image)
                    <div class="card-obj">
                        <a class="card-obj__view" href="{{ $image->src }}"
                           data-fancybox="objects-gallery"
                           data-caption="{{ $image->data != null ? $image->data['text'] : '' }}"
                           title="{{ $image->data != null ? $image->data['text'] : '' }}">
                            <img class="card-obj__img" src="{{ $image->thumb(1) }}" width="390"
                                 height="320" alt="{{ $image->data != null ? $image->data['text'] : '' }}"/>
                        </a>
                        <div class="card-obj__title">{{ $image->data != null ? $image->data['text'] : '' }}</div>
                    </div>
                @endforeach
            </div>

            @include('paginations.with_pages', ['paginator' => $images])
        </div>
    </section>
@stop
