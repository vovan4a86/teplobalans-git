@extends('template')
@section('content')
    <!--section.hero-->
    @if(count($main_slider))
        <section class="hero">
            <div class="hero__container">
                <div class="hero__slider splide" aria-label="Наши работы" data-hero-slider="data-hero-slider">
                    <div class="hero__track splide__track">
                        <ul class="hero__list splide__list">
                            @foreach($main_slider as $slide)
                                <li class="hero__slide splide__slide">
                                    <div class="hero__body">
                                        <div class="hero__title">{{ $slide['title'] }}</div>
                                        <div class="hero__text">
                                            <p>{{ $slide['subtitle'] }}</p>
                                        </div>
                                        @if($slide['btn_url'])
                                            <div class="hero__actions">
                                                <a href="{{ $slide['btn_url'] }}" class="btn btn-reset" type="button"
                                                   aria-label="{{ $slide['btn_name'] ?: 'Подробнее' }}">
                                                    <span>{{ $slide['btn_name'] ?: 'Подробнее' }}</span>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                    @if($slide['image'])
                                        <div class="hero__view">
                                            <!-- example sizing: 1319x576-->
                                            <picture>
                                                <img src="{{ S::fileSrc($slide['image']) }}" alt="slider picture"/>
                                            </picture>
                                        </div>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!--section.s-about-->
    <section class="s-about">
        <div class="s-about__container container">
            <div class="s-about__heading">
                @if($title = S::get('main_about_title'))
                    <div class="s-about__title">
                        <div class="title">{{ $title }}</div>
                    </div>
                @endif
                @if($text = S::get('main_about_text'))
                    <div class="s-about__text">
                        <p>{{ $text }}</p>
                    </div>
                @endif
            </div>
            @if($feats = S::get('main_about_feats'))
                <div class="s-about__grid">
                    @foreach($feats as $feat)
                        <div class="card-about">
                            @if($icon = $feat['icon'])
                                <div class="card-about__icon lazy" data-bg="{{ S::fileSrc($icon) }}"></div>
                            @endif
                            <div class="card-about__title">{{ $feat['title'] }}</div>
                            <div class="card-about__text">
                                <p>{{ $feat['text'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            <div class="s-about__heading">
                @if($about_btn = S::get('main_about_btn_text'))
                    <div class="s-about__bottom">
                        <p>{{ $about_btn }}</p>
                    </div>
                @endif
                <div class="s-about__actions">
                    <a class="btn" href="{{ route('about') }}" title="Подробнее">
                        <span>Подробнее</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    @if(count($main_products))
        <section class="s-prods">
            <div class="s-prods__container container">
                <div class="title">Продукция компании</div>
                <div class="s-prods__grid">
                    @foreach($main_products as $pr)
                        <div class="card-prods">
                            <a class="card-prods__title" href="{{ $pr['url'] }}" title="{{ $pr['name'] }}">{{ $pr['name'] }}</a>
                            <div class="card-prods__text">
                                <p>{{ $pr['desc'] }}</p>
                            </div>
                            <div class="card-prods__actions">
                                <a class="card-prods__link btn btn--red" href="{{ $pr['url'] }}" title="Перейти">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2" d="M7 17 17 7M7 7h10v10"/>
                                    </svg>
                                    <span>Перейти</span>
                                </a>
                            </div>
                            @if($img = $pr['img'])
                                <div class="card-prods__view">
                                    <img class="card-prods__pic no-select" src="{{ S::fileSrc($img) }}" width="343"
                                         height="293" alt="{{ $pr['name'] }}" loading="lazy"/>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @include('pages.blocks.services', ['title' => 'Услуги компании', 'class' => ''])
@stop
