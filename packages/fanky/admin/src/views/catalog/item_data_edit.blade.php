<form action="{{ route('admin.catalog.catalogItemDataSave', [$item->id]) }}"
	  onsubmit="catalogItemDataSave(this, event)" style="width:600px;">

	{!! Form::groupText('title', $item->title, 'Заголовок') !!}
	{!! Form::groupTextarea('list', $item->list, 'Список через запятую') !!}

	<button class="btn btn-primary" type="submit">Сохранить</button>
</form>