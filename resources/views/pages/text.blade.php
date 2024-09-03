@extends('template')
@section('content')
    <main>
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

        <section class="s-text">
            <div class="s-text__container container">
                <div class="s-text__body text-block">
                    {!! $text !!}
                </div>
            </div>
        </section>
    </main>
@stop
