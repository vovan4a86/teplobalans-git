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
        <!--section.s-prod-->
        <section class="s-prod">
            <div class="s-prod__container container">
                <div class="s-prod__grid">
                    @if(count($images))
                        <div class="s-prod__preview">
                            <div class="s-prod__view">
                                <!--navigation-->
                                <div class="s-prod__view-nav splide" data-prod-slider-nav="data-prod-slider-nav">
                                    <div class="s-prod__view-nav__track splide__track">
                                        <ul class="s-prod__view-nav__list splide__list">
                                            @foreach($images as $image)
                                                <li class="s-prod__view-nav__slide splide__slide">
                                                    <img class="s-prod__view-nav__img"
                                                         src="{{ $image->thumb(1) }}"
                                                         width="107" height="107" alt="{{ $product->name }}"/>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <!--main slider-->
                                <div class="s-prod__view-body splide" data-prod-slider-body="data-prod-slider-body">
                                    <div class="s-prod__view-body__track splide__track">
                                        <ul class="s-prod__view-body__list splide__list">
                                            @foreach($images as $image)
                                                <li class="s-prod__view-body__slide splide__slide">
                                                    <a class="s-prod__view-body__link" href="{{ $image->image_src }}"
                                                       title="{{ $product->name }}" data-fancybox="data-fancybox"
                                                       data-caption="{{ $product->name }}">
                                                        <img class="s-prod__view-body__img" src="{{ $image->thumb(3) }}"
                                                             width="489" height="489" alt="{{ $product->name }}"/>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="s-prod__resize">
                                        <span class="b-resize">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" fill="none">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                      stroke-linejoin="round" stroke-width="1.7"
                                                      d="M11.25 2.75h4.5v4.5M6.75 16.25h-4.5v-4.5M15.75 2.75 10.5 8M2.25 16.25 7.5 11"/>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="s-prod__content">
                        @if($product->sale_type)
                            <div class="s-prod__badge">
                                <!--.badge-->
                                <div class="badge">{{ $product->sale_type }}</div>
                            </div>
                        @endif
                        <div class="s-prod__text text-block">
                            {!! $announce !!}
                        </div>
                        <div class="s-prod__actions">
                            <div class="s-prod__price">Цена по запросу</div>
                            <button class="btn btn--accent btn-reset" type="button" data-popup="data-popup"
                                    data-src="#request" data-name="Экспуатационные комплекты для мачт МГФ"
                                    aria-label="Отправить заявку">
                                <span>Отправить заявку</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="12" fill="none">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="1.7" d="M1 6h11M11 9l3-3-3-3"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="s-prod__points">
                    @if($product->using)
                        <div class="text-label text-block">
                            <div class="text-label__title">Используется:</div>
                            {!! $product->using !!}
                        </div>
                    @endif
                    @if($product->delivery)
                        <div class="text-label text-block">
                            <div class="text-label__title">Доставка</div>
                            {!! $product->delivery !!}
                        </div>
                    @endif
                </div>
            </div>
        </section>
        <!--section.b-text(x-data="{ isHidden: true }")-->
        <!--.-gray-->
        <section class="b-text b-text--gray" x-data="{ isHidden: true }">
            <div class="b-text__container container">
                <div class="b-text__body text-block" :class="isHidden &amp;&amp; 'is-hidden'" x-cloak>
                    <h2>Описание</h2>
                    {!! $text !!}
                </div>
                <div class="b-text__foot" :class="isHidden &amp;&amp; 'is-active'">
                    <button class="b-text__btn btn-reset" @click="isHidden = !isHidden"
                            :class="isHidden &amp;&amp; 'is-active'"
                            aria-label="isHidden ? 'Показать текст' : 'Скрыть описание'">
                        <span x-text="isHidden ? 'Подробнее' : 'Скрыть описание'">Подробнее</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="8" fill="none">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="1.7" d="m1 1 6 6 6-6"/>
                        </svg>
                    </button>
                </div>
            </div>
        </section>

        @if(count($related))
            <!--class="s-related--darken"-->
            @include('blocks.related', ['header' => 'Похожие товары', 'bg' => 's-related--darken'])
        @endif

        @if(count($viewed))
            <!--class="s-related"-->
            @include('blocks.related', ['header' => 'Ранее вы просматривали', 'bg' => '', 'related' => $viewed])
        @endif

        @if($feats = S::get('common_products_feats'))
            <div class="b-feat">
                <div class="b-feat__container container">
                    @include('blocks.products_feats')
                </div>
            </div>
        @endif

        @include('blocks.consultation')
    </main>
@endsection
