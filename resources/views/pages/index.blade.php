@extends('template')
@section('content')
    @if(isset($main_slider) && count($main_slider))
        <section class="hero splide" aria-label="Наши работы" data-hero-slider="data-hero-slider">
            <div class="hero__track splide__track">
                <ul class="hero__list splide__list">
                    @foreach($main_slider as $main_slide)
                        <li class="hero__slide splide__slide">
                            @if($main_slide['image'])
                                <span class="hero__preview no-select">
                                    <picture>
                                        <img src="{{ S::fileSrc($main_slide['image']) }}"
                                             alt="Слайд {{ $loop->iteration }} Novozmk"/>
                                    </picture>
							    </span>
                            @endif
                            <div class="hero__container container">
                                <div class="hero__body">
                                    <div class="hero__head">
                                        <div class="hero__title">{{ $main_slide['title'] }}</div>
                                    </div>
                                    <div class="hero__bottom">
                                        <div class="hero__badge">
                                            <div class="b-label">
                                                @if($icon = $main_slide['badge_icon'])
                                                    <div class="b-label__wrapper">
                                                        <div class="b-label__icon lazy"
                                                             data-bg="{{ S::fileSrc($icon) }}"></div>
                                                    </div>
                                                @endif
                                                <div class="b-label__body">{{ $main_slide['badge_text'] }}</div>
                                            </div>
                                        </div>
                                        <div class="hero__subtitle">{{ $main_slide['sub_title'] }}</div>
                                        <div class="hero__text">
                                            <p>{{ $main_slide['text'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    @endif

    @if(isset($main_catalog) && count($main_catalog))
        <section class="s-cat">
            <div class="s-cat__container container">
                <div class="s-cat__head">
                    <div class="s-cat__title">
                        <div class="title">Каталог продукции</div>
                    </div>
                    @if($cat_txt = S::get('catalog_main_text'))
                        <div class="s-cat__text">
                            <p>{!! $cat_txt !!}</p>
                        </div>
                    @endif
                </div>
                @include('blocks.main_catalog')
            </div>
        </section>
    @endif

    @if(isset($main_slider_feats) && count($main_slider_feats))
        <section class="s-feat splide" aria-label="Наши преимущества" data-feat-slider="data-feat-slider">
            <div class="s-feat__track splide__track">
                <ul class="s-feat__list splide__list">
                    @foreach($main_slider_feats as $item)
                        <li class="s-feat__slide splide__slide">
                            @if($item['image'])
                                <span class="s-feat__preview no-select">
                                    <picture>
                                        <img src="{{ S::fileSrc($item['image']) }}"
                                             width="1300" height="580" alt="{{ $item['text'] }}"
                                             loading="lazy"/>
                                    </picture>
                                </span>
                            @endif
                            <div class="s-feat__container container">
                                <div class="s-feat__body">
                                    <div class="s-feat__head">
                                        <div class="s-feat__title">{{ $item['text'] }}</div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    @endif

    @include('blocks.about')

    @if($map_items = S::get('main_map'))
        <section class="s-map">
            <div class="s-map__container container">
                <div class="s-map__view lazy" data-bg="/static/images/common/map.svg"></div>
                @foreach($map_items as $item)
                    @if($item['name'] && $item['class'])
                        <div class="s-map__point {{ $item['class'] }}" x-data="{ point: false }">
                            <div class="s-map__info" :class="point &amp;&amp; 'is-active'">
                                <div class="i-point">
                                    @if($img = $item['image'])
                                        <div class="i-point__view lazy" data-bg="{{ S::fileSrc($img) }}"></div>
                                    @endif
                                    <div class="i-point__body">
                                        <div class="i-point__title">{{ $item['title'] }}</div>
                                        <div class="i-point__text">{{ $item['text'] }}</div>
                                        <div class="i-point__date">
                                            <div class="i-point__date-icon lazy"
                                                 data-bg="/static/images/common/ico_clock.svg"></div>
                                            <div class="i-point__date-label">{{ $item['year'] ? $item['year'].' год.' : '' }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="b-label b-label--data" @mouseover="point = true" @mouseleave="point = false"
                                 :class="point &amp;&amp; 'is-active'">
                                <div class="b-label__wrapper">
                                    <div class="b-label__icon lazy" data-bg="/static/images/common/ico_city.svg"></div>
                                </div>
                                <div class="b-label__body">{{ $item['name'] }}</div>
                            </div>
                        </div>
                    @endif
                @endforeach

                @if($header = S::get('main_map_header'))
                    <div class="s-map__head">
                        <div class="title">{{ $header['title'] }}</div>
                        <div class="s-map__text">
                            <p>{{ $header['text'] }}</p>
                        </div>
                    </div>
                @endif
                <!--._body-->
                <!-- touch devices-->
                <div class="s-map__body">
                    @foreach($map_items as $item)
                        <div class="s-map__item">
                            <div class="b-label">
                                <div class="b-label__wrapper">
                                    <div class="b-label__icon lazy" data-bg="/static/images/common/ico_city.svg"></div>
                                </div>
                                <div class="b-label__body">{{ $item['name'] }}</div>
                            </div>
                            <div class="i-point">
                                @if($img = $item['image'])
                                    <div class="i-point__view lazy" data-bg="{{ S::fileSrc($img) }}"></div>
                                @endif
                                <div class="i-point__body">
                                    <div class="i-point__title">{{ $item['title'] }}</div>
                                    <div class="i-point__text">{{ $item['text'] }}</div>
                                    <div class="i-point__date">
                                        <div class="i-point__date-icon lazy"
                                             data-bg="/static/images/common/ico_clock.svg"></div>
                                        <div class="i-point__date-label">{{ $item['year'] ? $item['year'].' год.' : '' }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="s-start">
        <div class="s-start__container">
            <div class="s-start__content">
                <div class="s-start__head">
                    <div class="title">Изготовление по вашим чертежам
                    </div>
                </div>
                <div class="s-start__text">Заполните форму, специалист проконсультирует вас по вопросу подбора продукции
                    с объяснением всех технических характеристик.
                </div>
                <div class="s-start__form">
                    <form class="form" action="{{ route('ajax.drawing-request') }}">
                        <div class="form__fields">
                            <div class="form__col">
                                <input class="input" type="text" name="name" placeholder="Ваше имя*"
                                       required="required"/>
                            </div>
                            <div class="form__col">
                                <input class="input" type="tel" name="phone" placeholder="+7 (___) ___-__-__*"
                                       required="required"/>
                            </div>
                            <div class="form__row">
                                <textarea class="input input--text" name="text" placeholder="Сообщение"
                                          rows="7"></textarea>
                            </div>
                        </div>
                        <div class="form__actions">
                            <div class="form__fields">
                                <div class="form__col">
                                    <label class="upload">
                                        <span class="upload__name">Загрузить чертёж</span>
                                        <input type="file" name="file"
                                               accept=".jpg, .jpeg, .png, .pdf, .doc, .docs, .xls, .xlsx"/>
                                    </label>
                                </div>
                                <div class="form__col">
                                    <button class="btn btn-reset" name="submit" aria-label="Отправить">
                                        <span>Отправить</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                  stroke-width="1.7" d="M3.333 10h11M13.333 13l3-3-3-3"/>
                                        </svg>
                                    </button>
                                </div>
                                <div class="form__row">
                                    <div class="form__policy">Нажимая на кнопку вы соглашаетесь с 
                                        <a href="{{ route('policy') }}">Политикой конфиденциальности</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="s-start__view lazy" data-bg="/static/images/common/start-bg.jpg">
                <div class="s-start__label">
                    <!--.b-label-->
                    <div class="b-label is-reversed is-white">
                        <div class="b-label__wrapper">
                            <div class="b-label__icon lazy" data-bg="/static/images/common/ico_clock--blue.svg"></div>
                        </div>
                        <div class="b-label__body">Изготовление от 7 дней</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
