
// Add Location 
$(document).on("submit","#addLocationFrm" , function(event) {
    event.preventDefault();

    var formData = {
        'add_LocName': $('#add_LocName').val(),
        'add_Latitude': $('#add_Latitude').val(),
        'add_Longitude': $('#add_Longitude').val(),
        'add_Radius': $('#add_Radius').val()
    };

    // Validate formData
    var isValid;
    $.each(formData, function(key, value) {
        if (value === '') {
            isValid = false;
            return false; // Break the loop
        } else {
            isValid = true;
        }
    });

    if (!isValid) {
        Swal.fire({
            icon: "warning",
            title: "Incomplete",
            text: "Please fill in all fields.",
        });
        return; // Exit the function if formData is not valid
    }

    console.log("VALIDATED");

    $.ajax({
        url: 'query/add_location_Exe.php',
        type: 'POST',
        dataType : "json",
        data: formData,
        success: function(response) {
            if (response.res == "success") {
                Swal.fire({
                    icon: "success",
                    title: "Success",
                    text: response.msg + " added.",
                    timer: 5000,
                    timerProgressBar: true,
                }).then(function() {
                    window.location.href = 'home.php?page=fields-location';
                });
            } else if (response.res == "exists") {
                Swal.fire({
                    icon: "error",
                    title: "Failed",
                    text: response.msg + "already exists.",
                });
            } else if (response.res == "failed") {
                Swal.fire({
                    icon: "error",
                    title: "Failed",
                    text: "An error occurred while adding location. Please try again.",
                });
            } else if (response.res == "incomplete") {
                Swal.fire({
                    icon: "warning",
                    title: "Incomplete",
                    text: "Please fill in all fields.",
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "System error occurred.",
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('A script error occured. Please try again.');
            console.error(textStatus, errorThrown);
        }
    });
});