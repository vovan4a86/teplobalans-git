@extends('template')
@section('content')
    <!--section.b-objects-->
    <section class="b-objects">
        <div class="b-objects__container container">
            <div class="b-objects__heading">
                <div class="title">Наши объекты</div>
            </div>
            <div class="b-objects__list">
                <!--.card-obj-->
                <div class="card-obj">
                    <a class="card-obj__view" href="/static/images/common/object-1.jpg" data-fancybox="objects-gallery" data-caption="Наименование объекта" title="Наименование объекта">
                        <img class="card-obj__img" src="/static/images/common/object-1--thumb.jpg" width="390" height="320" alt="" />
                    </a>
                    <div class="card-obj__title">Наименование объекта</div>
                </div>
                <!--.card-obj-->
                <div class="card-obj">
                    <a class="card-obj__view" href="/static/images/common/object-2.jpg" data-fancybox="objects-gallery" data-caption="Наименование объекта" title="Наименование объекта">
                        <img class="card-obj__img" src="/static/images/common/object-2--thumb.jpg" width="390" height="320" alt="" />
                    </a>
                    <div class="card-obj__title">Наименование объекта</div>
                </div>
                <!--.card-obj-->
                <div class="card-obj">
                    <a class="card-obj__view" href="/static/images/common/object-3.jpg" data-fancybox="objects-gallery" data-caption="Наименование объекта" title="Наименование объекта">
                        <img class="card-obj__img" src="/static/images/common/object-3--thumb.jpg" width="390" height="320" alt="" />
                    </a>
                    <div class="card-obj__title">Наименование объекта</div>
                </div>
                <!--.card-obj-->
                <div class="card-obj">
                    <a class="card-obj__view" href="/static/images/common/object-4.jpg" data-fancybox="objects-gallery" data-caption="Наименование объекта" title="Наименование объекта">
                        <img class="card-obj__img" src="/static/images/common/object-4--thumb.jpg" width="390" height="320" alt="" />
                    </a>
                    <div class="card-obj__title">Наименование объекта</div>
                </div>
                <!--.card-obj-->
                <div class="card-obj">
                    <a class="card-obj__view" href="/static/images/common/object-5.jpg" data-fancybox="objects-gallery" data-caption="Наименование объекта" title="Наименование объекта">
                        <img class="card-obj__img" src="/static/images/common/object-5--thumb.jpg" width="390" height="320" alt="" />
                    </a>
                    <div class="card-obj__title">Наименование объекта</div>
                </div>
                <!--.card-obj-->
                <div class="card-obj">
                    <a class="card-obj__view" href="/static/images/common/object-6.jpg" data-fancybox="objects-gallery" data-caption="Наименование объекта" title="Наименование объекта">
                        <img class="card-obj__img" src="/static/images/common/object-6--thumb.jpg" width="390" height="320" alt="" />
                    </a>
                    <div class="card-obj__title">Наименование объекта</div>
                </div>
                <!--.card-obj-->
                <div class="card-obj">
                    <a class="card-obj__view" href="/static/images/common/object-7.jpg" data-fancybox="objects-gallery" data-caption="Наименование объекта" title="Наименование объекта">
                        <img class="card-obj__img" src="/static/images/common/object-7--thumb.jpg" width="390" height="320" alt="" />
                    </a>
                    <div class="card-obj__title">Наименование объекта</div>
                </div>
                <!--.card-obj-->
                <div class="card-obj">
                    <a class="card-obj__view" href="/static/images/common/object-8.jpg" data-fancybox="objects-gallery" data-caption="Наименование объекта" title="Наименование объекта">
                        <img class="card-obj__img" src="/static/images/common/object-8--thumb.jpg" width="390" height="320" alt="" />
                    </a>
                    <div class="card-obj__title">Наименование объекта</div>
                </div>
                <!--.card-obj-->
                <div class="card-obj">
                    <a class="card-obj__view" href="/static/images/common/object-9.jpg" data-fancybox="objects-gallery" data-caption="Наименование объекта" title="Наименование объекта">
                        <img class="card-obj__img" src="/static/images/common/object-9--thumb.jpg" width="390" height="320" alt="" />
                    </a>
                    <div class="card-obj__title">Наименование объекта</div>
                </div>
            </div>
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
    </section>
@stop
