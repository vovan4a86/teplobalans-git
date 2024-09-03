@extends('template')
@section('content')
    <main>
        <!--.b-heading-->
        <div class="b-heading">
            <div class="b-heading__container container">
                <div class="b-heading__bread">
                   @include('blocks.bread')
                </div>
                <div class="b-heading__body">
                    <div class="title">{{ $h1 }}</div>
                </div>
            </div>
        </div>
        <!--section.s-production-->
        <section class="s-production">
            <div class="s-production__container container">
                @if(count($services))
                    <div class="s-production__grid">
                        @foreach($services as $item)
                            <div class="s-production__item">
                                <!--.b-card-->
                                <article class="b-card">
                                    <div class="b-card__view lazy" data-bg="{{ $item->thumb(2) }}"></div>
                                    <div class="b-card__body">
                                        <!-- если будет нужен заголовок-->
                                        <h2 class="v-hidden">{{ $item->name }}</h2>
                                        <!---->
                                        <a class="b-card__title" href="javascript:void(0)" title="{{ $item->name }}">{{ $item->name }}</a>
                                        <div class="b-card__text text-block">
                                            {!! $item->text !!}
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                @else
                    Пусто
                @endif
            </div>
        </section>
    </main>
@stop
