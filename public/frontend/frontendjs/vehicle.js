$(document).ready(function() {
 $('#status').change(function() {
  $('#avablitystatus').val(['']);
  getData(1);

 }).trigger('change');
 $('#avablitystatus').change(function() {
  $('#status').val(['']);
  getData(1);
 }).trigger('change');
});
$('.pagination').twbsPagination({
 totalPages: 1,
 startPage: 1,
 visiblePages: 5,
 href: false,
 loop: false,
 onPageClick: function(event, page) {
  getData(page);
 },
});

function getData(page) {
 var vehicledata = {
  page: page,
  perpage: $("#record").val(),
  vehiclestatus: $("#status").val(),
  avablitystatus: $("#avablitystatus").val(),
  list: 'true'
 }
 $.ajax({
  url: vehicle_list,
  type: 'POST',
  data: vehicledata,
  headers: {
   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  success: function(data) {
   var data = JSON.parse(data);
   $("#vehicle-list tbody").html('');
   if (data.count == 0) {
    $("#vehicle-list tbody").html('<tr><td colspan="6" style="color:red;font-weight:600">No data Found</td></tr>');
   } else {
    $("#vehicle-list tbody").html(data.html);
    if (page == 1) {
     $('.pagination').twbsPagination('destroy');
     $('.pagination').twbsPagination({
      totalPages: data.count,
      href: false,
     }).on('page', function(event, page) {
      console.log(page);
      getData(page);
     });
    }
   }
  },
  cache: false,
 });
}