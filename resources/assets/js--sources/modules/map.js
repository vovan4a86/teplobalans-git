export const initMap = (id, lat, lon, zoom, text) => {
  ymaps.ready(function () {
    const myMap = new ymaps.Map(
        id,
        {
          center: [lat, lon],
          zoom: zoom,
          controls: ['zoomControl']
        },
        {
          searchControlProvider: 'yandex#search'
        }
      ),
      myPlacemark = new ymaps.Placemark(
        myMap.getCenter(),
        {
          hintContent: text,
          balloonContent: text
        },
        {
          iconLayout: 'default#image',
          iconImageHref: 'static/images/common/ico_pin.svg',
          iconImageSize: [33, 34],
          iconImageOffset: [-16, -24]
        }
      );

    myMap.geoObjects.add(myPlacemark);
    myMap.behaviors.disable('scrollZoom');

    if (window.innerWidth < 600) myMap.behaviors.disable('drag');
  });
};

const maps = document.querySelectorAll('[data-map]');

maps?.forEach(map => {
  if (map) {
    const latitude = map.dataset.lat;
    const longitude = map.dataset.long;
    const label = map.dataset.hint;
    const id = map.id;
    initMap(id, latitude, longitude, 17, label);
  }
});
