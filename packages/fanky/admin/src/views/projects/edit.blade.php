@extends('admin::template')

@section('scripts')
    <script type="text/javascript" src="/adminlte/plugins/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="/adminlte/interface_projects.js"></script>
@stop

@section('page_name')
    <h1>
        Проекты
        <small>{{ $project->id ? 'Редактировать' : 'Новый' }}</small>
    </h1>
@stop

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Главная</a></li>
        <li><a href="{{ route('admin.projects') }}">Проекты</a></li>
        <li class="active">{{ $project->id ? 'Редактировать' : 'Новый' }}</li>
    </ol>
@stop

@section('content')
    <form action="{{ route('admin.projects.save') }}" onsubmit="return projectSave(this, event)">
        <input type="hidden" name="id" value="{{ $project->id }}">

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Параметры</a></li>
                <li><a href="#tab_2" data-toggle="tab">Текст</a></li>
                <li><a href="#tab_2a" data-toggle="tab">Изображения</a></li>
                @if($project->id)
                    <li class="pull-right">
                        <a href="{{ route('projects.item', $project->id) }}" target="_blank">Посмотреть</a>
                    </li>
                @endif
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    {!! Form::groupText('name', $project->name, 'Название') !!}
                    {!! Form::groupText('place', $project->place, 'Место') !!}
                    {!! Form::groupText('alias', $project->alias, 'Alias') !!}
                    {!! Form::groupText('title', $project->title, 'Title') !!}
                    {!! Form::groupText('keywords', $project->keywords, 'keywords') !!}
                    {!! Form::groupText('description', $project->description, 'description') !!}
                    {!! Form::groupText('og_title', $project->og_title, 'OpenGraph Title') !!}
                    {!! Form::groupText('og_description', $project->og_description, 'OpenGraph description') !!}

                    <div class="form-group">
                        <label for="article-image">Изображение</label>
                        <input id="article-image" type="file" name="image" accept=".png,.jpg,.jpeg"
                               onchange="return projectImageAttache(this, event)">
                        <div id="article-image-block">
                            @if ($project->image)
                                <img class="img-polaroid" src="{{ $project->thumb(1) }}" height="100"
                                     data-image="{{ $project->image_src }}"
                                     onclick="return popupImage($(this).data('image'))">
                                <a class="images_del" href="{{ route('admin.projects.delete-image', [$project->id]) }}"
                                   onclick="return projectImageDel(this, event)">
                                    <span class="glyphicon glyphicon-trash text-red"></span></a>
                            @else
                                <p class="text-yellow">Изображение не загружено.</p>
                            @endif
                        </div>
                    </div>

                    {!! Form::groupCheckbox('published', 1, $project->published, 'Показывать проект') !!}
                </div>

                <div class="tab-pane" id="tab_2">
                    {!! Form::groupRichtext('text', $project->text, 'Текст', ['rows' => 3]) !!}
                </div>
                <div class="tab-pane" id="tab_2a">
                    @if ($project->id)
                        <div class="form-group">
                            <label class="btn btn-success">
                                <input id="offer_imag_upload" type="file" multiple
                                       data-url="{{ route('admin.projects.add_images', $project->id) }}"
                                       style="display:none;" onchange="galleryImageUpload(this, event)">
                                Загрузить изображения
                            </label>
                        </div>
                        <div class="images_list">
                            @foreach ($project->images as $image)
                                @include('admin::projects.image', ['image' => $image])
                            @endforeach
                        </div>
                    @else
                        Загрузить изображения можно после сохранения проекта.
                    @endif
                    <script type="text/javascript">
                        $(".images_list").sortable({
                            update: function (event, ui) {
                                var url = "{{ route('admin.projects.update-gallery-order') }}";
                                var data = {};
                                data.sorted = ui.item.closest('.images_list').sortable("toArray", {attribute: 'data-id'});
                                sendAjax(url, data);
                            }
                        }).disableSelection();
                    </script>
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </div>
    </form>
@stop
