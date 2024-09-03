@extends('template')
@section('content')
    <div class="container">
        <div class="title">Вакансии</div>
        <!--section.s-vacancy-->
        <section class="s-vacancy">
            <!--._item-->
            <div class="s-vacancy__item">
                <a class="s-vacancy__view" href="javascript:void(0)" title="Менеджер с продаж">
                    <img class="s-vacancy__img" src="/static/images/common/vacancy-1.jpg" width="430" height="260" alt="" loading="lazy" />
                </a>
                <div class="s-vacancy__body">
                    <div class="s-vacancy__head">
                        <div class="s-vacancy__title">Менеджер с продаж</div>
                        <div class="s-vacancy__text">
                            <p>Приглашаем в один из самых больших распределительных центров инфраструктуры на вакансию…</p>
                        </div>
                    </div>
                    <div class="s-vacancy__points">
                        <div class="s-vacancy__point">
                            <span class="s-vacancy__point-icon lazy" data-bg="/static/images/common/ico_brirfcase.svg"></span>
                            <span class="s-vacancy__point-label">Опыт работы от 3-х лет</span>
                        </div>
                        <div class="s-vacancy__point">
                            <!--data-bg=src + (item.remote ? "ico_home.svg" : "ico_office.svg")-->
                            <span class="s-vacancy__point-icon lazy" data-bg="/static/images/common/ico_home.svg"></span>
                            <!--item.remote ? "Удалённая работа" : "Офис"-->
                            <span class="s-vacancy__point-label">Удалённая работа</span>
                        </div>
                        <div class="s-vacancy__point">
                            <span class="s-vacancy__point-icon lazy" data-bg="/static/images/common/ico_rub.svg"></span>
                            <span class="s-vacancy__point-label">Ставка + %</span>
                        </div>
                    </div>
                    <div class="s-vacancy__actions">
                        <button class="s-vacancy__btn btn-reset" type="button" data-popup="data-popup" data-src="#vacancy" data-job="Менеджер с продаж" aria-label="Откликнуться">
                            <span>Откликнуться</span>
                        </button>
                        <a class="s-vacancy__btn s-vacancy__btn--outlined" href="javascript:void(0)" title="Подробнее">
                            <span>Подробнее</span>
                        </a>
                    </div>
                </div>
            </div>
            <!--._item-->
            <div class="s-vacancy__item">
                <a class="s-vacancy__view" href="javascript:void(0)" title="Комплектовщик на тёплый склад">
                    <img class="s-vacancy__img" src="/static/images/common/vacancy-2.jpg" width="430" height="260" alt="" loading="lazy" />
                </a>
                <div class="s-vacancy__body">
                    <div class="s-vacancy__head">
                        <div class="s-vacancy__title">Комплектовщик на тёплый склад</div>
                        <div class="s-vacancy__text">
                            <p>Приглашаем в один из самых больших распределительных центров инфраструктуры на вакансию…</p>
                        </div>
                    </div>
                    <div class="s-vacancy__points">
                        <div class="s-vacancy__point">
                            <span class="s-vacancy__point-icon lazy" data-bg="/static/images/common/ico_brirfcase.svg"></span>
                            <span class="s-vacancy__point-label">Опыт работы от 3-х лет</span>
                        </div>
                        <div class="s-vacancy__point">
                            <!--data-bg=src + (item.remote ? "ico_home.svg" : "ico_office.svg")-->
                            <span class="s-vacancy__point-icon lazy" data-bg="/static/images/common/ico_office.svg"></span>
                            <!--item.remote ? "Удалённая работа" : "Офис"-->
                            <span class="s-vacancy__point-label">Офис</span>
                        </div>
                        <div class="s-vacancy__point">
                            <span class="s-vacancy__point-icon lazy" data-bg="/static/images/common/ico_rub.svg"></span>
                            <span class="s-vacancy__point-label">55 000</span>
                        </div>
                    </div>
                    <div class="s-vacancy__actions">
                        <button class="s-vacancy__btn btn-reset" type="button" data-popup="data-popup" data-src="#vacancy" data-job="Комплектовщик на тёплый склад" aria-label="Откликнуться">
                            <span>Откликнуться</span>
                        </button>
                        <a class="s-vacancy__btn s-vacancy__btn--outlined" href="javascript:void(0)" title="Подробнее">
                            <span>Подробнее</span>
                        </a>
                    </div>
                </div>
            </div>
            <!--._item-->
            <div class="s-vacancy__item">
                <a class="s-vacancy__view" href="javascript:void(0)" title="Специалист по обслуживанию клиентов">
                    <img class="s-vacancy__img" src="/static/images/common/vacancy-3.jpg" width="430" height="260" alt="" loading="lazy" />
                </a>
                <div class="s-vacancy__body">
                    <div class="s-vacancy__head">
                        <div class="s-vacancy__title">Специалист по обслуживанию клиентов</div>
                        <div class="s-vacancy__text">
                            <p>Приглашаем в один из самых больших распределительных центров инфраструктуры на вакансию…</p>
                        </div>
                    </div>
                    <div class="s-vacancy__points">
                        <div class="s-vacancy__point">
                            <span class="s-vacancy__point-icon lazy" data-bg="/static/images/common/ico_brirfcase.svg"></span>
                            <span class="s-vacancy__point-label">Опыт работы от 3-х лет</span>
                        </div>
                        <div class="s-vacancy__point">
                            <!--data-bg=src + (item.remote ? "ico_home.svg" : "ico_office.svg")-->
                            <span class="s-vacancy__point-icon lazy" data-bg="/static/images/common/ico_home.svg"></span>
                            <!--item.remote ? "Удалённая работа" : "Офис"-->
                            <span class="s-vacancy__point-label">Удалённая работа</span>
                        </div>
                        <div class="s-vacancy__point">
                            <span class="s-vacancy__point-icon lazy" data-bg="/static/images/common/ico_rub.svg"></span>
                            <span class="s-vacancy__point-label">Ставка + %</span>
                        </div>
                    </div>
                    <div class="s-vacancy__actions">
                        <button class="s-vacancy__btn btn-reset" type="button" data-popup="data-popup" data-src="#vacancy" data-job="Специалист по обслуживанию клиентов" aria-label="Откликнуться">
                            <span>Откликнуться</span>
                        </button>
                        <a class="s-vacancy__btn s-vacancy__btn--outlined" href="javascript:void(0)" title="Подробнее">
                            <span>Подробнее</span>
                        </a>
                    </div>
                </div>
            </div>
            <!--._item-->
            <div class="s-vacancy__item">
                <a class="s-vacancy__view" href="javascript:void(0)" title="Менеджер с продаж">
                    <img class="s-vacancy__img" src="/static/images/common/vacancy-1.jpg" width="430" height="260" alt="" loading="lazy" />
                </a>
                <div class="s-vacancy__body">
                    <div class="s-vacancy__head">
                        <div class="s-vacancy__title">Менеджер с продаж</div>
                        <div class="s-vacancy__text">
                            <p>Приглашаем в один из самых больших распределительных центров инфраструктуры на вакансию…</p>
                        </div>
                    </div>
                    <div class="s-vacancy__points">
                        <div class="s-vacancy__point">
                            <span class="s-vacancy__point-icon lazy" data-bg="/static/images/common/ico_brirfcase.svg"></span>
                            <span class="s-vacancy__point-label">Опыт работы от 3-х лет</span>
                        </div>
                        <div class="s-vacancy__point">
                            <!--data-bg=src + (item.remote ? "ico_home.svg" : "ico_office.svg")-->
                            <span class="s-vacancy__point-icon lazy" data-bg="/static/images/common/ico_home.svg"></span>
                            <!--item.remote ? "Удалённая работа" : "Офис"-->
                            <span class="s-vacancy__point-label">Удалённая работа</span>
                        </div>
                        <div class="s-vacancy__point">
                            <span class="s-vacancy__point-icon lazy" data-bg="/static/images/common/ico_rub.svg"></span>
                            <span class="s-vacancy__point-label">Ставка + %</span>
                        </div>
                    </div>
                    <div class="s-vacancy__actions">
                        <button class="s-vacancy__btn btn-reset" type="button" data-popup="data-popup" data-src="#vacancy" data-job="Менеджер с продаж" aria-label="Откликнуться">
                            <span>Откликнуться</span>
                        </button>
                        <a class="s-vacancy__btn s-vacancy__btn--outlined" href="javascript:void(0)" title="Подробнее">
                            <span>Подробнее</span>
                        </a>
                    </div>
                </div>
            </div>
            <!--._item-->
            <div class="s-vacancy__item">
                <a class="s-vacancy__view" href="javascript:void(0)" title="Комплектовщик на тёплый склад">
                    <img class="s-vacancy__img" src="/static/images/common/vacancy-2.jpg" width="430" height="260" alt="" loading="lazy" />
                </a>
                <div class="s-vacancy__body">
                    <div class="s-vacancy__head">
                        <div class="s-vacancy__title">Комплектовщик на тёплый склад</div>
                        <div class="s-vacancy__text">
                            <p>Приглашаем в один из самых больших распределительных центров инфраструктуры на вакансию…</p>
                        </div>
                    </div>
                    <div class="s-vacancy__points">
                        <div class="s-vacancy__point">
                            <span class="s-vacancy__point-icon lazy" data-bg="/static/images/common/ico_brirfcase.svg"></span>
                            <span class="s-vacancy__point-label">Опыт работы от 3-х лет</span>
                        </div>
                        <div class="s-vacancy__point">
                            <!--data-bg=src + (item.remote ? "ico_home.svg" : "ico_office.svg")-->
                            <span class="s-vacancy__point-icon lazy" data-bg="/static/images/common/ico_office.svg"></span>
                            <!--item.remote ? "Удалённая работа" : "Офис"-->
                            <span class="s-vacancy__point-label">Офис</span>
                        </div>
                        <div class="s-vacancy__point">
                            <span class="s-vacancy__point-icon lazy" data-bg="/static/images/common/ico_rub.svg"></span>
                            <span class="s-vacancy__point-label">55 000</span>
                        </div>
                    </div>
                    <div class="s-vacancy__actions">
                        <button class="s-vacancy__btn btn-reset" type="button" data-popup="data-popup" data-src="#vacancy" data-job="Комплектовщик на тёплый склад" aria-label="Откликнуться">
                            <span>Откликнуться</span>
                        </button>
                        <a class="s-vacancy__btn s-vacancy__btn--outlined" href="javascript:void(0)" title="Подробнее">
                            <span>Подробнее</span>
                        </a>
                    </div>
                </div>
            </div>
            <!--._item-->
            <div class="s-vacancy__item">
                <a class="s-vacancy__view" href="javascript:void(0)" title="Специалист по обслуживанию клиентов">
                    <img class="s-vacancy__img" src="/static/images/common/vacancy-3.jpg" width="430" height="260" alt="" loading="lazy" />
                </a>
                <div class="s-vacancy__body">
                    <div class="s-vacancy__head">
                        <div class="s-vacancy__title">Специалист по обслуживанию клиентов</div>
                        <div class="s-vacancy__text">
                            <p>Приглашаем в один из самых больших распределительных центров инфраструктуры на вакансию…</p>
                        </div>
                    </div>
                    <div class="s-vacancy__points">
                        <div class="s-vacancy__point">
                            <span class="s-vacancy__point-icon lazy" data-bg="/static/images/common/ico_brirfcase.svg"></span>
                            <span class="s-vacancy__point-label">Опыт работы от 3-х лет</span>
                        </div>
                        <div class="s-vacancy__point">
                            <!--data-bg=src + (item.remote ? "ico_home.svg" : "ico_office.svg")-->
                            <span class="s-vacancy__point-icon lazy" data-bg="/static/images/common/ico_home.svg"></span>
                            <!--item.remote ? "Удалённая работа" : "Офис"-->
                            <span class="s-vacancy__point-label">Удалённая работа</span>
                        </div>
                        <div class="s-vacancy__point">
                            <span class="s-vacancy__point-icon lazy" data-bg="/static/images/common/ico_rub.svg"></span>
                            <span class="s-vacancy__point-label">Ставка + %</span>
                        </div>
                    </div>
                    <div class="s-vacancy__actions">
                        <button class="s-vacancy__btn btn-reset" type="button" data-popup="data-popup" data-src="#vacancy" data-job="Специалист по обслуживанию клиентов" aria-label="Откликнуться">
                            <span>Откликнуться</span>
                        </button>
                        <a class="s-vacancy__btn s-vacancy__btn--outlined" href="javascript:void(0)" title="Подробнее">
                            <span>Подробнее</span>
                        </a>
                    </div>
                </div>
            </div>
            <!--._item-->
            <div class="s-vacancy__item">
                <a class="s-vacancy__view" href="javascript:void(0)" title="Менеджер с продаж">
                    <img class="s-vacancy__img" src="/static/images/common/vacancy-1.jpg" width="430" height="260" alt="" loading="lazy" />
                </a>
                <div class="s-vacancy__body">
                    <div class="s-vacancy__head">
                        <div class="s-vacancy__title">Менеджер с продаж</div>
                        <div class="s-vacancy__text">
                            <p>Приглашаем в один из самых больших распределительных центров инфраструктуры на вакансию…</p>
                        </div>
                    </div>
                    <div class="s-vacancy__points">
                        <div class="s-vacancy__point">
                            <span class="s-vacancy__point-icon lazy" data-bg="/static/images/common/ico_brirfcase.svg"></span>
                            <span class="s-vacancy__point-label">Опыт работы от 3-х лет</span>
                        </div>
                        <div class="s-vacancy__point">
                            <!--data-bg=src + (item.remote ? "ico_home.svg" : "ico_office.svg")-->
                            <span class="s-vacancy__point-icon lazy" data-bg="/static/images/common/ico_home.svg"></span>
                            <!--item.remote ? "Удалённая работа" : "Офис"-->
                            <span class="s-vacancy__point-label">Удалённая работа</span>
                        </div>
                        <div class="s-vacancy__point">
                            <span class="s-vacancy__point-icon lazy" data-bg="/static/images/common/ico_rub.svg"></span>
                            <span class="s-vacancy__point-label">Ставка + %</span>
                        </div>
                    </div>
                    <div class="s-vacancy__actions">
                        <button class="s-vacancy__btn btn-reset" type="button" data-popup="data-popup" data-src="#vacancy" data-job="Менеджер с продаж" aria-label="Откликнуться">
                            <span>Откликнуться</span>
                        </button>
                        <a class="s-vacancy__btn s-vacancy__btn--outlined" href="javascript:void(0)" title="Подробнее">
                            <span>Подробнее</span>
                        </a>
                    </div>
                </div>
            </div>
            <!--._item-->
            <div class="s-vacancy__item">
                <a class="s-vacancy__view" href="javascript:void(0)" title="Комплектовщик на тёплый склад">
                    <img class="s-vacancy__img" src="/static/images/common/vacancy-2.jpg" width="430" height="260" alt="" loading="lazy" />
                </a>
                <div class="s-vacancy__body">
                    <div class="s-vacancy__head">
                        <div class="s-vacancy__title">Комплектовщик на тёплый склад</div>
                        <div class="s-vacancy__text">
                            <p>Приглашаем в один из самых больших распределительных центров инфраструктуры на вакансию…</p>
                        </div>
                    </div>
                    <div class="s-vacancy__points">
                        <div class="s-vacancy__point">
                            <span class="s-vacancy__point-icon lazy" data-bg="/static/images/common/ico_brirfcase.svg"></span>
                            <span class="s-vacancy__point-label">Опыт работы от 3-х лет</span>
                        </div>
                        <div class="s-vacancy__point">
                            <!--data-bg=src + (item.remote ? "ico_home.svg" : "ico_office.svg")-->
                            <span class="s-vacancy__point-icon lazy" data-bg="/static/images/common/ico_office.svg"></span>
                            <!--item.remote ? "Удалённая работа" : "Офис"-->
                            <span class="s-vacancy__point-label">Офис</span>
                        </div>
                        <div class="s-vacancy__point">
                            <span class="s-vacancy__point-icon lazy" data-bg="/static/images/common/ico_rub.svg"></span>
                            <span class="s-vacancy__point-label">55 000</span>
                        </div>
                    </div>
                    <div class="s-vacancy__actions">
                        <button class="s-vacancy__btn btn-reset" type="button" data-popup="data-popup" data-src="#vacancy" data-job="Комплектовщик на тёплый склад" aria-label="Откликнуться">
                            <span>Откликнуться</span>
                        </button>
                        <a class="s-vacancy__btn s-vacancy__btn--outlined" href="javascript:void(0)" title="Подробнее">
                            <span>Подробнее</span>
                        </a>
                    </div>
                </div>
            </div>
            <!--._item-->
            <div class="s-vacancy__item">
                <a class="s-vacancy__view" href="javascript:void(0)" title="Специалист по обслуживанию клиентов">
                    <img class="s-vacancy__img" src="/static/images/common/vacancy-3.jpg" width="430" height="260" alt="" loading="lazy" />
                </a>
                <div class="s-vacancy__body">
                    <div class="s-vacancy__head">
                        <div class="s-vacancy__title">Специалист по обслуживанию клиентов</div>
                        <div class="s-vacancy__text">
                            <p>Приглашаем в один из самых больших распределительных центров инфраструктуры на вакансию…</p>
                        </div>
                    </div>
                    <div class="s-vacancy__points">
                        <div class="s-vacancy__point">
                            <span class="s-vacancy__point-icon lazy" data-bg="/static/images/common/ico_brirfcase.svg"></span>
                            <span class="s-vacancy__point-label">Опыт работы от 3-х лет</span>
                        </div>
                        <div class="s-vacancy__point">
                            <!--data-bg=src + (item.remote ? "ico_home.svg" : "ico_office.svg")-->
                            <span class="s-vacancy__point-icon lazy" data-bg="/static/images/common/ico_home.svg"></span>
                            <!--item.remote ? "Удалённая работа" : "Офис"-->
                            <span class="s-vacancy__point-label">Удалённая работа</span>
                        </div>
                        <div class="s-vacancy__point">
                            <span class="s-vacancy__point-icon lazy" data-bg="/static/images/common/ico_rub.svg"></span>
                            <span class="s-vacancy__point-label">Ставка + %</span>
                        </div>
                    </div>
                    <div class="s-vacancy__actions">
                        <button class="s-vacancy__btn btn-reset" type="button" data-popup="data-popup" data-src="#vacancy" data-job="Специалист по обслуживанию клиентов" aria-label="Откликнуться">
                            <span>Откликнуться</span>
                        </button>
                        <a class="s-vacancy__btn s-vacancy__btn--outlined" href="javascript:void(0)" title="Подробнее">
                            <span>Подробнее</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!--.pagination-->
        <div class="pagination">
            <div class="pagination__pages">
                <a class="pagination__page is-active" href="javascript:void(0)" data-link="data-link" title="Открыть страницу 1">1</a>
                <a class="pagination__page" href="javascript:void(0)" data-link="data-link" title="Открыть страницу 2">2</a>
                <a class="pagination__page" href="javascript:void(0)" data-link="data-link" title="Открыть страницу 3">3</a>
                <span class="pagination__page pagination__page--divider">...</span>
                <a class="pagination__page" href="javascript:void(0)" data-link="data-link" title="Открыть страницу 78">78</a>
            </div>
            <div class="pagination__controls">
                <a class="pagination__btn pagination__btn--disabled" href="javascript:void(0)" title="Назад">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="34" fill="none">
                        <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" clip-path="url(#a)">
                            <path d="M24.571 17H10.43M17.5 9.929 10.429 17l7.071 7.071" />
                        </g>
                        <defs>
                            <clipPath id="a">
                                <path fill="currentColor" d="M17.5.03.53 17 17.5 33.97 34.47 17z" />
                            </clipPath>
                        </defs>
                    </svg>
                </a>
                <a class="pagination__btn" href="javascript:void(0)" title="Вперед">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="34" fill="none">
                        <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" clip-path="url(#a)">
                            <path d="M10.429 17H24.57M17.5 9.929 24.571 17 17.5 24.071" />
                        </g>
                        <defs>
                            <clipPath id="a">
                                <path fill="currentColor" d="M17.5.03 34.47 17 17.5 33.97.53 17z" />
                            </clipPath>
                        </defs>
                    </svg>
                </a>
            </div>
        </div>
    </div>
@stop
