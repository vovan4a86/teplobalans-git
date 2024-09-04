@extends('template')
@section('content')
    <div class="container">
        <div class="title">{{ $item->name }}</div>
        <div class="b-text text-block">
            <div class="b-text__title">
                {{ $text_title }}
            </div>
            {!! $text !!}
        </div>
    </div>
    <!--section.srv-detail-->
    <section class="srv-detail">
        <div class="srv-detail__container container">
            <div class="srv-detail__heading">
                <div class="srv-detail__title">
                    <div class="title">Техническое обслуживание узлов учёта</div>
                </div>
                <div class="srv-detail__text">Мы знаем и делаем всё, для того, чтобы узлы учёта функционировали в штатном режиме</div>
            </div>
            <div class="srv-detail__body">
                <!--.srv-item-->
                <div class="srv-item">
                    <span class="srv-item__icon lazy" data-bg="static/images/common/ico_trust.svg"></span>
                    <div class="srv-item__body">
                        <div class="srv-item__title">Контроль исправности оборудования</div>
                        <ul class="srv-item__list list-reset">
                            <li class="srv-item__list-item">Тепловычислителя;</li>
                            <li class="srv-item__list-item">Оборудование канала связи;</li>
                            <li class="srv-item__list-item">Расходомеров;</li>
                            <li class="srv-item__list-item">Датчиков;</li>
                            <li class="srv-item__list-item">Контроль и ликвидация протечек на УКУТ.</li>
                        </ul>
                    </div>
                </div>
                <!--.srv-item-->
                <div class="srv-item">
                    <span class="srv-item__icon lazy" data-bg="static/images/common/ico_chart.svg"></span>
                    <div class="srv-item__body">
                        <div class="srv-item__title">Аналитика работы узла учёта</div>
                        <ul class="srv-item__list list-reset">
                            <li class="srv-item__list-item">Тепловычислителя;</li>
                            <li class="srv-item__list-item">Оборудование канала связи;</li>
                            <li class="srv-item__list-item">Расходомеров;</li>
                            <li class="srv-item__list-item">Датчиков;</li>
                            <li class="srv-item__list-item">Контроль и ликвидация протечек на УКУТ.</li>
                        </ul>
                    </div>
                </div>
                <!--.srv-item-->
                <div class="srv-item">
                    <span class="srv-item__icon lazy" data-bg="static/images/common/ico_code.svg"></span>
                    <div class="srv-item__body">
                        <div class="srv-item__title">Техническое сопровождение</div>
                        <ul class="srv-item__list list-reset">
                            <li class="srv-item__list-item">Тепловычислителя;</li>
                            <li class="srv-item__list-item">Оборудование канала связи;</li>
                            <li class="srv-item__list-item">Расходомеров;</li>
                            <li class="srv-item__list-item">Датчиков;</li>
                            <li class="srv-item__list-item">Контроль и ликвидация протечек на УКУТ.</li>
                        </ul>
                    </div>
                </div>
                <!--.srv-item-->
                <div class="srv-item">
                    <span class="srv-item__icon lazy" data-bg="static/images/common/ico_branch.svg"></span>
                    <div class="srv-item__body">
                        <div class="srv-item__title">Узел учёта «под ключ»</div>
                        <ul class="srv-item__list list-reset">
                            <li class="srv-item__list-item">Тепловычислителя;</li>
                            <li class="srv-item__list-item">Оборудование канала связи;</li>
                            <li class="srv-item__list-item">Расходомеров;</li>
                            <li class="srv-item__list-item">Датчиков;</li>
                            <li class="srv-item__list-item">Контроль и ликвидация протечек на УКУТ.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="srv-detail__actions">
                <button class="btn btn--red btn-reset" type="button" data-popup="data-popup" data-src="#project" aria-label="Обсудим предстоящий проект">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 17 17 7M7 7h10v10" />
                    </svg>
                    <span>Обсудим предстоящий проект</span>
                </button>
            </div>
        </div>
    </section>
    <div class="container">
        <!--section.articles.-normal-->
        <section class="articles articles--normal">
            <div class="articles__main">
                <div class="articles__main-body">
                    <div class="articles__title">Обслуживание коммерческих узлов учёта (УКУТ)</div>
                    <div class="articles__text text-block">
                        <p>Сопровождение приборов учёта, мониторинг состояния узла учёта, и ведение коммерческой отчётности.</p>
                        <p>При необходимости, сдача и согласование узлов учёта в ЭСК.</p>
                    </div>
                </div>
                <picture>
                    <source srcset="static/images/common/article-main.webp" type="image/webp">
                    <img class="articles__main-view" src="static/images/common/article-main.jpg" width="660" height="390" alt="">
                </picture>
            </div>
        </section>
    </div>
    <!--section.b-legal-->
    <section class="b-legal lazy" data-bg="static/images/common/legal-bg.jpg">
        <div class="b-legal__container container">
            <div class="b-legal__body">
                <div class="b-legal__heading">
                    <div class="title">Договор на обслуживание узла учёта</div>
                    <div class="b-legal__text">Ознакомьтесь с перечнем услуг, в рамках типового договора на обслуживание</div>
                </div>
                <div class="b-legal__actions">
                    <a class="btn btn--white" href="static/data/sample.pdf" download="Типовой договор Теплобаланс" title="Типовой договор">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4M7 10l5 5 5-5M12 15V3" />
                        </svg>
                        <span>Типовой договор</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
@stop
