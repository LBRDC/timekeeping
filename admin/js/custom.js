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