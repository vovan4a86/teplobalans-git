<span class="images_item" data-id="{{ $item->id }}">
	<img class="img-polaroid" src="{{ $item->thumb(1) }}" style="cursor:pointer;"
		 data-image="{{ $item->image_src }}" height="400"
         onclick="return popupImage($(this).data('image'))">
	<a class="images_del" href="{{ route('admin.certificates.imageDel', [$item->id]) }}"
       onclick="return certificateDel(this)"><span class="glyphicon glyphicon-trash"></span></a>
	<a class="images_edit" href="{{ route('admin.certificates.imageEdit', [$item->id]) }}"
	   onclick="certificateEdit(this, event)"><span class="glyphicon glyphicon-edit"></span></a>
</span>