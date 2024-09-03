import Splide from '@splidejs/splide';

export const heroSlider = ({ selector, options }) => {
  const sliderSelector = document.querySelector(selector);

  if (!sliderSelector) return;

  const slider = new Splide(selector, options);
  slider.mount();
};

const sliderOptions = {
  type: 'fade',
  speed: 600,
  pagination: false,
  autoplay: true,
  classes: {
    arrows: 'splide__arrows hero__arrows',
    arrow: 'splide__arrow hero__arrow',
    prev: 'splide__arrow--prev hero__arrow--prev',
    next: 'splide__arrow--next hero__arrow--next'
  }
};

heroSlider({ selector: '[data-hero-slider]', options: sliderOptions });
