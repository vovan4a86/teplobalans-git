@extends('admin::template')

@section('scripts')
	<script type="text/javascript" src="/adminlte/interface_prices.js"></script>
@stop

@section('page_name')
	<h1>Прайс
		<small><a href="{{ route('admin.prices.edit') }}">Добавить раздел</a></small>
	</h1>
@stop

@section('breadcrumb')
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Главная</a></li>
		<li class="active">Прайс</li>
	</ol>
@stop

@section('content')
	@include('admin::prices.header')

{{--	<div class="box box-solid">--}}
{{--		<div class="box-body">--}}
{{--			@if (count($sections))--}}
{{--				<table class="table table-striped table-v-middle">--}}
{{--					<tbody id="sections-list">--}}
{{--						@foreach ($sections as $item)--}}
{{--							<tr data-id="{{ $item->id }}">--}}
{{--								<td width="40"><i class="fa fa-ellipsis-v"></i> <i class="fa fa-ellipsis-v"></i></td>--}}
{{--								<td width="200">{{ $item->name }}</td>--}}
{{--								<td width="60"><a class="glyphicon glyphicon-edit" href="{{ route('admin.prices.edit', [$item->id]) }}" style="font-size:20px; color:orange;"></a></td>--}}
{{--								<td width="60">--}}
{{--									<a class="glyphicon glyphicon-trash" href="{{ route('admin.prices.del', [$item->id]) }}"--}}
{{--									   style="font-size:20px; color:red;" onclick="sectionDel(this, event)"></a>--}}
{{--								</td>--}}
{{--							</tr>--}}
{{--						@endforeach--}}
{{--					</tbody>--}}
{{--				</table>--}}

{{--				<script type="text/javascript">--}}
{{--					$("#sections-list").sortable({--}}
{{--						update: function( event, ui ) {--}}
{{--							var url = "{{ route('admin.prices.reorder') }}";--}}
{{--							var data = {};--}}
{{--							data.sorted = ui.item.closest('#sections-list').sortable( "toArray", {attribute: 'data-id'} );--}}
{{--							sendAjax(url, data);--}}
{{--						}--}}
{{--					}).disableSelection();--}}
{{--				</script>--}}
{{--			@else--}}
{{--				<p>Нет разделов!</p>--}}
{{--			@endif--}}
{{--		</div>--}}
{{--	</div>--}}
@stop
