@extends('admin::template')

@section('scripts')
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
								<td width="100" style="text-align: center;">
									@if($item->image) <img src="{{ $item->thumb(1) }}" alt="{{ $item->name }}" width="50"> @endif
								</td>
								<td>{{ $item->title }}</td>
								<td>{{ $item->expirience }}</td>
								<td>{{ $item->place == 'office' ? 'Офис' : 'Удаленная работа' }}</td>
								<td>{{ $item->salary }}</td>
								<td>{!! mb_strimwidth($item->announce, 0, 120, '...') !!}</td>
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
