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

    <form action="{{ route('admin.prices.saveTable') }}" onsubmit="saveTable(this, event)">
        <div class="box box-solid box-body">
            <input type="hidden" name="id" value="{{ Request::get('id') }}">
            <div class="rows">
                @foreach($section->items as $param)
                    <div class="row row-params">
                        {!! Form::hidden('params[id][]', $param->id) !!}
                        <div style="width: 50px;">
                            <i class="fa fa-ellipsis-v"></i>
                            <i class="fa fa-ellipsis-v"></i>
                        </div>
                        {!! Form::text('params[name][]',$param->name, ['class'=>'form-control f-row', 'placeholder' => 'Название']) !!}
                        {!! Form::text('params[value][]',$param->price, ['class'=>'form-control s-row', 'placeholder' => 'Цена']) !!}
                        <div style="width: 100px;">
                            <a href="#" onclick="delRow(this, event)" class="text-red">
                                <i class="fa fa-trash"></i>Удалить</a>
                        </div>
                    </div>
                @endforeach
                <div class="row hidden">
                    {!! Form::hidden('params[id][]', '') !!}
                    <div style="width: 50px;">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                    </div>
                    {!! Form::text('params[name][]','', ['class'=>'form-control f-row', 'placeholder' => 'Название без цены = заголовок секции']) !!}
                    {!! Form::text('params[value][]','', ['class'=>'form-control s-row', 'placeholder' => 'Цена']) !!}
                    <div style="width: 100px;">
                        <a href="#" onclick="delRow(this, event)" class="text-red">
                            <i class="fa fa-trash"></i>Удалить</a>
                    </div>
                </div>
            </div>
            @if(Request::get('id') > 0)
                <div class="footer">
                    <button class="btn btn-sm" href="#" onclick="addRow(this, event)">Добавить</button>
                    <button class="btn btn-sm btn-success" type="submit">Сохранить</button>
                </div>
            @else
                <div>Необходимо выбрать раздел.</div>
            @endif
            <script type="text/javascript">
                $(".rows").sortable().disableSelection();
            </script>
            <style>
                .rows .row {
                    margin: 10px;
                    /*padding: 10px;*/
                }

                .rows .row:nth-child(odd) {
                    /*background: #d2d6de !important*/
                }

                .row-params {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                }

                .f-row {
                    width: 90%;
                }

                .s-row {
                    width: 10%;
                }

                .row-params input {
                    margin-right: 15px;
                }

                .footer {
                    padding: 10px 0;
                    border-top: 1px dotted grey;
                    margin-top: 20px;
                }
            </style>
        </div>
    </form>
@stop
