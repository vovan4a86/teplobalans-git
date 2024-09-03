@extends('admin::template')

@section('scripts')
    <script type="text/javascript" src="/adminlte/interface_services.js"></script>
@stop

@section('page_name')
    <h1>
        Услуги
        <small>{{ $service->id ? 'Редактировать' : 'Новая' }}</small>
    </h1>
@stop

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="{{ route('admin.services') }}">Услуги</a></li>
        <li class="active">{{ $service->id ? 'Редактировать' : 'Новая' }}</li>
    </ol>
@stop

@section('content')
    <form action="{{ route('admin.services.save') }}" onsubmit="return serviceSave(this, event)">
        <input type="hidden" name="id" value="{{ $service->id }}">
        <div class="box box-solid">
            <div class="box-body">
                {!! Form::groupText('name', $service->name, 'Имя') !!}
                {!! Form::groupRichtext('text', $service->text, 'Текст') !!}
                {!! Form::groupText('alias', $service->alias, 'Alias') !!}

                {!! Form::groupText('title', $service->title, 'Title') !!}
                {!! Form::groupText('keywords', $service->keywords, 'keywords') !!}
                {!! Form::groupText('description', $service->description, 'description') !!}
                {!! Form::groupText('og_title', $service->og_title, 'OpenGraph Title') !!}
                {!! Form::groupText('og_description', $service->og_description, 'OpenGraph description') !!}

                <div class="form-group" style="display: flex; column-gap: 30px;">
                    <div>
                        <label for="service-image">Изображение</label>
                        <input id="service-image" type="file" name="image" accept=".png,.jpg,.jpeg"
                               onchange="return serviceImageAttache(this, event)">
                        <div id="service-image-block">
                            @if ($service->image)
                                <img class="img-polaroid"
                                     src="{{ $service->image_src }}" width="200"
                                     data-image="{{ $service->image_src }}"
                                     onclick="return popupImage($(this).data('image'))" alt="">
                                <a class="images_del"
                                   href="{{ route('admin.services.delImage', [$service->id]) }}"
                                   onclick="return serviceImageDel(this, event)">
                                    <span class="glyphicon glyphicon-trash text-red"></span>
                                </a>
                            @else
                                <p class="text-yellow">Изображение не загружено.</p>
                            @endif
                        </div>
                    </div>
                </div>
                {!! Form::hidden('published', 0) !!}
                {!! Form::groupCheckbox('published', 1, $service->published, 'Показывать отзыв') !!}
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </div>
    </form>
@stop
