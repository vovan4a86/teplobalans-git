@extends('template')
@section('content')
    <div class="container" style="margin-bottom: var(--section-indent)">
        <div class="text-block">
            <h1>{{ $h1 }}</h1>
            <div class="s-vacancy__body">
                <div class="s-vacancy__points">
                    <div class="s-vacancy__point">
                                <span class="s-vacancy__point-icon lazy"
                                      data-bg="/static/images/common/ico_brirfcase.svg"></span>
                        <span class="s-vacancy__point-label">{{ $item->experience }}</span>
                    </div>
                    <div class="s-vacancy__point">
                        <!--data-bg=src + (item.remote ? "ico_home.svg" : "ico_office.svg")-->
                        <span class="s-vacancy__point-icon lazy"
                              data-bg="/static/images/common/{{ $item->place == 'office' ? 'ico_office' : 'ico_home' }}.svg"></span>
                        <!--item.remote ? "Удалённая работа" : "Офис"-->
                        <span class="s-vacancy__point-label">{{ $item->place == 'office' ? 'Офис' : 'Удаленная работа' }}</span>
                    </div>
                    <div class="s-vacancy__point">
                                <span class="s-vacancy__point-icon lazy"
                                      data-bg="/static/images/common/ico_rub.svg"></span>
                        <span class="s-vacancy__point-label">{{ $item->salary }}</span>
                    </div>
                </div>
            </div>

            {!! $text !!}

        </div>
    </div>
@stop
