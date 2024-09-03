import Splide from '@splidejs/splide';

export const clientsSlider = ({ selector, options }) => {
  const sliderSelector = document.querySelector(selector);

  if (!sliderSelector) return;

  const slider = new Splide(selector, options);
  slider.mount();
};

const sliderOptions = {
  perPage: 5,
  gap: 30,
  pagination: false,
  speed: 850,
  breakpoints: {
    1080: {
      perPage: 3,
      gap: 10
    },
    768: {
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

clientsSlider({ selector: '[data-clients-slider]', options: sliderOptions });
