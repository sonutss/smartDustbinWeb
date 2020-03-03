$(function() {
 // $('.modal-effect').on('click', function(e){
 //     e.preventDefault();
 //     var effect = $(this).attr('data-effect');
 //     $('#modaldemo8').addClass(effect);
 //     $('#modaldemo8').modal('show');
 // });
 $('#modaldemo8').on('hidden.bs.modal', function(e) {
  $(this).removeClass(function(index, className) {
   return (className.match(/(^|\s)effect-\S+/g) || []).join(' ');
  });
 });
 $('#modaldemo9').on('hidden.bs.modal', function(e) {
  $(this).removeClass(function(index, className) {
   return (className.match(/(^|\s)effect-\S+/g) || []).join(' ');
  });
 });
});
$('.pagination').twbsPagination({
 totalPages: 1,
 startPage: 1,
 visiblePages: 5,
 href: false,
 loop: false,
 onPageClick: function(event, page) {
  openModalAvailable(wid, page);
  openModalNotAvailable(wid, page);
 },
});

function openModalAvailable(wid, page) {

 var effect = $(this).attr('data-effect');
 $('#modaldemo8').addClass(effect);
 $('#modaldemo8').modal('show');
 var avilable = {
  page: page,
  perpage: 10,
  wid: wid,
  list: 'true'
 }
 $.ajax({
  url: available_vehicle,
  type: 'POST',
  data: avilable,
  headers: {
   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  success: function(data) {
   var data = JSON.parse(data);
   $("#available-vehicle tbody").html('');
   if (data.count == 0) {
    $("#available-vehicle tbody").html('<tr><td colspan="6" style="color:red;font-weight:600">No data Found</td></tr>');
   } else {
    $("#available-vehicle tbody").html(data.html);
    if (page == 1) {
     $('.pagination').twbsPagination('destroy');
     $('.pagination').twbsPagination({
      totalPages: data.count,
      href: false,
     }).on('page', function(event, page) {
      console.log(page);
      openModalAvailable(page);
     });
    }
   }
  },
  cache: false,
 });


}

function openModalNotAvailable(wid, page) {

 var effect = $(this).attr('data-effect');
 $('#modaldemo9').addClass(effect);
 $('#modaldemo9').modal('show');
 var notavilable = {
  page: page,
  perpage: 10,
  wid: wid,
  list: 'true'
 }
 $.ajax({
  url: notavailable_vehicle,
  type: 'POST',
  data: notavilable,
  headers: {
   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  success: function(data) {
   var data = JSON.parse(data);
   $("#not-available tbody").html('');
   if (data.count == 0) {
    $("#not-available tbody").html('<tr><td colspan="6" style="color:red;font-weight:600">No data Found</td></tr>');
   } else {
    $("#not-available tbody").html(data.html);
    if (page == 1) {
     $('.pagination').twbsPagination('destroy');
     $('.pagination').twbsPagination({
      totalPages: data.count,
      href: false,
     }).on('page', function(event, page) {
      console.log(page);
      openModalNotAvailable(page);
     });
    }
   }
  },
  cache: false,
 });


}

function saveModalData() {
 alert();
 var parms = {
  wid: $('#warehouseID').val(),
  driverID: $('#driverid').val(),
  vehicelID: $('#vehicleid').val(),
 }
}
const socket = io('http://3.6.124.196:3002/');

socket.on('connect', function(data) {
 console.log("Server is connected");
});
socket.on('group_dataDustbin', (dataSet) => {
 $("#pickup tbody").html('');
 console.log(dataSet);
 var html = '';
 if (dataSet.length != 0) {
  for (var x = 0; x < dataSet.length; x++) {
   if (dataSet[x].vehicleID == 0) {
    var vehicleID = '<a href="#" class="media-list-link ">' +
     '<div class="pd-y-0-force pd-x-0-force media ">' +
     '<img src="./public/frontend/img/ic-truck.png" alt="">' +
     '<div class="media-body">' +
     '<div>' +
     '<p class="mg-b-0 tx-medium tx-gray-800 tx-13">Not Assigned</p>' +
     '</div>'

     +
     '</div>' +
     '</div>' +
     '</a>';
    var driverID = '<a href="#" class="media-list-link ">' +
     '<div class="pd-y-0-force pd-x-0-force media ">' +
     '<img src="./public/frontend/img/ic-truck.png" alt="">' +
     '<div class="media-body">' +
     '<div>' +
     '<p class="mg-b-0 tx-medium tx-gray-800 tx-13">Not Assigned</p>' +
     '</div>'

     +
     '</div>' +
     '</div>' +
     '</a>';
    var driverstatus = '<span class="text-danger">Not Assigned</span>';
   } else {
    var vehicleID = '<a href="#" class="media-list-link ">' +
     '<div class="pd-y-0-force pd-x-0-force media ">' +
     '<img src="./public/frontend/img/ic-truck.png" alt="">' +
     '<div class="media-body">' +
     '<div>' +
     '<p class="mg-b-0 tx-medium tx-gray-800 tx-13">' + dataSet[x].VehicleName + '</p>' +
     '</div>' +
     '<p class="tx-12 tx-gray-600 mg-b-0">' + dataSet[x].VehicleRC + '</p>' +
     '</div>' +
     '</div>' +
     '</a>';
    var driverID = '<a href="#" class="media-list-link">' +
     '<div class="media pd-y-0-force pd-x-0-force">' +
     '<img src="{{env('
    STORAGE_PATH ')}}drivers/' + dataSet[x].DriverPhoto + '" alt="">' +
     '<div class="media-body">' +
     '<div>' +
     '<p class="mg-b-0 tx-medium tx-gray-800 tx-13">' + dataSet[x].Drivername + '</p>' +
     '</div>' +
     '<p class="tx-12 tx-gray-600 mg-b-0">' + dataSet[x].Drivermobile + '</p>' +
     '</div>' +
     '</div>' +
     '</a>';
    var driverstatus = '<span class="text-success">Assigned</span>';
   }
   html += '<tr>' +
    '<td><span class="text-success">' + dataSet[x].groupName + '</span></td>' +
    '<td>' + dataSet[x].dataassignDate + '</td>' +
    '<th>' +
    vehicleID +
    '</th>' +
    '<td>' + driverID +
    '</td>' +
    '<td>' +
    dataSet[x].warehousename +
    '</td>' +
    '<td><span class="text-success">' + dataSet[x].datacount + '</span></td>' +
    '<td>' + driverstatus + '</td>' +
    '<td>' +
    '<a href="view-details/' + dataSet[x].groupName + '"><button  class="btn btn-primary btn-icon mg-b-10 btn-sm"><div><i class="fa fa-eye"></i></div></button></a>'

    +
    '<button  class="btn btn-success btn-icon mg-b-10 btn-sm" title="Availabe Vehicle"  onclick="openModalAvailable(' + dataSet[x].warehouseID + ',1)"><div><i class="fa fa-check"></i></div></button>'

    +
    '<button  class="btn btn-danger btn-icon mg-b-10 btn-sm" title="Not Availabe vehicle" onclick="openModalNotAvailable(' + dataSet[x].warehouseID + ',1)"><div><i class="fa fa-times"></i></div></button>' +
    '</td>' +
    '</tr>';


  }
  $("#pickup tbody").append(html);
 } else {
  html += '<tr><td colspan="6" style="color:red;text-align:center;font-weight:600;">No record found !!</td></tr>';
 }

});