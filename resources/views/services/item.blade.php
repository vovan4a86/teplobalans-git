@extends('template')
@section('content')
    <div class="container">
        <div class="title">{{ $item->name }}</div>
        @if($text_title)
            <div class="b-text text-block">
                <div class="b-text__title">
                    {{ $text_title }}
                </div>
                {!! $text !!}
            </div>
        @endif
    </div>
    <!--section.srv-detail-->
    @if($item->tech_title)
        <section class="srv-detail">
            <div class="srv-detail__container container">
                <div class="srv-detail__heading">
                    <div class="srv-detail__title">
                        <div class="title">{{ $item->tech_title }}</div>
                    </div>
                    <div class="srv-detail__text">{{ $item->tech_text }}</div>
                </div>
                @if(count($item->items))
                    <div class="srv-detail__body">
                        @foreach($item->items as $card)
                            <div class="srv-item">
                                <span class="srv-item__icon lazy" data-bg="{{ $card->icon_src }}"></span>
                                <div class="srv-item__body">
                                    <div class="srv-item__title">{{ $card->title }}</div>
                                    <ul class="srv-item__list list-reset">
                                        @php
                                            $elems = explode(',', $card->list)
                                        @endphp
                                        @foreach($elems as $elem)
                                            <li class="srv-item__list-item">{{ $elem }};</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
                <div class="srv-detail__actions">
                    <button class="btn btn--red btn-reset" type="button" data-popup="data-popup"
                            data-src="#project" aria-label="Обсудим предстоящий проект">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M7 17 17 7M7 7h10v10"/>
                        </svg>
                        <span>Обсудим предстоящий проект</span>
                    </button>
                </div>
            </div>
        </section>
    @endif
    @if($item->tech_card_title)
        <div class="container">
            <!--section.articles.-normal-->
            <section class="articles articles--normal">
                <div class="articles__main">
                    <div class="articles__main-body">
                        <div class="articles__title">{{ $item->tech_card_title }}</div>
                        <div class="articles__text text-block">
                            {!! $item->tech_card_text !!}
                        </div>
                    </div>
                    @if($item->tech_card_image)
                        <picture>
                            <img class="articles__main-view"
                                 src="{{ \Fanky\Admin\Models\Catalog::UPLOAD_URL . $item->tech_card_image }}"
                                 width="660" height="390" alt="{{ $item->tech_card_title }}">
                        </picture>
                    @endif
                </div>
            </section>
        </div>
    @endif

    <!--section.b-legal-->
    @if($item->file_src)
        <section class="b-legal lazy" data-bg="/static/images/common/legal-bg.jpg">
            <div class="b-legal__container container">
                <div class="b-legal__body">
                    <div class="b-legal__heading">
                        <div class="title">Договор на обслуживание узла учёта</div>
                        <div class="b-legal__text">Ознакомьтесь с перечнем услуг, в рамках типового договора на
                            обслуживание
                        </div>
                    </div>
                    <div class="b-legal__actions">
                        <a class="btn btn--white" href="{{ $item->file_src }}" download="Типовой договор Теплобаланс"
                           title="Типовой договор">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4M7 10l5 5 5-5M12 15V3"/>
                            </svg>
                            <span>Типовой договор</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    @endif
@stop
