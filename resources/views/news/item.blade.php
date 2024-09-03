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
                <div class="s-text__date">
                    <!--.c-date-->
                    <div class="c-date">
                        <div class="c-date__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none">
                                <g clip-path="url(#a)">
                                    <path fill="currentColor"
                                          d="M15.89 1.406h-.843V0H13.64v1.406H4.359V0H2.953v1.406H2.11C.946 1.406 0 2.353 0 3.516V15.89C0 17.054.946 18 2.11 18h10.002L18 11.885v-8.37c0-1.162-.946-2.109-2.11-2.109Zm-3.374 14.147v-2.545c0-.388.315-.703.703-.703h2.425l-3.128 3.248Zm4.078-4.655h-3.375c-1.163 0-2.11.947-2.11 2.11v3.586h-9a.704.704 0 0 1-.703-.703V6.609h15.188v4.29Zm0-5.695H1.406V3.516c0-.388.316-.704.703-.704h.844V4.22H4.36V2.812h9.282V4.22h1.406V2.812h.844c.387 0 .703.316.703.704v1.687Z"
                                    />
                                </g>
                                <defs>
                                    <clipPath id="a">
                                        <path fill="#fff" d="M0 0h18v18H0z"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                        <div class="c-date__body">{{ $item->dateFormat() }}</div>
                    </div>
                </div>
                <div class="s-text__body text-block">
                    {!! $text !!}
                </div>
            </div>
        </section>

        @if($images)
            <section class="s-photo">
                <div class="s-photo__container container">
                    <div class="s-photo__heading">
                        <div class="title">Фото</div>
                    </div>
                    <div class="s-photo__slider splide" aria-label="{{ $item->name }}"
                         data-simple-slider="data-simple-slider">
                        <div class="s-photo__track splide__track">
                            <ul class="s-photo__list splide__list">
                                @foreach($images as $image)
                                    <li class="s-photo__slide splide__slide">
                                        <a class="s-photo__link" href="{{ $image->image_src }}"
                                           title="{{ $image->text }}"
                                           data-caption="{{ $image->text }}" data-fancybox="data-fancybox">
                                            <img class="s-photo__img" src="{{ $image->thumb(2) }}"
                                                 width="424" height="284" alt="{{ $image->text ?: $item->name }}"/>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="s-photo__container container">
                    <div class="s-photo__actions">
                        <a class="btn btn--accent" href="{{ route('news') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="1.7" d="M15 9H4M5 12 2 9l3-3"/>
                            </svg>
                            <span>Вернуться назад</span>
                        </a>
                    </div>
                </div>
            </section>
        @endif

        @if(count($read_more))
            <section class="s-cards">
                <div class="s-cards__container container">
                    <div class="s-cards__heading">
                        <div class="title">Читайте также</div>
                    </div>
                    <div class="s-cards__slider splide" aria-label="{{ $item->name }}"
                         data-cards-slider="data-cards-slider">
                        <div class="s-cards__track splide__track">
                            <ul class="s-cards__list splide__list">
                                @foreach($read_more as $item)
                                    <li class="s-cards__slide splide__slide">
                                        <!--.news-card-->
                                        <div class="news-card">
                                            <a class="news-card__link" href="{{ $item->url }}"
                                               title="{{ $item->name }}"></a>
                                            <div class="news-card__wrapper">
                                                <img class="news-card__image" src="{{ $item->thumb(3) }}"
                                                     width="423" height="423" loading="lazy"
                                                     alt="{{ $item->name }}"/>
                                            </div>
                                            <div class="news-card__body">
                                                <div class="news-card__heading">
                                                    <div class="news-card__title">{{ $item->name }}</div>
                                                </div>
                                                <div class="news-card__footer">
                                                    <div class="news-card__badge">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="12"
                                                             fill="none">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                  stroke-linejoin="round" stroke-width="1.7"
                                                                  d="M1 6h11M11 9l3-3-3-3"/>
                                                        </svg>
                                                    </div>
                                                    <div class="news-card__badge">{{ $item->dateFormat('d F Y') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <img class="s-cards__decor s-cards__decor--first lazy no-select" src="/ "
                     data-src="/static/images/common/cards-decor-1.svg" width="417" height="373" alt="" loading="lazy"/>
                <img class="s-cards__decor s-cards__decor--second lazy no-select" src="/ "
                     data-src="/static/images/common/cards-decor-2.svg" width="462" height="608" alt="" loading="lazy"/>
            </section>
        @endif
    </main>
@stop
