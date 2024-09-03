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
    <!--section.s-prods-->
    <section class="s-prods">
        <div class="s-prods__container container">
            <div class="title">Продукция компании</div>
            <div class="s-prods__grid">
                <!--.card-prods-->
                <div class="card-prods">
                    <a class="card-prods__title" href="javascript:void(0)" title="ТБК-100">ТБК-100</a>
                    <div class="card-prods__text">
                        <p>Универсальный прибор для учёта тепловой энергии</p>
                    </div>
                    <div class="card-prods__actions">
                        <a class="card-prods__link btn btn--red" href="javascript:void(0)" title="Перейти">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="M7 17 17 7M7 7h10v10"/>
                            </svg>
                            <span>Перейти</span>
                        </a>
                    </div>
                    <div class="card-prods__view">
                        <img class="card-prods__pic no-select" src="/static/images/common/prods-1.png" width="343"
                             height="293" alt="ТБК-100" loading="lazy"/>
                    </div>
                </div>
                <!--.card-prods-->
                <div class="card-prods">
                    <a class="card-prods__title" href="javascript:void(0)" title="ТБР-200">ТБР-200</a>
                    <div class="card-prods__text">
                        <p>Электронный регулятор для систем автоматического регулирования тепловой энергии</p>
                    </div>
                    <div class="card-prods__actions">
                        <a class="card-prods__link btn btn--red" href="javascript:void(0)" title="Перейти">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="M7 17 17 7M7 7h10v10"/>
                            </svg>
                            <span>Перейти</span>
                        </a>
                    </div>
                    <div class="card-prods__view">
                        <img class="card-prods__pic no-select" src="/static/images/common/prods-2.png" width="343"
                             height="293" alt="ТБР-200" loading="lazy"/>
                    </div>
                </div>
                <!--.card-prods-->
                <div class="card-prods">
                    <a class="card-prods__title" href="javascript:void(0)" title="ТБН-300">ТБН-300</a>
                    <div class="card-prods__text">
                        <p>Контроллеры насосной станции</p>
                    </div>
                    <div class="card-prods__actions">
                        <a class="card-prods__link btn btn--red" href="javascript:void(0)" title="Перейти">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="M7 17 17 7M7 7h10v10"/>
                            </svg>
                            <span>Перейти</span>
                        </a>
                    </div>
                    <div class="card-prods__view">
                        <img class="card-prods__pic no-select" src="/static/images/common/prods-3.png" width="343"
                             height="293" alt="ТБН-300" loading="lazy"/>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--section.s-srv(class=(servicesPage && 'is-page'))-->
    <section class="s-srv">
        <div class="s-srv__container container">
            <div class="title">Услуги компании</div>
            <div class="s-srv__list">
                <!--.card-srv-->
                <div class="card-srv">
                    <div class="card-srv__body">
                        <div class="card-srv__title">Обслуживание коммерческих узлов учёта (УКУТ)</div>
                        <div class="card-srv__text">
                            <p>Сопровождение приборов учёта, мониторинг состояния узла учёта, и ведение коммерческой
                                отчётности.</p>
                        </div>
                        <div class="card-srv__foot">
                            <p>При необходимости, сдача и согласование узлов учёта в ЭСК.</p>
                        </div>
                        <div class="card-srv__actions">
                            <a class="btn" href="javascript:void(0)" title="Подробнее">
                                <span>Подробнее</span>
                            </a>
                        </div>
                    </div>
                    <!-- example sizing: 603x386-->
                    <a class="card-srv__view lazy" data-bg="/static/images/common/srv-1.jpg" href="javascript:void(0)"
                       title="Обслуживание коммерческих узлов учёта (УКУТ)"></a>
                </div>
                <!--.card-srv-->
                <div class="card-srv">
                    <div class="card-srv__body">
                        <div class="card-srv__title">Система автоматического регулирования тепла (САРТ)</div>
                        <div class="card-srv__text">
                            <p>Внедрение и обслуживание автоматизированного погодного регулирования подачи тепла.</p>
                        </div>
                        <div class="card-srv__foot">
                            <p>Комфорт для жителей, и заметная экономия денежных средств.</p>
                        </div>
                        <div class="card-srv__actions">
                            <a class="btn" href="javascript:void(0)" title="Подробнее">
                                <span>Подробнее</span>
                            </a>
                        </div>
                    </div>
                    <!-- example sizing: 603x386-->
                    <a class="card-srv__view lazy" data-bg="/static/images/common/srv-2.jpg" href="javascript:void(0)"
                       title="Система автоматического регулирования тепла (САРТ)"></a>
                </div>
                <!--.card-srv-->
                <div class="card-srv">
                    <div class="card-srv__body">
                        <div class="card-srv__title">Поверка и ремонт оборудования</div>
                        <div class="card-srv__text">
                            <p>Сервисное сопровождение ранее установленного оборудования в авторизованном сервисном
                                центре</p>
                        </div>
                        <div class="card-srv__foot">
                            <p>по разумным ценам.</p>
                        </div>
                        <div class="card-srv__actions">
                            <a class="btn" href="javascript:void(0)" title="Подробнее">
                                <span>Подробнее</span>
                            </a>
                        </div>
                    </div>
                    <!-- example sizing: 603x386-->
                    <a class="card-srv__view lazy" data-bg="/static/images/common/srv-3.jpg" href="javascript:void(0)"
                       title="Поверка и ремонт оборудования"></a>
                </div>
                <!--.card-srv-->
                <div class="card-srv">
                    <div class="card-srv__body">
                        <div class="card-srv__title">Проектирование, монтаж, и реконструкция УКУТ</div>
                        <div class="card-srv__text">
                            <p>Полное сопровождение на всех этапах работ: от проектирования, до монтажа и сдачи УКУТ
                                в эксплуатацию ЭСО.</p>
                        </div>
                        <div class="card-srv__actions">
                            <a class="btn" href="javascript:void(0)" title="Подробнее">
                                <span>Подробнее</span>
                            </a>
                        </div>
                    </div>
                    <!-- example sizing: 603x386-->
                    <a class="card-srv__view lazy" data-bg="/static/images/common/srv-4.jpg" href="javascript:void(0)"
                       title="Проектирование, монтаж, и реконструкция УКУТ"></a>
                </div>
            </div>
        </div>
    </section>
@stop
