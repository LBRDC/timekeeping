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

    function updateDateTime() {
      $.ajax({
          url: 'query/dateTimeExe.php',
          type: 'GET',
          dataType: 'json',
          success: function(data) {
              $('#currentDate').text(data.date);
              $('#currentTime').text(data.time);
              $('#currentDay').text(data.day);
          },
          error: function(xhr, status, error) {
              console.error('Error fetching date, time, and day:', error);
          }
      });
    }
    updateDateTime();
    setInterval(updateDateTime, 1000);
});