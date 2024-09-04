<footer class="footer">
    <div class="footer__body">
        <div class="footer__container container">
            <div class="footer__content">
                <div class="footer__logo">
                    <div class="logo">
                        <img class="logo__img" src="/static/images/common/logo.svg" width="76" height="72"
                             alt="Теплобаланс"/>
                        <span class="logo__label">ООО «Теплобаланс»</span>
                    </div>
                </div>
                <div class="footer__menu">
                    @if($footer_menu)
                        <nav class="footer__nav">
                            <ul class="footer__nav-list">
                                @foreach($footer_menu as $footer_menu_item)
                                    @if($footer_menu_item->alias !== 'services')
                                        <li class="footer__nav-item">
                                            <a class="footer__nav-category"
                                               href="{{ $footer_menu_item->url }}">{{ $footer_menu_item->name }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </nav>
                    @endif
                    <nav class="footer__nav">
                        <ul class="footer__nav-list">
                            <li class="footer__nav-item">
                                <a class="footer__nav-category" href="{{ route('services') }}">Услуги</a>
                            </li>
                        </ul>
                        @if(isset($services_links))
                            <ul class="footer__nav-links">
                                @foreach($services_links as $service)
                                    <li class="footer__nav-item">
                                        <a class="footer__nav-link" href="{{ $service->url }}">{{ $service->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </nav>
                </div>
                <div class="footer__infos">
                    @if($footer_phone = S::get('footer_phone'))
                        <a class="footer__phone"
                           href="tel:{{ SiteHelper::clearPhone($footer_phone) }}">{{ $footer_phone }}</a>
                    @endif
                    <div class="footer__socials">
                        <!--ul.socials.list-reset-->
                        <ul class="socials list-reset">
                            @if($soc_wa = S::get('soc_wa'))
                                <li class="socials__item">
                                    <a class="socials__link" href="{{ $soc_wa }}" title="Написать в Whatsapp">
                                    <span class="socials__email-icon site-icon site-icon--black">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15" fill="none">
                                            <path fill="currentColor"
                                                  d="M11.951 2.542A6.952 6.952 0 0 0 7.024.5C3.171.5.05 3.611.05 7.451c0 1.216.341 2.43.927 3.452L0 14.5l3.707-.972a7.132 7.132 0 0 0 3.317.826c3.854 0 6.976-3.11 6.976-6.951-.049-1.799-.732-3.549-2.049-4.861Zm-1.56 7.389c-.147.388-.83.777-1.171.826a2.732 2.732 0 0 1-1.074-.049c-.244-.097-.585-.194-.975-.389C5.415 9.59 4.293 7.84 4.195 7.694c-.097-.097-.732-.923-.732-1.798s.44-1.264.586-1.458c.146-.195.341-.195.488-.195h.341c.098 0 .244-.049.39.292.147.34.488 1.215.537 1.264a.309.309 0 0 1 0 .291 1.017 1.017 0 0 1-.195.292c-.098.097-.195.243-.244.292-.098.097-.195.194-.098.34.098.194.44.729.976 1.215.683.584 1.22.778 1.415.875.195.097.292.049.39-.048.097-.098.439-.487.536-.681.098-.194.244-.146.39-.097.147.048 1.025.486 1.171.583.195.097.293.146.342.195.049.145.049.486-.098.875Z"
                                            />
                                        </svg>
                                    </span>
                                    </a>
                                </li>
                            @endif
                            @if($soc_tg = S::get('soc_tg'))
                                <li class="socials__item">
                                    <a class="socials__link" href="{{ $soc_tg }}" title="Написать в Telegram">
                                    <span class="socials__email-icon site-icon site-icon--black">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" fill="none">
                                            <path fill="currentColor"
                                                  d="m15.647.996-2.475 12.921s-.346.896-1.298.466L6.164 9.85l-.027-.013c.772-.717 6.753-6.287 7.015-6.54.404-.39.153-.623-.317-.328L4 8.778.59 7.592s-.536-.197-.588-.627c-.052-.43.606-.663.606-.663L14.505.656s1.142-.52 1.142.34Z"
                                            />
                                        </svg>
                                    </span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                    @if($footer_email = S::get('footer_email'))
                        <a class="footer__email" href="mailto:{{ $footer_email }}">{{ $footer_email }}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="footer__bottom">
        <div class="footer__container container">
            <div class="footer__copies">
                <div class="footer__copies-col">
                    <div class="footer__copies-label">ООО «Теплобаланс» © {{ date('Y') }}</div>
                    <div class="footer__copies-label">{{ S::get('footer_info') }}</div>
                </div>
                <div class="footer__copies-col">
                    <a class="footer__copies-label" href="{{ route('policy') }}">Политика конфиденциальности</a>
                    <a class="footer__copies-label" href="{{ route('agreement') }}">Пользовательское соглашение</a>
                </div>
            </div>
        </div>
    </div>
</footer>