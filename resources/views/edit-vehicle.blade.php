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
    <link rel="stylesheet" href="{{ url('public/frontend/css/bracket.css') }}">
    <link href="{{ asset('public/frontend/sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
     @include('layouts.menu') 
    <div class="br-mainpanel">      
        <div class="br-pagebody">   
        <form method="POST" id="add-vehicle" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="Vid" value="{{ $decode['result']['id'] }}" id="Vid">

            <div class="row row-sm ">
                <div class="mg-t-20 w-100"></div>
                          
                <div class="col-lg-12">
                    <div class="card shadow-base bd-0 pd-25 ">
                        <h6 class="tx-inverse tx-uppercase tx-bold tx-14 mg-t-10 mg-b-15">Add Vehicle <button onclick="location.href='vehicle.php'" class="btn btn-primary pd-x-15 pd-y-10 tx-bold tx-spacing-4 tx-12 btn-sm float-right mg-y-0-force"><div>Back</div></button> </h6>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Model <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="modelname" value="{{ $decode['result']['model_name'] }}" placeholder="Enter Model" id="modelname">
                                     <small class="form-element-hint cus_error" style="display:none;color:red;">
                                        <strong id="msg_modelname"></strong>
                                    </small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Mfg Year <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="mgfyear" value="{{ $decode['result']['mgf_year'] }}" placeholder="Enter Mfg Year" id="mgfyear" maxlength="4">
                                    <small class="form-element-hint cus_error" style="display:none;color:red;">
                                        <strong id="msg_mgfyear"></strong>
                                    </small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Company Name <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="companyname" value="{{ $decode['result']['company_name'] }}" placeholder="Enter Company Name" id="companyname">
                                    <small class="form-element-hint cus_error" style="display:none;color:red;">
                                        <strong id="msg_companyname"></strong>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>              
            </div>
            <div class="row row-sm ">
                <div class="mg-t-20 w-100"></div>
                <div class="col-lg-12">            
                    <div class="card shadow-base bd-0 pd-25 ">                        
                        <h6 class="tx-inverse tx-uppercase tx-bold tx-14 mg-t-10 mg-b-30">Vehicle Type Details </h6>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Truck Type <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="trucktype" value="{{ $decode['result']['trucktype'] }}" placeholder="Enter Truck Type" id="trucktype">
                                    <small class="form-element-hint cus_error" style="display:none;color:red;">
                                        <strong id="msg_trucktype"></strong>
                                    </small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Truck Capacity  <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="capacity" value="{{ $decode['result']['capacity'] }}" placeholder="Enter Truck Capacity" id="capacity">
                                     <small class="form-element-hint cus_error" style="display:none;color:red;">
                                        <strong id="msg_capacity"></strong>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>              
            </div>
            <div class="row row-sm ">
                <div class="mg-t-20 w-100"></div>
                <div class="col-lg-12">            
                    <div class="card shadow-base bd-0 pd-25 ">                        
                        <h6 class="tx-inverse tx-uppercase tx-bold tx-14 mg-t-10 mg-b-30">Vehicle Registration Details </h6>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Vehicle Number <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="vehiclerc" value="{{ $decode['result']['vehicle_rc'] }}" placeholder="Enter Vehicle Number" id="vehiclerc" readonly>
                                    <small class="form-element-hint cus_error" style="display:none;color:red;">
                                        <strong id="msg_vehiclerc"></strong>
                                    </small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">RC Issue Date  <span class="tx-danger">*</span></label>
                                    <input class="form-control fc-datepicker" type="text" name="rcissue" value="{{ $decode['result']['rc_issue'] }}" placeholder="Enter RC Issue Date " id="rcissue">
                                    <small class="form-element-hint cus_error" style="display:none;color:red;">
                                        <strong id="msg_rcissue"></strong>
                                    </small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">RC Expiry Date  <span class="tx-danger">*</span></label>
                                    <input class="form-control fc-datepicker" type="text" name="rcexpire" value="{{ $decode['result']['rc_expire'] }}" placeholder="Enter RC Expiry Date" id="rcexpire">
                                    <small class="form-element-hint cus_error" style="display:none;color:red;">
                                        <strong id="msg_rcexpire"></strong>
                                    </small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Issuing Country  <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" data-placeholder="Choose one" name="issuecountry" id="issuecountry">
                                        <option label="Choose one"></option>
                                        <option value="India" @if($decode['result']['issue_country'] == "India")selected="selected" @endif>India</option>
                                        <option value="UAE"  @if($decode['result']['issue_country'] == "UAE")selected="UAE" @endif>UAE</option>
                                        <option value="Nepal"  @if($decode['result']['issue_country'] == "Nepal")selected="selected" @endif>Nepal</option>
                                        <option value="Bangladesh"  @if($decode['result']['issue_country'] == "Bangladesh")selected="selected" @endif>Bangladesh</option>
                                    </select>
                                    <small class="form-element-hint cus_error" style="display:none;color:red;">
                                        <strong id="msg_issuecountry"></strong>
                                    </small>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>              
            </div>
            <div class="row row-sm ">
                <div class="mg-t-20 w-100"></div>
                <div class="col-lg-12">            
                    <div class="card shadow-base bd-0 pd-25 ">                        
                        <h6 class="tx-inverse tx-uppercase tx-bold tx-14 mg-t-10 mg-b-30">Insurance Details </h6>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Insurance Number <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="insuranceno" value="{{ $decode['result']['insurance_no'] }}" placeholder="Enter Vehicle Number" id="insuranceno">
                                    <small class="form-element-hint cus_error" style="display:none;color:red;">
                                        <strong id="msg_insuranceno"></strong>
                                    </small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Issue Date  <span class="tx-danger">*</span></label>
                                    <input class="form-control fc-datepicker" type="text" name="insuranceissuedate" value="{{ $decode['result']['insurance_issue_date'] }}" placeholder="Enter Issue Date " id="insuranceissuedate">
                                    <small class="form-element-hint cus_error" style="display:none;color:red;">
                                        <strong id="msg_insuranceissuedate"></strong>
                                    </small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Expiry Date  <span class="tx-danger">*</span></label>
                                    <input class="form-control fc-datepicker" type="text" name="insuranceexpiredate" value="{{ $decode['result']['insurance_expire_date'] }}" placeholder="Enter Expiry Date" id="insuranceexpiredate">
                                    <small class="form-element-hint cus_error" style="display:none;color:red;">
                                        <strong id="msg_insuranceexpiredate"></strong>
                                    </small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Insurance Company Name  <span class="tx-danger">*</span></label>
                                    <input class="form-control " type="text" name="insurancecompany" value="{{ $decode['result']['insurance_company'] }}" placeholder="Enter Insurance Company Name" id="insurancecompany">
                                    <small class="form-element-hint cus_error" style="display:none;color:red;">
                                        <strong id="msg_insurancecompany"></strong>
                                    </small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Type of Cover  <span class="tx-danger">*</span></label>
                                    <input class="form-control " type="text" name="insurancecover" value="{{ $decode['result']['insurance_cover'] }}" placeholder="Enter Type of Cover" id="insurancecover">
                                    <small class="form-element-hint cus_error" style="display:none;color:red;">
                                        <strong id="msg_insurancecover"></strong>
                                    </small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Coverage Limit  <span class="tx-danger">*</span></label>
                                    <input class="form-control " type="text" name="coveragelimit" value="{{ $decode['result']['coverage_limit'] }}" placeholder="Enter Coverage Limit" id="coveragelimit">
                                    <small class="form-element-hint cus_error" style="display:none;color:red;">
                                        <strong id="msg_coveragelimit"></strong>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>              
            </div>
            <div class="row row-sm ">
                <div class="mg-t-20 w-100"></div>
                <div class="col-lg-12">            
                    <div class="card shadow-base bd-0 pd-25 ">                        
                        <h6 class="tx-inverse tx-uppercase tx-bold tx-14 mg-t-10 mg-b-30">Document Upload (Please attach all applicable documents) </h6>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Vehicle Photo <span class="tx-danger">*</span></label>
                                    <input type="file" class="dropify" data-default-file="{{env('STORAGE_PATH')}}uploads/{{$decode['result']['vehicle_photo']}}" name="vehiclephoto" id="vehiclephoto" >  
                                </div>
                                <small class="form-element-hint cus_error" style="display:none;color:red;">
                                        <strong id="msg_vehiclephoto"></strong>
                                    </small>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Registration Card <span class="tx-danger">*</span></label>
                                    <input type="file" class="dropify" data-default-file="{{env('STORAGE_PATH')}}uploads/{{$decode['result']['registration_card']}}" name="registrationcard" id="registrationcard" >  
                                </div>
                                <small class="form-element-hint cus_error" style="display:none;color:red;">
                                        <strong id="msg_registrationcard"></strong>
                                </small>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Insurance <span class="tx-danger">*</span></label>
                                    <input type="file" class="dropify" data-default-file="{{env('STORAGE_PATH')}}uploads/{{$decode['result']['insurance_photo']}}" name="insurancephoto" id="insurancephoto" >  
                                </div>
                                <small class="form-element-hint cus_error" style="display:none;color:red;">
                                        <strong id="msg_insurancephoto"></strong>
                                </small>
                            </div>
                        </div>
                        <div class="form-layout-footer mg-t-30 tx-center">
                            <button type="submit" class="btn btn-primary">ADD</button>
                            <button class="btn btn-secondary">Cancel</button>
                        </div>
                    </div>
                    </form> 
                </div>              
            </div>
        </div>
        <input type="hidden" name="tocken" value="{{ Session::get('auth_key') }}" id="tocken">
         @include('layouts.footer')
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
    <script>
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
         $("form#add-vehicle").submit(function(){
            var start_date= $("#rcissue").val();
            var end_date = $("#rcexpire").val();
            var start_date1= $("#insuranceissuedate").val();
            var end_date1 = $("#insuranceexpiredate").val();
            var mgfyear         = $("#mgfyear").val();
            var capacity         = $("#capacity").val();
            var coveragelimit         = $("#coveragelimit").val();
            if($.trim($("#modelname").val())==''){
                    $("#submit").attr("disabled", false);
                    $('html, body').animate({scrollTop: $("#modelname").offset().top }, 1000);
                    $("#msg_modelname").parent().show();
                    $("#msg_modelname").text('Please enter model name!');
                    setTimeout(function(){ 
                        $("#msg_modelname").parent().hide();
                        $("#msg_modelname").text('');
                    }, 5000);
                    $("#modelname").focus();
                    return false ;
                } else if($.trim($("#mgfyear").val())==''){
                    $("#submit").attr("disabled", false);
                    $('html, body').animate({scrollTop: $("#mgfyear").offset().top }, 1000);
                    $("#msg_mgfyear").parent().show();
                    $("#msg_mgfyear").text('Please enter mgfyear !');
                    setTimeout(function(){ 
                    $("#msg_mgfyear").parent().hide();
                    $("#msg_mgfyear").text('');
                    }, 5000);
                    $("#mgfyear").focus();
                    return false ;
                }else if(!$.isNumeric(mgfyear)){
                    $('html, body').animate({scrollTop: $("#mgfyear").offset().top }, 1000);
                    $("#msg_mgfyear").parent().show();
                    $("#msg_mgfyear").text('Only digit Accepted !');
                    setTimeout(function(){ 
                    $("#msg_mgfyear").parent().hide();
                    $("#msg_mgfyear").text('');
                    }, 5000);
                    $("#mgfyear").focus();
                    return false ;
                }
                 else if($.trim($("#companyname").val())==''){
                    $("#submit").attr("disabled", false);
                    $('html, body').animate({scrollTop: $("#companyname").offset().top }, 1000);
                    $("#msg_companyname").parent().show();
                    $("#msg_companyname").text('Please enter companyname !');
                    setTimeout(function(){ 
                    $("#msg_companyname").parent().hide();
                    $("#msg_companyname").text('');
                    }, 5000);
                    $("#companyname").focus();
                    return false ;
                } 

                else if($.trim($("#trucktype").val())==''){
                    $("#submit").attr("disabled", false);
                    $('html, body').animate({scrollTop: $("#trucktype").offset().top }, 1000);
                    $("#msg_trucktype").parent().show();
                    $("#msg_trucktype").text('Please enter truck type !');
                    setTimeout(function(){ 
                    $("#msg_trucktype").parent().hide();
                    $("#msg_trucktype").text('');
                    }, 5000);
                    $("#trucktype").focus();
                    return false ;
                } 
                else if($.trim($("#capacity").val())==''){
                    $("#submit").attr("disabled", false);
                    $('html, body').animate({scrollTop: $("#capacity").offset().top }, 1000);
                    $("#msg_capacity").parent().show();
                    $("#msg_capacity").text('Please enter capacity !');
                    setTimeout(function(){ 
                    $("#msg_capacity").parent().hide();
                    $("#msg_capacity").text('');
                    }, 5000);
                    $("#capacity").focus();
                    return false ;
                }
                else if(!$.isNumeric(capacity)){
                    $('html, body').animate({scrollTop: $("#capacity").offset().top }, 1000);
                    $("#msg_capacity").parent().show();
                    $("#msg_capacity").text('Only digit Accepted !');
                    setTimeout(function(){ 
                    $("#msg_capacity").parent().hide();
                    $("#msg_capacity").text('');
                    }, 5000);
                    $("#capacity").focus();
                    return false ;
                } 
                else if($.trim($("#vehiclerc").val())==''){
                    $("#submit").attr("disabled", false);
                    $('html, body').animate({scrollTop: $("#vehiclerc").offset().top }, 1000);
                    $("#msg_vehiclerc").parent().show();
                    $("#msg_vehiclerc").text('Please enter vehicle rc !');
                    setTimeout(function(){ 
                    $("#msg_vehiclerc").parent().hide();
                    $("#msg_vehiclerc").text('');
                    }, 5000);
                    $("#vehiclerc").focus();
                    return false ;
                } 
                else if($.trim($("#rcissue").val())==''){
                    $("#submit").attr("disabled", false);
                    $('html, body').animate({scrollTop: $("#rcissue").offset().top }, 1000);
                    $("#msg_rcissue").parent().show();
                    $("#msg_rcissue").text('Please enter rc issue !');
                    setTimeout(function(){ 
                    $("#msg_rcissue").parent().hide();
                    $("#msg_rcissue").text('');
                    }, 5000);
                    $("#rcissue").focus();
                    return false ;
                } 
                else if($.trim($("#rcexpire").val())==''){
                    $("#submit").attr("disabled", false);
                    $('html, body').animate({scrollTop: $("#rcexpire").offset().top }, 1000);
                    $("#msg_rcexpire").parent().show();
                    $("#msg_rcexpire").text('Please enter rc expire !');
                    setTimeout(function(){ 
                    $("#msg_rcexpire").parent().hide();
                    $("#msg_rcexpire").text('');
                    }, 5000);
                    $("#rcexpire").focus();
                    return false ;
                } 
                else if(new Date(start_date) >= new Date(end_date)){
                    console.log("hello");
                    $("#submit").attr("disabled", false);
                    $('html, body').animate({scrollTop: $("#rcexpire").offset().top }, 1000);
                    $("#msg_rcexpire").parent().show();
                    $("#msg_rcexpire").text('Please enter greater than issue date !');
                    setTimeout(function(){ 
                    $("#msg_rcexpire").parent().hide();
                    $("#msg_rcexpire").text('');
                    }, 5000);
                    $("#rcexpire").focus();
                    return false ;
                } 
                else if($.trim($("#issuecountry").val())==''){
                    $("#submit").attr("disabled", false);
                    $('html, body').animate({scrollTop: $("#issuecountry").offset().top }, 1000);
                    $("#msg_issuecountry").parent().show();
                    $("#msg_issuecountry").text('Please enter issue country !');
                    setTimeout(function(){ 
                    $("#msg_issuecountry").parent().hide();
                    $("#msg_issuecountry").text('');
                    }, 5000);
                    $("#issuecountry").focus();
                    return false ;
                } 
                else if($.trim($("#insuranceno").val())==''){
                    $("#submit").attr("disabled", false);
                    $('html, body').animate({scrollTop: $("#insuranceno").offset().top }, 1000);
                    $("#msg_insuranceno").parent().show();
                    $("#msg_insuranceno").text('Please enter insurance no !');
                    setTimeout(function(){ 
                    $("#msg_insuranceno").parent().hide();
                    $("#msg_insuranceno").text('');
                    }, 5000);
                    $("#insuranceno").focus();
                    return false ;
                } 
                else if($.trim($("#insuranceissuedate").val())==''){
                    $("#submit").attr("disabled", false);
                    $('html, body').animate({scrollTop: $("#insuranceissuedate").offset().top }, 1000);
                    $("#msg_insuranceissuedate").parent().show();
                    $("#msg_insuranceissuedate").text('Please enter insurance issue date !');
                    setTimeout(function(){ 
                    $("#msg_insuranceissuedate").parent().hide();
                    $("#msg_insuranceissuedate").text('');
                    }, 5000);
                    $("#insuranceissuedate").focus();
                    return false ;
                } 
                else if($.trim($("#insuranceexpiredate").val())==''){
                    $("#submit").attr("disabled", false);
                    $('html, body').animate({scrollTop: $("#insuranceexpiredate").offset().top }, 1000);
                    $("#msg_insuranceexpiredate").parent().show();
                    $("#msg_insuranceexpiredate").text('Please enter insurance expire date !');
                    setTimeout(function(){ 
                    $("#msg_insuranceexpiredate").parent().hide();
                    $("#msg_insuranceexpiredate").text('');
                    }, 5000);
                    $("#insuranceexpiredate").focus();
                    return false ;
                } 
                else if(new Date(start_date1) >= new Date(end_date1)){
                    $("#submit").attr("disabled", false);
                    $('html, body').animate({scrollTop: $("#insuranceexpiredate").offset().top }, 1000);
                    $("#msg_insuranceexpiredate").parent().show();
                    $("#msg_insuranceexpiredate").text('Please enter greater than issue date !');
                    setTimeout(function(){ 
                    $("#msg_insuranceexpiredate").parent().hide();
                    $("#msg_insuranceexpiredate").text('');
                    }, 5000);
                    $("#insuranceexpiredate").focus();
                    return false ;
                } 
                else if($.trim($("#insurancecompany").val())==''){
                    $("#submit").attr("disabled", false);
                    $('html, body').animate({scrollTop: $("#insurancecompany").offset().top }, 1000);
                    $("#msg_insurancecompany").parent().show();
                    $("#msg_insurancecompany").text('Please enter insurance company !');
                    setTimeout(function(){ 
                    $("#msg_insurancecompany").parent().hide();
                    $("#msg_insurancecompany").text('');
                    }, 5000);
                    $("#insurancecompany").focus();
                    return false ;
                } 
                else if($.trim($("#insurancecover").val())==''){
                    $("#submit").attr("disabled", false);
                    $('html, body').animate({scrollTop: $("#insurancecover").offset().top }, 1000);
                    $("#msg_insurancecover").parent().show();
                    $("#msg_insurancecover").text('Please enter insurance cover !');
                    setTimeout(function(){ 
                    $("#msg_insurancecover").parent().hide();
                    $("#msg_insurancecover").text('');
                    }, 5000);
                    $("#insurancecover").focus();
                    return false ;
                } 
                else if($.trim($("#coveragelimit").val())==''){
                    $("#submit").attr("disabled", false);
                    $('html, body').animate({scrollTop: $("#coveragelimit").offset().top }, 1000);
                    $("#msg_coveragelimit").parent().show();
                    $("#msg_coveragelimit").text('Please enter coverage limit !');
                    setTimeout(function(){ 
                    $("#msg_coveragelimit").parent().hide();
                    $("#msg_coveragelimit").text('');
                    }, 5000);
                    $("#coveragelimit").focus();
                    return false ;
                } 
                else if(!$.isNumeric(coveragelimit)){
                    $('html, body').animate({scrollTop: $("#coveragelimit").offset().top }, 1000);
                    $("#msg_coveragelimit").parent().show();
                    $("#msg_coveragelimit").text('Only digit Accepted !');
                    setTimeout(function(){ 
                    $("#msg_coveragelimit").parent().hide();
                    $("#msg_coveragelimit").text('');
                    }, 5000);
                    $("#coveragelimit").focus();
                    return false ;
                }
                // else if($.trim($("#vehiclephoto").val())==''){
                //     $("#submit").attr("disabled", false);
                //     $('html, body').animate({scrollTop: $("#vehiclephoto").offset().top }, 1000);
                //     $("#msg_vehiclephoto").parent().show();
                //     $("#msg_vehiclephoto").text('Please enter vehicle photo !');
                //     setTimeout(function(){ 
                //     $("#msg_vehiclephoto").parent().hide();
                //     $("#msg_vehiclephoto").text('');
                //     }, 5000);
                //     $("#vehiclephoto").focus();
                //     return false ;
                // } 
                // else if($.trim($("#registrationcard").val())==''){
                //     $("#submit").attr("disabled", false);
                //     $('html, body').animate({scrollTop: $("#registrationcard").offset().top }, 1000);
                //     $("#msg_registrationcard").parent().show();
                //     $("#msg_registrationcard").text('Please enter registration card !');
                //     setTimeout(function(){ 
                //     $("#msg_registrationcard").parent().hide();
                //     $("#msg_registrationcard").text('');
                //     }, 5000);
                //     $("#registrationcard").focus();
                //     return false ;
                // } 
                // else if($.trim($("#insurancephoto").val())==''){
                //     $("#submit").attr("disabled", false);
                //     $('html, body').animate({scrollTop: $("#insurancephoto").offset().top }, 1000);
                //     $("#msg_insurancephoto").parent().show();
                //     $("#msg_insurancephoto").text('Please enter insurance photo !');
                //     setTimeout(function(){ 
                //     $("#msg_insurancephoto").parent().hide();
                //     $("#msg_insurancephoto").text('');
                //     }, 5000);
                //     $("#insurancephoto").focus();
                //     return false ;
                // } 
                else {
            var formData = new FormData($(this)[0]) ;
           // console.log(formData);//return false;
            $.ajax({
                url : "{{ env('API_URL').'updateVehicle' }}",
                type: 'PUT',
                
                data : formData,
                async:false, 
                headers:{ 
                            'Access-Control-Allow-Origin': '*',       
                            'Authorization' : $("#tocken").val()
                        }, 
                success: function(response){
                    $("#submit").attr("disabled", false);
                    console.log("response",response) ;
                     return false ;
                    //var res = $.parseJSON(response);
                    if(response.success == true){
                        swal("Success", response.message, "success");
                        setTimeout(function(){ 
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
                }, error: function(data){
                    $("#submit").attr("disabled", false);
                    var rr = $.parseJSON(data.responseText) ;
                    console.log('data',rr.success);
                    if(rr.success == false){
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
                cache : false ,
                contentType : false,
                processData: false 
            });
            return false ;
        }
    });
    </script>

</body>

</html>