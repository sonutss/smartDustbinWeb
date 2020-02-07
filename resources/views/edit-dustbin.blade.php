<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content=".">
    <meta name="author" content="">
    <title>Dustbin</title>
     @include('layouts.css')
    <link href="{{ url('public/frontend/lib/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ url('public/frontend/lib/timepicker/jquery.timepicker.css') }}" rel="stylesheet">
    <link href="{{ url('public/frontend/lib/spectrum-colorpicker/spectrum.css') }}" rel="stylesheet">
    <link href="{{ url('public/frontend/lib/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet">
    <link href="{{ url('public/frontend/lib/ion-rangeslider/css/ion.rangeSlider.css') }}" rel="stylesheet">
    <link href="{{ url('public/frontend/lib/ion-rangeslider/css/ion.rangeSlider.skinFlat.css') }}" rel="stylesheet">
    <link href="{{ url('public/frontend/css/dropify.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/bracket.css') }}">
    <link href="{{ asset('public/frontend/sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
    @include('layouts.menu')
    <div class="br-mainpanel">      
        <div class="br-pagebody">
        <form method="POST" id="update-dustbin">            
            <div class="row row-sm ">
                <div class="mg-t-20 w-100"></div>
                <div class="col-lg-12">            
                    <div class="card shadow-base bd-0 pd-25 ">
                        <h6 class="tx-inverse tx-uppercase tx-bold tx-14 mg-t-10 mg-b-15">Edit Dustbin <button onclick="location.href='{{ url('dustbin-list') }}'" class="btn btn-primary pd-x-15 pd-y-10 tx-bold tx-spacing-4 tx-12 btn-sm float-right mg-y-0-force"><div>Back</div></button> </h6>
                        <div class="row">
                          <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Warehouse Name <span class="tx-danger">*</span></label>
                                   <!--  <input class="form-control" type="text" name="wid" value="{{ $decode['result']['warehouse_id'] }}" placeholder="Enter Warehouse Name" id="wid"> -->
                                    <select class="form-control select2" data-placeholder="Choose one" name="wid" id="wid" >
                                        <option label="Select">Select</option>
                                    </select>
                                     <small class="form-element-hint cus_error" style="display:none;color:red;">
                                                <strong id="msg_wid"></strong>
                                            </small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">GSMNumber <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="gsm_moblie_number" value="{{ $decode['result']['gsm_moblie_number'] }}" placeholder="Enter GSMNumber" id="gsm_moblie_number" readonly>
                                     <small class="form-element-hint cus_error" style="display:none;color:red;">
                                                <strong id="msg_gsm_moblie_number"></strong>
                                            </small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Dustbin Name <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="name" value="{{ $decode['result']['name'] }}" placeholder="Enter Dustbin Name" id="name">
                                     <small class="form-element-hint cus_error" style="display:none;color:red;">
                                                <strong id="msg_name"></strong>
                                            </small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Lat <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="latitude" value="{{ $decode['result']['latiude'] }}" placeholder="Enter Lat" id="latitude">
                                     <small class="form-element-hint cus_error" style="display:none;color:red;">
                                                <strong id="msg_latitude"></strong>
                                            </small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Long <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="longitude" value="{{ $decode['result']['longitude'] }}" placeholder="Enter Long" id="longitude">
                                     <small class="form-element-hint cus_error" style="display:none;color:red;">
                                                <strong id="msg_longitude"></strong>
                                            </small>
                                </div>
                            </div>
                             <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Adress<span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="fulladdress" value="{{ $decode['result']['address'] }}" placeholder="Enter Address" id="address">
                                     <small class="form-element-hint cus_error" style="display:none;color:red;">
                                                <strong id="msg_fulladdress"></strong>
                                            </small>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mg-b-10-force">
                                    <div id="map_canvas" style="width :100%;position: relative;height: 500px;">
                                   </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-layout-footer mg-t-30 tx-center">
                            <button class="btn btn-primary" type="submit">ADD</button>
                            <button class="btn btn-secondary">Cancel</button>
                        </div>
                    </div>
                </div>              
            </div>
        </div>
         @include('layouts.footer')
         <form>
         <input type="hidden" name="tocken" value="{{ Session::get('auth_key') }}" id="tocken">
    </div>
    <script src="{{ url('public/frontend/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('public/frontend/lib/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <script src="{{ url('public/frontend/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('public/frontend/lib/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ url('public/frontend/lib/moment/min/moment.min.js') }}"></script>
    <script src="{{ url('public/frontend/lib/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ url('public/frontend/lib/highlightjs/highlight.pack.min.js') }}"></script>
    <script src="{{ url('public/frontend/lib/select2/js/select2.min.js') }}"></script>
    <script src="{{ url('public/frontend/lib/timepicker/jquery.timepicker.min.js') }}"></script>
    <script src="{{ url('public/frontend/lib/spectrum-colorpicker/spectrum.js') }}"></script>
    <script src="{{ url('public/frontend/lib/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <script src="{{ url('public/frontend/lib/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ url('public/frontend/lib/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
    
    <script src="{{ url('public/frontend/js/dropify.min.js') }}"></script>
    <script src="{{ url('public/frontend/js/bracket.js') }}"></script>
    <script src="{{ asset('public/frontend/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('public/frontend/sweetalert/jquery.sweet-alert.custom.js') }}"></script>
    <script src="{{ url('public/frontend/frontendjs/updatedustbin.js') }}"></script>
    <script>
       var update_dustbin = "{{ env('API_URL').'updatedustbin' }}";
        var dustbin_list = "{{url('dustbin-list')}}";
      $(function(){
        'use strict'

        // Toggles
        $('.br-toggle').on('click', function(e){
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
        $('#tp2').timepicker({'scrollDefault': 'now'});
        $('#tp3').timepicker();

        $('#setTimeButton').on('click', function (){
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
            showPalette:true,
            color: '#DC3545',
            palette: [
                ['#1D2939', '#fff', '#0866C6','#23BF08', '#F49917'],
                ['#DC3545', '#17A2B8', '#6610F2', '#fa1e81', '#72e7a6']
            ]
        });


        // Rangeslider
        if($().ionRangeSlider) {
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
    </script>
    <script type="text/javascript">
       var map;
      var lat ="{{ $decode['result']['latiude'] }}";
       var long ="{{ $decode['result']['longitude'] }}";
       
    function initMap() {
        var myLatlng = new google.maps.LatLng(lat, long);
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
       geocoder.geocode({'latLng': myLatlng }, function(results, status) {
        //console.log(results);
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

        google.maps.event.addListener(marker, 'dragend', function (event) {
          geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
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
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCntPB-qN_-K60eVMgJkJEy8Dn2ZxvxC6Y&callback=initMap">
    </script>
    <script type="text/javascript">
    var valid_id = "{{ $decode['result']['warehouse_id'] }}";
    var list_ware = "{{ env('API_URL')}}";
  getwarehouse();
    //$('#wid').on('click',function(){
      function getwarehouse(){
      $.ajax({ 
                url : list_ware+'dropdownlistwarehouse',
                type : 'GET',
                headers:{ 
                    'Access-Control-Allow-Origin': '*', 
                    'Authorization' : $("#tocken").val(),
                },
                success : function(data){
                    //var res = $.parseJSON(data.result);
                  //console.log(res);return false;
                    $('#wid').html('<option value=""> Select</option>');
                    $.each(data.result, function() { 
                        var selected = '';
                        if(this['id'] == valid_id){
                         selected = 'selected';
                        } 
                        $('#wid').append($("<option "+ selected +"></option>").attr("value",this['id']).text(this['name'])); 
                    }); 
                },
            }); 
    }
   // });  
  
</script>
</body>

</html>