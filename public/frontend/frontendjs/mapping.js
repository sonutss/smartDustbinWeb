$('.pagination').twbsPagination({
 totalPages: 1,
 startPage: 1,
 visiblePages: 5,
 href: false,
 loop: false,
 onPageClick: function(event, page) {
  getData(page);
  driverList(page);
 },
});

function getData(page) {
 var vehicledata = {
  page: page,
  perpage: '10',
  list: 'true'
 }
 $.ajax({
  url: driver_vehicle_mapping,
  type: 'POST',
  data: vehicledata,
  headers: {
   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  success: function(data) {
   var data = JSON.parse(data);
   //console.log(data);return false; 
   $("#vehicle-list").html('');
   if (data.count == 0) {
    $("#vehicle-list").html('<tr><td colspan="6" style="color:red;font-weight:600">No data Found</td></tr>');
   } else {
    $("#vehicle-list").html(data.html);
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

function driverList(page) {
 var vehicledata = {
  page: page,
  perpage: '10',
  list: 'true'
 }
 $.ajax({
  url: driver_not_assign,
  type: 'POST',
  data: vehicledata,
  headers: {
   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  success: function(data) {
   var data = JSON.parse(data);
   $("#driver-list").html('');
   if (data.count == 0) {
    $('#assign').css("display", "none");
    $("#driver-list").html('<tr><td colspan="6" style="color:red;font-weight:600">No data Found</td></tr>');
   } else {
    $("#driver-list").html(data.html);
    if (page == 1) {
     $('.pagination').twbsPagination('destroy');
     $('.pagination').twbsPagination({
      totalPages: data.count,
      href: false,
     }).on('page', function(event, page) {
      console.log(page);
      driverList(page);
     });
    }
   }
  },
  cache: false,
 });
}
var obj = {};

function right_slide(thiss) {
 var this_id = $(thiss).data('val');
 obj.vehicleId = this_id;
 $('body').addClass('show-right');
 $('body').removeClass('show-left');
}

function cancel(thiss) {
 var this_id = $(thiss).data('val');
 obj.whareId = this_id;
 $('body').removeClass('show-right');
 $('body').addClass('show-left');
}

function SubmitData() {

 if (obj.DriverId == undefined || obj.DriverId == "") {} else {
  $.ajax({
   url: mappedVehicledriver,
   type: 'POST',
   headers: {
    'Access-Control-Allow-Origin': '*',
    'Authorization': $("#tocken").val()
   },
   data: JSON.stringify(obj),
   async: false,

   success: function(response) {
    $("#submit").attr("disabled", false);
    console.log("response", response);
    if (response.success == true) {
     obj = {};

     $("#" + $("#selectedrow").val()).removeClass('selectdRow');
     $('body').removeClass('show-right');
     $('body').addClass('show-left');
     swal("Success", response.message, "success");
     setTimeout(function() {

      window.location.href = driver_vehicle_mapping;
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
   //contentType : false,
   contentType: 'application/json',
   processData: false
  });

 }

}

function selectedrow(ids, data) {
 $("#" + $("#selectedrow").val()).removeClass('selectdRow');
 $("#selectedrow").val(ids.id);
 obj.DriverId = data;
 $("#" + ids.id).addClass('selectdRow');
}