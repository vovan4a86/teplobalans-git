import Splide from '@splidejs/splide';

export const projectsSlider = ({ selector, options }) => {
  const sliderSelector = document.querySelectorAll(selector);

  if (!sliderSelector) return;

  sliderSelector?.forEach(selector => {
    const slider = new Splide(selector, options);
    slider.mount();
  });
};

const sliderOptions = {
  perPage: 2,
  gap: 30,
  pagination: false,
  speed: 850,
  breakpoints: {
    768: {
      perPage: 1,
      gap: 10
    }
  }
};

projectsSlider({ selector: '[data-projects-slider]', options: sliderOptions });
