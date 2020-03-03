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
            <div class="row row-sm ">
                <div class="mg-t-20 w-100"></div>
                          
                <div class="col-lg-12">
                    <div class="card shadow-base bd-0 pd-25 ">
                        <h6 class="tx-inverse tx-uppercase tx-bold tx-14 mg-t-10 mg-b-15">Add Vehicle <button onclick="location.href='{{url('vehicle-list')}}'" class="btn btn-primary pd-x-15 pd-y-10 tx-bold tx-spacing-4 tx-12 btn-sm float-right mg-y-0-force"><div>Back</div></button> </h6>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Model <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="modelname" value="" placeholder="Enter Model" id="modelname">
                                     <small class="form-element-hint cus_error" style="display:none;color:red;">
                                        <strong id="msg_modelname"></strong>
                                    </small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Mfg Year <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="mgfyear" value="" placeholder="Enter Mfg Year" id="mgfyear" maxlength="4">
                                    <small class="form-element-hint cus_error" style="display:none;color:red;">
                                        <strong id="msg_mgfyear"></strong>
                                    </small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Company Name <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="companyname" value="" placeholder="Enter Company Name" id="companyname">
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
                                    <!-- <input class="form-control" type="text" name="trucktype" value="" placeholder="Enter Truck Type" id="trucktype"> -->
                                     <select class="form-control select2" data-placeholder="Choose one" name="trucktype" id="trucktype">
                                        <option label="Choose one">Select Vehicle</option>
                                        <option value="small">Small Vehicle</option>
                                        <option value="medium">Medium Vehicle</option>
                                        <option value="large">Large Vehicle</option>
                                    </select>
                                    <small class="form-element-hint cus_error" style="display:none;color:red;">
                                        <strong id="msg_trucktype"></strong>
                                    </small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Truck Capacity  <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="capacity" value="" placeholder="Enter Truck Capacity" id="capacity">
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
                                    <input class="form-control" type="text" name="vehiclerc" value="" placeholder="Enter Vehicle Number" id="vehiclerc">
                                    <small class="form-element-hint cus_error" style="display:none;color:red;">
                                        <strong id="msg_vehiclerc"></strong>
                                    </small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">RC Issue Date  <span class="tx-danger">*</span></label>
                                    <input class="form-control fc-datepicker" type="text" name="rcissue" value="" placeholder="Enter RC Issue Date " id="rcissue">
                                    <small class="form-element-hint cus_error" style="display:none;color:red;">
                                        <strong id="msg_rcissue"></strong>
                                    </small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">RC Expiry Date  <span class="tx-danger">*</span></label>
                                    <input class="form-control fc-datepicker" type="text" name="rcexpire" value="" placeholder="Enter RC Expiry Date" id="rcexpire">
                                    <small class="form-element-hint cus_error" style="display:none;color:red;">
                                        <strong id="msg_rcexpire"></strong>
                                    </small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Issuing Country  <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" data-placeholder="Choose one" name="issuecountry" id="issuecountry">
                                        <option label="Choose one">Select Country</option>
                                        <option value="India">India</option>
                                        <option value="UAE">UAE</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Bangladesh">Bangladesh</option>
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
                                    <input class="form-control" type="text" name="insuranceno" value="" placeholder="Enter Insurance Number" id="insuranceno">
                                    <small class="form-element-hint cus_error" style="display:none;color:red;">
                                        <strong id="msg_insuranceno"></strong>
                                    </small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Issue Date  <span class="tx-danger">*</span></label>
                                    <input class="form-control fc-datepicker" type="text" name="insuranceissuedate" value="" placeholder="Enter Issue Date " id="insuranceissuedate">
                                    <small class="form-element-hint cus_error" style="display:none;color:red;">
                                        <strong id="msg_insuranceissuedate"></strong>
                                    </small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Expiry Date  <span class="tx-danger">*</span></label>
                                    <input class="form-control fc-datepicker" type="text" name="insuranceexpiredate" value="" placeholder="Enter Expiry Date" id="insuranceexpiredate">
                                    <small class="form-element-hint cus_error" style="display:none;color:red;">
                                        <strong id="msg_insuranceexpiredate"></strong>
                                    </small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Insurance Company Name  <span class="tx-danger">*</span></label>
                                    <input class="form-control " type="text" name="insurancecompany" value="" placeholder="Enter Insurance Company Name" id="insurancecompany">
                                    <small class="form-element-hint cus_error" style="display:none;color:red;">
                                        <strong id="msg_insurancecompany"></strong>
                                    </small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Type of Cover  <span class="tx-danger">*</span></label>
                                    <input class="form-control " type="text" name="insurancecover" value="" placeholder="Enter Type of Cover" id="insurancecover">
                                    <small class="form-element-hint cus_error" style="display:none;color:red;">
                                        <strong id="msg_insurancecover"></strong>
                                    </small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Coverage Limit  <span class="tx-danger">*</span></label>
                                    <input class="form-control " type="text" name="coveragelimit" value="" placeholder="Enter Coverage Limit" id="coveragelimit">
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
                                    <input type="file" class="dropify" data-default-file="" name="vehiclephoto" id="vehiclephoto">  
                                </div>
                                <small class="form-element-hint cus_error" style="display:none;color:red;">
                                        <strong id="msg_vehiclephoto"></strong>
                                    </small>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Registration Card <span class="tx-danger">*</span></label>
                                    <input type="file" class="dropify" data-default-file="" name="registrationcard" id="registrationcard">  
                                </div>
                                <small class="form-element-hint cus_error" style="display:none;color:red;">
                                        <strong id="msg_registrationcard"></strong>
                                </small>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Insurance <span class="tx-danger">*</span></label>
                                    <input type="file" class="dropify" data-default-file="" name="insurancephoto" id="insurancephoto">  
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
      var addNewVehicle =  "{{ env('API_URL').'addNewVehicle' }}";
      var  vehicle_list = "{{url('vehicle-list')}}";
    </script>
    <script src="{{ url('public/frontend/frontendjs/vehicle_add.js') }}"></script>
</body>

</html>