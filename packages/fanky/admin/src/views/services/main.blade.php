@extends('admin::template')

@section('scripts')
    <script type="text/javascript" src="/adminlte/interface_services.js"></script>
@stop

@section('page_name')
    <h1>Услуги
        <small><a href="{{ route('admin.services.edit') }}">Добавить услугу</a></small>
    </h1>
@stop

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li class="active">Услуги</li>
    </ol>
@stop

@section('content')
    <div class="box box-solid">
        <div class="box-body">
            @if (count($services))
                <table class="table table-striped table-v-middle">
                    <tbody id="services-list">
                    @foreach ($services as $item)
                        <tr data-id="{{ $item->id }}">
                            <td width="40" style="cursor: pointer"><i class="fa fa-ellipsis-v"></i> <i class="fa fa-ellipsis-v"></i></td>
                            <td width="100">
                                @if ($item->image)
                                    <img src="{{ $item->thumb(1) }}" alt="Service image" height="100">
                                @endif
                            </td>
                            <td width="300">{{ $item->name }}</td>
                            <td>{!! mb_strimwidth($item->text, 0, 120, '...') !!}</td>
                            <td width="60">
                                <a class="glyphicon glyphicon-edit"
                                              href="{{ route('admin.services.edit', [$item->id]) }}"
                                              style="font-size:20px; color:orange;"></a>
                            </td>
                            <td width="60">
                                <a class="glyphicon glyphicon-trash"
                                   href="{{ route('admin.services.del', [$item->id]) }}"
                                   style="font-size:20px; color:red;" onclick="serviceDel(this, event)"></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <script type="text/javascript">
                    $("#services-list").sortable({
                        update: function (event, ui) {
                            var url = "{{ route('admin.services.reorder') }}";
                            var data = {};
                            data.sorted = ui.item.closest('#services-list').sortable("toArray", {attribute: 'data-id'});
                            sendAjax(url, data);
                        }
                    }).disableSelection();
                </script>
            @else
                <p>Нет услуг!</p>
            @endif
        </div>
    </div>
@stop
