@extends('template')
@section('content')
    <section class="s-price">
        <div class="s-price__container container">
            <div class="s-price__heading">
                <div class="title">{{ $h1 }}</div>
            </div>
            <div class="s-price__tabs tabs" data-tabs="data-tabs">
                <div class="s-price__nav tabs__nav">
                    @foreach($all_tabs as $tab_name => $tab_values)
                        <button class="s-price__btn btn-reset tabs__link
                            {{ $loop->first ? 'is-active' : '' }}"
                                data-tabs-open="tab-{{ $loop->iteration }}"
                                aria-label="Открыть прайс index">{{ $tab_name }}
                        </button>
                    @endforeach
                </div>
                <div class="s-price__views tabs__views">
                    @foreach($all_tabs as $tab_name => $tab_values)
                        <div class="s-price__view tabs__view
                            {{ $loop->first ? 'is-active' : '' }}"
                             data-tabs-view="tab-{{ $loop->iteration }}">
                            <div class="s-price__view-content">
                                @foreach($tab_values as $section_name => $section_values)
                                    <div class="s-price__item">
                                        @if($section_name)
                                            <div class="s-price__title">{{ $section_name }}</div>
                                        @endif
                                        @if(count($section_values))
                                            <div class="s-price__table">
                                            <table class="data-table">
                                                <thead>
                                                <tr>
                                                    <th>Наименование</th>
                                                    <th>Цена, ₽ (без НДС)</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($section_values as $i => $vals)
                                                        <tr>
                                                            <td>{{ $vals['name'] }}</td>
                                                            <td>{{ $vals['price'] }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@stop