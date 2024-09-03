<div class="s-build__gallery splide" aria-label="{{ $label }}"
     data-gallery-slider="data-gallery-slider">
    <div class="s-build__track splide__track">
        <ul class="s-build__list splide__list">
            @foreach($items as $item)
                <li class="s-build__slide splide__slide">
                    <a class="s-build__lightbox" href="{{ S::fileSrc($item) }}"
                       data-fancybox="{{ $label }}" data-caption="{{ $label }}" title="{{ $label }}">
                        <img class="s-build__gallery-view" src="{{ S::fileSrc($item) }}"
                             width="424" height="284" alt="{{ $label }}" loading="lazy"/>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>