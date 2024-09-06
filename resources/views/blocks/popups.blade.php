<form class="popup" id="request" action="{{ route('ajax.request') }}" style="display: none">
    <input type="hidden" name="service" data-service-field>
    <div class="popup__container">
        <div class="popup__heading">
            <div class="popup__title">Вопрос специалисту</div>
            <div class="popup__text">Опишите суть задачи, и мы её решим! Для оперативной работы, вы можете дополнительно оставить телефонный номер.</div>
        </div>
        <div class="popup__fields">
            <div class="popup__cols">
                <label class="user-input">
                    <input class="user-input__field" type="text" name="name" required>
                    <span class="user-input__label">Имя</span>
                </label>
                <label class="user-input">
                    <input class="user-input__field" type="tel" name="phone" required>
                    <span class="user-input__label">Номер телефона</span>
                </label>
            </div>
            <div class="popup__row">
                <label class="user-input">
                    <textarea class="user-input__field" name="text" rows="2" required></textarea>
                    <span class="user-input__label">Ваше сообщение</span>
                </label>
            </div>
        </div>
        <div class="popup__actions">
            <button class="btn btn-reset" name="submit" aria-label="Отправить вопрос">
                <span>Отправить вопрос</span>
            </button>
        </div>
        <div class="popup__policy">Отправляя форму, Вы соглашаетесь с
            <a href="{{ route('policy') }}">политикой конфиденциальности</a>
        </div>
    </div>
</form>

<form class="popup" id="vacancy" action="{{ route('ajax.vacancy') }}" style="display: none">
    <input type="hidden" name="job" data-service-field>
    <div class="popup__container">
        <div class="popup__heading">
            <div class="popup__title">Интересная вакансия?</div>
            <div class="popup__text"></div>
        </div>
        <div class="popup__fields">
            <div class="popup__cols">
                <label class="user-input">
                    <input class="user-input__field" type="text" name="name" required>
                    <span class="user-input__label">Имя</span>
                </label>
                <label class="user-input">
                    <input class="user-input__field" type="tel" name="phone" required>
                    <span class="user-input__label">Номер телефона</span>
                </label>
            </div>
            <div class="popup__row">
                <label class="user-input">
                    <textarea class="user-input__field" name="text" rows="2" required></textarea>
                    <span class="user-input__label">Ваше сообщение</span>
                </label>
            </div>
            <div class="popup__row">
                <label class="upload">
                    <span class="upload__name">Приложить резюме</span>
                    <input type="file" name="file" accept=".jpg, .jpeg, .png, .pdf, .doc, .docs, .xls, .xlsx">
                </label>
            </div>
        </div>
        <div class="popup__actions">
            <button class="btn btn-reset" name="submit" aria-label="Отправить отклик">
                <span>Отправить отклик</span>
            </button>
        </div>
        <div class="popup__policy">Отправляя форму, Вы соглашаетесь с
            <a href="{{ route('policy') }}">политикой конфиденциальности</a>
        </div>
    </div>
</form>

<form class="popup" id="project" action="{{ route('ajax.project') }}" style="display: none">
    <div class="popup__container">
        <div class="popup__heading">
            <div class="popup__title">Расскажите о проекте</div>
            <div class="popup__text">Пожалуйста, опишите задачу по предстоящему проекту, или приложите техническое задание</div>
        </div>
        <div class="popup__fields">
            <div class="popup__cols">
                <label class="user-input">
                    <input class="user-input__field" type="text" name="name" required>
                    <span class="user-input__label">Имя</span>
                </label>
                <label class="user-input">
                    <input class="user-input__field" type="tel" name="phone" required>
                    <span class="user-input__label">Номер телефона</span>
                </label>
            </div>
            <div class="popup__row">
                <label class="user-input">
                    <textarea class="user-input__field" name="text" rows="2" required></textarea>
                    <span class="user-input__label">Ваше сообщение</span>
                </label>
            </div>
            <div class="popup__row">
                <label class="upload">
                    <span class="upload__name">Приложить ТЗ</span>
                    <input type="file" name="file" accept=".jpg, .jpeg, .png, .pdf, .doc, .docs, .xls, .xlsx">
                </label>
            </div>
        </div>
        <div class="popup__actions">
            <button class="btn btn-reset" name="submit" aria-label="Отправить">
                <span>Отправить</span>
            </button>
        </div>
        <div class="popup__policy">Отправляя форму, Вы соглашаетесь с
            <a href="{{ route('policy') }}">политикой конфиденциальности</a>
        </div>
    </div>
</form>

<div class="popup" id="request-done" style="display: none">
    <div class="popup__container">
        <div class="popup__heading">
            <div class="popup__title">Ваше сообщение успешно отправлено!</div>
            <div class="popup__text">Мы свяжемся с вами в ближайшее время!</div>
        </div>
    </div>
</div>