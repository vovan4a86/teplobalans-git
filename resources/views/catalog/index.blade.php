@extends('template')
@section('content')
    <main>
        <!--.b-heading-->
        <div class="b-heading">
            <div class="b-heading__container container">
                <div class="b-heading__bread">
                    @include('blocks.bread')
                </div>
                <div class="b-heading__body">
                    <div class="title">{{ $h1 }}</div>
                    <div class="b-heading__text">
                        <p>Направление деятельности предприятия — производство металлоконструкций из стали и алюминия
                            для объектов дорожной инфраструктуры, объектов городского благоустройства</p>
                    </div>
                </div>
            </div>
        </div>
        @if(isset($main_catalog) && count($main_catalog))
            <!--section.s-cat.-small-->
            <section class="s-cat s-cat--small">
                <div class="s-cat__container container">
                    @include('blocks.main_catalog')
                </div>
            </section>
        @endif
    </main>
@endsection
