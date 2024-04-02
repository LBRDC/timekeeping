$(document).ready(function () {
    $('#dataTable').DataTable(); // ID From dataTable 
    $('#dataTableHover').DataTable(); // ID From dataTable with Hover

    //Datepicker
    $('#datepicker-year .input-group.date').datepicker({
        startView: 2,
        format: 'mm/dd/yyyy',        
        autoclose: true,     
        todayHighlight: true,  
        clearBtn: true,
      }); 
});


//Check Session
$(window).on('load', function() {
  $.ajax({
    url: 'query/session.php',
    type: 'POST',
    dataType: "json",
    success: function(response) {
        if (response.res == "valid") {
            // Handle valid response here
            //alert('User Valid.');
        } else if (response.res == "invalid") {
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "Please Login.",
            }).then(function() {
                window.location.href = '/';
            });
        } else {
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "System error occurred. Please login.",
            }).then(function() {
              window.location.href = '/';
          });
        }
    },
    error: function(jqXHR, textStatus, errorThrown) {
        submitButton.prop('disabled', false);

        alert('An error occurred with the session.');
        console.error(textStatus, errorThrown);
        window.location.href = '/';
    }
  });   
});