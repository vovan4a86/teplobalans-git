@extends('template')
@section('content')
    <!--section.cont-view-->
    <section class="cont-view">
        <div class="cont-view__container container">
            <div class="title">Контакты и реквизиты</div>
            <div class="cont-view__data">
                @if($contacts = S::get('contacts'))
                    <div class="small-data">
                        <div class="small-data__title">ООО «Теплобаланс»</div>
                        <div class="small-data__grid">
                            <div class="small-data__item">
                                <div class="small-data__key">Бесплатная консультация</div>
                                <a class="small-data__value"
                                   href="tel:{{ SiteHelper::clearPhone($contacts['phone']) }}">
                                    {{ $contacts['phone'] }}
                                </a>
                            </div>
                            <div class="small-data__item">
                                <div class="small-data__key">Отправить вопрос на почту</div>
                                <a class="small-data__value"
                                   href="mailto:{{ $contacts['email'] }}">{{ $contacts['email'] }}</a>
                            </div>
                            <div class="small-data__item">
                                <div class="small-data__key">Адрес компании</div>
                                <div class="small-data__value">{{ $contacts['address'] }}</div>
                            </div>
                            <div class="small-data__item">
                                <div class="small-data__key">График работы</div>
                                <div class="small-data__value">{{ $contacts['schedule'] }}</div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="cont-view__cols">
                @if($requiz = S::get('contacts_requiz'))
                    <div class="cont-view__col">
                        <!--.b-data-->
                        <div class="b-data">
                            <div class="b-data__title">Реквизиты компании</div>
                            <div class="b-data__grid">
                                <dl>
                                    <dt>Компания</dt>
                                    <dd>{{ $requiz['company'] }}</dd>
                                </dl>
                                <dl>
                                    <dt>Директор</dt>
                                    <dd>{{ $requiz['dir'] }}</dd>
                                </dl>
                                <dl>
                                    <dt>ИНН/КПП</dt>
                                    <dd>{{ $requiz['inn'] }}</dd>
                                </dl>
                                <dl>
                                    <dt>р/с</dt>
                                    <dd>{{ $requiz['rs'] }}</dd>
                                </dl>
                                <dl>
                                    <dt>к/с</dt>
                                    <dd>{{ $requiz['ks'] }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                @endif
                @if($bank = S::get('contacts_bank'))
                    <div class="cont-view__col">
                        <!--.b-data-->
                        <div class="b-data">
                            <div class="b-data__title">Банк «ЕКАТЕРИНБУРГСКИЙ» АО «АЛЬФА-БАНК»</div>
                            <div class="b-data__grid">
                                <dl>
                                    <dt>БИК</dt>
                                    <dd>{{ $bank['bik'] }}</dd>
                                </dl>
                                <dl>
                                    <dt>ОГРН</dt>
                                    <dd>{{ $bank['ogrn'] }}</dd>
                                </dl>
                                <dl>
                                    <dt>ОКВЭД</dt>
                                    <dd>{{ $bank['okved'] }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            @if($map = S::get('contacts_map'))
                <div class="cont-view__map" id="map-1" data-map="data-map"
                     data-lat="{{ $map['lat'] }}"
                     data-long="{{ $map['long'] }}"
                     data-hint="{{ $map['hint'] }}">
                </div>
            @endif
        </div>
    </section>
@stop
