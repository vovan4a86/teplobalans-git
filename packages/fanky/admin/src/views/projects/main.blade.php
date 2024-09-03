@extends('admin::template')

@section('scripts')
    <script type="text/javascript" src="/adminlte/interface_projects.js"></script>
@stop

@section('page_name')
    <h1>Проекты
        <small><a href="{{ route('admin.projects.edit') }}">Добавить проект</a></small>
    </h1>
@stop

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Главная</a></li>
        <li class="active">Проекты</li>
    </ol>
@stop

@section('content')
    <div class="box box-solid">
        <div class="box-body">
            @if (count($projects))
                <table class="table table-striped table-v-middle">
                    <tbody id="projects-list">
                    @foreach ($projects as $item)
                        <tr data-id="{{ $item->id }}">
                            <td width="40" style="cursor: pointer"><i class="fa fa-ellipsis-v"></i> <i class="fa fa-ellipsis-v"></i></td>
                            <td width="110" style="text-align: center;">
                                @if($item->image)
                                    <img src="{{ $item->thumb(1) }}" alt="project image" width="100">
                                @endif
                            </td>
                            <td>{{ $item->place }}</td>
                            <td><a href="{{ route('admin.projects.edit', [$item->id]) }}">{{ $item->name }}</a></td>
                            <td>
                                <a class="glyphicon glyphicon-trash"
                                   href="{{ route('admin.projects.delete', [$item->id]) }}"
                                   style="font-size:20px; color:red;" title="Удалить"
                                   onclick="return projectDel(this)"></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <script type="text/javascript">
                    $("#projects-list").sortable({
                        update: function (event, ui) {
                            var url = "{{ route('admin.projects.reorder') }}";
                            var data = {};
                            data.sorted = ui.item.closest('#projects-list').sortable("toArray", {attribute: 'data-id'});
                            sendAjax(url, data);
                        }
                    }).disableSelection();
                </script>
            @else
                <p>Нет проектов!</p>
            @endif
        </div>
    </div>
@stop
