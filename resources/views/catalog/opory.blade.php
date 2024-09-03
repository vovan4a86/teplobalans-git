@extends('template')
@section('content')
    <main>
        <!--.b-heading-->
        <div class="b-heading lazy" data-bg="{{ $page->image_src }}">
            <div class="b-heading__container container">
                <div class="b-heading__bread">
                    @include('blocks.bread')
                </div>
                <div class="b-heading__row">
                    <div class="title">{{ $h1 }}</div>
                    <div class="b-heading__subtitle">{{ S::get('opory_subtitle') }}</div>
                    @if($types = S::get('opory_types'))
                        <ul class="b-heading__list list-reset">
                            @foreach($types as $type)
                                <li>{{ $type }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>

        <!--section.s-points-->
        @if($feats = S::get('opory_conditions'))
            <section class="s-points">
                <div class="s-points__container container">
                    <div class="s-points__grid">
                        @foreach($feats as $item)
                            <div class="s-points__item">
                                <div class="b-point">
                                    <div class="b-point__wrapper">
                                        <div class="b-point__icon lazy"
                                             data-bg="/static/images/common/ico_cube.svg"></div>
                                    </div>
                                    <div class="b-point__title">{{ $item['title'] }}</div>
                                    <div class="b-point__footer">
                                        @if($item['phone'])
                                            <a class="b-point__label"
                                               href="tel:{{ SiteHelper::clearPhone($item['phone']) }}"
                                               title="Позвонить нам">
                                        <span class="b-point__label-icon iconify" data-icon="mynaui:telephone"
                                              data-width="20"></span>
                                                <span class="b-point__label-value">{{ $item['phone'] }}</span>
                                            </a>
                                        @endif
                                        @if($item['email'])
                                            <a class="b-point__label" href="mailto:{{ $item['email'] }}"
                                               title="Отправить письмо">
                                        <span class="b-point__label-icon iconify"
                                              data-icon="icon-park-outline:mail-review"
                                              data-width="20"></span>
                                                <span class="b-point__label-value">{{ $item['email'] }}</span>
                                            </a>
                                        @endif
                                        @if($item['text'])
                                            <div class="b-point__footer">
                                                <div class="b-point__label">
                                                    <span class="b-point__label-icon iconify"
                                                          data-icon="mynaui:check-circle"
                                                          data-width="20">
                                                    </span>
                                                    <span class="b-point__label-value">{{ $item['text'] }}</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <!--.text-view-->
        <div class="text-view">
            <div class="text-view__container container">
                <div class="text-view__title">{{ S::get('opory_form_title') }}</div>
                @if($forms = S::get('opory_forms'))
                    <div class="text-view__grid">
                        @foreach($forms as $form)
                            <div class="text-view__item">
                                <!--.b-desc-->
                                <div class="b-desc">
                                    <div class="b-desc__wrapper">
                                        @if($form['icon'])
                                            <div class="b-desc__icon lazy"
                                                 data-bg="{{ S::fileSrc($form['icon']) }}"></div>
                                        @endif
                                    </div>
                                    <div class="b-desc__title">{{ $form['title'] }}</div>
                                    <div class="b-desc__text text-block">
                                        <p>{{ $form['text'] }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
                <div class="text-view__text text-block">
                    {!! S::get('opory_form_text') !!}
                </div>
            </div>
        </div>

        @include('blocks.consultation')

        <!--section.s-build-->
        <section class="s-build">
            <div class="s-build__container container">
                <!--block1-->
                @if($block1 = S::get('opory_block1'))
                    <div class="s-build__grid">
                        <div class="s-build__col">
                            <div class="title">{{ $block1['title'] }}</div>
                        </div>
                        <div class="s-build__col">
                            <!--.text-badge-->
                            <div class="text-badge">
                                <p>{{ $block1['badge'] }}</p>
                            </div>
                        </div>
                    </div>
                @endif
                <!--block1foto-->
                @if($images1 = S::get('opory_block1_imgs'))
                    <div class="s-build__grid">
                        @foreach($images1 as $img)
                            <div class="s-build__col">
                                <a class="s-build__lightbox" href="{{ S::fileSrc($img) }}"
                                   data-fancybox="Производство" data-caption="Производство" title="Производство">
                                    <img class="s-build__img" src="{{ S::fileSrc($img) }}" width="643" height="568"
                                         loading="lazy" alt="Производство"/>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
                <!--._grid-->
                @if($block2 = S::get('opory_block2'))
                    <div class="s-build__grid">
                        <div class="s-build__col">
                            <div class="s-build__subtitle">{{ $block2['title1'] }}</div>
                        </div>
                        <div class="s-build__col text-block">
                            {!! $block2['text1'] !!}
                        </div>
                    </div>
                    <!--._grid-->
                    <div class="s-build__grid">
                        <div class="s-build__col">
                            <div class="s-build__subtitle">{{ $block2['title2'] }}</div>
                        </div>
                    </div>
                @endif
                @if($images2 = S::get('opory_block2_imgs'))
                    <div class="s-build__grid">
                        @foreach($images2 as $img)
                            <div class="s-build__row">
                                <a class="s-build__lightbox" href="{{ S::fileSrc($img) }}"
                                   data-fancybox="Модели инструмента" data-caption="Модели инструмента"
                                   title="Модели инструмента">
                                    <img class="s-build__img" src="{{ S::fileSrc($img) }}" width="1300"
                                         height="284" loading="lazy" alt="Модели инструмента"/>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif

                @if($block3 = S::get('opory_block3'))
                    <div class="s-build__grid">
                        <div class="s-build__col">
                            <div class="s-build__subtitle">{{ $block3['title'] }}</div>
                            <div class="text-block">
                                {!! $block3['text'] !!}
                            </div>
                        </div>
                        <div class="s-build__col">
                            <!--.text-badge-->
                            <div class="text-badge">
                                <p>{{ $block3['badge'] }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                @if($block3slider = S::get('opory_block3_slider'))
                    <!--._gallery.splide(aria-label="Обработка профиля" data-gallery-slider)-->
                    @include('catalog.landing_slider', ['items' => $block3slider, 'label' => 'Обработка профиля'])
                @endif

                <!--._grid-->
                <div class="s-build__grid">
                    @if($block4title = S::get('opory_block4_title'))
                        <div class="s-build__row">
                            <div class="s-build__subtitle">{{ $block4title }}</div>
                        </div>
                    @endif

                    @if($block4slider = S::get('opory_block4_slider'))
                        <div class="s-build__row">
                            <!--._gallery.splide(aria-label="порошковое окрашивание" data-gallery-slider)-->
                            @include('catalog.landing_slider', ['items' => $block4slider, 'label' => 'Порошковое окрашивание'])
                        </div>
                    @endif
                </div>

                @if($block5 = S::get('opory_block5'))
                    <div class="s-build__grid">
                        <div class="s-build__col">
                            <div class="title">{{ $block5['title'] }}</div>
                        </div>
                        <div class="s-build__col">
                            <!--.text-badge-->
                            <div class="text-badge">
                                <p>{{ $block5['badge'] }}</p>
                            </div>
                        </div>
                    </div>

                    <!--._gallery.splide(aria-label="Анодирование" data-gallery-slider)-->
                    @if($block5slider = S::get('opory_block5_slider'))
                        @include('catalog.landing_slider', ['items' => $block5slider, 'label' => 'Анодирование'])
                    @endif

                    <div class="s-build__grid">
                        <div class="s-build__col"></div>
                        <div class="s-build__col text-block">
                            {!! $block5['text'] !!}
                        </div>
                    </div>
                @endif
            </div>
            <!--(class="b-feat--white b-feat--small")-->
            <!--.b-feat-->
            @if($feats = S::get('common_products_feats'))
                <div class="b-feat b-feat--white b-feat--small">
                    <div class="b-feat__container container">
                        <div class="b-feat__title">
                            <div class="title">Преимущества</div>
                        </div>
                        @include('blocks.products_feats')
                    </div>
                </div>
            @endif

            @if($block6title = S::get('opory_block6_title'))
                <div class="s-build__container container">
                    <div class="s-build__grid">
                        <div class="s-build__col">
                            <div class="s-build__subtitle">{{ $block6title }}</div>
                        </div>
                    </div>

                    @if($images6 = S::get('opory_block6_imgs'))
                        <div class="s-build__grid">
                            @foreach($images6 as $image)
                                <div class="s-build__col">
                                    <a class="s-build__lightbox" href="{{ S::fileSrc($image) }}"
                                       data-fancybox="Готовая продукция" data-caption="Готовая продукция"
                                       title="Готовая продукция">
                                        <img class="s-build__img" src="{{ S::fileSrc($image) }}" width="643"
                                             height="568" loading="lazy" alt="Готовая продукция"/>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endif
        </section>

        <!--section.s-start(class=(formPage && 'is-dark'))-->
        <!-- formPage: subcatalog, landing-->
        @include('blocks.drawing_request')

        @include('blocks.certificates')
    </main>

@endsection
