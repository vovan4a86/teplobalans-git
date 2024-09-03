@extends('template')
@section('content')
    <main>
        <!--.b-heading-->
        <div class="b-heading">
            <div class="b-heading__container container">
                <div class="b-heading__bread">
                    @include('blocks.bread')
                </div>
            </div>
        </div>
        <!--section.project-->
        <section class="project">
            <div class="project__container container">
                <div class="project__grid">
                    <div class="project__col">
                        <div class="project__badge">
                            <!-- class="is-white bordered"-->
                            <!--.b-label-->
                            @if($project->place)
                                <div class="b-label is-white bordered">
                                    <div class="b-label__wrapper">
                                        <div class="b-label__icon lazy"
                                             data-bg="/static/images/common/ico_city.svg"></div>
                                    </div>
                                    <div class="b-label__body">{{ $project->place }}</div>
                                </div>
                            @endif
                        </div>
                        <div class="project__title">{{ $name }}</div>
                        <div class="project__text text-block">
                            {!! $text !!}
                        </div>
                    </div>
                    <div class="project__col">
                        <img class="project__preview" src="{{ $project->thumb(2) }}" width="635" height="456"
                             alt="{{ $name }}" loading="lazy"/>
                    </div>
                </div>
            </div>
            @if(count($images))
                <div class="project__slider">
                    <div class="project__gallery splide" aria-label="Приморье"
                         data-project-slider="data-project-slider">
                        <div class="project__track splide__track">
                            <ul class="project__list splide__list">
                                @foreach($images as $image)
                                    <li class="project__slide splide__slide">
                                        <a class="project__lightbox" href="{{ $image->image_src }}"
                                           data-fancybox="{{ $image->name ?: $project->name }}"
                                           data-caption="{{ $image->name ?: $project->name }}"
                                           title="{{ $image->name ?: $project->name }}">
                                            <img class="project__view" src="{{ $image->thumb(2) }}" width="643"
                                                 height="460" alt="{{ $image->name ?: $project->name }}"
                                                 loading="lazy"/>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
            <div class="project__pages container">
                <a class="btn btn--accent" href="{{ route('projects') }}" title="Назад к списку">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                              d="M15 9H4M5 12 2 9l3-3"/>
                    </svg>
                    <span>Назад к списку</span>
                </a>
                @if($next_project)
                    <a class="btn btn--accent btn--outlined" href="{{ $next_project->url }}" title="Следующий проект">
                        <span>Следующий проект</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="12" fill="none">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="1.7"
                                  d="M1 6h11M11 9l3-3-3-3"/>
                        </svg>
                    </a>
                @endif
            </div>
        </section>
    </main>
@stop
