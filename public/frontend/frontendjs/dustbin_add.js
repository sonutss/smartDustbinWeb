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
var map;

function initMap() {
 var myLatlng = new google.maps.LatLng(28.7041, 77.1025);
 var geocoder = new google.maps.Geocoder();
 var infowindow = new google.maps.InfoWindow();
 var myOptions = {
  zoom: 8,
  center: myLatlng,
  mapTypeId: google.maps.MapTypeId.ROADMAP
 };

 map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

 var marker = new google.maps.Marker({
  draggable: true,
  position: myLatlng,
  map: map,
  //title: "Your location"

 });
 geocoder.geocode({
  'latLng': myLatlng
 }, function(results, status) {
  if (status == google.maps.GeocoderStatus.OK) {
   if (results[0]) {
    $('#latitude,#longitude').show();
    // $('#address').val(results[0].formatted_address);
    // $('#latitude').val(marker.getPosition().lat());
    // $('#longitude').val(marker.getPosition().lng());
    infowindow.setContent(results[0].formatted_address);
    infowindow.open(map, marker);
   }
  }
 });

 google.maps.event.addListener(marker, 'dragend', function(event) {
  geocoder.geocode({
   'latLng': marker.getPosition()
  }, function(results, status) {
   if (status == google.maps.GeocoderStatus.OK) {
    if (results[0]) {
     //document.getElementById("address").value = event.latLng.lat().toFixed(3);

     //document.getElementById("latitude").value = event.latLng.lng().toFixed(3);
     //document.getElementById("longitude").value = results[0].formatted_address;
     $('#address').val(results[0].formatted_address);
     $('#latitude').val(marker.getPosition().lat().toFixed(5));
     $('#longitude').val(marker.getPosition().lng().toFixed(5));
     infowindow.setContent(results[0].formatted_address);
     infowindow.open(map, marker);
    }
   }
  });

  // console.log(event.formatted_address);

  //   document.getElementById("lat").value = event.latLng.lat().toFixed(3);

  //   document.getElementById("long").value = event.latLng.lng().toFixed(3);
  //   document.getElementById("address").value = results[0].formatted_address;

  //   infoWindow.open(map, marker);

 });

}
//initMap();
google.maps.event.addDomListener(window, "load", initMap());


getwarehouse();

//$('#wid').on('click',function(){
function getwarehouse() {
 $.ajax({
  url: list_ware + 'dropdownlistwarehouse',
  type: 'GET',
  headers: {
   'Access-Control-Allow-Origin': '*',
   'Authorization': $("#tocken").val(),
  },
  success: function(data) {
   //var res = $.parseJSON(data.result);
   $('#wid').html('<option value=""> Select</option>');
   $.each(data.result, function() {
    var selected = '';
    // if(this['id'] == sub_type){
    //  selected = 'selected';
    // } 
    $('#wid').append($("<option " + selected + "></option>").attr("value", this['id']).text(this['name']));
   });
  },
 });
}