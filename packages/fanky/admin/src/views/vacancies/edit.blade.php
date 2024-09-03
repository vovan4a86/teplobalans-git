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
                {!! Form::groupText('name', $vacancy->name, 'Имя') !!}
                {!! Form::groupText('schedule', $vacancy->schedule, 'График работы') !!}
                {!! Form::groupText('email', $vacancy->email, 'Email') !!}
                {!! Form::groupText('phone', $vacancy->phone, 'Телефон') !!}
                {!! Form::groupText('salary', $vacancy->salary, 'Зарплата') !!}
                {!! Form::groupRichtext('text', $vacancy->text, 'Текст') !!}

                {!! Form::hidden('published', 0) !!}
                {!! Form::groupCheckbox('published', 1, $vacancy->published, 'Показывать вакансию') !!}
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </div>
    </form>
@stop
