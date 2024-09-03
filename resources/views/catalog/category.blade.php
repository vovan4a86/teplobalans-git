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
        @if($products)
            <section class="s-prods">
            <div class="s-prods__container container">
                <div class="s-prods__grid">
                    @foreach($products as $item)
                        @include('catalog.product_item')
                    @endforeach
                </div>
                <div class="s-prods__controls">
                    <div class="s-prods__pagination">
                        @include('paginations.with_pages', ['paginator' => $products])
                    </div>
                    <div class="s-prods__load">
                        @include('paginations.load_more', ['paginator' => $products])
                    </div>
                </div>
            </div>
        </section>
        @endif

        @include('blocks.related', ['header' => 'Ранее вы просматривали', 'bg' => 's-related--gray'])

        <!--section.b-text(x-data="{ isHidden: true }")-->
        <section class="b-text" x-data="{ isHidden: true }">
            <div class="b-text">
                <div class="b-text__container container">
                    <div class="b-text__body text-block" :class="isHidden &amp;&amp; 'is-hidden'" x-cloak="x-cloak">
                        {!! $text !!}
                    </div>
                    <div class="b-text__foot" :class="isHidden &amp;&amp; 'is-active'">
                        <button class="b-text__btn btn-reset" @click="isHidden = !isHidden"
                                :class="isHidden &amp;&amp; 'is-active'"
                                :title="isHidden ? 'Показать текст' : 'Скрыть текст'">
                            <span x-text="isHidden ? 'Подробнее' : 'Скрыть текст'">Подробнее</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="8" fill="none">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="1.7" d="m1 1 6 6 6-6"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        @include('blocks.drawing_request')

        @include('blocks.certificates')
    </main>
@endsection
