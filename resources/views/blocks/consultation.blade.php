<!--.b-callback-->
<div class="b-callback">
    <div class="b-callback__container container">
        <div class="b-callback__grid">
            <div class="b-callback__content">
                <div class="title">Нужна консультация? или Задайте вопрос прямо сейчас!
                </div>
            </div>
            <div class="b-callback__fields">
                <form class="form" id="consultation" action="{{ route('ajax.consultation') }}">
                    <div class="form__fields">
                        <div class="form__col">
                            <input class="input" type="text" name="name" placeholder="Ваше имя*" required="required" />
                        </div>
                        <div class="form__col">
                            <input class="input" type="tel" name="phone" placeholder="+7 (___) ___-__-__*" required="required" />
                        </div>
                        <div class="form__col">
                            <label class="upload">
                                <span class="upload__name">Загрузить чертёж</span>
                                <input type="file" name="file" accept=".jpg, .jpeg, .png, .pdf, .doc, .docs, .xls, .xlsx" />
                            </label>
                        </div>
                        <div class="form__col">
                            <button class="btn btn--accent btn-reset" name="submit" aria-label="Отправить">
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
                </form>
            </div>
        </div>
    </div>
</div>