@extends('template')
@section('content')
    <!--section.cont-view-->
    <section class="cont-view">
        <div class="cont-view__container container">
            <div class="title">Контакты и реквизиты</div>
            <div class="cont-view__data">
                <!--.small-data-->
                <div class="small-data">
                    <div class="small-data__title">ООО «Теплобаланс»</div>
                    <div class="small-data__grid">
                        <div class="small-data__item">
                            <div class="small-data__key">Бесплатная консультация</div>
                            <a class="small-data__value" href="tel:+73432883055">+7 343 288-30-55</a>
                        </div>
                        <div class="small-data__item">
                            <div class="small-data__key">Отправить вопрос на почту</div>
                            <a class="small-data__value" href="mailto:info@teplo-balans.ru">info@teplo-balans.ru</a>
                        </div>
                        <div class="small-data__item">
                            <div class="small-data__key">Адрес компании</div>
                            <div class="small-data__value">Екатеринбург, ул. Фрунзе, 96В</div>
                        </div>
                        <div class="small-data__item">
                            <div class="small-data__key">График работы</div>
                            <div class="small-data__value">Пн-Пт с 08:00 до 17:00</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cont-view__cols">
                <div class="cont-view__col">
                    <!--.b-data-->
                    <div class="b-data">
                        <div class="b-data__title">Реквизиты компании</div>
                        <div class="b-data__grid">
                            <dl>
                                <dt>Компания</dt>
                                <dd>ООО «Теплобаланс»</dd>
                            </dl>
                            <dl>
                                <dt>Директор</dt>
                                <dd>Сорокин Дмитрий Николаевич</dd>
                            </dl>
                            <dl>
                                <dt>ИНН/КПП</dt>
                                <dd>6671311510/667101001</dd>
                            </dl>
                            <dl>
                                <dt>р/с</dt>
                                <dd>40702810638230001604</dd>
                            </dl>
                            <dl>
                                <dt>к/с</dt>
                                <dd>30101810100000000964</dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="cont-view__col">
                    <!--.b-data-->
                    <div class="b-data">
                        <div class="b-data__title">Банк «ЕКАТЕРИНБУРГСКИЙ» АО «АЛЬФА-БАНК»</div>
                        <div class="b-data__grid">
                            <dl>
                                <dt>БИК</dt>
                                <dd>046577964</dd>
                            </dl>
                            <dl>
                                <dt>ОГРН</dt>
                                <dd>1106671003141</dd>
                            </dl>
                            <dl>
                                <dt>ОКВЭД</dt>
                                <dd>35.3</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cont-view__map" id="map-1" data-map="data-map" data-lat="56.813459" data-long="60.595167" data-hint="г. Екатеринбург, ул. Фрунзе, 96В, 3 этаж"></div>
        </div>
    </section>
@stop
