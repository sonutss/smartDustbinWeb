 $('.pagination').twbsPagination({
  totalPages: 1,
  startPage: 1,
  visiblePages: 5,
  href: false,
  loop: false,
  onPageClick: function(event, page) {
   getData(page);
   vehicleList(page);
  },
 });

 function getData(page) {
  var vehicledata = {
   page: page,
   perpage: '10',
   list: 'true'
  }
  $.ajax({
   url: warehouse_vehicle_mapping,
   type: 'POST',
   data: vehicledata,
   headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   },
   success: function(data) {
    var data = JSON.parse(data);
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
       getData(page);
      });
     }
    }
   },
   cache: false,
  });
 }

 function vehicleList(page) {
  var vehicledata = {
   page: page,
   perpage: '10',
   list: 'true'
  }
  $.ajax({
   url: vehicle_not_assign,
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
       vehicleList(page);
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
  obj.whareId = this_id;
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
  var vehicleList = [];
  $.each($("input[name='check_veh[]']:checked"), function(i, val) {
   //console.log(val.value);
   vehicleList.push([obj.whareId, val.value]);

  });
  // var data = obj.whareId;
  // for(var x=0;x<vehicleList.length;x++){
  //     recordSet[x] = vehicleList[x]; 
  //     for(var y=0;y<data.length;y++){
  //         //console.log(y);
  //         recordSet.push(data,vehicleList);
  //     }
  //     //recordSet.push(obj.whareId,vehicleList[x]);
  // }
  // console.log(recordSet);
  //console.log(obj.whareId); 
  // console.log(data);

  if (obj.whareId == undefined || obj.whareId == "") {
   swal({
    title: "Warnings",
    text: "Please select driver !!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
   });
  } else {
   $.ajax({
    url: mappedwherehousewithvehicle,
    type: 'POST',
    headers: {
     'Access-Control-Allow-Origin': '*',
     'Authorization': $("#tocken").val()
    },
    data: JSON.stringify({
     dataSet: vehicleList
    }),
    async: false,

    success: function(response) {
     $("#submit").attr("disabled", false);
     if (response.success == true) {
      obj = {};

      $("#" + $("#selectedrow").val()).removeClass('selectdRow');
      $('body').removeClass('show-right');
      $('body').addClass('show-left');
      swal("Success", response.message, "success");
      setTimeout(function() {

       window.location.href = warehouse_vehicle_mapping;
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
     // $.each(rr.errors, function(key, value){
     //     $("#"+key).parent().addClass('form-has-error');
     //     $("#msg_"+key).parent().show();
     //     $("#msg_"+key).text(value);
     //     setTimeout(function(){ 
     //         $("#"+key).parent().removeClass('form-has-error');
     //         $("#msg_"+key).parent().hide();
     //         $("#msg_"+key).text('');
     //     }, 8000);
     // });
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