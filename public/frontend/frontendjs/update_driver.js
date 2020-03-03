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
$("form#update-driver").submit(function() {

 var p_start_date = $("#passportissuedate").val();
 var p_end_date = $("#passportexpiredate").val();
 var n_start_date = $("#nationalidissuedate").val();
 var n_end_date = $("#nationalidexpiredate").val();
 var d_start_date = $("#drivinglicissuedate").val();
 var d_end_date = $("#drivinglicexpiredate").val();
 var v_start_date = $("#visaissuedate").val();
 var v_end_date = $("#visaexpiredate").val();
 var mobileno = $("#mobileno").val();
 var cpobox = $("#cpobox").val();
 var ppobox = $("#ppobox").val();
 var crefno = $("#crefno").val();
 var prefno = $("#prefno").val();

 if ($.trim($("#drivername").val()) == '') {
  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#drivername").offset().top
  }, 1000);
  $("#msg_drivername").parent().show();
  $("#msg_drivername").text('Please enter driver name!');
  setTimeout(function() {
   $("#msg_drivername").parent().hide();
   $("#msg_drivername").text('');
  }, 5000);
  $("#drivername").focus();
  return false;
 } else if ($.trim($("#mobileno").val()) == '') {
  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#mobileno").offset().top
  }, 1000);
  $("#msg_mobileno").parent().show();
  $("#msg_mobileno").text('Please enter mobile number !');
  setTimeout(function() {
   $("#msg_mobileno").parent().hide();
   $("#msg_mobileno").text('');
  }, 5000);
  $("#mobileno").focus();
  return false;
 } else if (!$.isNumeric(mobileno)) {
  $('html, body').animate({
   scrollTop: $("#mobileno").offset().top
  }, 1000);
  $("#msg_mobileno").parent().show();
  $("#msg_mobileno").text('Only digit Accepted !');
  setTimeout(function() {
   $("#msg_mobileno").parent().hide();
   $("#msg_mobileno").text('');
  }, 5000);
  $("#mobileno").focus();
  return false;
 } else if ($.trim($("#email").val()) == '') {
  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#email").offset().top
  }, 1000);
  $("#msg_email").parent().show();
  $("#msg_email").text('Please enter email id !');
  setTimeout(function() {
   $("#msg_email").parent().hide();
   $("#msg_email").text('');
  }, 5000);
  $("#email").focus();
  return false;
 } else if ($.trim($("#nationality").val()) == '') {
  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#nationality").offset().top
  }, 1000);
  $("#msg_nationality").parent().show();
  $("#msg_nationality").text('Please select nationality !');
  setTimeout(function() {
   $("#msg_nationality").parent().hide();
   $("#msg_nationality").text('');
  }, 5000);
  $("#nationality").focus();
  return false;
 }
 // else if($.trim($("#driverimage").val())==''){
 //     $("#submit").attr("disabled", false);
 //     $('html, body').animate({scrollTop: $("#driverimage").offset().top }, 1000);
 //     $("#msg_driverimage").parent().show();
 //     $("#msg_driverimage").text('Please upload driver image !');
 //     setTimeout(function(){ 
 //     $("#msg_driverimage").parent().hide();
 //     $("#msg_driverimage").text('');
 //     }, 5000);
 //     $("#driverimage").focus();
 //     return false ;
 // }
 else if ($.trim($("#caddress").val()) == '') {
  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#caddress").offset().top
  }, 1000);
  $("#msg_caddress").parent().show();
  $("#msg_caddress").text('Please enter current address !');
  setTimeout(function() {
   $("#msg_caddress").parent().hide();
   $("#msg_caddress").text('');
  }, 5000);
  $("#caddress").focus();
  return false;
 } else if ($.trim($("#ccity").val()) == '') {
  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#ccity").offset().top
  }, 1000);
  $("#msg_ccity").parent().show();
  $("#msg_ccity").text('Please enter current city !');
  setTimeout(function() {
   $("#msg_ccity").parent().hide();
   $("#msg_ccity").text('');
  }, 5000);
  $("#ccity").focus();
  return false;
 } else if ($.trim($("#cstate").val()) == '') {
  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#cstate").offset().top
  }, 1000);
  $("#msg_cstate").parent().show();
  $("#msg_cstate").text('Please enter current state !');
  setTimeout(function() {
   $("#msg_cstate").parent().hide();
   $("#msg_cstate").text('');
  }, 5000);
  $("#cstate").focus();
  return false;
 } else if ($.trim($("#ccountry").val()) == '') {
  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#ccountry").offset().top
  }, 1000);
  $("#msg_ccountry").parent().show();
  $("#msg_ccountry").text('Please enter current country !');
  setTimeout(function() {
   $("#msg_ccountry").parent().hide();
   $("#msg_ccountry").text('');
  }, 5000);
  $("#ccountry").focus();
  return false;
 } else if ($.trim($("#cpobox").val()) == '') {
  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#cpobox").offset().top
  }, 1000);
  $("#msg_cpobox").parent().show();
  $("#msg_cpobox").text('Please enter current pobox !');
  setTimeout(function() {
   $("#msg_cpobox").parent().hide();
   $("#msg_cpobox").text('');
  }, 5000);
  $("#cpobox").focus();
  return false;
 } else if (!$.isNumeric(cpobox)) {
  $('html, body').animate({
   scrollTop: $("#cpobox").offset().top
  }, 1000);
  $("#msg_cpobox").parent().show();
  $("#msg_cpobox").text('Only digit Accepted !');
  setTimeout(function() {
   $("#msg_cpobox").parent().hide();
   $("#msg_cpobox").text('');
  }, 5000);
  $("#cpobox").focus();
  return false;
 } else if ($.trim($("#crefname").val()) == '') {
  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#crefname").offset().top
  }, 1000);
  $("#msg_crefname").parent().show();
  $("#msg_crefname").text('Please enter current reference name !');
  setTimeout(function() {
   $("#msg_crefname").parent().hide();
   $("#msg_crefname").text('');
  }, 5000);
  $("#crefname").focus();
  return false;
 } else if ($.trim($("#crefno").val()) == '') {
  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#crefno").offset().top
  }, 1000);
  $("#msg_crefno").parent().show();
  $("#msg_crefno").text('Please enter current reference number !');
  setTimeout(function() {
   $("#msg_crefno").parent().hide();
   $("#msg_crefno").text('');
  }, 5000);
  $("#crefno").focus();
  return false;
 } else if (!$.isNumeric(crefno)) {
  $('html, body').animate({
   scrollTop: $("#crefno").offset().top
  }, 1000);
  $("#msg_crefno").parent().show();
  $("#msg_crefno").text('Only digit Accepted !');
  setTimeout(function() {
   $("#msg_crefno").parent().hide();
   $("#msg_crefno").text('');
  }, 5000);
  $("#crefno").focus();
  return false;
 } else if ($.trim($("#paddress").val()) == '') {
  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#paddress").offset().top
  }, 1000);
  $("#msg_paddress").parent().show();
  $("#msg_paddress").text('Please enter permanent address !');
  setTimeout(function() {
   $("#msg_paddress").parent().hide();
   $("#msg_paddress").text('');
  }, 5000);
  $("#paddress").focus();
  return false;
 } else if ($.trim($("#pcity").val()) == '') {
  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#pcity").offset().top
  }, 1000);
  $("#msg_pcity").parent().show();
  $("#msg_pcity").text('Please enter permanent city !');
  setTimeout(function() {
   $("#msg_pcity").parent().hide();
   $("#msg_pcity").text('');
  }, 5000);
  $("#pcity").focus();
  return false;
 } else if ($.trim($("#pstate").val()) == '') {
  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#pstate").offset().top
  }, 1000);
  $("#msg_pstate").parent().show();
  $("#msg_pstate").text('Please enter permanent state !');
  setTimeout(function() {
   $("#msg_pstate").parent().hide();
   $("#msg_pstate").text('');
  }, 5000);
  $("#pstate").focus();
  return false;
 } else if ($.trim($("#pcountry").val()) == '') {
  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#pcountry").offset().top
  }, 1000);
  $("#msg_pcountry").parent().show();
  $("#msg_pcountry").text('Please enter permanent country !');
  setTimeout(function() {
   $("#msg_pcountry").parent().hide();
   $("#msg_pcountry").text('');
  }, 5000);
  $("#pcountry").focus();
  return false;
 } else if ($.trim($("#ppobox").val()) == '') {
  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#ppobox").offset().top
  }, 1000);
  $("#msg_ppobox").parent().show();
  $("#msg_ppobox").text('Please enter permanent pobox !');
  setTimeout(function() {
   $("#msg_ppobox").parent().hide();
   $("#msg_ppobox").text('');
  }, 5000);
  $("#ppobox").focus();
  return false;
 } else if (!$.isNumeric(ppobox)) {
  $('html, body').animate({
   scrollTop: $("#ppobox").offset().top
  }, 1000);
  $("#msg_ppobox").parent().show();
  $("#msg_ppobox").text('Only digit Accepted !');
  setTimeout(function() {
   $("#msg_ppobox").parent().hide();
   $("#msg_ppobox").text('');
  }, 5000);
  $("#ppobox").focus();
  return false;
 } else if ($.trim($("#prefname").val()) == '') {
  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#prefname").offset().top
  }, 1000);
  $("#msg_prefname").parent().show();
  $("#msg_prefname").text('Please enter permanent reference name !');
  setTimeout(function() {
   $("#msg_prefname").parent().hide();
   $("#msg_prefname").text('');
  }, 5000);
  $("#prefname").focus();
  return false;
 } else if ($.trim($("#prefno").val()) == '') {
  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#prefno").offset().top
  }, 1000);
  $("#msg_prefno").parent().show();
  $("#msg_prefno").text('Please enter permanent reference number !');
  setTimeout(function() {
   $("#msg_prefno").parent().hide();
   $("#msg_prefno").text('');
  }, 5000);
  $("#prefno").focus();
  return false;
 } else if (!$.isNumeric(prefno)) {
  $('html, body').animate({
   scrollTop: $("#prefno").offset().top
  }, 1000);
  $("#msg_prefno").parent().show();
  $("#msg_prefno").text('Only digit Accepted !');
  setTimeout(function() {
   $("#msg_prefno").parent().hide();
   $("#msg_prefno").text('');
  }, 5000);
  $("#prefno").focus();
  return false;
 } else if ($.trim($("#passportissuedate").val()) == '') {
  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#passportissuedate").offset().top
  }, 1000);
  $("#msg_passportissuedate").parent().show();
  $("#msg_passportissuedate").text('Please enter passport issue date !');
  setTimeout(function() {
   $("#msg_passportissuedate").parent().hide();
   $("#msg_passportissuedate").text('');
  }, 5000);
  $("#passportissuedate").focus();
  return false;
 } else if ($.trim($("#passportexpiredate").val()) == '') {
  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#passportexpiredate").offset().top
  }, 1000);
  $("#msg_passportexpiredate").parent().show();
  $("#msg_passportexpiredate").text('Please enter passport expire date !');
  setTimeout(function() {
   $("#msg_passportexpiredate").parent().hide();
   $("#msg_passportexpiredate").text('');
  }, 5000);
  $("#passportexpiredate").focus();
  return false;
 } else if (new Date(p_start_date) >= new Date(p_end_date)) {

  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#passportexpiredate").offset().top
  }, 1000);
  $("#msg_passportexpiredate").parent().show();
  $("#msg_passportexpiredate").text('Please enter greater than issue date !');
  setTimeout(function() {
   $("#msg_passportexpiredate").parent().hide();
   $("#msg_passportexpiredate").text('');
  }, 5000);
  $("#passportexpiredate").focus();
  return false;
 }
 // else if($.trim($("#passportimage").val())==''){
 //     $("#submit").attr("disabled", false);
 //     $('html, body').animate({scrollTop: $("#passportimage").offset().top }, 1000);
 //     $("#msg_passportimage").parent().show();
 //     $("#msg_passportimage").text('Please enter passport image !');
 //     setTimeout(function(){ 
 //     $("#msg_passportimage").parent().hide();
 //     $("#msg_passportimage").text('');
 //     }, 5000);
 //     $("#passportimage").focus();
 //     return false ;
 // }
 else if ($.trim($("#nationalidissuedate").val()) == '') {
  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#nationalidissuedate").offset().top
  }, 1000);
  $("#msg_nationalidissuedate").parent().show();
  $("#msg_nationalidissuedate").text('Please enter national id issue date !');
  setTimeout(function() {
   $("#msg_nationalidissuedate").parent().hide();
   $("#msg_nationalidissuedate").text('');
  }, 5000);
  $("#nationalidissuedate").focus();
  return false;
 } else if ($.trim($("#nationalidexpiredate").val()) == '') {
  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#nationalidexpiredate").offset().top
  }, 1000);
  $("#msg_nationalidexpiredate").parent().show();
  $("#msg_nationalidexpiredate").text('Please enter national id expire date !');
  setTimeout(function() {
   $("#msg_nationalidexpiredate").parent().hide();
   $("#msg_nationalidexpiredate").text('');
  }, 5000);
  $("#nationalidexpiredate").focus();
  return false;
 } else if (new Date(n_start_date) >= new Date(n_end_date)) {

  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#nationalidexpiredate").offset().top
  }, 1000);
  $("#msg_nationalidexpiredate").parent().show();
  $("#msg_nationalidexpiredate").text('Please enter greater than issue date !');
  setTimeout(function() {
   $("#msg_nationalidexpiredate").parent().hide();
   $("#msg_nationalidexpiredate").text('');
  }, 5000);
  $("#nationalidexpiredate").focus();
  return false;
 }
 // else if($.trim($("#nationalidimage").val())==''){
 //     $("#submit").attr("disabled", false);
 //     $('html, body').animate({scrollTop: $("#nationalidimage").offset().top }, 1000);
 //     $("#msg_nationalidimage").parent().show();
 //     $("#msg_nationalidimage").text('Please enter national id image !');
 //     setTimeout(function(){ 
 //     $("#msg_nationalidimage").parent().hide();
 //     $("#msg_nationalidimage").text('');
 //     }, 5000);
 //     $("#nationalidimage").focus();
 //     return false ;
 // }
 else if ($.trim($("#drivinglicissuedate").val()) == '') {
  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#drivinglicissuedate").offset().top
  }, 1000);
  $("#msg_drivinglicissuedate").parent().show();
  $("#msg_drivinglicissuedate").text('Please enter driving licence issue date !');
  setTimeout(function() {
   $("#msg_drivinglicissuedate").parent().hide();
   $("#msg_drivinglicissuedate").text('');
  }, 5000);
  $("#drivinglicissuedate").focus();
  return false;
 } else if ($.trim($("#drivinglicexpiredate").val()) == '') {
  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#drivinglicexpiredate").offset().top
  }, 1000);
  $("#msg_drivinglicexpiredate").parent().show();
  $("#msg_drivinglicexpiredate").text('Please enter driving licence expire date !');
  setTimeout(function() {
   $("#msg_drivinglicexpiredate").parent().hide();
   $("#msg_drivinglicexpiredate").text('');
  }, 5000);
  $("#drivinglicexpiredate").focus();
  return false;
 } else if (new Date(d_start_date) >= new Date(d_end_date)) {

  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#drivinglicexpiredate").offset().top
  }, 1000);
  $("#msg_drivinglicexpiredate").parent().show();
  $("#msg_drivinglicexpiredate").text('Please enter greater than issue date !');
  setTimeout(function() {
   $("#msg_drivinglicexpiredate").parent().hide();
   $("#msg_drivinglicexpiredate").text('');
  }, 5000);
  $("#drivinglicexpiredate").focus();
  return false;
 }
 // else if($.trim($("#drivinglicimage").val())==''){
 //     $("#submit").attr("disabled", false);
 //     $('html, body').animate({scrollTop: $("#drivinglicimage").offset().top }, 1000);
 //     $("#msg_drivinglicimage").parent().show();
 //     $("#msg_drivinglicimage").text('Please enter driving licence image !');
 //     setTimeout(function(){ 
 //     $("#msg_drivinglicimage").parent().hide();
 //     $("#msg_drivinglicimage").text('');
 //     }, 5000);
 //     $("#drivinglicimage").focus();
 //     return false ;
 // }
 else if ($.trim($("#visaissuedate").val()) == '') {
  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#visaissuedate").offset().top
  }, 1000);
  $("#msg_visaissuedate").parent().show();
  $("#msg_visaissuedate").text('Please enter visa issue date !');
  setTimeout(function() {
   $("#msg_visaissuedate").parent().hide();
   $("#msg_visaissuedate").text('');
  }, 5000);
  $("#visaissuedate").focus();
  return false;
 } else if ($.trim($("#visaexpiredate").val()) == '') {
  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#visaexpiredate").offset().top
  }, 1000);
  $("#msg_visaexpiredate").parent().show();
  $("#msg_visaexpiredate").text('Please enter visa expire date !');
  setTimeout(function() {
   $("#msg_visaexpiredate").parent().hide();
   $("#msg_visaexpiredate").text('');
  }, 5000);
  $("#visaexpiredate").focus();
  return false;
 } else if (new Date(v_start_date) >= new Date(v_end_date)) {

  $("#submit").attr("disabled", false);
  $('html, body').animate({
   scrollTop: $("#visaexpiredate").offset().top
  }, 1000);
  $("#msg_visaexpiredate").parent().show();
  $("#msg_visaexpiredate").text('Please enter greater than issue date !');
  setTimeout(function() {
   $("#msg_visaexpiredate").parent().hide();
   $("#msg_visaexpiredate").text('');
  }, 5000);
  $("#visaexpiredate").focus();
  return false;
 }
 // else if($.trim($("#visaimage").val())==''){
 //     $("#submit").attr("disabled", false);
 //     $('html, body').animate({scrollTop: $("#visaimage").offset().top }, 1000);
 //     $("#msg_visaimage").parent().show();
 //     $("#msg_visaimage").text('Please enter visa image !');
 //     setTimeout(function(){ 
 //     $("#msg_visaimage").parent().hide();
 //     $("#msg_visaimage").text('');
 //     }, 5000);
 //     $("#visaimage").focus();
 //     return false ;
 // }
 else {
  var formData = new FormData($(this)[0]);
  // console.log(formData);//return false;
  $.ajax({
   url: update_driver,
   type: 'PUT',

   data: formData,
   async: false,
   headers: {
    'Access-Control-Allow-Origin': '*',
    'Authorization': $("#tocken").val()
   },
   success: function(response) {
    $("#submit").attr("disabled", false);
    console.log("response", response); //return false ;

    //var res = $.parseJSON(response);
    if (response.success == true) {
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
    console.log('data', rr.success); //return false ;
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