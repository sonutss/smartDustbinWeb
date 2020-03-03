$(".select2").select2();
$(function() {
 $('#modaldemo8').on('hidden.bs.modal', function(e) {
  $(this).removeClass(function(index, className) {
   return (className.match(/(^|\s)effect-\S+/g) || []).join(' ');
  });
 });
});
$('#record').on('select2:select', function(e) {
 // Do something
 getData(1)
 // alert($(this).val());
});
var DriverID = 0;

function openVehicleModel(page, driverId) {
 var effect = $(this).attr('data-effect');
 $('#modaldemo8').addClass(effect);
 $('#modaldemo8').modal('show');
 var vehicle = {
  page: page,
  perpage: 5,
  list: 'true'
 }
 DriverID = driverId;
 $.ajax({
  url: vehicle_assign,
  type: 'POST',
  data: vehicle,
  headers: {
   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  success: function(data) {
   var data = JSON.parse(data);
   $("#assign-vehicle tbody").html('');
   if (data.count == 0) {
    $("#assign-vehicle tbody").html('<tr><td colspan="6" style="color:red;font-weight:600">No data Found</td></tr>');
   } else {
    $("#assign-vehicle tbody").html(data.html);
    if (page == 1) {
     $('#pagination1').twbsPagination('destroy');
     $('#pagination1').twbsPagination({
      totalPages: data.count,
      href: false,
     }).on('page', function(event, page) {
      openVehicleModel(page, driverId);
     });
    }
   }
  },
  cache: false,
 });
}

function assigning() {
 var params = {
  vehicleId: $("input[name='vehicle_id']:checked").val(),
  DriverId: DriverID
 }
 $.ajax({
  url: remappedVehicledriver,
  type: 'POST',
  headers: {
   'Access-Control-Allow-Origin': '*',
   'Authorization': $("#tocken").val()
  },
  data: JSON.stringify(params),
  async: false,
  success: function(response) {
   $("#submit").attr("disabled", false);
   console.log("response", response);
   if (response.success == true) {
    params = {};
    swal("Success", response.message, "success");
    setTimeout(function() {

     window.location.href = driver_list;
    }, 5000);
   } else {
    swal({
     title: "Warnings",
     text: response.message,
     type: "warning",
     showCancelButton: true,
     confirmButtonColor: "#DD6B55",
    });
   }
  },
  error: function(data) {
   $("#submit").attr("disabled", false);
   var rr = $.parseJSON(data.responseText);
   if (rr.success == false) {
    swal({
     title: "Warnings",
     text: rr.message,
     type: "warning",
     showCancelButton: true,
     confirmButtonColor: "#DD6B55",
    });
   }
  },
  cache: false,
  contentType: 'application/json',
  processData: false
 });
}
$('#status').change(function() {
 $('#avablitystatus').val(['']);
 getData(1);
}).trigger('change');
$('#avablitystatus').change(function() {
 $('#status').val(['']);
 getData(1);
}).trigger('change');

$('#pagination').twbsPagination({
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
 var driverdata = {
  page: page,
  perpage: $("#record").val(),
  driverstatus: $("#status").val(),
  avablitystatus: $("#avablitystatus").val(),
  list: 'true'
 }
 $.ajax({
  url: driver_list,
  type: 'POST',
  data: driverdata,
  headers: {
   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  success: function(data) {
   var data = JSON.parse(data);
   $("#vehicle-list tbody").html('');
   if (data.count == 0) {
    $("#driver-list tbody").html('<tr><td colspan="6" style="color:red;font-weight:600">No data Found</td></tr>');
   } else {
    $("#driver-list tbody").html(data.html);
    if (page == 1) {
     $('#pagination').twbsPagination('destroy');
     $('#pagination').twbsPagination({
      totalPages: data.count,
      href: false,
     }).on('page', function(event, page) {
      getData(page);
     });
    }
   }
  },
  cache: false,
 });
}

function updateStatus(vid, status) {
 var parms = {
  driverID: vid,
  status1: status
 }
 $.ajax({
  url: postdata + 'driverStatusChange',
  type: 'POST',
  data: JSON.stringify(parms),
  async: false,
  headers: {
   'Access-Control-Allow-Origin': '*',
   'Authorization': $("#tocken").val()
  },
  success: function(response) {
   $("#submit").attr("disabled", false);
   if (response.success == true) {
    swal("Success", response.result, "success");
    setTimeout(function() {
     window.location.href = driver_list;
    }, 5000);
   } else {
    swal({
     title: "Warnings",
     text: "Vehicle Not Assigned !!",
     type: "warning",
     showCancelButton: true,
     confirmButtonColor: "#DD6B55",
    });
   }
  },
  error: function(data) {
   $("#submit").attr("disabled", false);
   var rr = $.parseJSON(data.responseText);
   if (rr.success == false) {
    swal({
     title: "Warnings",
     text: rr.message,
     type: "warning",
     showCancelButton: true,
     confirmButtonColor: "#DD6B55",
    });
   }
  },
  cache: false,
  contentType: 'application/json',
  processData: false
 });
}