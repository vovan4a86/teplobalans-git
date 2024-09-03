@extends('template')
@section('content')
    <!--section.hero-->
    <section class="hero">
        <div class="hero__container">
            <div class="hero__slider splide" aria-label="Наши работы" data-hero-slider="data-hero-slider">
                <div class="hero__track splide__track">
                    <ul class="hero__list splide__list">
                        <li class="hero__slide splide__slide">
                            <div class="hero__body">
                                <div class="hero__title">Обслуживание коммерческих узлов учёта (УКУТ)</div>
                                <div class="hero__text">
                                    <p>от 1500 рублей с отчётностью и аналитикой по Екатеринбургу и городам-спутникам</p>
                                </div>
                                <div class="hero__actions">
                                    <button class="btn btn-reset" type="button" aria-label="Наименование кнопки">
                                        <span>Наименование кнопки</span>
                                    </button>
                                </div>
                            </div>
                            <div class="hero__view">
                                <!-- example sizing: 1319x576-->
                                <picture>
                                    <source media="(max-width: 820px)" srcset="static/images/common/hero-view--768.webp" type="image/webp" />
                                    <source media="(max-width: 820px)" srcset="static/images/common/hero-view--768.jpg" />
                                    <source srcset="static/images/common/hero-view.webp" type="image/webp" />
                                    <img src="static/images/common/hero-view.jpg" alt="picture" />
                                </picture>
                            </div>
                        </li>
                        <li class="hero__slide splide__slide">
                            <div class="hero__body">
                                <div class="hero__title">Система автоматического регулирования тепла (САРТ)</div>
                                <div class="hero__text">
                                    <p>от 1500 рублей с отчётностью и аналитикой по Екатеринбургу и городам-спутникам</p>
                                </div>
                                <div class="hero__actions">
                                    <button class="btn btn-reset" type="button" aria-label="Наименование кнопки">
                                        <span>Наименование кнопки</span>
                                    </button>
                                </div>
                            </div>
                            <div class="hero__view">
                                <!-- example sizing: 1319x576-->
                                <picture>
                                    <source media="(max-width: 820px)" srcset="static/images/common/hero-view--768.webp" type="image/webp" />
                                    <source media="(max-width: 820px)" srcset="static/images/common/hero-view--768.jpg" />
                                    <source srcset="static/images/common/hero-view.webp" type="image/webp" />
                                    <img src="static/images/common/hero-view.jpg" alt="picture" />
                                </picture>
                            </div>
                        </li>
                        <li class="hero__slide splide__slide">
                            <div class="hero__body">
                                <div class="hero__title">Поверка и ремонт оборудования</div>
                                <div class="hero__text">
                                    <p>от 1500 рублей с отчётностью и аналитикой по Екатеринбургу и городам-спутникам</p>
                                </div>
                                <div class="hero__actions">
                                    <button class="btn btn-reset" type="button" aria-label="Наименование кнопки">
                                        <span>Наименование кнопки</span>
                                    </button>
                                </div>
                            </div>
                            <div class="hero__view">
                                <!-- example sizing: 1319x576-->
                                <picture>
                                    <source media="(max-width: 820px)" srcset="static/images/common/hero-view--768.webp" type="image/webp" />
                                    <source media="(max-width: 820px)" srcset="static/images/common/hero-view--768.jpg" />
                                    <source srcset="static/images/common/hero-view.webp" type="image/webp" />
                                    <img src="static/images/common/hero-view.jpg" alt="picture" />
                                </picture>
                            </div>
                        </li>
                        <li class="hero__slide splide__slide">
                            <div class="hero__body">
                                <div class="hero__title">Проектирование, монтаж, и реконструкция УКУТ</div>
                                <div class="hero__text">
                                    <p>от 1500 рублей с отчётностью и аналитикой по Екатеринбургу и городам-спутникам</p>
                                </div>
                                <div class="hero__actions">
                                    <button class="btn btn-reset" type="button" aria-label="Наименование кнопки">
                                        <span>Наименование кнопки</span>
                                    </button>
                                </div>
                            </div>
                            <div class="hero__view">
                                <!-- example sizing: 1319x576-->
                                <picture>
                                    <source media="(max-width: 820px)" srcset="static/images/common/hero-view--768.webp" type="image/webp" />
                                    <source media="(max-width: 820px)" srcset="static/images/common/hero-view--768.jpg" />
                                    <source srcset="static/images/common/hero-view.webp" type="image/webp" />
                                    <img src="static/images/common/hero-view.jpg" alt="picture" />
                                </picture>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--section.s-about-->
    <section class="s-about">
        <div class="s-about__container container">
            <div class="s-about__heading">
                <div class="s-about__title">
                    <div class="title">О нашей компании и достижениях</div>
                </div>
                <div class="s-about__text">
                    <p>Предлагаем вам сотрудничество в сфере ЖКХ, а в частности — в установке, реконструкции и обслуживании узлов учёта тепла, индивидуальных тепловых пунктов, насосных станций водоснабжения</p>
                </div>
            </div>
            <div class="s-about__grid">
                <!--.card-about-->
                <div class="card-about">
                    <div class="card-about__icon lazy" data-bg="static/images/common/ico_about-1.svg"></div>
                    <div class="card-about__title">Работаем с 2010 года</div>
                    <div class="card-about__text">
                        <p>Свыше 7 лет профессионального опыта в сфере ЖКХ и тепло-учёта</p>
                    </div>
                </div>
                <!--.card-about-->
                <div class="card-about">
                    <div class="card-about__icon lazy" data-bg="static/images/common/ico_about-2.svg"></div>
                    <div class="card-about__title">Штат инженеров и аналитиков</div>
                    <div class="card-about__text">
                        <p>В нашей команде работают высококвалифицированные специалисты, которые любят своё дело, и регулярно улучшают свои навыки, знания</p>
                    </div>
                </div>
                <!--.card-about-->
                <div class="card-about">
                    <div class="card-about__icon lazy" data-bg="static/images/common/ico_about-3.svg"></div>
                    <div class="card-about__title">Авторизованный сервисный центр с аккредитованной лабораторией</div>
                    <div class="card-about__text">
                        <p>Наши партнёры в лице ООО ПП «Технология» всегда помогут оперативно выполнить ремонт, и поверить любые приборы учёта</p>
                    </div>
                </div>
                <!--.card-about-->
                <div class="card-about">
                    <div class="card-about__icon lazy" data-bg="static/images/common/ico_about-4.svg"></div>
                    <div class="card-about__title">1000 узлов учёта</div>
                    <div class="card-about__text">
                        <p>Свыше 1000 узлов учёта находятся на постоянном сервисном обслуживании и мониторинге в нашей компании</p>
                    </div>
                </div>
            </div>
            <div class="s-about__heading">
                <div class="s-about__bottom">
                    <p>Индивидуальный подход к поставленным задачам — неотъемлемая часть оперативной работы нашего предприятия</p>
                </div>
                <div class="s-about__actions">
                    <a class="btn" href="javascript:void(0)" title="Подробнее">
                        <span>Подробнее</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!--section.s-prods-->
    <section class="s-prods">
        <div class="s-prods__container container">
            <div class="title">Продукция компании</div>
            <div class="s-prods__grid">
                <!--.card-prods-->
                <div class="card-prods">
                    <a class="card-prods__title" href="javascript:void(0)" title="ТБК-100">ТБК-100</a>
                    <div class="card-prods__text">
                        <p>Универсальный прибор для учёта тепловой энергии</p>
                    </div>
                    <div class="card-prods__actions">
                        <a class="card-prods__link btn btn--red" href="javascript:void(0)" title="Перейти">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 17 17 7M7 7h10v10" />
                            </svg>
                            <span>Перейти</span>
                        </a>
                    </div>
                    <div class="card-prods__view">
                        <img class="card-prods__pic no-select" src="static/images/common/prods-1.png" width="343" height="293" alt="ТБК-100" loading="lazy" />
                    </div>
                </div>
                <!--.card-prods-->
                <div class="card-prods">
                    <a class="card-prods__title" href="javascript:void(0)" title="ТБР-200">ТБР-200</a>
                    <div class="card-prods__text">
                        <p>Электронный регулятор для систем автоматического регулирования тепловой энергии</p>
                    </div>
                    <div class="card-prods__actions">
                        <a class="card-prods__link btn btn--red" href="javascript:void(0)" title="Перейти">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 17 17 7M7 7h10v10" />
                            </svg>
                            <span>Перейти</span>
                        </a>
                    </div>
                    <div class="card-prods__view">
                        <img class="card-prods__pic no-select" src="static/images/common/prods-2.png" width="343" height="293" alt="ТБР-200" loading="lazy" />
                    </div>
                </div>
                <!--.card-prods-->
                <div class="card-prods">
                    <a class="card-prods__title" href="javascript:void(0)" title="ТБН-300">ТБН-300</a>
                    <div class="card-prods__text">
                        <p>Контроллеры насосной станции</p>
                    </div>
                    <div class="card-prods__actions">
                        <a class="card-prods__link btn btn--red" href="javascript:void(0)" title="Перейти">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 17 17 7M7 7h10v10" />
                            </svg>
                            <span>Перейти</span>
                        </a>
                    </div>
                    <div class="card-prods__view">
                        <img class="card-prods__pic no-select" src="static/images/common/prods-3.png" width="343" height="293" alt="ТБН-300" loading="lazy" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--section.s-srv(class=(servicesPage && 'is-page'))-->
    <section class="s-srv">
        <div class="s-srv__container container">
            <div class="title">Услуги компании</div>
            <div class="s-srv__list">
                <!--.card-srv-->
                <div class="card-srv">
                    <div class="card-srv__body">
                        <div class="card-srv__title">Обслуживание коммерческих узлов учёта (УКУТ)</div>
                        <div class="card-srv__text">
                            <p>Сопровождение приборов учёта, мониторинг состояния узла учёта, и ведение коммерческой отчётности.</p>
                        </div>
                        <div class="card-srv__foot">
                            <p>При необходимости, сдача и согласование узлов учёта в ЭСК.</p>
                        </div>
                        <div class="card-srv__actions">
                            <a class="btn" href="javascript:void(0)" title="Подробнее">
                                <span>Подробнее</span>
                            </a>
                        </div>
                    </div>
                    <!-- example sizing: 603x386-->
                    <a class="card-srv__view lazy" data-bg="static/images/common/srv-1.jpg" href="javascript:void(0)" title="Обслуживание коммерческих узлов учёта (УКУТ)"></a>
                </div>
                <!--.card-srv-->
                <div class="card-srv">
                    <div class="card-srv__body">
                        <div class="card-srv__title">Система автоматического регулирования тепла (САРТ)</div>
                        <div class="card-srv__text">
                            <p>Внедрение и обслуживание автоматизированного погодного регулирования подачи тепла.</p>
                        </div>
                        <div class="card-srv__foot">
                            <p>Комфорт для жителей, и заметная экономия денежных средств.</p>
                        </div>
                        <div class="card-srv__actions">
                            <a class="btn" href="javascript:void(0)" title="Подробнее">
                                <span>Подробнее</span>
                            </a>
                        </div>
                    </div>
                    <!-- example sizing: 603x386-->
                    <a class="card-srv__view lazy" data-bg="static/images/common/srv-2.jpg" href="javascript:void(0)" title="Система автоматического регулирования тепла (САРТ)"></a>
                </div>
                <!--.card-srv-->
                <div class="card-srv">
                    <div class="card-srv__body">
                        <div class="card-srv__title">Поверка и ремонт оборудования</div>
                        <div class="card-srv__text">
                            <p>Сервисное сопровождение ранее установленного оборудования в авторизованном сервисном центре</p>
                        </div>
                        <div class="card-srv__foot">
                            <p>по разумным ценам.</p>
                        </div>
                        <div class="card-srv__actions">
                            <a class="btn" href="javascript:void(0)" title="Подробнее">
                                <span>Подробнее</span>
                            </a>
                        </div>
                    </div>
                    <!-- example sizing: 603x386-->
                    <a class="card-srv__view lazy" data-bg="static/images/common/srv-3.jpg" href="javascript:void(0)" title="Поверка и ремонт оборудования"></a>
                </div>
                <!--.card-srv-->
                <div class="card-srv">
                    <div class="card-srv__body">
                        <div class="card-srv__title">Проектирование, монтаж, и реконструкция УКУТ</div>
                        <div class="card-srv__text">
                            <p>Полное сопровождение на всех этапах работ: от проектирования, до монтажа и сдачи УКУТ в эксплуатацию ЭСО.</p>
                        </div>
                        <div class="card-srv__actions">
                            <a class="btn" href="javascript:void(0)" title="Подробнее">
                                <span>Подробнее</span>
                            </a>
                        </div>
                    </div>
                    <!-- example sizing: 603x386-->
                    <a class="card-srv__view lazy" data-bg="static/images/common/srv-4.jpg" href="javascript:void(0)" title="Проектирование, монтаж, и реконструкция УКУТ"></a>
                </div>
            </div>
        </div>
    </section>
@stop
