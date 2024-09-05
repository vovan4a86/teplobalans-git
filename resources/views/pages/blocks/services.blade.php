<section class="s-srv {{ $class }}">
    <div class="s-srv__container container">
        <div class="title">{{ $title }}</div>
        <div class="s-srv__list">
            <!--.card-srv-->
            @foreach($services as $item)
                <div class="card-srv">
                    <div class="card-srv__body">
                        <div class="card-srv__title">{{ $item->h1 ?: $item->name }}</div>
                        <div class="card-srv__text">
                            <p>{{ $item->announce }}</p>
                        </div>
                        <div class="card-srv__foot">
                            <p>{{ $item->announce_footer }}</p>
                        </div>
                        <div class="card-srv__actions">
                            <a class="btn" href="{{ $item->url }}" title="Подробнее">
                                <span>Подробнее</span>
                            </a>
                        </div>
                    </div>
                    <!-- example sizing: 603x386-->
                    <a class="card-srv__view lazy" data-bg="{{ $item->thumb(2) }}"
                       href="{{ $item->url }}" title="{{ $item->h1 ?: $item->name }}"></a>
                </div>
            @endforeach
        </div>
    </div>
</section>