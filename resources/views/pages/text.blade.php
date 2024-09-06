@extends('template')
@section('content')
    <div class="container" style="margin-bottom: var(--section-indent)">
        <div class="text-block">
            <h1>{{ $h1 }}</h1>
            {!! $text !!}
        </div>
    </div>
@stop
