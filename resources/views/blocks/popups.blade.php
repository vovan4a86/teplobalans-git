<div class="popup" id="request-done" style="display: none">
    <div class="popup__container">
        <div class="popup__heading">
            <div class="popup__title">Спасибо за заявку!</div>
            <div class="popup__text">Мы свяжемся с вами в скором времени!</div>
        </div>
    </div>
</div>
<form class="popup" id="callback" action="#" style="display: none">
    <div class="popup__container">callback</div>
</form>
<div class="popup" id="request" style="display: none">
    <div class="popup__container">
        <div class="popup__heading">
            <div class="popup__title">Отправить заявку</div>
            <div class="popup__text">Оставьте заявку на сайте или звоните, чтобы оформить заказ. Согласуем условия доставки, рассчитаем цены и ответим на ваши вопросы.</div>
        </div>
        <div class="popup__body">
            <form class="form" id="product-request" action="{{ route('ajax.product-request') }}">
                <input type="hidden" name="product" data-product-field>
                <div class="form__fields">
                    <div class="form__col">
                        <input class="input" type="text" name="name" placeholder="Ваше имя*" required>
                    </div>
                    <div class="form__col">
                        <input class="input" type="tel" name="phone" placeholder="+7 (___) ___-__-__*" required>
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
                                <input type="file" name="file" accept=".jpg, .jpeg, .png, .pdf, .doc, .docs, .xls, .xlsx">
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
                            <div class="form__policy">Нажимая на кнопку вы соглашаетесь с
                                <a href="{{ route('policy') }}">Политикой конфиденциальности</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="popup" id="counselling" style="display: none">
    <div class="popup__container">
        <div class="popup__heading">
            <div class="popup__title">Консультация</div>
            <div class="popup__text">Задайте нам вопрос на сайте или звоните. Согласуем условия доставки, рассчитаем цены и ответим на ваши вопросы.</div>
        </div>
        <div class="popup__body">
            <form class="form" id="consultation" action="{{ route('ajax.consultation') }}">
                <input type="hidden" name="product" data-product-field>
                <div class="form__fields">
                    <div class="form__col">
                        <input class="input" type="text" name="name" placeholder="Ваше имя*" required>
                    </div>
                    <div class="form__col">
                        <input class="input" type="tel" name="phone" placeholder="+7 (___) ___-__-__*" required>
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
                                <input type="file" name="file" accept=".jpg, .jpeg, .png, .pdf, .doc, .docs, .xls, .xlsx">
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
                            <div class="form__policy">Нажимая на кнопку вы соглашаетесь с
                                <a href="{{ route('policy') }}">Политикой конфиденциальности</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="scrolltop" aria-label="В начало страницы" tabindex="1">
    <svg class="svg-sprite-icon icon-up" width="1em" height="1em">
        <use xlink:href="/static/images/sprite/symbol/sprite.svg#up"></use>
    </svg>
</div>