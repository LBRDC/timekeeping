
// Add Location 
$(document).on("submit","#addLocationFrm" , function() {
    e.preventDefault();

    var formData = {
        'add_LocName': $('#add_LocName').val(),
        'add_Latitude': $('#add_Latitude').val(),
        'add_Longitude': $('#add_Longitude').val(),
        'add_Radius': $('#add_Radius').val()
    };

    $.ajax({
        url: 'query/addLocationExe.php',
        type: 'POST',
        data: formData,
        success: function(response) {
            console.log(response);
            alert('Location added successfully!');
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error(textStatus, errorThrown);
            alert('An error occurred while adding the location.');
        }
    });
});