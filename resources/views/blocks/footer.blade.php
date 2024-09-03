<footer class="footer lazy"
        data-bg="/static/images/common/footer-bg.jpg">
    <div class="footer__container container">
        <div class="footer__grid">
            <div class="footer__about">
                <div class="footer__logo">
                    @if(Route::is('main'))
                        <div class="logo">
                            <img class="logo__img no-select" src="/static/images/common/logo--white.svg" width="222"
                                 height="60" alt="logo"/>
                        </div>
                    @else
                        <a href="{{ route('main') }}" class="logo">
                            <img class="logo__img no-select" src="/static/images/common/logo--white.svg" width="222"
                                 height="60" alt="logo"/>
                        </a>
                    @endif
                </div>
                <div class="footer__tech">
                    <div class="footer__copy">Все права защищены © {{ date('Y') }}</div>
                    <a class="footer__policy" href="{{ route('policy') }}" target="_blank">Политика
                        конфиденциальности</a>
                </div>
            </div>
            <div class="footer__menu">
                <!--nav.f-nav-->
                <nav class="f-nav">
                    @if(isset($catalog_menu) && count($catalog_menu))
                        <div class="f-nav__col">
                            <span class="f-nav__name">Каталог</span>
                            <ul class="f-nav__list">
                                @foreach($catalog_menu as $item)
                                    <li class="f-nav__item">
                                        <a class="f-nav__link" href="{{ $item->url }}" data-link="data-link">
                                            {{ $item->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(isset($footer_menu) && count($footer_menu))
                        <div class="f-nav__col">
                            <span class="f-nav__name">Клиентам</span>
                            <ul class="f-nav__list">
                                @foreach($footer_menu as $item)
                                    <li class="f-nav__item">
                                        <a class="f-nav__link" href="{{ $item->url }}"
                                           data-link="data-link">{{ $item->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </nav>
            </div>

            @if($addresses = S::get('footer_addresses'))
                <div class="footer__info">
                    <div class="footer__data">
                        @foreach($addresses as $item)
                            <div class="footer__item">
                                <div class="footer__lead">{!!  $item['address']  !!}</div>
                                @if($item['schedule'])
                                    <div class="footer__label">График работы:
                                        <span>{{ $item['schedule'] }}</span>
                                    </div>
                                @endif
                            </div>
                            <div class="footer__item">
                                @if($phones = explode(',', $item['phone']))
                                    @if(count($phones) < 2)
                                        <a class="footer__lead" href="tel:{{ SiteHelper::clearPhone($phones[0]) }}"
                                           title="позвонить нам">
                                                <span class="footer__lead-icon lazy"
                                                      data-bg="/static/images/common/ico_phone--white.svg"></span>
                                            <span class="footer__lead-label">{{ $phones[0] }}</span>
                                        </a>
                                    @else
                                        <div class="footer__leads">
                                            @foreach($phones as $phone)
                                                <a class="footer__lead" href="tel:{{ SiteHelper::clearPhone($phone) }}"
                                                   title="позвонить нам">
                                                        <span class="footer__lead-icon lazy"
                                                              data-bg="/static/images/common/ico_phone--white.svg"></span>
                                                    <span class="footer__lead-label">{{ $phone }}</span>
                                                </a>
                                            @endforeach
                                        </div>
                                    @endif
                                @endif
                                @if($item['email'])
                                    <a class="footer__label" href="mailto:{{ $item['email'] }}">{{ $item['email'] }}</a>
                                @endif
                            </div>
                        @endforeach

                        <div class="footer__item footer__item--actions">
                            <ul class="socials list-reset" aria-label="Социальные сети">
                                {{--                                        <li class="socials__item">--}}
                                {{--                                            <a class="socials__link" href="javascript:void(0)" target="_blank" rel="noopener noreferrer" title="Группа Facebook">--}}
                                {{--                                                <span class="socials__icon lazy" data-bg="/static/images/common/ico_fb.svg"></span>--}}
                                {{--                                            </a>--}}
                                {{--                                        </li>--}}
                                @if($yt = S::get('footer_yt'))
                                    <li class="socials__item">
                                        <a class="socials__link" href="{{ $yt }}" target="_blank"
                                           rel="noopener noreferrer" title="YouTube канал">
                                            <span class="socials__icon lazy"
                                                  data-bg="/static/images/common/ico_yt.svg"></span>
                                        </a>
                                    </li>
                                @endif
                                @if($tg = S::get('footer_tg'))
                                    <li class="socials__item">
                                        <a class="socials__link" href="{{ $tg }}" target="_blank"
                                           rel="noopener noreferrer" title="Написать в Telegram">
                                            <span class="socials__icon lazy"
                                                  data-bg="/static/images/common/ico_tg.svg"></span>
                                        </a>
                                    </li>
                                @endif
                                @if($wa = S::get('footer_wa'))
                                    <li class="socials__item">
                                        <a class="socials__link" href="{{ $wa }}" target="_blank"
                                           rel="noopener noreferrer" title="Написать в Whatsapp">
                                            <span class="socials__icon lazy"
                                                  data-bg="/static/images/common/ico_wa.svg"></span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                            <!--button.action-btn.btn-reset(class=(errorPage && "action-btn--black"))-->
                            <button class="action-btn btn-reset" type="button" data-popup="data-popup"
                                    data-src="#counselling" aria-label="Консультация">
                                <!--(errorPage ? "ico_talk--black.svg" : "ico_talk.svg")-->
                                <span class="action-btn__icon lazy" data-bg="/static/images/common/ico_talk.svg"></span>
                                <span class="action-btn__label">Консультация</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endif

            <div class="footer__post">
                {!! S::get('footer_post') !!}
            </div>
        </div>
    </div>
</footer>
