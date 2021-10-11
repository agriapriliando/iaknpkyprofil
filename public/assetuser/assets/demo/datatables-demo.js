// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable();
  $('#dataTablePhoto').DataTable({
    "columnDefs": [{
      "width": "5%", 
      "targets": 0 
    },{
      "width": "10%", 
      "targets": 1 
    }]
  });
});
