<span class="images_item" data-id="{{ $image->id }}">
	<img class="img-polaroid" src="{{ $image->thumb(1) }}" height="100"
         style="cursor:pointer;" data-image="{{ $image->image_src }}"
		 onclick="popupImage('{{ $image->image_src }}')">
	<a class="images_del" href="{{ route('admin.projects.del_img', [$image->id]) }}"
       onclick="galleryImageDelete(this, event)"><span class="glyphicon glyphicon-trash"></span></a>
	<a class="images_edit" href="{{ route('admin.projects.imageEdit', [$image->id]) }}"
	   onclick="galleryItemEdit(this, event)"><span class="glyphicon glyphicon-edit"></span></a>
</span>
