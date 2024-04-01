let map;
let circle;

async function initMap() {
    const { Map, Circle } = await google.maps.importLibrary("maps");

    map = new Map(document.getElementById("map"), {
        center: { lat: 12.422, lng: 122.995 },
        zoom: 5,
    });

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
