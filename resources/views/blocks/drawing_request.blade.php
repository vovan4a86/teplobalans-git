<!--section.s-start(class=(formPage && 'is-dark'))-->
<!-- formPage: subcatalog, landing-->
<section class="s-start is-dark">
    <div class="s-start__container">
        <div class="s-start__content">
            <div class="s-start__head">
                <div class="title">Изготовление по вашим чертежам
                </div>
            </div>
            <div class="s-start__text">Заполните форму, специалист проконсультирует вас по вопросу подбора продукции с объяснением всех технических характеристик.</div>
            <div class="s-start__form">
                <form class="form" id="drawing" action="{{ route('ajax.drawing-request') }}">
                    <div class="form__fields">
                        <div class="form__col">
                            <input class="input" type="text" name="name" placeholder="Ваше имя*" required="required" />
                        </div>
                        <div class="form__col">
                            <input class="input" type="tel" name="phone" placeholder="+7 (___) ___-__-__*" required="required" />
                        </div>
                        <div class="form__row">
                            <textarea class="input input--text" name="text" placeholder="Сообщение" rows="7"></textarea>
                        </div>
                    </div>
                    <div class="form__actions">
                        <div class="form__fields">
                            <div class="form__col">
                                <label class="upload">
                                    <span class="upload__name">Загрузить чертёж</span>
                                    <input type="file" name="file" accept=".jpg, .jpeg, .png, .pdf, .doc, .docs, .xls, .xlsx" />
                                </label>
                            </div>
                            <div class="form__col">
                                <button class="btn btn-reset" name="submit" aria-label="Отправить">
                                    <span>Отправить</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M3.333 10h11M13.333 13l3-3-3-3" />
                                    </svg>
                                </button>
                            </div>
                            <div class="form__row">
                                <div class="form__policy">Нажимая на кнопку вы соглашаетесь с 
                                    <a href="{{ route('policy') }}">Политикой конфиденциальности</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="s-start__view lazy" data-bg="/static/images/common/start-bg.jpg">
            <div class="s-start__label">
                <!--.b-label-->
                <div class="b-label is-reversed is-white">
                    <div class="b-label__wrapper">
                        <div class="b-label__icon lazy" data-bg="/static/images/common/ico_clock--blue.svg"></div>
                    </div>
                    <div class="b-label__body">Изготовление от 7 дней</div>
                </div>
            </div>
        </div>
    </div>
</section>