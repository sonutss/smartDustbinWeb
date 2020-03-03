function getdasboard() {
 $.ajax({
  url: markerlist,
  type: 'GET',
  async: false,
  headers: {
   'Access-Control-Allow-Origin': '*',
   'Authorization': $("#tocken").val()
  },
  success: function(data) {
   if (data.success === true) {
    var data1 = data.dresult;
    $('p#dustbin').text(data1.dustbinTotal);
    $('p#warehouse').text(data1.warehouseTotal);
    $('p#vehicle').text(data1.vehiclesTotal);
    $('p#driver').text(data1.driversTotal);
    $('p#pickup').text(data1.todaypicup);
    $('p#all_pickup').text(data1.allpicup);
    $('#no_warehouse').text(data1.warehouseTotal);
    $('#no_dustbin').text(data1.dustbinTotal);

    $("#pickup_list tbody").html('');
    if (data.data == 0) {
     $("#pickup_list tbody").append('<tr><td colspan="3" style="color:red;font-weight:600">No data Found</td></tr>');
    } else {
     for (var i = 0; i < data.data.length; i++) {
      var status;
      if (data.data[i].groupStatus == 1) {
       status = '<span class="text-success">Active</span>';
      } else {
       status = '<span class="text-danger">Completed</span>';
      }
      $("#pickup_list tbody").append('<tr>' +
       +'<td>' + (i + 1) + '</td>' +
       '<td>' + data.data[i].groupName + '</td>' +
       '<td>' + data.data[i].dustbincount + '</td>' +
       '<td>' + status + '</td>' +
       '<td><a href="view-details/' + data.data[i].groupName + '"><div><i class="fa fa-eye"></i></div></a></td>' +
       '</tr>');

     }
    }

    var markers = [];
    var markers1 = [];
    for (var i = 0; i < data1.googleDustbinMapMarker.length; i++) {
     markers.push(
      marker = new google.maps.Marker({
       position: new google.maps.LatLng(data1.googleDustbinMapMarker[i].latiude, data1.googleDustbinMapMarker[i].longitude),
       map: map,
       draggable: false,
       icon: {
        url: img
       },
       title: data1.googleDustbinMapMarker[i].name
      })

     );
    }

    for (var i = 0; i < data1.googleDustbinMapMarker.length; i++) {
     markers1.push(
      marker = new google.maps.Marker({
       position: new google.maps.LatLng(data1.googleWarehouseMapMarker[i].latitude, data1.googleWarehouseMapMarker[i].longitude),
       map: map,
       draggable: false,
       icon: {
        url: imgw
       },
       title: data1.googleWarehouseMapMarker[i].name
      })

     );
    }

   }
  }
 });
}

var map;

function initMap() {
 var myLatlng = new google.maps.LatLng(28.7041, 77.1025);
 var myOptions = {
  zoom: 9,
  center: myLatlng,
  mapTypeId: google.maps.MapTypeId.ROADMAP
 };
 map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
 getdasboard();
}
google.maps.event.addDomListener(window, "load", initMap());