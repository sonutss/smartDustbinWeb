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
        <form method="POST" id="update-driver" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">    
          <input type="hidden" name="did" value="{{ $decode['result']['id'] }}" id="did">    
            <div class="row row-sm ">
                <div class="mg-t-20 w-100"></div>
                <div class="col-lg-12">            
                    <div class="card shadow-base bd-0 pd-25 ">
                        <h6 class="tx-inverse tx-uppercase tx-bold tx-14 mg-t-10 mg-b-15">Add Driver <button onclick="location.href='{{ url('driver-list') }}'" class="btn btn-primary pd-x-15 pd-y-10 tx-bold tx-spacing-4 tx-12 btn-sm float-right mg-y-0-force"><div>Back</div></button> </h6>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Driver Name<span class="tx-danger">*</span></label>
                                            <input class="form-control" type="text" name="drivername" value="{{ $decode['result']['name'] }}" placeholder="Enter Driver Name" id="drivername" maxlength="28">
                                            <small class="form-element-hint cus_error" style="display:none;color:red;">
                                                <strong id="msg_drivername"></strong>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mg-b-10-force">
                                            <label class="form-control-label">Mobile No. <span class="tx-danger">*</span></label>
                                            <input class="form-control" type="text" name="mobileno" value="{{ $decode['result']['mobile_no'] }}" placeholder="Enter Contact No." id="mobileno" maxlength="12">
                                            <small class="form-element-hint cus_error" style="display:none;color:red;">
                                                <strong id="msg_mobileno"></strong>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mg-b-10-force">
                                            <label class="form-control-label"> Email ID <span class="tx-danger">*</span></label>
                                            <input class="form-control" type="text" name="email" value="{{ $decode['result']['email'] }}" placeholder="Enter Email ID" id="email">
                                            <small class="form-element-hint cus_error" style="display:none;color:red;">
                                                <strong id="msg_email"></strong>
                                            </small>
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-6">
                                        <div class="form-group mg-b-10-force">
                                            <label class="form-control-label">App password <span class="tx-danger">*</span></label>
                                            <input class="form-control" type="text" name="address" value="" placeholder="Enter App password">
                                        </div>
                                    </div> -->
                                    <div class="col-lg-6">
                                        <div class="form-group mg-b-10-force">
                                            <label class="form-control-label">Nationality <span class="tx-danger">*</span></label>
                                            <select class="form-control select2" data-placeholder="Choose one " name="nationality" id="nationality">
                                                <option label="Choose one">Nationality</option>
                                                <option value="Indian" @if($decode['result']['nationality'] =='Indian') selected="selected" @endif>Indian</option>
                                                <option value="United Arab Emirates" @if($decode['result']['nationality'] =='United Arab Emirates') selected="selected" @endif>United Arab Emirates</option>
                                            </select>
                                            <small class="form-element-hint cus_error" style="display:none;color:red;">
                                                <strong id="msg_nationality"></strong>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group mg-b-10-force tx-center">
                                            <label class="form-control-label">Photo <span class="tx-danger">*</span></label>
                                            <div class=" mg-l-auto mg-r-auto" style="max-width: 200px;">
                                                <input  type="file" class="dropify" data-default-file="{{env('STORAGE_PATH')}}drivers/{{ $decode['result']['driver_image'] }}" name="driverimage" id="driverimage">
                                                <small class="form-element-hint cus_error" style="display:none;color:red;">
                                                <strong id="msg_driverimage"></strong>
                                            </small> 
                                            </div>
                                        </div>
                                    </div>
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
                        <h6 class="tx-inverse tx-uppercase tx-bold tx-14 mg-t-10 mg-b-30">Current Address </h6>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Street / Address <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="caddress" value="{{ $decode['result']['c_address'] }}" placeholder="Enter Street / Address" id="caddress">
                                    <small class="form-element-hint cus_error" style="display:none;color:red;">
                                                <strong id="msg_caddress"></strong>
                                            </small>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">City <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="ccity" value="{{ $decode['result']['c_city'] }}" placeholder="Enter City" id="ccity">
                                    <small class="form-element-hint cus_error" style="display:none;color:red;">
                                                <strong id="msg_ccity"></strong>
                                            </small>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">State <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="cstate" value="{{ $decode['result']['c_state'] }}" placeholder="Enter State" id="cstate">
                                    <small class="form-element-hint cus_error" style="display:none;color:red;">
                                                <strong id="msg_cstate"></strong>
                                            </small>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Country  <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" data-placeholder="Choose one " name="ccountry" id="ccountry">
                                        <option label="Choose one">Country</option>
                                        <option value="Indian"  @if($decode['result']['c_country'] =='Indian') selected="selected" @endif>Indian</option>
                                        <option value="United Arab Emirates"  @if($decode['result']['c_country'] =='United Arab Emirates') selected="selected" @endif>United Arab Emirates</option>
                                    </select>
                                    <small class="form-element-hint cus_error" style="display:none;color:red;">
                                                <strong id="msg_ccountry"></strong>
                                            </small>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">PO Box  <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="cpobox" value="{{ $decode['result']['c_po_box'] }}" placeholder="Enter PO Box" id="cpobox">
                                    <small class="form-element-hint cus_error" style="display:none;color:red;">
                                                <strong id="msg_cpobox"></strong>
                                            </small>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Ref. Person Name  <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="crefname" value="{{ $decode['result']['c_ref_name'] }}" placeholder="Enter Ref. Person Name" id="crefname">
                                    <small class="form-element-hint cus_error" style="display:none;color:red;">
                                                <strong id="msg_crefname"></strong>
                                            </small>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Ref. Person Number <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="crefno" value="{{ $decode['result']['c_ref_no'] }}" placeholder="Enter Ref. Person Number" id="crefno">
                                    <small class="form-element-hint cus_error" style="display:none;color:red;">
                                                <strong id="msg_crefno"></strong>
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
                        <h6 class="tx-inverse tx-uppercase tx-bold tx-14 mg-t-10 mg-b-30">Permanent Address </h6>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Street / Address <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="paddress" value="{{ $decode['result']['p_address'] }}" placeholder="Enter Street / Address" id="paddress">
                                    <small class="form-element-hint cus_error" style="display:none;color:red;">
                                                <strong id="msg_paddress"></strong>
                                            </small>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">City <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="pcity" value="{{ $decode['result']['p_city'] }}" placeholder="Enter City" id="pcity">
                                    <small class="form-element-hint cus_error" style="display:none;color:red;">
                                                <strong id="msg_pcity"></strong>
                                            </small>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">State <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="pstate" value="{{ $decode['result']['p_state'] }}" placeholder="Enter State" id="pstate">
                                    <small class="form-element-hint cus_error" style="display:none;color:red;">
                                                <strong id="msg_pstate"></strong>
                                            </small>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Country  <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" data-placeholder="Choose one " name="pcountry" id="pcountry">
                                        <option label="Choose one">Country</option>
                                        <option value="Indian"  @if($decode['result']['p_country'] =='Indian') selected="selected" @endif>Indian</option>
                                        <option value="United Arab Emirates" @if($decode['result']['p_country'] =='United Arab Emirates') selected="selected" @endif>United Arab Emirates</option>
                                    </select>
                                    <small class="form-element-hint cus_error" style="display:none;color:red;">
                                                <strong id="msg_pcountry"></strong>
                                            </small>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">PO Box  <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="ppobox" value="{{ $decode['result']['p_po_box'] }}" placeholder="Enter PO Box" id="ppobox">
                                    <small class="form-element-hint cus_error" style="display:none;color:red;">
                                                <strong id="msg_ppobox"></strong>
                                            </small>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Ref. Person Name  <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="prefname" value="{{ $decode['result']['p_ref_name'] }}" placeholder="Enter Ref. Person Name" id="prefname">
                                    <small class="form-element-hint cus_error" style="display:none;color:red;">
                                                <strong id="msg_prefname"></strong>
                                            </small>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Ref. Person Number <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="prefno" value="{{ $decode['result']['p_ref_no'] }}" placeholder="Enter Ref. Person Number" id="prefno">
                                    <small class="form-element-hint cus_error" style="display:none;color:red;">
                                                <strong id="msg_prefno"></strong>
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
                        <h6 class="tx-inverse tx-uppercase tx-bold tx-14 mg-t-10 mg-b-30">Documents </h6>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Passport <span class="tx-danger">*</span></label>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Issue Date  <span class="tx-danger">*</span></label>
                                                <input class="form-control fc-datepicker" type="text" name="passportissuedate" value="{{ $decode['result']['passport_issue_date'] }}" placeholder="Issue Date " id="passportissuedate">
                                                <small class="form-element-hint cus_error" style="display:none;color:red;">
                                                <strong id="msg_passportissuedate"></strong>
                                            </small>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Expire Date  <span class="tx-danger">*</span></label>
                                                <input class="form-control fc-datepicker" type="text" name="passportexpiredate" value="{{ $decode['result']['passport_expire_date'] }}" placeholder="Expire Date " id="passportexpiredate">
                                                <small class="form-element-hint cus_error" style="display:none;color:red;">
                                                <strong id="msg_passportexpiredate"></strong>
                                            </small>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="file" class="dropify" data-default-file="{{env('STORAGE_PATH')}}drivers/{{ $decode['result']['passport_image'] }}" name="passportimage" id="passportimage">
                                    <small class="form-element-hint cus_error" style="display:none;color:red;">
                                                <strong id="msg_passportimage"></strong>
                                            </small>  
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">National ID <span class="tx-danger">*</span></label>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Issue Date  <span class="tx-danger">*</span></label>
                                                <input class="form-control fc-datepicker" type="text" name="nationalidissuedate" value="{{ $decode['result']['national_id_issue_date'] }}" placeholder="Issue Date " id="nationalidissuedate">
                                                <small class="form-element-hint cus_error" style="display:none;color:red;">
                                                <strong id="msg_nationalidissuedate"></strong>
                                            </small>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Expire Date  <span class="tx-danger">*</span></label>
                                                <input class="form-control fc-datepicker" type="text" name="nationalidexpiredate" value="{{ $decode['result']['national_id_expire_date'] }}" placeholder="Expire Date " id="nationalidexpiredate">
                                                <small class="form-element-hint cus_error" style="display:none;color:red;">
                                                <strong id="msg_nationalidexpiredate"></strong>
                                            </small>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="file" class="dropify" data-default-file="{{env('STORAGE_PATH')}}drivers/{{ $decode['result']['national_id_image'] }}" id="nationalidimage" name="nationalidimage">  
                                    <small class="form-element-hint cus_error" style="display:none;color:red;">
                                                <strong id="msg_nationalidimage"></strong>
                                            </small>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Driving Licence <span class="tx-danger">*</span></label>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Issue Date  <span class="tx-danger">*</span></label>
                                                <input class="form-control fc-datepicker" type="text" name="drivinglicissuedate" value="{{ $decode['result']['driving_lic_issue_date'] }}" placeholder="Issue Date " id="drivinglicissuedate">
                                                <small class="form-element-hint cus_error" style="display:none;color:red;">
                                                <strong id="msg_drivinglicissuedate"></strong>
                                            </small>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Expire Date  <span class="tx-danger">*</span></label>
                                                <input class="form-control fc-datepicker" type="text" name="drivinglicexpiredate" id="drivinglicexpiredate" placeholder="Expire Date " value="{{ $decode['result']['driving_lic_expire_date'] }}">
                                                <small class="form-element-hint cus_error" style="display:none;color:red;">
                                                <strong id="msg_drivinglicexpiredate"></strong>
                                            </small>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="file" class="dropify" data-default-file="{{env('STORAGE_PATH')}}drivers/{{ $decode['result']['driving_lic_image'] }}" id="drivinglicimage" name="drivinglicimage">
                                    <small class="form-element-hint cus_error" style="display:none;color:red;">
                                                <strong id="msg_drivinglicimage"></strong>
                                            </small>  
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Visa <span class="tx-danger">*</span></label>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Issue Date  <span class="tx-danger">*</span></label>
                                                <input class="form-control fc-datepicker" type="text" name="visaissuedate" value="{{ $decode['result']['visa_issue_date'] }}" placeholder="Issue Date " id="visaissuedate">
                                                <small class="form-element-hint cus_error" style="display:none;color:red;">
                                                <strong id="msg_visaissuedate"></strong>
                                            </small>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Expire Date  <span class="tx-danger">*</span></label>
                                                <input class="form-control fc-datepicker" type="text" name="visaexpiredate" value="{{ $decode['result']['visa_expire_date'] }}" placeholder="Expire Date " id="visaexpiredate">
                                                <small class="form-element-hint cus_error" style="display:none;color:red;">
                                                <strong id="msg_visaexpiredate"></strong>
                                            </small>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="file" class="dropify" data-default-file="{{env('STORAGE_PATH')}}drivers/{{ $decode['result']['visa_image'] }}" name="visaimage" id="visaimage">
                                    <small class="form-element-hint cus_error" style="display:none;color:red;">
                                                <strong id="msg_visaimage"></strong>
                                            </small>  
                                </div>
                            </div>
                        </div>
                        <div class="form-layout-footer mg-t-30 tx-center">
                            <button type="submit" class="btn btn-primary">ADD</button>
                            <button class="btn btn-secondary">Cancel</button>
                        </div>
                    </div>
                </div>              
            </div>
        </div>
        </form> 
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
    <script src="{{ url('public/frontend/frontendjs/update_driver.js') }}"></script>
    <script>
        var update_driver = "{{ env('API_URL').'updateDriver' }}";
        var driver_list = "{{url('driver-list')}}";
    </script>
</body>

</html>