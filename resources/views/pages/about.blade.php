@extends('template')
@section('content')
    <div class="container">
        <div class="title">{{ $h1 }}</div>
        <!--section.articles-->
        <section class="articles">
            @if($first = S::get('about_first_card'))
                <div class="articles__main">
                    <div class="articles__main-body">
                        <div class="articles__title">{{ $first['title'] }}</div>
                        <div class="articles__text text-block">
                            {!! $first['text'] !!}
                        </div>
                    </div>
                    @if($img = $first['img'])
                        <picture>
                            <img class="articles__main-view" src="{{ S::fileSrc($img) }}"
                                 width="660" height="390" alt="{{ $first['title'] }}"/>
                        </picture>
                    @endif
                </div>
            @endif
            @if($cards = S::get('about_cards'))
                <div class="articles__list">
                    @foreach($cards as $card)
                        <article class="b-article">
                            <div class="b-article__head">
                                <div class="b-article__year">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" fill="none">
                                        <path stroke="currentColor" stroke-width="1.5"
                                              d="M1.3 8.04c0-2.715 0-4.073.843-4.916.844-.844 2.202-.844 4.917-.844h2.88c2.715 0 4.073 0 4.916.844.844.843.844 2.2.844 4.916v1.44c0 2.715 0 4.073-.844 4.916-.843.844-2.2.844-4.916.844H7.06c-2.715 0-4.073 0-4.917-.844-.843-.843-.843-2.2-.843-4.916V8.04Z"
                                        />
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="1.5"
                                              d="M4.9 2.28V1.2M12.1 2.28V1.2M1.66 5.88h13.68"/>
                                    </svg>
                                    {{ $card['year'] }}
                                </div>
                                <div class="b-article__title">{{ $card['title'] }}</div>
                            </div>
                            <div class="b-article__body">
                                <div class="b-article__text">
                                    <p>{{ $card['text'] }}</p>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif
        </section>
    </div>
    <!--section.s-clients-->
    @if(count($clients))
        <section class="s-clients splide" data-clients-slider="data-clients-slider">
        <div class="s-clients__container container">
            <div class="s-clients__heading">
                <div class="title">Наши клиенты</div>
                <div class="s-clients__arrows site-arrows site-arrows--white splide__arrows">
                    <button class="s-clients__arrow site-arrow splide__arrow splide__arrow--prev btn-reset"
                            type="button" aria-label="Предыдущий слайд">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="34" fill="none">
                            <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                               clip-path="url(#a)">
                                <path d="M24.571 17H10.43M17.5 9.929 10.429 17l7.071 7.071"/>
                            </g>
                            <defs>
                                <clipPath id="a">
                                    <path fill="currentColor" d="M17.5.03.53 17 17.5 33.97 34.47 17z"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </button>
                    <button class="s-clients__arrow site-arrow splide__arrow splide__arrow--next btn-reset"
                            type="button" aria-label="Следующий слайд">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="34" fill="none">
                            <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                               clip-path="url(#a)">
                                <path d="M10.429 17H24.57M17.5 9.929 24.571 17 17.5 24.071"/>
                            </g>
                            <defs>
                                <clipPath id="a">
                                    <path fill="currentColor" d="M17.5.03 34.47 17 17.5 33.97.53 17z"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="s-clients__track splide__track">
                <ul class="s-clients__list list-reset splide__list">
                    @foreach($clients as $client)
                        <li class="s-clients__slide splide__slide">
								<span class="s-clients__view">
									<img class="s-clients__img" src="{{ S::fileSrc($client['icon']) }}" width="150"
                                         height="150" alt="{{ $client['sign'] }}" loading="lazy"/>
								</span>
                            <span class="s-clients__label">{{ $client['sign'] }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
    @endif
    <!--section.s-projects-->
    @if(count($projects))
        <section class="s-projects splide" data-projects-slider="data-projects-slider">
        <div class="s-projects__container container">
            <div class="s-projects__heading">
                <div class="title">Наши проекты</div>
                <div class="s-projects__arrows site-arrows splide__arrows">
                    <button class="s-projects__arrow site-arrow splide__arrow splide__arrow--prev btn-reset"
                            type="button" aria-label="Предыдущий слайд">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="34" fill="none">
                            <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                               clip-path="url(#a)">
                                <path d="M24.571 17H10.43M17.5 9.929 10.429 17l7.071 7.071"/>
                            </g>
                            <defs>
                                <clipPath id="a">
                                    <path fill="currentColor" d="M17.5.03.53 17 17.5 33.97 34.47 17z"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </button>
                    <button class="s-projects__arrow site-arrow splide__arrow splide__arrow--next btn-reset"
                            type="button" aria-label="Следующий слайд">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="34" fill="none">
                            <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                               clip-path="url(#a)">
                                <path d="M10.429 17H24.57M17.5 9.929 24.571 17 17.5 24.071"/>
                            </g>
                            <defs>
                                <clipPath id="a">
                                    <path fill="currentColor" d="M17.5.03 34.47 17 17.5 33.97.53 17z"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="s-projects__track splide__track">
                <ul class="s-projects__list list-reset splide__list">
                    @foreach($projects as $proj)
                        <li class="s-projects__slide splide__slide">
								<span class="s-projects__body">
									<span class="s-projects__head">
										<a class="s-projects__title" href="{{ $proj['url'] }}">{{ $proj['name'] }}</a>
										<span class="s-projects__text">
											<p>{{ $proj['text'] }}</p>
										</span>
									</span>
									<span class="s-projects__location">
										<span class="s-projects__city">
											<svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="none">
												<path stroke="currentColor" stroke-width="2"
                                                      d="M3.5 8.829C3.5 4.781 6.724 1.5 10.7 1.5s7.2 3.281 7.2 7.329c0 4.016-2.298 8.702-5.883 10.378-.836.39-1.798.39-2.634 0C5.798 17.531 3.5 12.845 3.5 8.829Z"/>
												<circle cx="10.7" cy="8.7" r="2.7" stroke="currentColor"
                                                        stroke-width="2"/>
											</svg>{{ $proj['city'] }}</span>
									</span>
								</span>
                            <a class="s-projects__view" href="{{ $proj['url'] }}" title="ТБК-100">
                                <img class="s-projects__img" src="{{ S::fileSrc($proj['img']) }}"
                                     width="310" height="260" alt="{{ $proj['name'] }}" loading="lazy"/>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
    @endif
    <!--section.s-photo.is-gray-->
    @if(count($fotos))
        <section class="s-photo is-gray splide" data-projects-slider="data-projects-slider">
        <div class="s-photo__container container">
            <div class="s-photo__heading">
                <div class="title">Фото</div>
                <div class="s-photo__arrows site-arrows splide__arrows">
                    <button class="s-photo__arrow site-arrow splide__arrow splide__arrow--prev btn-reset" type="button"
                            aria-label="Предыдущий слайд">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="34" fill="none">
                            <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                               clip-path="url(#a)">
                                <path d="M24.571 17H10.43M17.5 9.929 10.429 17l7.071 7.071"/>
                            </g>
                            <defs>
                                <clipPath id="a">
                                    <path fill="currentColor" d="M17.5.03.53 17 17.5 33.97 34.47 17z"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </button>
                    <button class="s-photo__arrow site-arrow splide__arrow splide__arrow--next btn-reset" type="button"
                            aria-label="Следующий слайд">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="34" fill="none">
                            <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                               clip-path="url(#a)">
                                <path d="M10.429 17H24.57M17.5 9.929 24.571 17 17.5 24.071"/>
                            </g>
                            <defs>
                                <clipPath id="a">
                                    <path fill="currentColor" d="M17.5.03 34.47 17 17.5 33.97.53 17z"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="s-photo__track splide__track">
                <ul class="s-photo__list list-reset splide__list">
                    @foreach($fotos as $foto)
                        <li class="s-photo__slide splide__slide">
                            <a class="s-photo__view" href="{{ $foto->src }}" data-fancybox="gallery"
                               data-caption="{{ $foto->data != null ? $foto->data['text'] : '' }}"
                               title="{{ $foto->data != null ? $foto->data['text'] : '' }}">
                                <img class="s-photo__img" src="{{ $foto->thumb(1) }}" width="600" height="500"
                                     alt="{{ $foto->data != null ? $foto->data['text'] : '' }}" loading="lazy"/>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
    @endif
    <!--section.s-sert-->
    @if(count($licenses))
        <section class="s-sert splide" data-sert-slider="data-sert-slider">
        <div class="s-sert__container container">
            <div class="s-sert__heading">
                <div class="title">Лицензии и сертификаты</div>
                <div class="s-sert__arrows site-arrows splide__arrows">
                    <button class="s-sert__arrow site-arrow splide__arrow splide__arrow--prev btn-reset" type="button"
                            aria-label="Предыдущий слайд">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="34" fill="none">
                            <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                               clip-path="url(#a)">
                                <path d="M24.571 17H10.43M17.5 9.929 10.429 17l7.071 7.071"/>
                            </g>
                            <defs>
                                <clipPath id="a">
                                    <path fill="currentColor" d="M17.5.03.53 17 17.5 33.97 34.47 17z"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </button>
                    <button class="s-sert__arrow site-arrow splide__arrow splide__arrow--next btn-reset" type="button"
                            aria-label="Следующий слайд">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="34" fill="none">
                            <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                               clip-path="url(#a)">
                                <path d="M10.429 17H24.57M17.5 9.929 24.571 17 17.5 24.071"/>
                            </g>
                            <defs>
                                <clipPath id="a">
                                    <path fill="currentColor" d="M17.5.03 34.47 17 17.5 33.97.53 17z"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="s-sert__track splide__track">
                <ul class="s-sert__list list-reset splide__list">
                    @foreach($licenses as $item)
                        <li class="s-sert__slide splide__slide">
                        <a class="s-sert__view" href="{{ $item->src }}"
                           data-fancybox="sert-gallery" data-caption="{{ $item->data != null ? $item->data['text'] : '' }}"
                           title="{{ $item->data != null ? $item->data['text'] : '' }}">
                            <img class="s-sert__img" src="{{ $item->thumb(1) }}" width="268"
                                 height="383" alt="{{ $item->data != null ? $item->data['text'] : '' }}" loading="lazy"/>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
    @endif
@stop
