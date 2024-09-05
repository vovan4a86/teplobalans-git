function sectionCreate(form){
	var url = $(form).attr('action');
	var data = $(form).serialize();
	sendAjax(url, data, function(json){
		if (typeof json.view != 'undefined') {
			$('#setting-groups').append(urldecode(json.view));
		}
		if (typeof json.url != 'undefined') {
			location.href = json.url;
		}
		if (typeof json.success != 'undefined' && json.success == true) {
			$(form).find('[name=name]').val('');
		}
	});
	return false;
}

function sectionEdit(elem){
	var block = $(elem).closest('.box-footer');
	// block.find('.text a').hide();
	// block.find('.tools').hide();
	block.find('form.js-edit').show().find('[name=name]').trigger('focus');
}

function sectionCreateShow(elem){
	var block = $(elem).closest('.box-footer');
	// block.find('.text a').hide();
	// block.find('.tools').hide();
	block.find('form.js-create').show().find('[name=name]').trigger('focus');
}

function sectionSave(form){
	var url = $(form).attr('action');
	var data = $(form).serialize();
	sendAjax(url, data, function(json){
		if (json.success) {
			document.location.reload();
			//$(form).closest('li').replaceWith(urldecode(json.view));
		}
	});
	return false;
}

function sectionDelete(elem){
	if (!confirm('Удалить категорию со всеми рецептами?')) return false;
	var url = $(elem).data('url');
	sendAjax(url, {}, function(json){
		if (typeof json.success != 'undefined' && json.success == true) {
			document.location.href = '/admin/recipies';
		}
	});
	return false;
}

// ***
function sectionSaveOld(form, e){
	e.preventDefault();

	var url = $(form).attr('action');
	var data = $(form).serialize();

	sendAjax(url, data, function(json){
		if (typeof json.errors != 'undefined') {
			applyFormValidate(form, json.errors);
			var errMsg = [];
			for (var key in json.errors) { errMsg.push(json.errors[key]);  }
			$(form).find('[type=submit]').after(autoHideMsg('red', urldecode(errMsg.join(' '))));
		}
		if (typeof json.redirect != 'undefined') document.location.href = urldecode(json.redirect);
		if (typeof json.msg != 'undefined') $(form).find('[type=submit]').after(autoHideMsg('green', urldecode(json.msg)));
	});
}

function sectionDel(elem, e){
	e.preventDefault();
	if (!confirm('Удалить отзыв?')) return false;
	var url = $(elem).attr('href');
	sendAjax(url, {}, function(json){
		if (typeof json.success != 'undefined' && json.success == true) {
			$(elem).closest('tr').fadeOut(300, function(){ $(this).remove(); });
		}
	});
}