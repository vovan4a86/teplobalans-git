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

        @if(count($contacts))
            <section class="s-cont">
                <div class="s-cont__container container">
                    <div class="s-cont__list">
                        @foreach($contacts as $item)
                            <div class="s-cont__item">
                                <div class="s-cont__body">
                                    @if($item['city'])
                                        <div class="s-cont__heading">
                                            <div class="s-cont__wrapper">
                                                <div class="s-cont__icon lazy"
                                                     data-bg="/static/images/common/ico_cube.svg"></div>
                                            </div>
                                            <div class="s-cont__title">{{ $item['city'] }}</div>
                                        </div>
                                    @endif
                                    @if($item['office'])
                                        <div class="s-cont__label">
                                            <div class="s-cont__label-key">Головной офис:</div>
                                            <div class="s-cont__label-value">{{ $item['office'] }}</div>
                                        </div>
                                    @endif
                                    @if($item['production'])
                                        <div class="s-cont__label">
                                            <div class="s-cont__label-key">Производство:</div>
                                            <div class="s-cont__label-value">{{ $item['production'] }}</div>
                                        </div>
                                    @endif
                                    @if($phones = explode(',', $item['phone']))
                                        <div class="s-cont__label">
                                            <div class="s-cont__label-key">Телефон:</div>
                                            @foreach($phones as $phone)
                                                <a class="s-cont__label-value"
                                                   href="tel:{{ SiteHelper::clearPhone($phone) }}">{{ $phone }}</a>
                                            @endforeach
                                        </div>
                                    @endif
                                    @if($item['email'])
                                        <div class="s-cont__label">
                                            <div class="s-cont__label-key">Email:</div>
                                            <a class="s-cont__label-value"
                                               href="mailto:{{ $item['email'] }}">{{ $item['email'] }}</a>
                                        </div>
                                    @endif
                                    @if($item['schedule'])
                                        <div class="s-cont__label">
                                            <div class="s-cont__label-key">Режим работы:</div>
                                            <div class="s-cont__label-value">{{ $item['schedule'] }}</div>
                                        </div>
                                    @endif
                                </div>
                                @if($item['lat'] && $item['long'])
                                    <div class="s-cont__map" id="map-{{ $loop->iteration }}" data-map="data-map" data-lat="{{ $item['lat'] }}"
                                     data-long="{{ $item['long'] }}"
                                     data-hint="{{ $item['office'] ?: $item['production'] }}"></div>
                                @else
                                    <div class="s-cont__map">Проверьте широту/долготу точки в настройках контактов.</div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
                <img class="s-cont__decor s-cont__decor--first lazy no-select" src="/"
                     data-src="/static/images/common/cont-decor-1.svg" width="406" height="356" alt=""/>
                <img class="s-cont__decor s-cont__decor--second lazy no-select" src="/"
                     data-src="/static/images/common/cont-decor-2.svg" width="485" height="446" alt=""/>
            </section>
        @endif
    </main>
@stop
