var projectImage = null;

function projectImageAttache(elem, e) {
    $.each(e.target.files, function (key, file) {
        if (file['size'] > max_file_size) {
            alert('Слишком большой размер файла. Максимальный размер 2Мб');
        } else {
            projectImage = file;
            renderImage(file, function (imgSrc) {
                var item = '<img class="img-polaroid" src="' + imgSrc + '" height="100" data-image="' + imgSrc + '" onclick="return popupImage($(this).data(\'image\'))">';
                $('#article-image-block').html(item);
            });
        }
    });
    $(elem).val('');
}

var img = null;

function imgAttache(elem, e) {
    $.each(e.target.files, function (key, file) {
        if (file['size'] > max_file_size) {
            alert('Слишком большой размер файла. Максимальный размер 10Мб');
        } else {
            img = file;
            renderImage(file, function (imgSrc) {
                var item = '<img class="img-polaroid" src="' + imgSrc + '" height="100" data-image="' + imgSrc + '" onclick="return popupImage($(this).data(\'image\'))">';
                $('#action-image-block').html(item);
            });
        }
    });
}

function projectImageDel(el, e) {
    e.preventDefault();
    if (!confirm('Удалить изображение?')) return false;
    var url = $(el).attr('href');
    sendAjax(url, {}, function (json) {
        if (json.success === true) {
            $(el).closest('#article-image-block').html('');
        }
    });
}

function projectSave(form, e) {
    e.preventDefault();
    var url = $(form).attr('action');
    var data = new FormData();
    $.each($(form).serializeArray(), function (key, value) {
        data.append(value.name, value.value);
    });
    if (projectImage) {
        data.append('image', projectImage);
    }
    ;

    sendFiles(url, data, function (json) {
        if (typeof json.errors != 'undefined') {
            applyFormValidate(form, json.errors);
            var errMsg = [];
            for (var key in json.errors) {
                errMsg.push(json.errors[key]);
            }
            $(form).find('[type=submit]').after(autoHideMsg('red', urldecode(errMsg.join(' '))));
        }
        if (typeof json.redirect != 'undefined') document.location.href = urldecode(json.redirect);
        if (typeof json.msg != 'undefined') $(form).find('[type=submit]').after(autoHideMsg('green', urldecode(json.msg)));
        projectImage = null;
    });

    return false;
}

function projectAddDel(el, e) {
    e.preventDefault();
    if (!confirm('Удалить метку?')) return false;
    $(el).closest('tr').fadeOut(300, function () {
        $(this).remove();
    });
}

function projectDel(elem) {
    if (!confirm('Удалить проект?')) return false;
    var url = $(elem).attr('href');
    sendAjax(url, {}, function (json) {
        if (typeof json.success != 'undefined' && json.success == true) {
            $(elem).closest('tr').fadeOut(300, function () {
                $(this).remove();
            });
        }
    });
    return false;
}

//gallery
function galleryImageUpload(elem, e) {
    var url = $(elem).data('url');
    files = e.target.files;
    var data = new FormData();
    $.each(files, function (key, value) {
        if (value['size'] > max_file_size) {
            alert('Слишком большой размер файла. Максимальный размер 2Мб');
        } else {
            data.append('images[]', value);
        }
    });
    $(elem).val('');

    sendFiles(url, data, function (json) {
        if (typeof json.html != 'undefined') {
            $('.images_list').append(urldecode(json.html));
            if (!$('.images_list img.active').length) {
                $('.images_list .img_check').eq(0).trigger('click');
            }
        }
    });
}

function galleryItemEdit(elem, e) {
    e.preventDefault();
    var url = $(elem).attr('href');
    popupAjax(url);
}

function galleryImageDelete(el, e) {
    e.preventDefault();
    if (!confirm('Удалить изображение?')) return false;
    var url = $(el).attr('href');
    sendAjax(url, {}, function (json) {
        if (typeof json.msg != 'undefined') alert(urldecode(json.msg));
        if (typeof json.success != 'undefined' && json.success === true) {
            $(el).closest('.images_item').fadeOut(300, function () {
                $(this).remove();
            });
        }
    });
}

function galleryImageDataSave(form, e) {
    e.preventDefault();
    var url = $(form).attr('action');
    var data = $(form).serialize();
    sendAjax(url, data, function (json) {
        if (typeof json.success != 'undefined' && json.success == true) {
            popupClose();
        }
    });
}

$(document).ready(function () {
    if ($('#tag_name')) {
        init_autocomplete($('#tag_name'));
    }
});
