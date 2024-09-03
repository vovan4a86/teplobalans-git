@extends('admin::template')

@section('scripts')
	<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="/adminlte/interface_vacancies.js"></script>
@stop

@section('page_name')
	<h1>Вакансии
		<small><a href="{{ route('admin.vacancies.edit') }}">Добавить вакансию</a></small>
	</h1>
@stop

@section('breadcrumb')
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Главная</a></li>
		<li class="active">Вакансии</li>
	</ol>
@stop

@section('content')
	<div class="box box-solid">
		<div class="box-body">
			@if (count($vacancies))
				<table class="table table-striped table-v-middle">
					<tbody id="vacancies-list">
						@foreach ($vacancies as $item)
							<tr data-id="{{ $item->id }}"
								@if(!$item->published)
									style="background: #ffcccc"
								@endif>
								<td width="40" style="cursor: pointer"><i class="fa fa-ellipsis-v"></i> <i class="fa fa-ellipsis-v"></i></td>
								<td width="200">{{ $item->name }}</td>
								<td width="200">{{ $item->schedule }}</td>
								<td width="200">{{ $item->email }}</td>
								<td width="200">{{ $item->phone }}</td>
								<td width="200">{{ $item->salary }}</td>
								<td>{!! mb_strimwidth($item->text, 0, 120, '...') !!}</td>
								<td width="60">
									<a class="glyphicon glyphicon-edit" href="{{ route('admin.vacancies.edit', [$item->id]) }}"
									   style="font-size:20px; color:orange;"></a>
								</td>
								<td width="60">
									<a class="glyphicon glyphicon-trash" href="{{ route('admin.vacancies.delete', [$item->id]) }}"
									   style="font-size:20px; color:red;" onclick="vacancyDel(this, event)"></a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>

				<script type="text/javascript">
					$("#vacancies-list").sortable({
						update: function( event, ui ) {
							var url = "{{ route('admin.vacancies.reorder') }}";
							var data = {};
							data.sorted = ui.item.closest('#vacancies-list').sortable( "toArray", {attribute: 'data-id'} );
							sendAjax(url, data);
						}
					}).disableSelection();
				</script>
			@else
				<p>Нет вакансий!</p>
			@endif
		</div>
	</div>
@stop
