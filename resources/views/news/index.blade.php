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

        @if(count($news))
            <section class="s-newses">
                <div class="s-newses__container container">
                    <div class="s-newses__grid">
                        @foreach($news as $item)
                            @include('news.newses_item', ['first' => $loop->first])
                        @endforeach
                    </div>
                    <div class="projects__actions">
                        @include('paginations.more_news', ['paginator' => $news])
                    </div>
                </div>
            </section>
        @endif
    </main>
@stop
