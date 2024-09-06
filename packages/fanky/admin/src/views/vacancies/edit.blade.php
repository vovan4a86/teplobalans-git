@extends('admin::template')

@section('scripts')
    <script type="text/javascript" src="/adminlte/interface_vacancies.js"></script>
@stop

@section('page_name')
    <h1>
        Вакансии
        <small>{{ $vacancy->id ? 'Редактировать' : 'Новая' }}</small>
    </h1>
@stop

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="{{ route('admin.vacancies') }}">Вакансии</a></li>
        <li class="active">{{ $vacancy->id ? 'Редактировать' : 'Новая' }}</li>
    </ol>
@stop

@section('content')
    <form action="{{ route('admin.vacancies.save') }}" onsubmit="return vacancySave(this, event)">
        <input type="hidden" name="id" value="{{ $vacancy->id }}">

        <div class="box box-solid">
            <div class="box-body">
                {!! Form::groupText('title', $vacancy->title, 'Должность') !!}
                {!! Form::groupText('announce', $vacancy->announce, 'Анонс') !!}
                {!! Form::groupText('experience', $vacancy->experience, 'Опыт работы') !!}
                {!! Form::groupSelect('place', ['office' => 'Офис', 'home' => 'Удаленная работа'], $vacancy->place, 'Место работы') !!}
                {!! Form::groupText('salary', $vacancy->salary, 'Зарплата') !!}
                {!! Form::groupRichtext('text', $vacancy->text, 'Текст') !!}

                <div class="form-group" style="display: flex; column-gap: 30px;">
                    <div>
                        <label for="article-image">Изображение (430x260)</label>
                        <input id="article-image" type="file" name="image" value=""
                               onchange="return vacancyImageAttache(this, event)">
                        <div id="article-image-block">
                            @if ($vacancy->image)
                                <img class="img-polaroid"
                                     src="{{ $vacancy->image_src }}" width="200"
                                     data-image="{{ $vacancy->image_src }}"
                                     onclick="return popupImage($(this).data('image'))" alt="image">
                                <a class="images_del"
                                   href="{{ route('admin.vacancies.delImage', [$vacancy->id]) }}"
                                   onclick="return vacancyImageDel(this, event)">
                                    <span class="glyphicon glyphicon-trash text-red"></span>
                                </a>
                            @else
                                <p class="text-yellow">Изображение не загружено.</p>
                            @endif
                        </div>
                    </div>
                </div>

                {!! Form::hidden('published', 0) !!}
                {!! Form::groupCheckbox('published', 1, $vacancy->published, 'Показывать вакансию') !!}
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </div>
    </form>
@stop
