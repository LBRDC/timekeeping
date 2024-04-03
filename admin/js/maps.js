let mapview;

async function initMap() {
  const { Map } = await google.maps.importLibrary("maps");

  mapview = new Map(document.getElementById("mapview"), {
    center: { lat: 12.422, lng: 122.995 },
    zoom: 5,
    disableDefaultUI: true,
    gestureHandling: 'none',
    keyboardShortcuts: false,
  });
}

initMap();
