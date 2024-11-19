let mapview;

async function initMap() {
  const { Map, Circle } = await google.maps.importLibrary("maps");

  mapview = new Map(document.getElementById("mapview"), {
    center: { lat: 12.422, lng: 122.995 },
    zoom: 5,
    disableDefaultUI: true,
    gestureHandling: "none",
    keyboardShortcuts: false,
  });

  // Listen for changes on the dropdown
  $("#view_location").change(function () {
    var latitude = document.getElementById("view_Latitude").value;
    var longitude = document.getElementById("view_Longitude").value;
    var radius = document.getElementById("view_Radius").value;

    // Check if all values are missing
    if (!latitude && !longitude && !radius) {
      // If all values are missing, remove the circle and reset the view to default
      if (window.circle) {
        window.circle.setMap(null);
        window.circle = null; // Reset the circle variable
      }
      mapview.setCenter({ lat: 12.422, lng: 122.995 }); // Reset the map view to default
      mapview.setZoom(5); // Reset the zoom level to default
      return; // Exit the function early
    }

    // Remove the existing circle if there is one
    if (window.circle) {
      window.circle.setMap(null);
    }

    // Create a new circle
    var circleOptions = {
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: "green",
      fillOpacity: 0.2,
      map: mapview,
      center: { lat: parseFloat(latitude), lng: parseFloat(longitude) },
      radius: parseFloat(radius),
    };
    window.circle = new Circle(circleOptions);

    // Zoom in to street level
    mapview.setZoom(19); // Adjust the zoom level as needed
    mapview.setCenter({
      lat: parseFloat(latitude),
      lng: parseFloat(longitude),
    }); // Center the map on the circle's center
  });
}

initMap();

//ERROR
/*$(document).ready(function () {
    // Listen for changes on the select element
    $('#view_location').on('change', function() {
        var selectedOption = $(this).find('option:selected');
        var locationId = selectedOption.data('id');
        var locationStatus = selectedOption.data('status');
        var locationName = $(this).find('option:selected').text();
        document.getElementById("edit_Id1").value = locationId;
        document.getElementById("edit_Id2").value = locationId;
        document.getElementById("edit_LocName1").value = locationName;
        document.getElementById("edit_LocName2").value = locationName;
        document.getElementById("edit_Status1").value = locationStatus;
        document.getElementById("edit_Status2").value = locationStatus;
        $('#mdlWarnDisable .modal-body p b').text(locationName);
        $('#mdlWarnEnable .modal-body p b').text(locationName);
  });
});*/

document.addEventListener("DOMContentLoaded", function () {
  $(".selectpicker").selectpicker();

  function updateButtonVisibility() {
    var status = document.getElementById("view_Status").value.toLowerCase();
    var divDisable = document.getElementById("divDisable");
    var divEnable = document.getElementById("divEnable");
    var divEdit = document.getElementById("divEdit");

    if (status === "active") {
      divDisable.style.display = "block"; // Show Disable button
      divEnable.style.display = "none"; // Hide Enable button
      divEdit.style.display = "block"; // Show Edit button
    } else if (status === "inactive") {
      divDisable.style.display = "none"; // Hide Disable button
      divEnable.style.display = "block"; // Show Enable button
      divEdit.style.display = "none"; // Hide Edit button
    } else {
      divDisable.style.display = "none"; // Hide Disable button
      divEnable.style.display = "none"; // Hide Enable button
      divEdit.style.display = "none"; // Hide Edit button
    }
  }

  // Listen for changes on the dropdown
  $("#view_location").change(function () {
    var selectedOption = $(this).find("option:selected");
    var latitude = selectedOption.data("latitude");
    var longitude = selectedOption.data("longitude");
    var radius = selectedOption.data("radius");
    var status = selectedOption.data("status");

    // Update input fields
    $("#view_Latitude").val(latitude);
    $("#view_Longitude").val(longitude);
    $("#view_Radius").val(radius);
    $("#view_Status").val(status);

    // Refresh selectpicker to reflect changes
    $(".selectpicker").selectpicker("refresh");
    updateButtonVisibility();
  });

  var editButton = document.getElementById("btnEdit");
  editButton.addEventListener("click", function () {
    var selectedOption = $("#view_location").find("option:selected");
    var id = selectedOption.data("id");
    window.location.href = "?page=fields-location-edit&id=" + id;
  });
});
