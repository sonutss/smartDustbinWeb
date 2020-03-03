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
        <form method="POST" id="add-dustbin">            
            <div class="row row-sm ">
                <div class="mg-t-20 w-100"></div>
                <div class="col-lg-12">            
                    <div class="card shadow-base bd-0 pd-25 ">
                        <h6 class="tx-inverse tx-uppercase tx-bold tx-14 mg-t-10 mg-b-15">Add Dustbin <button onclick="location.href='{{url('dustbin-list')}}'" class="btn btn-primary pd-x-15 pd-y-10 tx-bold tx-spacing-4 tx-12 btn-sm float-right mg-y-0-force"><div>Back</div></button> </h6>
                        <div class="row">
                          <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Warehouse Name <span class="tx-danger">*</span></label>
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
                                    <input class="form-control" type="text" name="gsm_moblie_number" value="" placeholder="Enter GSMNumber" id="gsm_moblie_number">
                                     <small class="form-element-hint cus_error" style="display:none;color:red;">
                                                <strong id="msg_gsm_moblie_number"></strong>
                                            </small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Dustbin Name <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="name" value="" placeholder="Enter Dustbin Name" id="name">
                                     <small class="form-element-hint cus_error" style="display:none;color:red;">
                                                <strong id="msg_name"></strong>
                                            </small>
                                </div>
                            </div>
                             <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Adress<span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="fulladdress" value="" placeholder="Enter Address" id="address">
                                     <small class="form-element-hint cus_error" style="display:none;color:red;">
                                                <strong id="msg_fulladdress"></strong>
                                            </small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <!-- <label class="form-control-label">Lat <span class="tx-danger">*</span></label> -->
                                    <input class="form-control" type="hidden" name="latitude" value="" placeholder="Enter Lat" id="latitude">
                                     <small class="form-element-hint cus_error" style="display:none;color:red;">
                                                <strong id="msg_latitude"></strong>
                                            </small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <!-- <label class="form-control-label">Long <span class="tx-danger">*</span></label> -->
                                    <input class="form-control" type="hidden" name="longitude" value="" placeholder="Enter Long" id="longitude">
                                     <small class="form-element-hint cus_error" style="display:none;color:red;">
                                                <strong id="msg_longitude"></strong>
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
    <script src="{{ url('public/frontend/frontendjs/add_dustbin.js') }}"></script>
    <script>
       var add_dustbin = "{{ env('API_URL').'addnewdustbin' }}";
       var list_ware = "{{ env('API_URL')}}";
        var dustbin_list = "{{url('dustbin-list')}}";
    </script>
    <script src="{{ url('public/frontend/frontendjs/dustbin_add.js') }}"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCntPB-qN_-K60eVMgJkJEy8Dn2ZxvxC6Y&callback=initMap">
    </script>
</body>
</html>