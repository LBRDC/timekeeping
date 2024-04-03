
// fields-location-add ADD 
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
                    showConfirmButton: false,
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


// fields-location-edit EDIT 
$(document).on("submit","#editLocationFrm" , function(event) {
    event.preventDefault();

    var formData = {
        'edit_id': $('#edit_id').val(),
        'edit_LocName': $('#edit_LocName').val(),
        'edit_Latitude': $('#edit_Latitude').val(),
        'edit_Longitude': $('#edit_Longitude').val(),
        'edit_Radius': $('#edit_Radius').val(),
        'edit_Status': $('#edit_Status').val()
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
    } else {
        Swal.fire({
            title: "Update?",
            text: "Are you sure you want to edit this location?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "YES"
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'query/edit_location_Exe.php',
                    type: 'POST',
                    dataType : "json",
                    data: formData,
                    success: function(response) {
                        if (response.res == "success") {
                            Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: response.msg + " updated.",
                                timer: 5000,
                                timerProgressBar: true,
                            }).then(function() {
                                window.location.href = 'home.php?page=fields-location';
                            });
                        } else if (response.res == "norecord") {
                            Swal.fire({
                                icon: "error",
                                title: "Failed",
                                text: response.msg + "does not exist.",
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
            }
          });
    }
});


// fields-location EDIT STATUS ERROR
/*$(document).on("submit","#editLocStatusFrm" , function(event) {
    event.preventDefault();
    
    var loc_Id = $('#edit_Id1').val() || $('#edit_Id2').val();
    var edit_LocName = $('#edit_LocName1').val() || $('#edit_LocName2').val();
    var edit_Status = $('#edit_Status1').val() || $('#edit_Status2').val();
    var formData = {
        'edit_Id': loc_Id,
        'edit_LocName': edit_LocName,
        'edit_Status': edit_Status
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
            text: "Missing fields.",
        });
        return; // Exit the function if formData is not valid
    }

    console.log("VALIDATED");

    $.ajax({
        url: 'query/edit_locationStatus_Exe.php',
        type: 'POST',
        dataType : "json",
        data: formData,
        success: function(response) {
            if (response.res == "disable") {
                Swal.fire({
                    icon: "success",
                    title: "Success",
                    text: response.msg + " disabled.",
                    showConfirmButton: false,
                    timer: 5000,
                    timerProgressBar: true,
                }).then(function() {
                    window.location.href = 'home.php?page=fields-location';
                });
            } else if (response.res == "enable") {
                Swal.fire({
                    icon: "success",
                    title: "Success",
                    text: response.msg + " enabled.",
                });
            } else if (response.res == "failed") {
                Swal.fire({
                    icon: "error",
                    title: "Failed",
                    text: "An error occurred while updating status. Please try again.",
                });
            } else if (response.res == "incomplete") {
                Swal.fire({
                    icon: "warning",
                    title: "Incomplete",
                    text: "Missing fields.",
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
}); */