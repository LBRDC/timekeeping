let map;
let circle;

async function initMap() {
    const { Map } = await google.maps.importLibrary("maps");

    map = new Map(document.getElementById("map"), {
        center: { lat: 12.422, lng: 122.995 },
        zoom: 5,
    });

    // Set the custom cursor for the map container
    const mapContainer = document.getElementById("map");
    mapContainer.style.cursor = "pointer";
    //controlUI.style.cursor = 'pointer';
    
    // Div Control
    const locateControlDiv = document.createElement("div");
    locateControlDiv.style.padding = "5px";
    locateControlDiv.style.marginBottom = "22px";
    locateControlDiv.style.textAlign = "center";
    locateControlDiv.style.cursor = "pointer";
    locateControlDiv.style.position = "absolute";
    locateControlDiv.style.top = "10px";
    locateControlDiv.style.left = "10px";
    locateControlDiv.style.zIndex = "1000";

    // Current Location Button
    const locateButton = document.createElement("button");
    locateButton.style.backgroundColor = "#fff";
    locateButton.style.border = "2px solid #fff";
    locateButton.style.borderRadius = "3px";
    locateButton.style.boxShadow = "0 2px 6px rgba(0,0,0,.3)";
    locateButton.style.color = "rgb(25,25,25)";
    locateButton.style.cursor = "pointer";
    locateButton.style.fontFamily = "Roboto,Arial,sans-serif";
    locateButton.style.fontSize = "16px";
    locateButton.style.lineHeight = "38px";
    locateButton.style.margin = "8px 0 22px";
    locateButton.style.padding = "0 5px";
    locateButton.style.textAlign = "center";
    locateButton.textContent = "Current Location";
    locateButton.title = "Click to go to current location";
    locateButton.type = "button";
    locateControlDiv.appendChild(locateButton);

    // Create the clear circle button
    const clearCircleButton = document.createElement("button");
    clearCircleButton.id = "clearCircleButton";
    clearCircleButton.style.backgroundColor = "#fff";
    clearCircleButton.style.border = "2px solid #fff";
    clearCircleButton.style.borderRadius = "3px";
    clearCircleButton.style.boxShadow = "0 2px 6px rgba(0,0,0,.3)";
    clearCircleButton.style.color = "rgb(25,25,25)";
    clearCircleButton.style.cursor = "pointer";
    clearCircleButton.style.fontFamily = "Roboto,Arial,sans-serif";
    clearCircleButton.style.fontSize = "16px";
    clearCircleButton.style.lineHeight = "38px";
    clearCircleButton.style.margin = "8px 0 22px";
    clearCircleButton.style.padding = "0 5px";
    clearCircleButton.style.textAlign = "center";
    clearCircleButton.textContent = "Clear Selection";
    clearCircleButton.title = "Click to clear selected location";
    clearCircleButton.type = "button";

    // Position the button at the bottom left of the map
    clearCircleButton.style.position = "absolute";
    clearCircleButton.style.bottom = "10px";
    clearCircleButton.style.left = "10px";
    clearCircleButton.style.zIndex = "1000"; // Ensure it's above other map elements

    // Append the button to the map container
    document.getElementById("map").appendChild(clearCircleButton);

    // Add event listener to the button
    clearCircleButton.addEventListener("click", function() {
        if (circle) {
            circle.setMap(null); // This removes the circle from the map
            circle = null; // This sets the circle variable to null
        }

        // Clear the input values
        document.getElementById("add_Latitude").value = '';
        document.getElementById("add_Longitude").value = '';
        document.getElementById("add_Radius").value = '';
    });

    //Search HERE

    map.controls[google.maps.ControlPosition.TOP_LEFT].push(locateControlDiv);

    map.addListener("click", function(event) {
        if (!circle) {
            circle = new google.maps.Circle({
                center: event.latLng,
                radius: 50,
                map: map,
                editable: true,
                fillColor: "green",
                fillOpacity: 0.2,
            });
            addRadiusChangeListener(circle);
            addCenterChangeListener(circle);
        } else {
            circle.setCenter(event.latLng);
        }
        updateInputFields(event.latLng, circle.getRadius());
    });

    locateButton.addEventListener("click", function() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                const pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude,
                };

                map.setCenter(pos);
                map.setZoom(15);
                updateInputFields(pos, circle ? circle.getRadius() : 50);
            }, function() {
                alert("Location access denied.");
            });
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    });
}

function updateInputFields(latLng, radius) {
    document.getElementById("add_Latitude").value = latLng.lat();
    document.getElementById("add_Longitude").value = latLng.lng();
    document.getElementById("add_Radius").value = radius;
}

function addRadiusChangeListener(circle) {
    circle.addListener('radius_changed', function() {
        updateInputFields(circle.getCenter(), circle.getRadius());
    });
}

function addCenterChangeListener(circle) {
    circle.addListener('center_changed', function() {
        updateInputFields(circle.getCenter(), circle.getRadius());
    });
}

initMap();


// API SETUP Required
    /*const input = document.getElementById("search_Location");
    const searchBox = new google.maps.places.SearchBox(input);

    let markers = [];

    // Listen for the event fired when the user selects a prediction and retrieve
    // more details for that place.
    searchBox.addListener("places_changed", () => {
        const places = searchBox.getPlaces();

        if (places.length == 0) {
        return;
        }

    // Clear out the old markers.
    markers.forEach((marker) => {
      marker.setMap(null);
    });
    markers = [];

    // For each place, get the icon, name and location.
    const bounds = new google.maps.LatLngBounds();

    places.forEach((place) => {
        if (!place.geometry || !place.geometry.location) {
          console.log("Returned place contains no geometry");
          return;
        }
  
        const icon = {
          url: place.icon,
          size: new google.maps.Size(71, 71),
          origin: new google.maps.Point(0, 0),
          anchor: new google.maps.Point(17, 34),
          scaledSize: new google.maps.Size(25, 25),
        };
  
        // Create a marker for each place.
        markers.push(
          new google.maps.Marker({
            map,
            icon,
            title: place.name,
            position: place.geometry.location,
          }),
        );
        if (place.geometry.viewport) {
          // Only geocodes have viewport.
          bounds.union(place.geometry.viewport);
        } else {
          bounds.extend(place.geometry.location);
        }
      });
      map.fitBounds(bounds);
    });*/