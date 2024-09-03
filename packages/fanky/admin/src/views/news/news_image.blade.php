<span class="images_item">
	<img class="img-polaroid" src="{{ $image->thumb(1) }}"
         style="cursor:pointer;" data-image="{{ $image->image_src }}"
         onclick="popupImage('{{ $image->image_src }}')">
	<a class="images_edit" href="{{ route('admin.news.imageEdit', [$image->id]) }}"
       onclick="galleryItemEdit(this, event)"><span class="glyphicon glyphicon-edit"></span></a>
	<a class="images_del" href="{{ route('admin.news.newsImageDel', [$image->id]) }}"
       onclick="return newsImageGalleryDel(this)">
		<span class="glyphicon glyphicon-trash"></span>
	</a>
</span>
