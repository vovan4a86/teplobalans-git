<span class="images_item" data-id="{{ $image->id }}">
	<img class="img-polaroid" src="{{ $image->image_src }}"
		 style="cursor:pointer;" data-image="{{ $image->thumb(1) }}"
		 onclick="popupImage('{{ $image->image_src }}')">
	<a class="images_del" href="{{ route('admin.catalog.catalogGalleryImageDelete', [$image->id]) }}"
	   onclick="return catalogGalleryImageDelete(this)">
		<span class="glyphicon glyphicon-trash"></span>
	</a>
</span>
