import Splide from '@splidejs/splide';

export const sertSlider = ({ selector, options }) => {
  const sliderSelector = document.querySelectorAll(selector);

  if (!sliderSelector) return;

  sliderSelector?.forEach(selector => {
    const slider = new Splide(selector, options);
    slider.mount();
  });
};

const sliderOptions = {
  perPage: 4,
  gap: 30,
  pagination: false,
  speed: 850,
  breakpoints: {
    1080: {
      perPage: 3,
      gap: 10
    },
    600: {
      perPage: 2,
      gap: 10
    },
    480: {
      perPage: 1,
      gap: 10
    }
  }
};

sertSlider({ selector: '[data-sert-slider]', options: sliderOptions });
