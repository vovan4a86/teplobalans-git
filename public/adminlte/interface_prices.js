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
	if (!confirm('Удалить раздел?')) return false;
	var url = $(elem).data('url');
	sendAjax(url, {}, function(json){
		if (typeof json.success != 'undefined' && json.success == true) {
			document.location.href = '/admin/prices';
		}
	});
	return false;
}

function addRow(link, e) {
	e.preventDefault();
	var container = $(link).prev();
	var row = container.find('.row:last');
	$newRow = $(document.createElement('div'));
	$newRow.addClass('row row-params');
	$newRow.html(row.html());
	row.before($newRow);
}

function delRow(elem, e) {
	e.preventDefault();
	if (!confirm('Удалить строку?')) return false;
	$(elem).closest('.row').fadeOut(300, function(){ $(this).remove(); });
}

function saveTable(elem, e) {
	e.preventDefault();
	const url = $(elem).attr('action');
	const data = $(elem).serialize();

	sendAjax(url, data, function(json) {
		if(json.success) {
			alert('success');
		}
	});
}
