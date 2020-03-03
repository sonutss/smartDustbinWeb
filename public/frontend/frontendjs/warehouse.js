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
 //alert();
 var warehousedata = {
  page: page,
  perpage: $("#record").val(),
  //driverstatus : $("#status").val(),
  list: 'true'
 }
 $.ajax({
  url: warehouse_list,
  type: 'POST',
  data: warehousedata,
  headers: {
   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  success: function(data) {
   var data = JSON.parse(data);
   $("#warehouse-list tbody").html('');
   if (data.count == 0) {
    $("#warehouse-list tbody").html('<tr><td colspan="6" style="color:red;font-weight:600">No data Found</td></tr>');
   } else {
    $("#warehouse-list tbody").html(data.html);
    if (page == 1) {
     $('.pagination').twbsPagination('destroy');
     $('.pagination').twbsPagination({
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
var map;

function initMap() {
 var myLatlng = new google.maps.LatLng(28.7041, 77.1025);
 var myOptions = {
  zoom: 8,
  center: myLatlng,
  mapTypeId: google.maps.MapTypeId.ROADMAP
 };

 map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
 getmarkerList();
}
google.maps.event.addDomListener(window, "load", initMap());

function getmarkerList() {

 $.ajax({
  url: markerlist,
  type: 'GET',
  async: false,
  headers: {
   'Access-Control-Allow-Origin': '*',
   'Authorization': $("#tocken").val()
  },
  success: function(data) {
   //console.log(data);
   var data = data.result;
   var markers = [];
   for (var i = 0; i < data.length; i++) {
    markers.push(
     marker = new google.maps.Marker({
      position: new google.maps.LatLng(data[i].latitude, data[i].longitude),
      map: map,
      draggable: false,
      icon: {
       url: img
      },
      title: data[i].name
     })

    );
   }

  },
  cache: false,
 });
}