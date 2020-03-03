$(".select2").select2();
//  $(document).ready(function(){
//     $('button').attr('disabled',true);
// });
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
});

function openModal() {
 alert();
 var effect = $(this).attr('data-effect');
 $('#modaldemo8').addClass(effect);
 $('#modaldemo8').modal('show');
}

var status = false,
 status1 = false;

function checkAll(thiss, name) {

 if ($(thiss).prop('checked') == true) {
  $('input:checkbox[name="' + name + '[]"]').prop('checked', thiss.checked);
  $("#button" + name + "").attr('disabled', false);
 } else {
  $('input:checkbox[name="' + name + '[]"]').prop('checked', '');
  $("#button" + name + "").attr('disabled', true);
 }
}


function checkSingle(thiss, name) {

 if ($(thiss).prop('checked') == true) {
  $(thiss).prop('checked', thiss.checked);
  $("#button" + name).attr('disabled', false);

  if ($('input:checkbox[name="' + name + '[]"]:checked').length == $('input:checkbox[name="' + name + '[]"]').length) {
   $("#button" + name).attr('disabled', false);
   $("#ppp" + name)[0].checked = true;

  } else if ($('input:checkbox[name="' + name + '[]"]:checked').length > 0) {

   $("#button" + name).attr('disabled', false);
  } else {

   $("#button" + name).attr('disabled', false);
   $("#ppp" + name)[0].checked = false;
  }


 } else if ($('input:checkbox[name="' + name + '[]"]:checked').length > 0) {
  $("#ppp" + name)[0].checked = false;
  $("#button" + name).attr('disabled', false);
 } else {

  $(thiss).prop('checked', '');
  $("#ppp" + name)[0].checked = false;
  $("#button" + name).attr('disabled', true);

 }

}
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
 var pickup = {
  page: page,
  perpage: $("#record").val(),
  wid: $("#wid").val(),
  dataperfrom: $("#dataperfrom").val(),
  list: 'true'
 }
 $.ajax({
  url: pickup_create,
  type: 'POST',
  data: pickup,
  headers: {
   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  success: function(data) {
   var data = JSON.parse(data);

   $("#pickup").html('');
   if (data.count == 0) {
    $("#pickup").html('<tr><td colspan="6" style="color:red;font-weight:600">No data Found</td></tr>');
   } else {
    $("#pickup").html(data.html);
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

function getCheckData(wid) {
 checkList = [];
 $("#button" + name + "").attr('disabled', true);
 // $.each($("input[name='check[]']:checked"), function(i,val){
 //       checkList.push(val.value);

 //     });

 $.each($("input[name='" + wid + "[]']:checked"), function(i, val) {

  checkList.push({
   did: val.value,
   dataDustbin: $(this).attr("data-id")
  });

 });
 var parms = {
  groupname: $('#groupname').val(),
  wid: wid,
  dustbin: checkList,
  assigndate: $('#assigndate').val()
 }
 //return false;
 $.ajax({
  url: postdata + 'assigingroupPicup',
  type: 'POST',
  data: JSON.stringify(parms),
  async: false,
  headers: {
   'Access-Control-Allow-Origin': '*',
   'Authorization': $("#tocken").val()
  },
  success: function(response) {
   $("#submit").attr("disabled", false);
   //var res = $.parseJSON(response);
   if (response.success == true && response.dataResults != 0) {
    swal("Success", response.message, "success");
    setTimeout(function() {
     window.location.href = pickup;
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
getwarehouse();

function getwarehouse() {
 $.ajax({
  url: list_ware + 'dropdownlistwarehouse',
  type: 'GET',
  headers: {
   'Access-Control-Allow-Origin': '*',
   'Authorization': $("#tocken").val(),
  },
  success: function(data) {
   $('#wid').html('<option value=""> Select Warehouse</option>');
   $.each(data.result, function() {
    var selected = '';
    $('#wid').append($("<option " + selected + "></option>").attr("value", this['id']).text(this['name']));
   });
  },
 });
}

function resetAll() {
 $("#wid")[0].selectedIndex = 0;
 $('input[name="datefilter"]').val('');
 getData(1);
}
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

function availableVehicle(wid, page = 1) {
 var effect = $(this).attr('data-effect');
 $('#modaldemo8').addClass(effect);
 $('#modaldemo8').modal('show');

 var avilable = {
  page: page,
  perpage: 10,
  wid: wid,
  list: 'true',
  show: 'false'
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
      availableVehicle(page);
     });
    }
   }
  },
  cache: false,
 });
}

function unavailableVehicle(wid, page = 1) {
 var effect = $(this).attr('data-effect');
 $('#modaldemo9').addClass(effect);
 $('#modaldemo9').modal('show');

 var avilable = {
  page: page,
  perpage: 10,
  wid: wid,
  list: 'true'
 }
 //console.log(avilable);
 //return false;
 $.ajax({
  url: notavailable_vehicle,
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
      unavailableVehicle(page);
     });
    }
   }
  },
  cache: false,
 });
}
$(document).ready(function() {
 $('#wid').change(function() {
  $('#dataperfrom').val(['']);
  getData(1);

 }).trigger('change');
 $('#dataperfrom').change(function() {
  $('#wid').val(['']);
  getData(1);
 }).trigger('change');
});