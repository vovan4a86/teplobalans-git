@extends('admin::template')

@section('scripts')
    <script type="text/javascript" src="/adminlte/interface_prices.js"></script>
@stop

@section('page_name')
    <h1>
        Раздел прайса
        <small>{{ $section->id ? 'Редактировать' : 'Новый' }}</small>
    </h1>
@stop

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="{{ route('admin.prices') }}">Раздел прайса</a></li>
        <li class="active">{{ $section->id ? 'Редактировать' : 'Новый' }}</li>
    </ol>
@stop

@section('content')
    <form action="{{ route('admin.prices.save') }}" onsubmit="return sectionSave(this, event)">
        <input type="hidden" name="id" value="{{ $section->id }}">

        <div class="box box-solid">
            <div class="box-body">
                {!! Form::groupText('name', $section->name, 'Имя') !!}
                {!! Form::hidden('published', 0) !!}
                {!! Form::groupCheckbox('published', 1, $section->published, 'Показывать раздел') !!}
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </div>
    </form>
@stop
