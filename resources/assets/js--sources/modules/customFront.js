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

//чертеж
export const sendDrawingRequest = () => {
    $('#drawing').submit(function (e) {
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
                file.value = null;
                $('span.upload__name').text('Загрузить чертёж');
                resetForm(form);
                showSuccessRequestDialog({
                    'title': 'Ваша заявка отправлена!',
                    'text': 'Наши менеджеры свяжутся с Вами в ближайшее время.'
                });
                // form.find('.is-close-btn').click();
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
sendDrawingRequest();

//консультация
export const sendConsultation = () => {
    $('#consultation').submit(function (e) {
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
                file.value = null;
                $('span.upload__name').text('Загрузить чертёж');
                resetForm(form);
                showSuccessRequestDialog({
                    'title': 'Ваша заявка отправлена!',
                    'text': 'Наши менеджеры свяжутся с Вами в ближайшее время.'
                });
                // form.find('.is-close-btn').click();
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
sendConsultation();

//отправить заявку
export const sendProductRequest = () => {
    $('#product-request').submit(function (e) {
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
                file.value = null;
                $('span.upload__name').text('Загрузить чертёж');
                resetForm(form);
                showSuccessRequestDialog({
                    'title': 'Ваша заявка отправлена!',
                    'text': 'Наши менеджеры свяжутся с Вами в ближайшее время.'
                });
                // form.find('.is-close-btn').click();
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
sendProductRequest();

//загрузить еще новости
export const loadMoreNews = () => {
    $('.more-news').click(function () {
        const btn = $(this);
        const news_list = $('.s-newses__grid');
        const url = $(btn).data('url');
        $(btn).hide();

        sendAjax(url, {}, function (json) {
            if (json.items) {
                $(news_list).append(json.items);
            }
            if (json.btn) {
                $(btn).replaceWith(json.btn);
                $(btn).show();
                loadMoreNews();
            }
        });
    });
}
loadMoreNews();

//загрузить еще товары в каталоге
export const loadMoreProducts = () => {
    $('.c-load').click(function () {
        const btn = $(this);
        const products_grid = $('.s-prods__grid');
        const pagination = $('.s-prods__pagination')
        const url = $(btn).data('url');
        $(btn).hide();

        sendAjax(url, {}, function (json) {
            if (json.items) {
                $(products_grid).append(json.items);
            }
            if (json.btn) {
                $(btn).replaceWith(json.btn);
                $(btn).show();
                loadMoreProducts();
            }
            $(pagination).replaceWith(json.paginate)
        });
    });
}
loadMoreProducts();

//загрузить еще проекты
export const loadMoreProjects = () => {
    $('.more-projects').click(function () {
        const btn = $(this);
        const projects_list = $('.projects__list');
        const url = $(btn).data('url');
        $(btn).hide();

        sendAjax(url, {}, function (json) {
            if (json.items) {
                $(projects_list).append(json.items);
            }
            if (json.btn) {
                $(btn).replaceWith(json.btn);
                $(btn).show();
                loadMoreProjects();
            }
        });
    });
}
loadMoreProjects();

//работа с городами
export const changeCity = () => {
    $('.b-city__link').click(function (e) {
        e.preventDefault();
        const url = $(this).data('ajax');
        const currentUrl = $('input[name=current-url]').val();

        sendAjax(url, {currentUrl}, function (json) {
            if(json.success && !json.redirect) {
                location.reload();
            }
            if(json.success && json.redirect) {
                location.href = json.redirect;
            }
        })
    })
}
changeCity();