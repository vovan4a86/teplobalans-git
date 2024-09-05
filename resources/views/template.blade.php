<!DOCTYPE html>
<html lang="ru-RU">

@include('blocks.head')

<body class="no-scroll">
@if(isset($h1))
    <h1 class="v-hidden">{{ $h1 }}</h1>
@endif
<div class="preloader">
    <div class="preloader__loader"></div>
    <script type="text/javascript">
        window.addEventListener('load', () => {document.querySelector('body').classList.remove('no-scroll');document.querySelector('.preloader').classList.add('unactive')});
    </script>
</div>

{!! Settings::get('counters') !!}

@include('blocks.header')
@include('blocks.mob_nav')

@include('blocks.bread')

<main>
    @yield('content')
</main>

<!--if homepage | pricePage | servicePage-->
@if(Route::is(['main', 'price', 'services.item']))
    @if($workers = S::get('main_site_workers'))
        <section class="s-usr">
            <div class="s-usr__container container">
                <div class="title">С кем можно связаться через сайт</div>
                <div class="s-usr__grid">
                    @foreach($workers as $worker)
                        <div class="card-usr">
                            @if($worker['photo'])
                                <div class="card-usr__view">
                                    <img class="card-usr__img" src="{{ S::fileSrc($worker['photo']) }}"
                                         alt="{{ $worker['name'] }}" width="272" height="261" loading="lazy" />
                                </div>
                            @endif
                            <div class="card-usr__body">
                                <div class="card-usr__naming">
                                    <div class="card-usr__name">{{ $worker['name'] }}</div>
                                    <div class="card-usr__job">{{ $worker['job'] }}</div>
                                </div>
                                <a class="card-usr__phone" href="tel:{{ SiteHelper::clearPhone($worker['phone']) }}" title="Позвонить нам">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none">
                                        <g clip-path="url(#a)">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16.5 12.69v2.25a1.499 1.499 0 0 1-1.635 1.5 14.843 14.843 0 0 1-6.472-2.302 14.625 14.625 0 0 1-4.5-4.5A14.842 14.842 0 0 1 1.59 3.135 1.5 1.5 0 0 1 3.083 1.5h2.25a1.5 1.5 0 0 1 1.5 1.29 9.63 9.63 0 0 0 .525 2.108A1.5 1.5 0 0 1 7.02 6.48l-.952.953a12 12 0 0 0 4.5 4.5l.952-.953a1.5 1.5 0 0 1 1.582-.337c.681.253 1.388.43 2.108.525a1.5 1.5 0 0 1 1.29 1.522Z"
                                            />
                                        </g>
                                        <defs>
                                            <clipPath id="a">
                                                <path fill="#fff" d="M0 0h18v18H0z" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    <span class="card-usr__phone-label">{{ $worker['phone'] }}</span>
                                    @if($dob = $worker['dob'])
                                        <span class="card-usr__phone-add">доб.: {{ $dob }}</span>
                                    @endif
                                </a>
                                <div class="card-usr__actions">
                                    <btn class="btn btn--red btn-reset" type="button" data-popup="data-popup" data-src="#request"
                                         data-name="{{ $worker['name'] }}" aria-label="Задать вопрос">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 17 17 7M7 7h10v10" />
                                        </svg>
                                        <span>Задать вопрос</span>
                                    </btn>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="s-cont">
    <div class="s-cont__container">
        <div class="s-cont__body">
            <div class="s-cont__heading">
                <div class="title">Контакты</div>
            </div>
            <div class="s-cont__content">
                <div class="s-cont__item">
                    <div class="s-cont__key">Бесплатная консультация</div>
                    <a class="s-cont__value" href="tel:+73432883055">+7 343 288-30-55</a>
                </div>
                <div class="s-cont__item">
                    <div class="s-cont__key">Отправить вопрос на почту</div>
                    <a class="s-cont__value" href="mailto:info@teplo-balans.ru">info@teplo-balans.ru</a>
                </div>
                <div class="s-cont__item">
                    <div class="s-cont__key">Адрес компании</div>
                    <div class="s-cont__value">Екатеринбург, ул. Фрунзе, 96В</div>
                </div>
                <div class="s-cont__item">
                    <div class="s-cont__key">График работы</div>
                    <div class="s-cont__value">Пн-Пт с 08:00 до 17:00</div>
                </div>
                <div class="s-cont__item">
                    <div class="s-cont__key">Написать нам</div>
                    <!--ul.socials.list-reset-->
                    <ul class="socials list-reset">
                        <li class="socials__item">
                            <a class="socials__link" href="javascript:void(0)" title="Написать в Whatsapp">
										<span class="socials__email-icon site-icon site-icon--black">
											<svg xmlns="http://www.w3.org/2000/svg" width="14" height="15" fill="none">
												<path fill="currentColor" d="M11.951 2.542A6.952 6.952 0 0 0 7.024.5C3.171.5.05 3.611.05 7.451c0 1.216.341 2.43.927 3.452L0 14.5l3.707-.972a7.132 7.132 0 0 0 3.317.826c3.854 0 6.976-3.11 6.976-6.951-.049-1.799-.732-3.549-2.049-4.861Zm-1.56 7.389c-.147.388-.83.777-1.171.826a2.732 2.732 0 0 1-1.074-.049c-.244-.097-.585-.194-.975-.389C5.415 9.59 4.293 7.84 4.195 7.694c-.097-.097-.732-.923-.732-1.798s.44-1.264.586-1.458c.146-.195.341-.195.488-.195h.341c.098 0 .244-.049.39.292.147.34.488 1.215.537 1.264a.309.309 0 0 1 0 .291 1.017 1.017 0 0 1-.195.292c-.098.097-.195.243-.244.292-.098.097-.195.194-.098.34.098.194.44.729.976 1.215.683.584 1.22.778 1.415.875.195.097.292.049.39-.048.097-.098.439-.487.536-.681.098-.194.244-.146.39-.097.147.048 1.025.486 1.171.583.195.097.293.146.342.195.049.145.049.486-.098.875Z"
                                                />
											</svg>
										</span>
                            </a>
                        </li>
                        <li class="socials__item">
                            <a class="socials__link" href="javascript:void(0)" title="Написать в Telegram">
										<span class="socials__email-icon site-icon site-icon--black">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" fill="none">
												<path fill="currentColor" d="m15.647.996-2.475 12.921s-.346.896-1.298.466L6.164 9.85l-.027-.013c.772-.717 6.753-6.287 7.015-6.54.404-.39.153-.623-.317-.328L4 8.778.59 7.592s-.536-.197-.588-.627c-.052-.43.606-.663.606-.663L14.505.656s1.142-.52 1.142.34Z"
                                                />
											</svg>
										</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="s-cont__map" id="map-1" data-map="data-map" data-lat="56.813459" data-long="60.595167" data-hint="г. Екатеринбург, ул. Фрунзе, 96В, 3 этаж"></div>
    </div>
</section>
@endif

@include('blocks.footer')
@include('blocks.popups')

<div class="v-hidden" id="company" itemprop="branchOf" itemscope itemtype="https://schema.org/Corporation"
     aria-hidden="true" tabindex="-1">
    {!! Settings::get('schema.org') !!}
</div>

<div class="scrolltop" aria-label="В начало страницы" tabindex="1">
    <svg class="svg-sprite-icon icon-up" width="1em" height="1em">
        <use xlink:href="/static/images/sprite/symbol/sprite.svg#up"></use>
    </svg>
</div>

@if(isset($admin_edit_link) && strlen($admin_edit_link))
    <div class="adminedit">
        <div class="adminedit__ico"></div>
        <a href="{{ $admin_edit_link }}" class="adminedit__name" target="_blank">Редактировать</a>
    </div>
@endif
</body>
</html>
