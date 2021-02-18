$(document).ready(function() {
    $('#myTable').DataTable();
});
$(function() {
    $("#joining_date").datepicker({ dateFormat: 'dd-mm-yy' });
    // $( "#joining_date" ).datepicker('show');
    $("#dob").datepicker({ dateFormat: 'dd-mm-yy' });
});