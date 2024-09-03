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
                </div>
            </div>
        </div>
        <!--section.projects-->
        <section class="projects">
            <div class="projects__container container">
                @if(count($projects))
                    <div class="projects__list">
                        @foreach($projects as $item)
                            @include('projects.project_item')
                        @endforeach
                    </div>
                    <div class="projects__actions">
                        @include('paginations.more_projects', ['paginator' => $projects])
                    </div>
                @endif
            </div>
        </section>
    </main>
@stop
