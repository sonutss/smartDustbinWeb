$(function() {
 'use strict'

 // Toggles
 $('.br-toggle').on('click', function(e) {
  e.preventDefault();
  $(this).toggleClass('on');
 })
 $(".select2").select2();
 $(".dropify").dropify();
 // Input Masks
 $('#dateMask').mask('99/99/9999');
 $('#phoneMask').mask('(999) 999-9999');
 $('#ssnMask').mask('999-99-9999');

 // Datepicker
 $('.fc-datepicker').datepicker({
  showOtherMonths: true,
  selectOtherMonths: true
 });

 $('#datepickerNoOfMonths').datepicker({
  showOtherMonths: true,
  selectOtherMonths: true,
  numberOfMonths: 2
 });

 // Time Picker
 $('#tpBasic').timepicker();
 $('#tp2').timepicker({
  'scrollDefault': 'now'
 });
 $('#tp3').timepicker();

 $('#setTimeButton').on('click', function() {
  $('#tp3').timepicker('setTime', new Date());
 });

 // Color picker
 $('#colorpicker').spectrum({
  color: '#17A2B8'
 });

 $('#showAlpha').spectrum({
  color: 'rgba(23,162,184,0.5)',
  showAlpha: true
 });

 $('#showPaletteOnly').spectrum({
  showPaletteOnly: true,
  showPalette: true,
  color: '#DC3545',
  palette: [
   ['#1D2939', '#fff', '#0866C6', '#23BF08', '#F49917'],
   ['#DC3545', '#17A2B8', '#6610F2', '#fa1e81', '#72e7a6']
  ]
 });


 // Rangeslider
 if ($().ionRangeSlider) {
  $('#rangeslider1').ionRangeSlider();

  $('#rangeslider2').ionRangeSlider({
   min: 100,
   max: 1000,
   from: 550
  });

  $('#rangeslider3').ionRangeSlider({
   type: 'double',
   grid: true,
   min: 0,
   max: 1000,
   from: 200,
   to: 800,
   prefix: '$'
  });

  $('#rangeslider4').ionRangeSlider({
   type: 'double',
   grid: true,
   min: -1000,
   max: 1000,
   from: -500,
   to: 500,
   step: 250
  });
 }

});
$("form#add-vehicle").submit(function() {
 var start_date = $("#rcissue").val();
 var end_date = $("#rcexpire").val();
 var start_date1 = $("#insuranceissuedate").val();
 var end_date1 = $("#insuranceexpiredate").val();
 var mgfyear = $("#mgfyear").val();
 var capacity = $("#capacity").val();
 var coveragelimit = $("#coveragelimit").val();
 if ($.trim($("#modelname").val()) == '') {
  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#modelname").offset().top
  }, 1000);
  $("#msg_modelname").parent().show();
  $("#msg_modelname").text('Please enter model name!');
  setTimeout(function() {
   $("#msg_modelname").parent().hide();
   $("#msg_modelname").text('');
  }, 5000);
  $("#modelname").focus();
  return false;
 } else if ($.trim($("#mgfyear").val()) == '') {
  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#mgfyear").offset().top
  }, 1000);
  $("#msg_mgfyear").parent().show();
  $("#msg_mgfyear").text('Please enter mgfyear !');
  setTimeout(function() {
   $("#msg_mgfyear").parent().hide();
   $("#msg_mgfyear").text('');
  }, 5000);
  $("#mgfyear").focus();
  return false;
 } else if (!$.isNumeric(mgfyear)) {
  $('html, body').animate({
   scrollTop: $("#mgfyear").offset().top
  }, 1000);
  $("#msg_mgfyear").parent().show();
  $("#msg_mgfyear").text('Only digit Accepted !');
  setTimeout(function() {
   $("#msg_mgfyear").parent().hide();
   $("#msg_mgfyear").text('');
  }, 5000);
  $("#mgfyear").focus();
  return false;
 } else if ($.trim($("#companyname").val()) == '') {
  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#companyname").offset().top
  }, 1000);
  $("#msg_companyname").parent().show();
  $("#msg_companyname").text('Please enter companyname !');
  setTimeout(function() {
   $("#msg_companyname").parent().hide();
   $("#msg_companyname").text('');
  }, 5000);
  $("#companyname").focus();
  return false;
 } else if ($.trim($("#trucktype").val()) == '') {
  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#trucktype").offset().top
  }, 1000);
  $("#msg_trucktype").parent().show();
  $("#msg_trucktype").text('Please enter truck type !');
  setTimeout(function() {
   $("#msg_trucktype").parent().hide();
   $("#msg_trucktype").text('');
  }, 5000);
  $("#trucktype").focus();
  return false;
 } else if ($.trim($("#capacity").val()) == '') {
  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#capacity").offset().top
  }, 1000);
  $("#msg_capacity").parent().show();
  $("#msg_capacity").text('Please enter capacity !');
  setTimeout(function() {
   $("#msg_capacity").parent().hide();
   $("#msg_capacity").text('');
  }, 5000);
  $("#capacity").focus();
  return false;
 } else if (!$.isNumeric(capacity)) {
  $('html, body').animate({
   scrollTop: $("#capacity").offset().top
  }, 1000);
  $("#msg_capacity").parent().show();
  $("#msg_capacity").text('Only digit Accepted !');
  setTimeout(function() {
   $("#msg_capacity").parent().hide();
   $("#msg_capacity").text('');
  }, 5000);
  $("#capacity").focus();
  return false;
 } else if ($.trim($("#vehiclerc").val()) == '') {
  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#vehiclerc").offset().top
  }, 1000);
  $("#msg_vehiclerc").parent().show();
  $("#msg_vehiclerc").text('Please enter vehicle rc !');
  setTimeout(function() {
   $("#msg_vehiclerc").parent().hide();
   $("#msg_vehiclerc").text('');
  }, 5000);
  $("#vehiclerc").focus();
  return false;
 } else if ($.trim($("#rcissue").val()) == '') {
  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#rcissue").offset().top
  }, 1000);
  $("#msg_rcissue").parent().show();
  $("#msg_rcissue").text('Please enter rc issue !');
  setTimeout(function() {
   $("#msg_rcissue").parent().hide();
   $("#msg_rcissue").text('');
  }, 5000);
  $("#rcissue").focus();
  return false;
 } else if ($.trim($("#rcexpire").val()) == '') {
  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#rcexpire").offset().top
  }, 1000);
  $("#msg_rcexpire").parent().show();
  $("#msg_rcexpire").text('Please enter rc expire !');
  setTimeout(function() {
   $("#msg_rcexpire").parent().hide();
   $("#msg_rcexpire").text('');
  }, 5000);
  $("#rcexpire").focus();
  return false;
 } else if (new Date(start_date) >= new Date(end_date)) {
  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#rcexpire").offset().top
  }, 1000);
  $("#msg_rcexpire").parent().show();
  $("#msg_rcexpire").text('Please enter greater than issue date !');
  setTimeout(function() {
   $("#msg_rcexpire").parent().hide();
   $("#msg_rcexpire").text('');
  }, 5000);
  $("#rcexpire").focus();
  return false;
 } else if ($.trim($("#issuecountry").val()) == '') {
  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#issuecountry").offset().top
  }, 1000);
  $("#msg_issuecountry").parent().show();
  $("#msg_issuecountry").text('Please enter issue country !');
  setTimeout(function() {
   $("#msg_issuecountry").parent().hide();
   $("#msg_issuecountry").text('');
  }, 5000);
  $("#issuecountry").focus();
  return false;
 } else if ($.trim($("#insuranceno").val()) == '') {
  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#insuranceno").offset().top
  }, 1000);
  $("#msg_insuranceno").parent().show();
  $("#msg_insuranceno").text('Please enter insurance no !');
  setTimeout(function() {
   $("#msg_insuranceno").parent().hide();
   $("#msg_insuranceno").text('');
  }, 5000);
  $("#insuranceno").focus();
  return false;
 } else if ($.trim($("#insuranceissuedate").val()) == '') {
  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#insuranceissuedate").offset().top
  }, 1000);
  $("#msg_insuranceissuedate").parent().show();
  $("#msg_insuranceissuedate").text('Please enter insurance issue date !');
  setTimeout(function() {
   $("#msg_insuranceissuedate").parent().hide();
   $("#msg_insuranceissuedate").text('');
  }, 5000);
  $("#insuranceissuedate").focus();
  return false;
 } else if ($.trim($("#insuranceexpiredate").val()) == '') {
  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#insuranceexpiredate").offset().top
  }, 1000);
  $("#msg_insuranceexpiredate").parent().show();
  $("#msg_insuranceexpiredate").text('Please enter insurance expire date !');
  setTimeout(function() {
   $("#msg_insuranceexpiredate").parent().hide();
   $("#msg_insuranceexpiredate").text('');
  }, 5000);
  $("#insuranceexpiredate").focus();
  return false;
 } else if (new Date(start_date1) >= new Date(end_date1)) {
  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#insuranceexpiredate").offset().top
  }, 1000);
  $("#msg_insuranceexpiredate").parent().show();
  $("#msg_insuranceexpiredate").text('Please enter greater than issue date !');
  setTimeout(function() {
   $("#msg_insuranceexpiredate").parent().hide();
   $("#msg_insuranceexpiredate").text('');
  }, 5000);
  $("#insuranceexpiredate").focus();
  return false;
 } else if ($.trim($("#insurancecompany").val()) == '') {
  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#insurancecompany").offset().top
  }, 1000);
  $("#msg_insurancecompany").parent().show();
  $("#msg_insurancecompany").text('Please enter insurance company !');
  setTimeout(function() {
   $("#msg_insurancecompany").parent().hide();
   $("#msg_insurancecompany").text('');
  }, 5000);
  $("#insurancecompany").focus();
  return false;
 } else if ($.trim($("#insurancecover").val()) == '') {
  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#insurancecover").offset().top
  }, 1000);
  $("#msg_insurancecover").parent().show();
  $("#msg_insurancecover").text('Please enter insurance cover !');
  setTimeout(function() {
   $("#msg_insurancecover").parent().hide();
   $("#msg_insurancecover").text('');
  }, 5000);
  $("#insurancecover").focus();
  return false;
 } else if ($.trim($("#coveragelimit").val()) == '') {
  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#coveragelimit").offset().top
  }, 1000);
  $("#msg_coveragelimit").parent().show();
  $("#msg_coveragelimit").text('Please enter coverage limit !');
  setTimeout(function() {
   $("#msg_coveragelimit").parent().hide();
   $("#msg_coveragelimit").text('');
  }, 5000);
  $("#coveragelimit").focus();
  return false;
 } else if (!$.isNumeric(coveragelimit)) {
  $('html, body').animate({
   scrollTop: $("#coveragelimit").offset().top
  }, 1000);
  $("#msg_coveragelimit").parent().show();
  $("#msg_coveragelimit").text('Only digit Accepted !');
  setTimeout(function() {
   $("#msg_coveragelimit").parent().hide();
   $("#msg_coveragelimit").text('');
  }, 5000);
  $("#coveragelimit").focus();
  return false;
 } else {
  var formData = new FormData($(this)[0]);
  $.ajax({
   url: updateVehicle,
   type: 'PUT',
   data: formData,
   async: false,
   headers: {
    'Access-Control-Allow-Origin': '*',
    'Authorization': $("#tocken").val()
   },
   success: function(response) {
    $("#submit").attr("disabled", false);
    return false;
    //var res = $.parseJSON(response);
    if (response.success == true) {
     swal("Success", response.message, "success");
     setTimeout(function() {
      window.location.href = "{{url('vehicle-list')}}";
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
   contentType: false,
   processData: false
  });
  return false;
 }
});