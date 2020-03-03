<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content=".">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dustbin</title>
     @include('layouts.css')
    <link href="{{ url('public/frontend/lib/select2/css/select2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('public/frontend/css/bracket.css') }}">
    <link rel="stylesheet" href="{{ url('public/frontend/css/style.css') }}">
    <link href="{{ asset('public/frontend/sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css">
    <style>
        .selectdRow{
           background: darkseagreen;
        }
         .selectdRowdefault{
           background: green;
        }
    </style> 
</head>
<body>
    @include('layouts.menu')
       
        <!-- driver list end -->
        <div class="br-mainpanel">
            <div class="br-pagebody">
                <div class="row row-sm ">
                    <div class="mg-t-20 w-100"></div>
                    <div class="col-lg-12">
                        <div class="card pd-30 shadow-base bd-0">
                            <div class="d-lg-flex justify-content-lg-between align-items-lg-center">
                                <div class="mg-b-20 mg-lg-b-0">
                                    <h4 class="tx-normal tx-roboto tx-inverse mg-b-20 w-100">Vehicle Driver Mapping</h4>
                                </div>
                            </div>
                            <div class="row row-sm mg-t-20" id="vehicle-list">
                            
                            </div>
                            <div class="ht-80  d-flex align-items-center justify-content-center mg-t-20">
                                <ul class="pagination pagination-circle mg-b-0 mg-t-30">
                                   
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            @include('layouts.footer')
        </div>


    <div class="br-sideright" id="left">
            <ul class="nav nav-tabs sidebar-tabs" role="tablist"></ul>
            <div class="tab-content">
                <div class="tab-pane pos-absolute a-0 mg-t-60 contact-scrollbar active" id="contacts" role="tabpanel">
                    <label class="sidebar-label pd-x-25 mg-t-25 mg-b-20">Driver List</label>
                    <div class="contact-list pd-x-10">
                        <!-- <div class="input-group mg-b-20 mg-l-15 mg-r-15">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
                            </div>
                        </div> -->
                        <a href="#" class="contact-list-link new" id="driver-list">
                            <!-- <div class="d-flex">
                                <div class="pos-relative">
                                    <img src="{{ url('public/frontend/img/img2.jpg') }}" alt="">
                                    <div class="contact-status-indicator bg-success"></div>
                                </div>
                                <div class="contact-person">
                                    <p>Driver Name</p>
                                    <span>Mobile No.</span>
                                </div>
                            </div> -->
                        </a>
                       <!--  <a href="#" class="contact-list-link">
                            <div class="d-flex">
                                <div class="pos-relative">
                                    <img src="{{ url('public/frontend/img/img3.jpg') }}" alt="">
                                    <div class="contact-status-indicator bg-success"></div>
                                </div>
                                <div class="contact-person">
                                    <p>Driver Name</p>
                                    <span>Mobile No.</span>
                                </div>
                            </div>
                        </a> -->
                       <!--  <a href="#" class="contact-list-link new">
                            <div class="d-flex">
                                <div class="pos-relative">
                                    <img src="{{ url('public/frontend/img/img4.jpg') }}" alt="">
                                    <div class="contact-status-indicator bg-success"></div>
                                </div>
                                <div class="contact-person">
                                    <p>Driver Name</p>
                                    <span>Mobile No.</span>
                                </div>
                            </div>
                        </a> -->
                       <!--  <a href="#" class="contact-list-link new">
                            <div class="d-flex">
                                <div class="pos-relative">
                                    <img src="{{ url('public/frontend/img/img5.jpg') }}" alt="">
                                    <div class="contact-status-indicator bg-success"></div>
                                </div>
                                <div class="contact-person">
                                    <p>Driver Name</p>
                                    <span>Mobile No.</span>
                                </div>
                            </div>
                        </a> -->
                        <!-- <a href="#" class="contact-list-link">
                            <div class="d-flex">
                                <div class="pos-relative">
                                    <img src="{{ url('public/frontend/img/img6.jpg') }}" alt="">
                                    <div class="contact-status-indicator bg-success"></div>
                                </div>
                                <div class="contact-person">
                                    <p>Driver Name</p>
                                    <span>Mobile No.</span>
                                </div>
                            </div>
                        </a> -->
                       <!--  <a href="#" class="contact-list-link">
                            <div class="d-flex">
                                <div class="pos-relative">
                                    <img src="{{ url('public/frontend/img/img7.jpg') }}" alt="">
                                    <div class="contact-status-indicator bg-success"></div>
                                </div>
                                <div class="contact-person">
                                    <p>Driver Name</p>
                                    <span>Mobile No.</span>
                                </div>
                            </div>
                        </a> -->
                        <!-- <a href="#" class="contact-list-link">
                            <div class="d-flex">
                                <div class="pos-relative">
                                    <img src="{{ url('public/frontend/img/img8.jpg') }}" alt="">
                                    <div class="contact-status-indicator bg-success"></div>
                                </div>
                                <div class="contact-person">
                                    <p>Driver Name</p>
                                    <span>Mobile No.</span>
                                </div>
                            </div>
                        </a> -->
                        <div class="button-bottom">
                            <button class="btn btn-primary mg-l-100" onclick="SubmitData()" id="assign">Assign</button>
                            <button class="btn btn-primary mg-l-10" onclick="cancel()" id="cancel">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="tocken" value="{{ Session::get('auth_key') }}" id="tocken">

        <input type="hidden" id="slide_value" value="0">
         <input type="hidden" id="selectedrow" value="-1">
        <script src="{{ url('public/frontend/lib/jquery/jquery.min.js') }}"></script>
        <script src="{{ url('public/frontend/lib/jquery-ui/ui/widgets/datepicker.js') }}"></script>
        <script src="{{ url('public/frontend/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ url('public/frontend/lib/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ url('public/frontend/lib/moment/min/moment.min.js') }}"></script>
        <script src="{{ url('public/frontend/lib/peity/jquery.peity.min.js') }}"></script>
        <script src="{{ url('public/frontend/lib/highlightjs/highlight.pack.min.js') }}"></script>
        <script src="{{ url('public/frontend/lib/select2/js/select2.min.js') }}"></script>
        <script src="{{ url('public/frontend/js/tooltip-colored.js') }}"></script>
        <script src="{{ url('public/frontend/js/popover-colored.js') }}"></script>
        <!-- <script src="{{ url('public/frontend/js/bracket.js') }}"></script> -->
         <script src="{{ asset('public/frontend/sweetalert/sweetalert.min.js') }}"></script>
         <script src="{{ asset('public/frontend/sweetalert/jquery.sweet-alert.custom.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.2/jquery.twbsPagination.js"></script>
        <script>
            $(".select2").select2();
           var driver_vehicle_mapping =  "{{ url('driver-vehicle-mapping') }}";
           var driver_not_assign      =  "{{ url('driver-not-assign') }}";
           var mappedVehicledriver    =  "{{ env('API_URL').'mappedVehicledriver' }}";
        </script> 
        <script src="{{ url('public/frontend/frontendjs/mapping.js') }}"></script>

</body>

</html>