@extends('template')
@section('content')
    <section class="s-price">
        <div class="s-price__container container">
            <div class="s-price__heading">
                <div class="title">Прайс</div>
            </div>
            <!--._tabs.tabs(data-tabs)-->
            <div class="s-price__tabs tabs" data-tabs="data-tabs">
                <!--._nav.tabs__nav-->
                <div class="s-price__nav tabs__nav">
                    <button class="s-price__btn btn-reset tabs__link is-active" data-tabs-open="tab-1"
                            aria-label="Открыть прайс index">Проверка СИ
                    </button>
                    <button class="s-price__btn btn-reset tabs__link" data-tabs-open="tab-2"
                            aria-label="Открыть прайс index">Ремонт оборудования
                    </button>
                    <button class="s-price__btn btn-reset tabs__link" data-tabs-open="tab-3"
                            aria-label="Открыть прайс index">Обслуживание УКУТ
                    </button>
                    <button class="s-price__btn btn-reset tabs__link" data-tabs-open="tab-4"
                            aria-label="Открыть прайс index">Установка УКУТ
                    </button>
                    <button class="s-price__btn btn-reset tabs__link" data-tabs-open="tab-5"
                            aria-label="Открыть прайс index">Реконструкция и проектирование
                    </button>
                    <button class="s-price__btn btn-reset tabs__link" data-tabs-open="tab-6"
                            aria-label="Открыть прайс index">Прочее
                    </button>
                </div>
                <!--._views.tabs__views-->
                <div class="s-price__views tabs__views">
                    <!--._view.tabs__view.is-active(data-tabs-view="tab-1")-->
                    <div class="s-price__view tabs__view is-active" data-tabs-view="tab-1">
                        <div class="s-price__view-content">
                            <div class="s-price__item">
                                <div class="s-price__title">Поверка электромагнитных, ультразвуковых и вихреакустических
                                    расходомеров (ПРЭМ, МастерФлоу, ЭРСВ, и др.):
                                </div>
                                <div class="s-price__table">
                                    <table class="data-table">
                                        <thead>
                                        <tr>
                                            <th>Наименование</th>
                                            <th>Цена, ₽ (без НДС)</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Ду 20</td>
                                            <td>2 950</td>
                                        </tr>
                                        <tr>
                                            <td>Ду 25</td>
                                            <td>3 050</td>
                                        </tr>
                                        <tr>
                                            <td>Ду 32</td>
                                            <td>3 150</td>
                                        </tr>
                                        <tr>
                                            <td>Ду 40</td>
                                            <td>3 300</td>
                                        </tr>
                                        <tr>
                                            <td>Ду 50</td>
                                            <td>3 450</td>
                                        </tr>
                                        <tr>
                                            <td>Ду 65</td>
                                            <td>3 500</td>
                                        </tr>
                                        <tr>
                                            <td>Ду 80</td>
                                            <td>3 700</td>
                                        </tr>
                                        <tr>
                                            <td>ИПРЭ Ду 20–50</td>
                                            <td>3 700</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="s-price__item">
                                <div class="s-price__title">Поверка безпроливным методом:</div>
                                <div class="s-price__table">
                                    <table class="data-table">
                                        <thead>
                                        <tr>
                                            <th>Наименование</th>
                                            <th>Цена, ₽ (без НДС)</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>ВЭПС</td>
                                            <td>3 000</td>
                                        </tr>
                                        <tr>
                                            <td>Метран-300ПР</td>
                                            <td>2 500</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="s-price__item">
                                <div class="s-price__title">Поверка механических расходомеров:</div>
                                <div class="s-price__table">
                                    <table class="data-table">
                                        <thead>
                                        <tr>
                                            <th>Наименование</th>
                                            <th>Цена, ₽ (без НДС)</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Ду 15</td>
                                            <td>300</td>
                                        </tr>
                                        <tr>
                                            <td>Ду 20</td>
                                            <td>500</td>
                                        </tr>
                                        <tr>
                                            <td>Ду 25</td>
                                            <td>1 180</td>
                                        </tr>
                                        <tr>
                                            <td>Ду 32</td>
                                            <td>2 100</td>
                                        </tr>
                                        <tr>
                                            <td>Ду 40</td>
                                            <td>2 200</td>
                                        </tr>
                                        <tr>
                                            <td>Ду 50</td>
                                            <td>2 300</td>
                                        </tr>
                                        <tr>
                                            <td>Ду 65</td>
                                            <td>2 450</td>
                                        </tr>
                                        <tr>
                                            <td>Ду 80</td>
                                            <td>3 600</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="s-price__item">
                                <div class="s-price__title">т.д.</div>
                            </div>
                        </div>
                    </div>
                    <!--._view.tabs__view(data-tabs-view="tab-2")-->
                    <div class="s-price__view tabs__view" data-tabs-view="tab-2">
                        <div class="s-price__view-content">
                            <div class="s-price__item">
                                <div class="s-price__title">Ремонт оборудования</div>
                            </div>
                        </div>
                    </div>
                    <!--._view.tabs__view(data-tabs-view="tab-3")-->
                    <div class="s-price__view tabs__view" data-tabs-view="tab-3">
                        <div class="s-price__view-content">
                            <div class="s-price__item">
                                <div class="s-price__title">Обслуживание УКУТ</div>
                            </div>
                        </div>
                    </div>
                    <!--._view.tabs__view(data-tabs-view="tab-4")-->
                    <div class="s-price__view tabs__view" data-tabs-view="tab-4">
                        <div class="s-price__view-content">
                            <div class="s-price__item">
                                <div class="s-price__title">Установка УКУТ</div>
                            </div>
                        </div>
                    </div>
                    <!--._view.tabs__view(data-tabs-view="tab-5")-->
                    <div class="s-price__view tabs__view" data-tabs-view="tab-5">
                        <div class="s-price__view-content">
                            <div class="s-price__item">
                                <div class="s-price__title">Реконструкция и проектирование</div>
                            </div>
                        </div>
                    </div>
                    <!--._view.tabs__view(data-tabs-view="tab-6")-->
                    <div class="s-price__view tabs__view" data-tabs-view="tab-6">
                        <div class="s-price__view-content">
                            <div class="s-price__item">
                                <div class="s-price__title">Прочее</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop