@if(isset($certificates) && count($certificates))
    <section class="s-sert">
        <div class="s-sert__container container">
            <div class="s-sert__heading">
                <div class="title">Сертификаты</div>
            </div>
            <div class="s-sert__slider splide" aria-label="Сертификаты" data-sert-slider="data-sert-slider">
                <div class="s-sert__track splide__track">
                    <ul class="s-sert__list splide__list">
                        @foreach($certificates as $item)
                            <li class="s-sert__slide splide__slide">
                                <a class="s-sert__preview" href="{{ $item->image_src }}"
                                   title="{{ $item->name }}"
                                   data-caption="{{ $item->name }}"
                                   data-fancybox="sert-gallery">
                                    <img class="s-sert__pic" src="{{ $item->thumb(2) }}" width="300" height="400"
                                         alt="{{ $item->name }}" loading="lazy"/>
                                    <span class="s-sert__resize">
											<span class="b-resize">
												<svg xmlns="http://www.w3.org/2000/svg" width="18" height="19"
                                                     fill="none">
													<path stroke="currentColor" stroke-linecap="round"
                                                          stroke-linejoin="round" stroke-width="1.7"
                                                          d="M11.25 2.75h4.5v4.5M6.75 16.25h-4.5v-4.5M15.75 2.75 10.5 8M2.25 16.25 7.5 11"/>
												</svg>
											</span>
										</span>
                                </a>
                                <span class="s-sert__name">{{ $item->name }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <img class="s-sert__decor s-sert__decor--first lazy no-select" src="/"
             data-src="/static/images/common/sert-decor-1.svg" width="342" height="495" alt=""/>
        <img class="s-sert__decor s-sert__decor--second lazy no-select" src="/"
             data-src="/static/images/common/sert-decor-2.svg" width="424" height="469" alt=""/>
    </section>
@endif