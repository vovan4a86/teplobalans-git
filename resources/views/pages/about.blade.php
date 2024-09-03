@extends('template')
@section('content')
    <main>
        <!--.b-heading-->
        <div class="b-heading lazy" data-bg="/static/images/common/about-bg.webp">
            <div class="b-heading__container container">
                <div class="b-heading__bread">
                    @include('blocks.bread')
                </div>
                <div class="b-heading__row">
                    <div class="title">{{ $h1 }}</div>
                    <div class="b-heading__text">{{ S::get('about_subheader') }}</div>
                </div>
            </div>
        </div>

        @include('blocks.about')

        @if(count($vacancies))
            <section class="s-vacancies">
                <div class="s-vacancies__container container">
                    <div class="s-vacancies__heading">
                        <div class="title">Вакансии</div>
                    </div>
                    <!--._data(x-data="{ open: 0 }")-->
                    <div class="s-vacancies__data" x-data="{ open: 0 }">
                        @foreach($vacancies as $item)
                            <div class="s-vacancies__item"
                                 :class="open == {{ $loop->iteration }} &amp;&amp; 'is-active'">
                                <!-- @click=`open == ${index + 1} ? open = 0 : open = ${index + 1}`-->
                                <button class="s-vacancies__title btn-reset" type="button"
                                        aria-label="открыть {{ $item->name }}"
                                        @click="open == {{ $loop->index + 1 }} ? open = 0 : open = {{ $loop->index + 1 }}">
                                    <span>{{ $item->name }}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="1.7" d="m4 8.5 8.167 7 8.166-7"/>
                                    </svg>
                                </button>
                                <div class="s-vacancies__body text-block">
                                    <div class="s-vacancies__wrapper">
                                        {!! $item->text !!}
                                        <ul class="s-vacancies__list">
                                            @if($item->schedule)
                                                <li>
                                                    <span class="s-vacancies__icon lazy"
                                                          data-bg="/static/images/common/ico_time.svg"></span>
                                                    <span class="s-vacancies__label">{{ $item->schedule }}</span>
                                                </li>
                                            @endif
                                            @if($item->email)
                                                <li>
                                                    <span class="s-vacancies__icon lazy"
                                                          data-bg="/static/images/common/ico_mail.svg"></span>
                                                    <a class="s-vacancies__label"
                                                       href="mailto:{{ $item->email }}">{{ $item->email }}</a>
                                                </li>
                                            @endif
                                            @if($item->phone)
                                                <li>
                                                    <span class="s-vacancies__icon lazy"
                                                          data-bg="/static/images/common/ico_tel.svg"></span>
                                                    <a class="s-vacancies__label"
                                                       href="tel:{{ preg_replace('/[^\d+]/', '', $item->phone) }}">
                                                        {{ $item->phone }}
                                                    </a>
                                                </li>
                                            @endif
                                            @if($item->salary)
                                                <li>
                                                    <span class="s-vacancies__icon lazy"
                                                          data-bg="/static/images/common/ico_money.svg"></span>
                                                    <span class="s-vacancies__label">{{ $item->salary }}</span>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        @if(count($projects))
            <section class="s-projects">
                <div class="s-projects__container container">
                    <div class="title">Проекты</div>
                    <div class="s-projects__list">
                        @foreach($projects as $item)
                            @include('projects.project_item')
                        @endforeach
                    </div>
                    <div class="s-projects__actions">
                        <a class="btn btn--outlined" href="{{ route('projects') }}" title="Смотреть все проекты">
                            <span>Смотреть все проекты</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="12" fill="none">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="1.7" d="M1 6h11M11 9l3-3-3-3"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </section>
        @endif

        @if(count($news))
            <section class="s-newses">
                <div class="s-newses__container container">
                    <div class="title">новости</div>
                    <div class="s-newses__grid">
                        @foreach($news as $item)
                            @include('news.newses_item')
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        @include('blocks.certificates')
    </main>
@stop
