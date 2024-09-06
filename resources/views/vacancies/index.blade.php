@extends('template')
@section('content')
    <div class="container">
        <div class="title">{{ $h1 }}</div>
        <section class="s-vacancy">
            @foreach($items as $item)
                <div class="s-vacancy__item">
                    <a class="s-vacancy__view" href="{{ $item->url }}" title="{{ $item->title }}">
                        <img class="s-vacancy__img" src="{{ $item->thumb(2) }}"
                             width="430" height="260" alt="{{ $item->title }}" loading="lazy"/>
                    </a>
                    <div class="s-vacancy__body">
                        <div class="s-vacancy__head">
                            <div class="s-vacancy__title">{{ $item->title }}</div>
                            <div class="s-vacancy__text">
                                <p>{{ $item->getAnnounce() }}</p>
                            </div>
                        </div>
                        <div class="s-vacancy__points">
                            <div class="s-vacancy__point">
                                <span class="s-vacancy__point-icon lazy"
                                      data-bg="/static/images/common/ico_brirfcase.svg"></span>
                                <span class="s-vacancy__point-label">{{ $item->experience }}</span>
                            </div>
                            <div class="s-vacancy__point">
                                <!--data-bg=src + (item.remote ? "ico_home.svg" : "ico_office.svg")-->
                                <span class="s-vacancy__point-icon lazy"
                                      data-bg="/static/images/common/{{ $item->place == 'office' ? 'ico_office' : 'ico_home' }}.svg"></span>
                                <!--item.remote ? "Удалённая работа" : "Офис"-->
                                <span class="s-vacancy__point-label">{{ $item->place == 'office' ? 'Офис' : 'Удаленная работа' }}</span>
                            </div>
                            <div class="s-vacancy__point">
                                <span class="s-vacancy__point-icon lazy"
                                      data-bg="/static/images/common/ico_rub.svg"></span>
                                <span class="s-vacancy__point-label">{{ $item->salary }}</span>
                            </div>
                        </div>
                        <div class="s-vacancy__actions">
                            <button class="s-vacancy__btn btn-reset" type="button" data-popup="data-popup"
                                    data-src="#vacancy" data-job="{{ $item->title }}" aria-label="Откликнуться">
                                <span>Откликнуться</span>
                            </button>
                            <a class="s-vacancy__btn s-vacancy__btn--outlined" href="{{ $item->url }}"
                               title="Подробнее">
                                <span>Подробнее</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </section>
        @include('paginations.with_pages', ['paginator' => $items])
    </div>
@stop
