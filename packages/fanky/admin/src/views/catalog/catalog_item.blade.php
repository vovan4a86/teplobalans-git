<span class="images_item" data-id="{{ $item->id }}">
	<img class="img-polaroid" src="{{ $item->icon_src }}" width="150"
		 style="cursor:pointer;" data-image="{{ $item->icon_src }}"
		 onclick="popupImage('{{ $item->icon_src }}')" alt="icon">
	<a class="images_edit" href="{{ route('admin.catalog.catalogItemEdit', [$item->id]) }}"
	   onclick="catalogItemEdit(this, event)"><span class="glyphicon glyphicon-edit"></span></a>
	<a class="images_del" href="{{ route('admin.catalog.catalogItemDelete', [$item->id]) }}"
	   onclick="return catalogItemDelete(this)">
		<span class="glyphicon glyphicon-trash"></span>
	</a>
</span>
