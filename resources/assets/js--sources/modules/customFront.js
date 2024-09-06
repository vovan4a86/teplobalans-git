import $ from 'jquery';
import {showSuccessRequestDialog} from "./popups";

export const sendAjax = (url, data, callback, type) => {
    data = data || {};
    if (typeof type == 'undefined') type = 'json';
    $.ajax({
        type: 'post',
        url: url,
        data: data,
        dataType: type,
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
        },
        success: function (json) {
            if (typeof callback == 'function') {
                callback(json);
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert('Не удалось выполнить запрос! Ошибка на сервере.');
            console.log(errorThrown);
        },
    });
}

export const sendFiles = (url, data, callback, type) => {
    if (typeof type == 'undefined') type = 'json';
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        cache: false,
        dataType: type,
        processData: false, // Don't process the files
        contentType: false, // Set content type to false as jQuery will tell the server its a query string request
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
        },
        success: function (json, textStatus, jqXHR) {
            if (typeof callback == 'function') {
                callback(json);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Не удалось выполнить запрос! Ошибка на сервере.');
        }
    });
}

export const resetForm = (form) => {
    $(form).trigger('reset');
    $(form).find('.err-msg-block').remove();
    $(form).find('.has-error').remove();
    $(form).find('.invalid').attr('title', '').removeClass('invalid');
}

//вопрос специалисту
export const sendProductRequest = () => {
    $('#request').submit(function (e) {
        e.preventDefault();
        const form = $(this);
        const url = $(form).attr('action');
        const data = $(form).serialize();

        sendAjax(url, data, function (json) {
            if (json.success) {
                resetForm(form);
                showSuccessRequestDialog({
                    'title': 'Ваше сообщение успешно отправлено!',
                    'text': 'Мы свяжемся с вами в ближайшее время!'
                });
                $('.is-close-btn').click();
            }
            if (json.errors) {
                showSuccessRequestDialog({
                    'title': 'Произошла ошибка!',
                    'text': 'Попробуйте еще раз или свяжитесь с нами другим способом.'
                });
                console.error(json.errors);
            }
        });
    });
}
sendProductRequest();

//интересная вакансия
export const sendVacancy = () => {
    $('#vacancy').submit(function (e) {
        e.preventDefault();
        const form = $(this);
        const url = $(form).attr('action');

        const file = $(form).find('input[name=file]');

        let data = new FormData();
        $.each($(form).serializeArray(), function (key, value) {
            data.append(value.name, value.value);
        });

        data.append('file', file.prop('files')[0]);

        sendFiles(url, data, function (json) {
            if (json.success) {
                resetForm(form);
                showSuccessRequestDialog({
                    'title': 'Ваше сообщение успешно отправлено!',
                    'text': 'Мы свяжемся с вами в ближайшее время!'
                });
                $('.is-close-btn').click();
            }
            if (json.errors) {
                showSuccessRequestDialog({
                    'title': 'Произошла ошибка!',
                    'text': 'Попробуйте еще раз или свяжитесь с нами другим способом.'
                });
                console.error(json.errors);
            }
        })
    });
}
sendVacancy();

//расскажите о проекте
export const sendProject = () => {
    $('#project').submit(function (e) {
        e.preventDefault();
        const form = $(this);
        const url = $(form).attr('action');

        const file = $(form).find('input[name=file]');

        let data = new FormData();
        $.each($(form).serializeArray(), function (key, value) {
            data.append(value.name, value.value);
        });

        data.append('file', file.prop('files')[0]);

        sendFiles(url, data, function (json) {
            if (json.success) {
                resetForm(form);
                showSuccessRequestDialog({
                    'title': 'Ваше сообщение успешно отправлено!',
                    'text': 'Мы свяжемся с вами в ближайшее время!'
                });
                $('.is-close-btn').click();
            }
            if (json.errors) {
                showSuccessRequestDialog({
                    'title': 'Произошла ошибка!',
                    'text': 'Попробуйте еще раз или свяжитесь с нами другим способом.'
                });
                console.error(json.errors);
            }
        })
    });
}
sendProject();