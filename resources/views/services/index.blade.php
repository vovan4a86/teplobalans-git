@extends('template')
@section('content')
    <!--section.s-srv(class=(servicesPage && 'is-page'))-->
    @include('pages.blocks.services', ['title' => $h1, 'class' => 'is-page'])
@stop
