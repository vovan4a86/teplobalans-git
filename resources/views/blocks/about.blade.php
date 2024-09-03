<section class="s-about">
    <div class="s-about__container container">
        <div class="s-about__grid">
            <div class="s-about__col s-about__col--content">
                @if($title = S::get('about_title'))
                    <div class="s-about__title">
                        <div class="title is-blue">{{ $title }}</div>
                    </div>
                @endif
                @if($list = S::get('about_list'))
                    <div class="s-about__content text-block">
                        <ul>
                            @foreach($list as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            @if(count($about_features))
                <div class="s-about__col s-about__col--points">
                    <div class="s-about__points">
                        @foreach($about_features as $feat)
                            <div class="b-point">
                                <div class="b-point__wrapper">
                                    @if($img = $feat['icon'])
                                        <div class="b-point__icon lazy"
                                             data-bg="{{ S::fileSrc($img) }}"></div>
                                    @endif
                                </div>
                                <div class="b-point__title">{{ $feat['title'] }}</div>
                                <div class="b-point__text">
                                    <p>{{ $feat['text'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="s-about__col s-about__col--years">
                    <div class="s-about__years">
                        <span>{{ date('Y') }}</span>
                        <span>2002</span>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <img class="s-about__decor no-select lazy"
         src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
         data-src="static/images/common/decor-about.png" width="775" height="556" alt="decor"/>
</section>
