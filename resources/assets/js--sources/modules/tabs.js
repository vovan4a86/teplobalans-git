export const tabs = ({ tabSelector, tabLink, tabView }) => {
  const tabsContainer = document.querySelectorAll(tabSelector);

  tabsContainer?.forEach(tabs =>
    tabs.addEventListener('click', function (e) {
      const target = e.target;

      if (target.dataset.tabsOpen) {
        const targetView = target.dataset.tabsOpen;
        const views = tabs.querySelectorAll(tabView);
        const links = tabs.querySelectorAll(tabLink);

        if (views && links) {
          // set active tab link
          for (let i = 0; i < links.length; i++) {
            links[i].classList.remove('is-active');
            target.classList.add('is-active');
          }

          // set active tab view
          for (let i = 0; i < views.length; i++) {
            views[i].classList.remove('is-active');
            views[i].dataset.tabsView === targetView && views[i].classList.add('is-active');
          }
        }
      }
    })
  );
};

tabs({
  tabSelector: '[data-tabs]',
  tabLink: '[data-tabs-open]',
  tabView: '[data-tabs-view]'
});
