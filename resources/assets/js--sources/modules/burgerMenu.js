import $ from 'jquery';

export const burgerMenu = () => {
  const $burger = $('[data-burger]');
  const $menu = $('[data-burger-menu]');
  const $menuClose = $('[data-burger-menu-close]');
  const $menuDropdown = $('[data-burger-dropdown]');
  const $submenu = $('[data-burger-submenu]');
  const $body = $('body');

  $burger.on('click', function () {
    openMenu();
  });

  $menuClose.on('click', function () {
    closeMenu();
  });

  $menuDropdown.on('click', function (e) {
    e.preventDefault();
    closeSubmenus();

    if ($(this).siblings($submenu).is(':visible')) {
      $(this).removeClass('is-active');
      $(this).siblings($submenu).slideUp('fast');
    } else {
      $(this).addClass('is-active');
      $(this).siblings($submenu).slideDown('fast');
    }
  });

  const openMenu = () => {
    $menu.addClass('is-active');
    $body.addClass('no-scroll');
  };

  const closeMenu = () => {
    $menu.removeClass('is-active');
    $body.removeClass('no-scroll');
  };

  function closeSubmenus() {
    $submenu.each(function () {
      $(this).slideUp('fast');
    });

    $menuDropdown.each(function () {
      $(this).removeClass('is-active');
    });
  }
};

burgerMenu();
