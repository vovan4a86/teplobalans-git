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
        <!--section.s-categories-->
        <section class="s-categories">
            <div class="s-categories__container container">
                <div class="s-categories__grid">
                    @foreach($category->public_children as $sub_category)
                        <div class="s-categories__item">
                            <a class="s-categories__title" href="{{ $sub_category->url }}">{{ $sub_category->name }}</a>
                            @if($sub_category->public_children)
                                <ul class="s-categories__list list-reset">
                                    @foreach($sub_category->public_children as $child)
                                        <li>
                                            <a href="{{ $child->url }}">{{ $child->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--section.b-text(x-data="{ isHidden: true }")-->
        <section class="b-text" x-data="{ isHidden: true }">
            <div class="b-text">
                <div class="b-text__container container">
                    <div class="b-text__body text-block" :class="isHidden &amp;&amp; 'is-hidden'" x-cloak="x-cloak">
                        {!! $text !!}
                    </div>
                    <div class="b-text__foot" :class="isHidden &amp;&amp; 'is-active'">
                        <button class="b-text__btn btn-reset" @click="isHidden = !isHidden"
                                :class="isHidden &amp;&amp; 'is-active'"
                                :title="isHidden ? 'Показать текст' : 'Скрыть текст'">
                            <span x-text="isHidden ? 'Подробнее' : 'Скрыть текст'">Подробнее</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="8" fill="none">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="1.7" d="m1 1 6 6 6-6"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        @include('blocks.drawing_request')
    </main>
@endsection
