@extends('template')
@section('content')
    <div class="container">
        <div class="title">О Компании</div>
        <!--section.articles-->
        <section class="articles">
            <div class="articles__main">
                <div class="articles__main-body">
                    <div class="articles__title">История создания и развития предприятия</div>
                    <div class="articles__text text-block">
                        <p>Наше предприятие было основано в 2010 году с целью предоставления комплексных решений в сфере энергетического и водоснабжающего оборудования.</p>
                        <p>Начав с малого, мы специализировались на разработке и производстве узлов учёта тепла, что позволило нам быстро завоевать доверие клиентов благодаря высокому качеству и точности нашей продукции</p>
                    </div>
                </div>
                <picture>
                    <source srcset="/static/images/common/article-main.webp" type="image/webp" />
                    <img class="articles__main-view" src="/static/images/common/article-main.jpg" width="660" height="390" alt="" />
                </picture>
            </div>
            <div class="articles__list">
                <!--article.b-article-->
                <article class="b-article">
                    <div class="b-article__head">
                        <div class="b-article__year">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" fill="none">
                                <path stroke="currentColor" stroke-width="1.5" d="M1.3 8.04c0-2.715 0-4.073.843-4.916.844-.844 2.202-.844 4.917-.844h2.88c2.715 0 4.073 0 4.916.844.844.843.844 2.2.844 4.916v1.44c0 2.715 0 4.073-.844 4.916-.843.844-2.2.844-4.916.844H7.06c-2.715 0-4.073 0-4.917-.844-.843-.843-.843-2.2-.843-4.916V8.04Z"
                                />
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="M4.9 2.28V1.2M12.1 2.28V1.2M1.66 5.88h13.68" />
                            </svg>2010 год
                        </div>
                        <div class="b-article__title">Основание предприятия</div>
                    </div>
                    <div class="b-article__body">
                        <div class="b-article__text">
                            <p>Наше предприятие сосредоточилось на разработке и производстве узлов учёта тепла. Высокое качество продукции позволило нам быстро завоевать доверие клиентов.</p>
                        </div>
                    </div>
                </article>
                <!--article.b-article-->
                <article class="b-article">
                    <div class="b-article__head">
                        <div class="b-article__year">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" fill="none">
                                <path stroke="currentColor" stroke-width="1.5" d="M1.3 8.04c0-2.715 0-4.073.843-4.916.844-.844 2.202-.844 4.917-.844h2.88c2.715 0 4.073 0 4.916.844.844.843.844 2.2.844 4.916v1.44c0 2.715 0 4.073-.844 4.916-.843.844-2.2.844-4.916.844H7.06c-2.715 0-4.073 0-4.917-.844-.843-.843-.843-2.2-.843-4.916V8.04Z"
                                />
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="M4.9 2.28V1.2M12.1 2.28V1.2M1.66 5.88h13.68" />
                            </svg>2017 год
                        </div>
                        <div class="b-article__title">Расширение деятельности</div>
                    </div>
                    <div class="b-article__body">
                        <div class="b-article__text">
                            <p>Мы увеличили производственные мощности и начали предлагать услуги по установке и реконструкции узлов учёта тепла, что укрепило наши позиции на рынке.</p>
                        </div>
                    </div>
                </article>
                <!--article.b-article-->
                <article class="b-article">
                    <div class="b-article__head">
                        <div class="b-article__year">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" fill="none">
                                <path stroke="currentColor" stroke-width="1.5" d="M1.3 8.04c0-2.715 0-4.073.843-4.916.844-.844 2.202-.844 4.917-.844h2.88c2.715 0 4.073 0 4.916.844.844.843.844 2.2.844 4.916v1.44c0 2.715 0 4.073-.844 4.916-.843.844-2.2.844-4.916.844H7.06c-2.715 0-4.073 0-4.917-.844-.843-.843-.843-2.2-.843-4.916V8.04Z"
                                />
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="M4.9 2.28V1.2M12.1 2.28V1.2M1.66 5.88h13.68" />
                            </svg>2023 год
                        </div>
                        <div class="b-article__title">Новые направления</div>
                    </div>
                    <div class="b-article__body">
                        <div class="b-article__text">
                            <p>Мы расширили деятельность, начав разработку и производство индивидуальных тепловых пунктов (ИТП) и насосных станций водоснабжения. Также были добавлены услуги по обслуживанию и модернизации систем.</p>
                        </div>
                    </div>
                </article>
            </div>
        </section>
    </div>
    <!--section.s-clients-->
    <section class="s-clients splide" data-clients-slider="data-clients-slider">
        <div class="s-clients__container container">
            <div class="s-clients__heading">
                <div class="title">Наши клиенты</div>
                <div class="s-clients__arrows site-arrows site-arrows--white splide__arrows">
                    <button class="s-clients__arrow site-arrow splide__arrow splide__arrow--prev btn-reset" type="button" aria-label="Предыдущий слайд">
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
                    </button>
                    <button class="s-clients__arrow site-arrow splide__arrow splide__arrow--next btn-reset" type="button" aria-label="Следующий слайд">
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
                    </button>
                </div>
            </div>
            <div class="s-clients__track splide__track">
                <ul class="s-clients__list list-reset splide__list">
                    <li class="s-clients__slide splide__slide">
								<span class="s-clients__view">
									<img class="s-clients__img" src="/static/images/common/client-1.svg" width="150" height="150" alt="" loading="lazy" />
								</span>
                        <span class="s-clients__label">ГидроТек</span>
                    </li>
                    <li class="s-clients__slide splide__slide">
								<span class="s-clients__view">
									<img class="s-clients__img" src="/static/images/common/client-2.svg" width="150" height="150" alt="" loading="lazy" />
								</span>
                        <span class="s-clients__label">ТеплоВектор</span>
                    </li>
                    <li class="s-clients__slide splide__slide">
								<span class="s-clients__view">
									<img class="s-clients__img" src="/static/images/common/client-3.svg" width="150" height="150" alt="" loading="lazy" />
								</span>
                        <span class="s-clients__label">ЭнергоГарант</span>
                    </li>
                    <li class="s-clients__slide splide__slide">
								<span class="s-clients__view">
									<img class="s-clients__img" src="/static/images/common/client-4.svg" width="150" height="150" alt="" loading="lazy" />
								</span>
                        <span class="s-clients__label">ТеплоВектор</span>
                    </li>
                    <li class="s-clients__slide splide__slide">
								<span class="s-clients__view">
									<img class="s-clients__img" src="/static/images/common/client-5.svg" width="150" height="150" alt="" loading="lazy" />
								</span>
                        <span class="s-clients__label">ГидроТек</span>
                    </li>
                    <li class="s-clients__slide splide__slide">
								<span class="s-clients__view">
									<img class="s-clients__img" src="/static/images/common/client-1.svg" width="150" height="150" alt="" loading="lazy" />
								</span>
                        <span class="s-clients__label">ГидроТек</span>
                    </li>
                    <li class="s-clients__slide splide__slide">
								<span class="s-clients__view">
									<img class="s-clients__img" src="/static/images/common/client-2.svg" width="150" height="150" alt="" loading="lazy" />
								</span>
                        <span class="s-clients__label">ТеплоВектор</span>
                    </li>
                    <li class="s-clients__slide splide__slide">
								<span class="s-clients__view">
									<img class="s-clients__img" src="/static/images/common/client-3.svg" width="150" height="150" alt="" loading="lazy" />
								</span>
                        <span class="s-clients__label">ЭнергоГарант</span>
                    </li>
                    <li class="s-clients__slide splide__slide">
								<span class="s-clients__view">
									<img class="s-clients__img" src="/static/images/common/client-4.svg" width="150" height="150" alt="" loading="lazy" />
								</span>
                        <span class="s-clients__label">ТеплоВектор</span>
                    </li>
                    <li class="s-clients__slide splide__slide">
								<span class="s-clients__view">
									<img class="s-clients__img" src="/static/images/common/client-5.svg" width="150" height="150" alt="" loading="lazy" />
								</span>
                        <span class="s-clients__label">ГидроТек</span>
                    </li>
                    <li class="s-clients__slide splide__slide">
								<span class="s-clients__view">
									<img class="s-clients__img" src="/static/images/common/client-1.svg" width="150" height="150" alt="" loading="lazy" />
								</span>
                        <span class="s-clients__label">ГидроТек</span>
                    </li>
                    <li class="s-clients__slide splide__slide">
								<span class="s-clients__view">
									<img class="s-clients__img" src="/static/images/common/client-2.svg" width="150" height="150" alt="" loading="lazy" />
								</span>
                        <span class="s-clients__label">ТеплоВектор</span>
                    </li>
                    <li class="s-clients__slide splide__slide">
								<span class="s-clients__view">
									<img class="s-clients__img" src="/static/images/common/client-3.svg" width="150" height="150" alt="" loading="lazy" />
								</span>
                        <span class="s-clients__label">ЭнергоГарант</span>
                    </li>
                    <li class="s-clients__slide splide__slide">
								<span class="s-clients__view">
									<img class="s-clients__img" src="/static/images/common/client-4.svg" width="150" height="150" alt="" loading="lazy" />
								</span>
                        <span class="s-clients__label">ТеплоВектор</span>
                    </li>
                    <li class="s-clients__slide splide__slide">
								<span class="s-clients__view">
									<img class="s-clients__img" src="/static/images/common/client-5.svg" width="150" height="150" alt="" loading="lazy" />
								</span>
                        <span class="s-clients__label">ГидроТек</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!--section.s-projects-->
    <section class="s-projects splide" data-projects-slider="data-projects-slider">
        <div class="s-projects__container container">
            <div class="s-projects__heading">
                <div class="title">Наши проекты</div>
                <div class="s-projects__arrows site-arrows splide__arrows">
                    <button class="s-projects__arrow site-arrow splide__arrow splide__arrow--prev btn-reset" type="button" aria-label="Предыдущий слайд">
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
                    </button>
                    <button class="s-projects__arrow site-arrow splide__arrow splide__arrow--next btn-reset" type="button" aria-label="Следующий слайд">
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
                    </button>
                </div>
            </div>
            <div class="s-projects__track splide__track">
                <ul class="s-projects__list list-reset splide__list">
                    <li class="s-projects__slide splide__slide">
								<span class="s-projects__body">
									<span class="s-projects__head">
										<a class="s-projects__title" href="javascript:void(0)">ТБК-100</a>
										<span class="s-projects__text">
											<p>Универсальный прибор для учёта тепловой энергии</p>
										</span>
									</span>
									<span class="s-projects__location">
										<span class="s-projects__city">
											<svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="none">
												<path stroke="currentColor" stroke-width="2" d="M3.5 8.829C3.5 4.781 6.724 1.5 10.7 1.5s7.2 3.281 7.2 7.329c0 4.016-2.298 8.702-5.883 10.378-.836.39-1.798.39-2.634 0C5.798 17.531 3.5 12.845 3.5 8.829Z" />
												<circle cx="10.7" cy="8.7" r="2.7" stroke="currentColor" stroke-width="2" />
											</svg>Москва</span>
									</span>
								</span>
                        <a class="s-projects__view" href="javascript:void(0)" title="ТБК-100">
                            <img class="s-projects__img" src="/static/images/common/proj-1.jpg" width="310" height="260" alt="" loading="lazy" />
                        </a>
                    </li>
                    <li class="s-projects__slide splide__slide">
								<span class="s-projects__body">
									<span class="s-projects__head">
										<a class="s-projects__title" href="javascript:void(0)">ТБР-200</a>
										<span class="s-projects__text">
											<p>Электронный регулятор для систем автоматического регулирования тепловой энергии</p>
										</span>
									</span>
									<span class="s-projects__location">
										<span class="s-projects__city">
											<svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="none">
												<path stroke="currentColor" stroke-width="2" d="M3.5 8.829C3.5 4.781 6.724 1.5 10.7 1.5s7.2 3.281 7.2 7.329c0 4.016-2.298 8.702-5.883 10.378-.836.39-1.798.39-2.634 0C5.798 17.531 3.5 12.845 3.5 8.829Z" />
												<circle cx="10.7" cy="8.7" r="2.7" stroke="currentColor" stroke-width="2" />
											</svg>Сочи</span>
									</span>
								</span>
                        <a class="s-projects__view" href="javascript:void(0)" title="ТБР-200">
                            <img class="s-projects__img" src="/static/images/common/proj-2.jpg" width="310" height="260" alt="" loading="lazy" />
                        </a>
                    </li>
                    <li class="s-projects__slide splide__slide">
								<span class="s-projects__body">
									<span class="s-projects__head">
										<a class="s-projects__title" href="javascript:void(0)">ТБК-100</a>
										<span class="s-projects__text">
											<p>Универсальный прибор для учёта тепловой энергии</p>
										</span>
									</span>
									<span class="s-projects__location">
										<span class="s-projects__city">
											<svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="none">
												<path stroke="currentColor" stroke-width="2" d="M3.5 8.829C3.5 4.781 6.724 1.5 10.7 1.5s7.2 3.281 7.2 7.329c0 4.016-2.298 8.702-5.883 10.378-.836.39-1.798.39-2.634 0C5.798 17.531 3.5 12.845 3.5 8.829Z" />
												<circle cx="10.7" cy="8.7" r="2.7" stroke="currentColor" stroke-width="2" />
											</svg>Москва</span>
									</span>
								</span>
                        <a class="s-projects__view" href="javascript:void(0)" title="ТБК-100">
                            <img class="s-projects__img" src="/static/images/common/proj-1.jpg" width="310" height="260" alt="" loading="lazy" />
                        </a>
                    </li>
                    <li class="s-projects__slide splide__slide">
								<span class="s-projects__body">
									<span class="s-projects__head">
										<a class="s-projects__title" href="javascript:void(0)">ТБР-200</a>
										<span class="s-projects__text">
											<p>Электронный регулятор для систем автоматического регулирования тепловой энергии</p>
										</span>
									</span>
									<span class="s-projects__location">
										<span class="s-projects__city">
											<svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="none">
												<path stroke="currentColor" stroke-width="2" d="M3.5 8.829C3.5 4.781 6.724 1.5 10.7 1.5s7.2 3.281 7.2 7.329c0 4.016-2.298 8.702-5.883 10.378-.836.39-1.798.39-2.634 0C5.798 17.531 3.5 12.845 3.5 8.829Z" />
												<circle cx="10.7" cy="8.7" r="2.7" stroke="currentColor" stroke-width="2" />
											</svg>Сочи</span>
									</span>
								</span>
                        <a class="s-projects__view" href="javascript:void(0)" title="ТБР-200">
                            <img class="s-projects__img" src="/static/images/common/proj-2.jpg" width="310" height="260" alt="" loading="lazy" />
                        </a>
                    </li>
                    <li class="s-projects__slide splide__slide">
								<span class="s-projects__body">
									<span class="s-projects__head">
										<a class="s-projects__title" href="javascript:void(0)">ТБК-100</a>
										<span class="s-projects__text">
											<p>Универсальный прибор для учёта тепловой энергии</p>
										</span>
									</span>
									<span class="s-projects__location">
										<span class="s-projects__city">
											<svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="none">
												<path stroke="currentColor" stroke-width="2" d="M3.5 8.829C3.5 4.781 6.724 1.5 10.7 1.5s7.2 3.281 7.2 7.329c0 4.016-2.298 8.702-5.883 10.378-.836.39-1.798.39-2.634 0C5.798 17.531 3.5 12.845 3.5 8.829Z" />
												<circle cx="10.7" cy="8.7" r="2.7" stroke="currentColor" stroke-width="2" />
											</svg>Москва</span>
									</span>
								</span>
                        <a class="s-projects__view" href="javascript:void(0)" title="ТБК-100">
                            <img class="s-projects__img" src="/static/images/common/proj-1.jpg" width="310" height="260" alt="" loading="lazy" />
                        </a>
                    </li>
                    <li class="s-projects__slide splide__slide">
								<span class="s-projects__body">
									<span class="s-projects__head">
										<a class="s-projects__title" href="javascript:void(0)">ТБР-200</a>
										<span class="s-projects__text">
											<p>Электронный регулятор для систем автоматического регулирования тепловой энергии</p>
										</span>
									</span>
									<span class="s-projects__location">
										<span class="s-projects__city">
											<svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="none">
												<path stroke="currentColor" stroke-width="2" d="M3.5 8.829C3.5 4.781 6.724 1.5 10.7 1.5s7.2 3.281 7.2 7.329c0 4.016-2.298 8.702-5.883 10.378-.836.39-1.798.39-2.634 0C5.798 17.531 3.5 12.845 3.5 8.829Z" />
												<circle cx="10.7" cy="8.7" r="2.7" stroke="currentColor" stroke-width="2" />
											</svg>Сочи</span>
									</span>
								</span>
                        <a class="s-projects__view" href="javascript:void(0)" title="ТБР-200">
                            <img class="s-projects__img" src="/static/images/common/proj-2.jpg" width="310" height="260" alt="" loading="lazy" />
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!--section.s-photo.is-gray-->
    <section class="s-photo is-gray splide" data-projects-slider="data-projects-slider">
        <div class="s-photo__container container">
            <div class="s-photo__heading">
                <div class="title">Фото</div>
                <div class="s-photo__arrows site-arrows splide__arrows">
                    <button class="s-photo__arrow site-arrow splide__arrow splide__arrow--prev btn-reset" type="button" aria-label="Предыдущий слайд">
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
                    </button>
                    <button class="s-photo__arrow site-arrow splide__arrow splide__arrow--next btn-reset" type="button" aria-label="Следующий слайд">
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
                    </button>
                </div>
            </div>
            <div class="s-photo__track splide__track">
                <ul class="s-photo__list list-reset splide__list">
                    <li class="s-photo__slide splide__slide">
                        <a class="s-photo__view" href="/static/images/common/photo-1.jpg" data-fancybox="gallery" data-caption="Наименование изображения" title="Наименование изображения">
                            <img class="s-photo__img" src="/static/images/common/photo-1.jpg" width="600" height="500" alt="Наименование изображения" loading="lazy" />
                        </a>
                    </li>
                    <li class="s-photo__slide splide__slide">
                        <a class="s-photo__view" href="/static/images/common/photo-2.jpg" data-fancybox="gallery" data-caption="Наименование изображения" title="Наименование изображения">
                            <img class="s-photo__img" src="/static/images/common/photo-2.jpg" width="600" height="500" alt="Наименование изображения" loading="lazy" />
                        </a>
                    </li>
                    <li class="s-photo__slide splide__slide">
                        <a class="s-photo__view" href="/static/images/common/photo-1.jpg" data-fancybox="gallery" data-caption="Наименование изображения" title="Наименование изображения">
                            <img class="s-photo__img" src="/static/images/common/photo-1.jpg" width="600" height="500" alt="Наименование изображения" loading="lazy" />
                        </a>
                    </li>
                    <li class="s-photo__slide splide__slide">
                        <a class="s-photo__view" href="/static/images/common/photo-2.jpg" data-fancybox="gallery" data-caption="Наименование изображения" title="Наименование изображения">
                            <img class="s-photo__img" src="/static/images/common/photo-2.jpg" width="600" height="500" alt="Наименование изображения" loading="lazy" />
                        </a>
                    </li>
                    <li class="s-photo__slide splide__slide">
                        <a class="s-photo__view" href="/static/images/common/photo-1.jpg" data-fancybox="gallery" data-caption="Наименование изображения" title="Наименование изображения">
                            <img class="s-photo__img" src="/static/images/common/photo-1.jpg" width="600" height="500" alt="Наименование изображения" loading="lazy" />
                        </a>
                    </li>
                    <li class="s-photo__slide splide__slide">
                        <a class="s-photo__view" href="/static/images/common/photo-2.jpg" data-fancybox="gallery" data-caption="Наименование изображения" title="Наименование изображения">
                            <img class="s-photo__img" src="/static/images/common/photo-2.jpg" width="600" height="500" alt="Наименование изображения" loading="lazy" />
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!--section.s-sert-->
    <section class="s-sert splide" data-sert-slider="data-sert-slider">
        <div class="s-sert__container container">
            <div class="s-sert__heading">
                <div class="title">Лицензии и сертификаты</div>
                <div class="s-sert__arrows site-arrows splide__arrows">
                    <button class="s-sert__arrow site-arrow splide__arrow splide__arrow--prev btn-reset" type="button" aria-label="Предыдущий слайд">
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
                    </button>
                    <button class="s-sert__arrow site-arrow splide__arrow splide__arrow--next btn-reset" type="button" aria-label="Следующий слайд">
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
                    </button>
                </div>
            </div>
            <div class="s-sert__track splide__track">
                <ul class="s-sert__list list-reset splide__list">
                    <li class="s-sert__slide splide__slide">
                        <a class="s-sert__view" href="/static/images/common/sert-example.jpg" data-fancybox="sert-gallery" data-caption="Наименование сертификата" title="Наименование сертификата">
                            <img class="s-sert__img" src="/static/images/common/sert-example.jpg" width="268" height="383" alt="Наименование сертификата" loading="lazy" />
                        </a>
                    </li>
                    <li class="s-sert__slide splide__slide">
                        <a class="s-sert__view" href="/static/images/common/sert-example.jpg" data-fancybox="sert-gallery" data-caption="Наименование сертификата" title="Наименование сертификата">
                            <img class="s-sert__img" src="/static/images/common/sert-example.jpg" width="268" height="383" alt="Наименование сертификата" loading="lazy" />
                        </a>
                    </li>
                    <li class="s-sert__slide splide__slide">
                        <a class="s-sert__view" href="/static/images/common/sert-example.jpg" data-fancybox="sert-gallery" data-caption="Наименование сертификата" title="Наименование сертификата">
                            <img class="s-sert__img" src="/static/images/common/sert-example.jpg" width="268" height="383" alt="Наименование сертификата" loading="lazy" />
                        </a>
                    </li>
                    <li class="s-sert__slide splide__slide">
                        <a class="s-sert__view" href="/static/images/common/sert-example.jpg" data-fancybox="sert-gallery" data-caption="Наименование сертификата" title="Наименование сертификата">
                            <img class="s-sert__img" src="/static/images/common/sert-example.jpg" width="268" height="383" alt="Наименование сертификата" loading="lazy" />
                        </a>
                    </li>
                    <li class="s-sert__slide splide__slide">
                        <a class="s-sert__view" href="/static/images/common/sert-example.jpg" data-fancybox="sert-gallery" data-caption="Наименование сертификата" title="Наименование сертификата">
                            <img class="s-sert__img" src="/static/images/common/sert-example.jpg" width="268" height="383" alt="Наименование сертификата" loading="lazy" />
                        </a>
                    </li>
                    <li class="s-sert__slide splide__slide">
                        <a class="s-sert__view" href="/static/images/common/sert-example.jpg" data-fancybox="sert-gallery" data-caption="Наименование сертификата" title="Наименование сертификата">
                            <img class="s-sert__img" src="/static/images/common/sert-example.jpg" width="268" height="383" alt="Наименование сертификата" loading="lazy" />
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
@stop
