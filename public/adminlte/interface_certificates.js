function certificateUpload(elem, e){
	const url = $(elem).data('url');
	let data = new FormData();
	const files = e.target.files;
    $.each(files, function(key, file)
    {
        if(file['size'] > max_file_size){
            alert('Слишком большой размер файла. Максимальный размер 10Мб');
        } else {
            data.append($(elem).attr('name'), file);
        }
    });
    $(elem).val('');
    sendFiles(url, data, function(json){
    	if (typeof json.html != 'undefined') {
    		$(elem).closest('.gallery-block').find('.certificates-items').append(urldecode(json.html));
    	}
    });
}

function certificateDel(elem){
	if (!confirm('Удалить изображение?')) return false;
	var url = $(elem).attr('href');
	sendAjax(url, {}, function(json){
		if (typeof json.success != 'undefined' && json.success == true) {
			$(elem).closest('.images_item').fadeOut(300, function(){ $(this).remove(); });
		}
	});
	return false;
}

function certificateEdit(elem, e){
	e.preventDefault();
	var url = $(elem).attr('href');
	popupAjax(url);
}

function certificateDataSave(form, e){
	e.preventDefault();
	var url = $(form).attr('action');
	var data = $(form).serialize();
	sendAjax(url, data, function(json){
		if (typeof json.success != 'undefined' && json.success == true) {
			popupClose();
		}
	});
}