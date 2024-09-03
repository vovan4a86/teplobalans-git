import Swiper, { Pagination, EffectFade, Lazy, Navigation } from 'swiper';
import { LazyInstance } from './lazyLoading';

export const mainSlider = ({ slider, pagination }) => {
  new Swiper(slider, {
    modules: [Pagination, EffectFade, Lazy],
    fadeEffect: { crossFade: true },
    effect: 'fade',
    lazy: true,
    pagination: {
      el: pagination,
      clickable: true
    }
  });
};

export const reviewsSlider = ({ slider, navigationNext }) => {
  new Swiper(slider, {
    modules: [Navigation, Lazy],
    slidesPerView: 1.3,
    centeredSlides: false,
    spaceBetween: 10,
    lazy: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false
    },
    navigation: {
      nextEl: navigationNext
    },
    speed: 600,
    breakpoints: {
      600: {
        slidesPerView: 1.3,
        spaceBetween: 20,
        centeredSlides: false
      },
      810: {
        slidesPerView: 2.2,
        spaceBetween: 10,
        centeredSlides: false
      },
      1080: {
        slidesPerView: 1.3,
        spaceBetween: 30,
        centeredSlides: false
      },
      1280: {
        slidesPerView: 2.2,
        spaceBetween: 30,
        centeredSlides: false
      },
      1440: {
        slidesPerView: 2.4,
        spaceBetween: 30,
        centeredSlides: false
      }
    }
  });
};

reviewsSlider({
  slider: '[data-reviews]',
  navigationNext: '[data-review-next]'
});
