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
        @if($items)
            <section class="s-prods">
                <div class="s-prods__container container">
                    <div class="s-prods__grid">
                        @foreach($items as $item)
                            @include('catalog.product_item')
                        @endforeach
                    </div>
                    <div class="s-prods__controls">
                        <div class="s-prods__pagination">
                            @include('paginations.with_pages', ['paginator' => $items])
                        </div>
                        <div class="s-prods__load">
                            @include('paginations.load_more', ['paginator' => $items])
                        </div>
                    </div>
                </div>
            </section>
        @endif

        @include('blocks.drawing_request')

        @include('blocks.certificates')
    </main>
@endsection
