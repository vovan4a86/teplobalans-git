let catalogImage = null;
let catalogFile = null;
var mass_images = [];
let techCardImage = null;

function catalogImageAttache(elem, e) {
    $.each(e.target.files, function (key, file) {
        if (file['size'] > max_file_size) {
            alert('Слишком большой размер файла. Максимальный размер 10Мб');
        } else {
            catalogImage = file;
            renderImage(file, function (imgSrc) {
                let item = '<img class="img-polaroid" src="' + imgSrc + '" height="100" data-image="' + imgSrc + '" onclick="return popupImage($(this).data(\'image\'))" alt="">';
                $('#catalog-image-block').html(item);
            });
        }
    });
    $(elem).val('');
}

function catalogImageDel(elem) {
    if (!confirm('Удалить изображение?')) return false;
    let url = $(elem).attr('href');
    sendAjax(url, {}, function (json) {
        if (typeof json.msg != 'undefined') alert(urldecode(json.msg));
        if (typeof json.success != 'undefined' && json.success === true) {
            $(elem).closest('#catalog-image-block').fadeOut(300, function () {
                $(this).empty();
            });
        }
    });
    return false;
}

function update_order(form, e) {
    e.preventDefault();
    var button = $(form).find('[type="submit"]');
    button.attr('disabled', 'disabled');
    var url = $(form).attr('action');
    var data = $(form).serialize();
    sendAjax(url, data, function (json) {
        button.removeAttr('disabled');
    });
}

function catalogContent(elem) {
    //var url = $(elem).attr('href');
    //sendAjax(url, {}, function(html){
    //	$('#catalog-content').html(html);
    //}, 'html');
    //return false;
}

function catalogSave(form, e) {
    e.preventDefault();
    const url = $(form).attr('action');
    let data = new FormData();
    $.each($(form).serializeArray(), function (key, value) {
        data.append(value.name, value.value);
    });
    if (catalogImage) {
        data.append('image', catalogImage);
    }
    if (techCardImage) {
        data.append('tech_card_image', techCardImage);
    }
    if (catalogFile) {
        data.append('file', catalogFile);
    }

    sendFiles(url, data, function (json) {
        if (typeof json.row != 'undefined') {
            if ($('#users-list tr[data-id=' + json.id + ']').length) {
                $('#users-list tr[data-id=' + json.id + ']').replaceWith(urldecode(json.row));
            } else {
                $('#users-list').append(urldecode(json.row));
            }
        }
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
        if (typeof json.success != 'undefined' && json.success === true) {
            catalogImage = null;
            techCardImage = null;
            catalogFile = null;
        }
        if (json.alert) $(form).find('[type=submit]').after(autoHideMsg('red', urldecode(json.alert)));
    });
    return false;
}

function catalogDel(elem) {
    if (!confirm('Удалить раздел?')) return false;
    var url = $(elem).attr('href');
    sendAjax(url, {}, function (json) {
        if (typeof json.msg != 'undefined') alert(urldecode(json.msg));
        if (typeof json.success != 'undefined' && json.success == true) {
            $(elem).closest('li').fadeOut(300, function () {
                $(this).remove();
            });
        }
        if (json.alert) alert(urldecode(json.alert));

    });
    return false;
}

function productSave(form, e) {
    var url = $(form).attr('action');
    var data = new FormData();
    $.each($(form).serializeArray(), function (key, value) {
        data.append(value.name, value.value);
    });
    sendAjaxWithFile(url, data, function (json) {
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
        if (json.alert) $(form).find('[type=submit]').after(autoHideMsg('red', urldecode(json.alert)));
    });
    return false;
}

function productDel(elem) {
    if (!confirm('Удалить товар?')) return false;
    var url = $(elem).attr('href');
    sendAjax(url, {}, function (json) {
        if (typeof json.msg != 'undefined') alert(urldecode(json.msg));
        if (typeof json.success != 'undefined' && json.success === true) {
            $(elem).closest('tr').fadeOut(300, function () {
                $(this).remove();
            });
        }
        if (json.alert) alert(urldecode(json.alert));

    });
    return false;
}

function productImageUpload(elem, e) {
    var url = $(elem).data('url');
    let files = e.target.files;
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

function productCheckImage(elem) {
    $('.images_list img').removeClass('active');
    $('.images_list .img_check .glyphicon').removeClass('glyphicon-check').addClass('glyphicon-unchecked');

    $(elem).find('.glyphicon').removeClass('glyphicon-unchecked').addClass('glyphicon-check');
    $(elem).siblings('img').addClass('active');

    $('#product-image').val($(elem).siblings('img').data('image'));
    return false;
}

function productImageDel(elem) {
    if (!confirm('Удалить изображение?')) return false;
    var url = $(elem).attr('href');
    sendAjax(url, {}, function (json) {
        if (typeof json.msg != 'undefined') alert(urldecode(json.msg));
        if (typeof json.success != 'undefined' && json.success === true) {
            $(elem).closest('.images_item').fadeOut(300, function () {
                $(this).remove();
            });
        }
    });
    return false;
}


//catalog items
function catalogItemsUpload(elem, e) {
    var url = $(elem).data('url');
    let files = e.target.files;
    let data = new FormData();
    $.each(files, function (key, value) {
        if (value['size'] > max_file_size) {
            alert('Слишком большой размер файла. Максимальный размер 10Мб');
        } else {
            data.append('items[]', value);
        }
    });
    $(elem).val('');

    sendFiles(url, data, function (json) {
        if (typeof json.html != 'undefined') {
            $('.images_list').append(urldecode(json.html));
        }
    });
}

function catalogItemDelete(elem) {
    if (!confirm('Удалить изображение?')) return false;
    var url = $(elem).attr('href');
    sendAjax(url, {}, function (json) {
        if (typeof json.msg != 'undefined') alert(urldecode(json.msg));
        if (typeof json.success != 'undefined' && json.success === true) {
            $(elem).closest('.images_item').fadeOut(300, function () {
                $(this).remove();
            });
        }
    });
    return false;
}

function catalogItemEdit(elem, e){
    e.preventDefault();
    var url = $(elem).attr('href');
    popupAjax(url);
}

function catalogItemDataSave(form, e){
    e.preventDefault();
    var url = $(form).attr('action');
    var data = $(form).serialize();
    sendAjax(url, data, function(json){
        if (typeof json.success != 'undefined' && json.success == true) {
            popupClose();
        }
    });
}

function techCardImageAttache(elem, e) {
    $.each(e.target.files, function (key, file) {
        if (file['size'] > max_file_size) {
            alert('Слишком большой размер файла. Максимальный размер 10Мб');
        } else {
            techCardImage = file;
            renderImage(file, function (imgSrc) {
                let item = '<img class="img-polaroid" src="' + imgSrc + '" height="100" data-image="' + imgSrc + '" onclick="return popupImage($(this).data(\'image\'))" alt="">';
                $('#tech-card-block').html(item);
            });
        }
    });
    $(elem).val('');
}

function techCardImageDel(elem) {
    if (!confirm('Удалить изображение?')) return false;
    let url = $(elem).attr('href');
    sendAjax(url, {}, function (json) {
        if (typeof json.msg != 'undefined') alert(urldecode(json.msg));
        if (typeof json.success != 'undefined' && json.success === true) {
            $(elem).closest('#tech-card-block').fadeOut(300, function () {
                $(this).empty();
            });
        }
    });
    return false;
}

function catalogFileDelete(elem) {
    if (!confirm('Удалить файл?')) return false;
    let url = $(elem).attr('href');
    sendAjax(url, {}, function (json) {
        if (typeof json.msg != 'undefined') alert(urldecode(json.msg));
        if (typeof json.success != 'undefined' && json.success === true) {
            $(elem).closest('#file-block').fadeOut(300, function () {
                $(this).empty();
            });
        }
    });
    return false;
}

function catalogFileAttach(elem, e) {
    $.each(e.target.files, function (key, file) {
        if (file['size'] > max_file_size) {
            alert('Слишком большой размер файла. Максимальный размер 10Мб');
        } else {
            catalogFile = file;
            renderImage(file, function () {
                let item = '<img class="img-polaroid" src="/adminlte/document_small.png" height="100" ' +
                    'data-image="/adminlte/document_small.png" onclick="return popupImage($(this).data(\'image\'))" alt="">';
                $('#file-block').html(item);
            });
        }
    });
    $(elem).val('');
}

$(document).ready(function () {
    $('#pages-tree').jstree({
        "core": {
            "animation": 0,
            "check_callback": true,
            'force_text': false,
            "themes": {"stripes": true},
            'data': {
                'url': function (node) {
                    return node.id === '#' ? '/admin/catalog/get-catalogs' : '/admin/catalog/get-catalogs/' + node.id;
                }
            },
        },
        "plugins": ["contextmenu", "dnd", "state", "types"],
        "contextmenu": {
            "items": function ($node) {
                var tree = $("#tree").jstree(true);
                return {
                    "Create": {
                        "icon": "fa fa-plus text-blue",
                        "label": "Создать страницу",
                        "action": function (obj) {
                            // $node = tree.create_node($node);
                            document.location.href = '/admin/catalog/catalog-edit?parent=' + $node.id
                        }
                    },
                    "Edit": {
                        "icon": "fa fa-pencil text-yellow",
                        "label": "Редактировать страницу",
                        "action": function (obj) {
                            document.location.href = '/admin/catalog/catalog-edit/' + $node.id;
                        }
                    },
                    "Remove": {
                        "icon": "fa fa-trash text-red",
                        "label": "Удалить страницу",
                        "action": function (obj) {
                            if (confirm("Действительно удалить страницу?")) {
                                var url = '/admin/catalog/catalog-delete/' + $node.id;
                                sendAjax(url, {}, function (json) {
                                    // document.location.href = '/admin/catalog';
                                    if (json.success) tree.delete_node($node);
                                    if (json.alert) alert(urldecode(json.alert));
                                })
                            }
                            // tree.delete_node($node);
                        }
                    }
                };
            }
        }
    }).bind("move_node.jstree", function (e, data) {
        let treeInst = $(this).jstree(true);
        parent = treeInst.get_node(data.parent);
        var d = {
            'id': data.node.id,
            'parent': (data.parent == '#') ? 0 : data.parent,
            'sorted': parent.children
        };
        sendAjax('/admin/catalog/catalog-reorder', d);
    }).on("activate_node.jstree", function (e, data) {
        if (data.event.button === 0) {
            window.location.href = '/admin/catalog/catalog-edit/' + data.node.id;
        }
    });
});

//mass products work
function checkSelectProduct() {
    var selected = $('input.js_select:checked');
    if (selected.length) {
        $('.js-move-btn').removeAttr('disabled');
        $('.js-delete-btn').removeAttr('disabled');
        $('.js-add-btn').removeAttr('disabled');
        $('.js-publish-btn').removeAttr('disabled');
    } else {
        $('.js-move-btn').attr('disabled', 'disabled');
        $('.js-delete-btn').attr('disabled', 'disabled');
        $('.js-add-btn').attr('disabled', 'disabled');
        $('.js-publish-btn').attr('disabled', 'disabled');
        $('.mass-images').hide('fast');
        $('.mass-images-list').empty();
        mass_images = [];
    }
}

function checkSelectAll() {
    $('input.js_select').prop('checked', true);
    checkSelectProduct();
}

function checkDeselectAll() {
    $('input.js_select').prop('checked', false);
    checkSelectProduct();
}

function moveProducts(btn, e) {
    e.preventDefault();
    var url = '/admin/catalog/move-products';
    var catalog_id = $('#moveDialog select').val();
    var items = [];
    var selected = $('input.js_select:checked');
    $(selected).each(function (n, el) {
        items.push($(el).val());
        $(el).closest('tr').animate({'backgroundColor': '#fb6c6c'}, 300);
    });
    sendAjax(url, {catalog_id: catalog_id, items: items}, function (json) {
        if (typeof json.success != 'undefined' && json.success == true) {
            $('#moveDialog').modal('hide');
            $(selected).each(function (n, el) {
                // $("#row td").animate({'line-height':0},1000).remove();
                // $(el).closest('tr').fadeOut(300, function(){ $(this).remove(); });
                $(el).closest('tr').children('td, th')
                    .animate({paddingBottom: 0, paddingTop: 0}, 300)
                    .wrapInner('<div />')
                    .children()
                    .slideUp(function () {
                        $(this).closest('tr').remove();
                    });
            })
        }
    })
    $('#moveDialog').modal('hide');
}

function deleteProducts(btn, e) {
    e.preventDefault();
    if (!confirm('Действительно удалить выбранные товары?')) return
    var url = '/admin/catalog/delete-products';
    var items = [];
    var selected = $('input.js_select:checked');
    $(selected).each(function (n, el) {
        items.push($(el).val());
        $(el).closest('tr').animate({'backgroundColor': '#fb6c6c'}, 300);
    });
    sendAjax(url, {items: items}, function (json) {
        if (typeof json.success != 'undefined' && json.success == true) {
            $(selected).each(function (n, el) {
                // $("#row td").animate({'line-height':0},1000).remove();
                // $(el).closest('tr').fadeOut(300, function(){ $(this).remove(); });
                $(el).closest('tr').children('td, th')
                    .animate({paddingBottom: 0, paddingTop: 0}, 300)
                    .wrapInner('<div />')
                    .children()
                    .slideUp(function () {
                        $(this).closest('tr').remove();
                    });
            })
        }
    })
}

function publishProducts(btn, e) {
    e.preventDefault();
    if (!confirm('Де/публикуем выбранные товары?')) return
    var url = '/admin/catalog/publish-products';
    var items = [];
    var selected = $('input.js_select:checked');
    $(selected).each(function (n, el) {
        items.push($(el).val());
        $(el).closest('tr').animate({'backgroundColor': '#acff75'}, 300);
    });
    sendAjax(url, {items: items}, function (json) {
        if (typeof json.success != 'undefined' && json.success === true) {
            location.reload();
        }
    })
}

function deleteProductsImage(btn, e, catalogId) {
    e.preventDefault();
    if (!confirm('Действительно удалить изображения у выбранных товаров?')) return
    var url = '/admin/catalog/delete-products-image';
    var redirect = '/admin/catalog/products/' + catalogId;
    var items = [];
    var selected = $('input.js_select:checked');
    $(selected).each(function (n, el) {
        items.push($(el).val());
        $(el).closest('tr').animate({'backgroundColor': '#ffc3c3'}, 300);
    });
    sendAjax(url, {items: items}, function (json) {
        if (typeof json.success != 'undefined' && json.success === true) {
            checkDeselectAll();
            location.href = redirect;
        }
    })
}

//mass images
function addProductsImages(elem) {
    $('.mass-images').fadeIn(1000);
}

function massProductImageUpload(elem, e) {
    let url = $(elem).data('url');
    let files = e.target.files;
    // let data = new FormData();
    $.each(files, function (key, value) {
        if (value['size'] > max_file_size) {
            alert('Слишком большой размер файла. Максимальный размер 10Мб');
        } else {
            // data.append('mass_images[]', value);
            mass_images.push(value);
            renderImage(value, function (imgSrc) {
                let item = '<img class="img-polaroid" src="' + imgSrc + '" height="100" data-image="' + imgSrc + '" onclick="return popupImage($(this).data(\'image\'))">';
                $('.mass-images-list').append(item);
            });
        }
    });
    $(elem).val('');
    $('.send-images').removeAttr('disabled');
}

function sendAddedProductImages(elem, e) {
    const catalogId = $(elem).data('catalog-id');
    let url = $(elem).data('url');
    let redirect = '/admin/catalog/products/' + catalogId;
    let data = new FormData();
    $.each(mass_images, function ($i, file) {
        data.append('mass_images[]', file);
    });

    const selected = $('input.js_select:checked');
    $(selected).each(function (n, el) {
        data.append('product_ids[]', $(el).val())
        $(el).closest('tr').animate({'backgroundColor': '#c9c9c9'}, 300);
    });

    $('.send-images').attr('disabled', 'disabled');
    $('.mass-images-list').addClass('loading');
    const message = '<div class="msg">Загрузка картинок...</div>';
    $('.mass-images-list').append(message);

    // setTimeout(function(){
    //     $('.mass-images-list').removeClass('loading');
    //     $('.send-images').removeAttr('disabled');
    // }, 5000);

    sendFiles(url, data, function (json) {
        if (json.success) {
            location.href = redirect;
        } else {
            checkDeselectAll();
            $('.send-images').removeAttr('disabled');
            alert('Ошибка при загрузке!')
            console.log()
        }
    });
}

