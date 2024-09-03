@extends('admin::template')

@section('scripts')
	<script type="text/javascript" src="/adminlte/interface_certificates.js"></script>
@stop

@section('page_name')
	<h1>Сертификаты</h1>
@stop

@section('breadcrumb')
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Главная</a></li>
		<li class="active">Сертификаты</li>
	</ol>
@stop

@section('content')
	<div class="box box-solid">
		<div class="box-body">
			<div class="gallery-block">
				<label class="btn btn-success">Загрузить изображения
					<input type="file" name="images[]" multiple style="display:none;"
						   accept=".png,.jpeg,.jpg"
						   onchange="return certificateUpload(this, event)"
						   data-url="{{ route('admin.certificates.imageUpload') }}">
				</label>
				<hr>
				<div class="certificates-items">
					@foreach ($items as $item)
						@include('admin::certificates.item', ['item' => $item])
					@endforeach
				</div>
			</div>
			<script type="text/javascript">
				$(".certificates-items").sortable({
					update: function(event, ui) {
						var url = "{{ route('admin.certificates.order') }}";
						var data = {};
						data.sorted = ui.item.closest('.certificates-items').sortable( "toArray", {attribute: 'data-id'} );
						sendAjax(url, data);
					},
				}).disableSelection();
			</script>
		</div>
	</div>
@stop
