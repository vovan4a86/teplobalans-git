<header class="header">
    <div class="header__container container">
        <div class="header__brand">
            <div class="logo">
                @if(Route::is('main'))
                    <img class="logo__img" src="/static/images/common/logo.svg" width="76" height="72"
                         alt="Теплобаланс"/>
                @else
                    <a href="{{ route('main') }}">
                        <img class="logo__img" src="/static/images/common/logo.svg" width="76" height="72"
                             alt="Теплобаланс"/>
                    </a>
                @endif
                <span class="logo__label">ООО «Теплобаланс»</span>
            </div>
        </div>
        <nav class="header__nav" itemscope itemtype="https://schema.org/SiteNavigationElement" aria-label="Меню">
            <ul class="header__nav-list" itemprop="about" itemscope itemtype="https://schema.org/ItemList">
                @foreach($header_menu as $header_menu_item)
                    @if(count($header_menu_item->public_children_header))
                        <li class="header__nav-item is-dropdown" itemprop="itemListElement" itemscope
                            itemtype="https://schema.org/ItemList">
                            <a class="header__nav-link is-dropdown" href="{{ $header_menu_item->url }}" itemprop="url">
                                <span>{{ $header_menu_item->name }}</span>
                                <meta itemprop="name" content="{{ $header_menu_item->name }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="7" fill="none">
                                    <path fill="currentColor" fill-rule="evenodd"
                                          d="M5 2.578 1.332 6.3 0 5.362 4.334.964A.937.937 0 0 1 5 .7c.257 0 .501.096.666.264L10 5.362 8.668 6.3 5 2.578Z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </a>
                            <ul class="header__dropdown list-reset">
                                @foreach($header_menu_item->public_children_header as $child)
                                    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ItemList">
                                        <a href="{{ $child->url }}" itemprop="url">{{ $child->name }}</a>
                                        <meta itemprop="name" content="{{ $child->name }}">
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @elseif($header_menu_item->alias == 'services')
                        <li class="header__nav-item is-dropdown" itemprop="itemListElement" itemscope
                            itemtype="https://schema.org/ItemList">
                            <a class="header__nav-link is-dropdown" href="{{ $header_menu_item->url }}" itemprop="url">
                                <span>{{ $header_menu_item->name }}</span>
                                <meta itemprop="name" content="{{ $header_menu_item->name }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="7" fill="none">
                                    <path fill="currentColor" fill-rule="evenodd"
                                          d="M5 2.578 1.332 6.3 0 5.362 4.334.964A.937.937 0 0 1 5 .7c.257 0 .501.096.666.264L10 5.362 8.668 6.3 5 2.578Z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </a>
                            @if(isset($services_links))
                                <ul class="header__dropdown list-reset">
                                    @foreach($services_links as $service)
                                        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ItemList">
                                            <a href="{{ $service->url }}" itemprop="url">{{ $service->h1 ?: $service->name }}</a>
                                            <meta itemprop="name" content="{{ $service->h1 ?: $service->name }}">
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @else
                        <li class="header__nav-item" itemprop="itemListElement" itemscope
                            itemtype="https://schema.org/ItemList">
                            <a class="header__nav-link" href="{{ $header_menu_item->url }}" itemprop="url">
                                <span>{{ $header_menu_item->name }}</span>
                                <meta itemprop="name" content="{{ $header_menu_item->name }}">
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </nav>
        <div class="header__infos">
            @if($header_email = S::get('header_email'))
                <a class="header__email" href="mailto:{{ $header_email }}" title="Отправить email">
                    <span class="header__email-icon site-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" fill="none">
                            <path fill="currentColor" fill-rule="evenodd"
                                  d="M13.333 3.167H2.667c-.56 0-1.043.35-1.24.842.068.013.133.04.193.081L8 8.556l6.38-4.466a.499.499 0 0 1 .192-.081 1.338 1.338 0 0 0-1.239-.842Zm1.334 1.943-6.38 4.466a.5.5 0 0 1-.574 0L1.333 5.11v7.39c0 .733.6 1.333 1.334 1.333h10.666c.734 0 1.334-.6 1.334-1.333V5.11Z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </span>
                    <span class="header__email-label">{{ $header_email }}</span>
                </a>
            @endif
            <div class="header__socials">
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
            @if($header_phone = S::get('header_phone'))
                <a class="header__phone" href="tel:{{ SiteHelper::clearPhone($header_phone) }}"
                   title="Позвонить нам">{{ $header_phone }}</a>
            @endif
        </div>
        <div class="header__mobile">
            <button class="header__burger btn-reset" type="button" aria-label="Открыть мобильное меню" data-burger>
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5">
                        <path d="M20 7H4"/>
                        <path d="M20 12H4" opacity=".5"/>
                        <path d="M20 17H4"/>
                    </g>
                </svg>
            </button>
        </div>
    </div>
</header>