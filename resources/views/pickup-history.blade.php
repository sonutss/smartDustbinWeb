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
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="{{ url('public/frontend/css/bracket.css') }}">
</head>
<body>
    @include('layouts.menu')
    <div class="br-mainpanel">      
        <div class="br-pagebody">            
            <div class="row row-sm ">
            <div class="mg-t-20 w-100"></div>
                <div class="col-lg-12">            
                    <div class="card shadow-base bd-0 pd-25 ">                        
                        <h6 class="tx-inverse tx-uppercase tx-bold tx-14 mg-t-10">Daily Pickup History 
                            <button class="btn btn-primary pd-x-15 pd-y-10 tx-bold tx-spacing-4 tx-12 btn-sm float-right mg-y-0-force" onclick="resetAll();" style="margin-left:10px;"><div>Reset All</div></button>
                             <button onclick="location.href='{{url('dashboard') }}'" class="btn btn-primary pd-x-15 pd-y-10 tx-bold tx-spacing-4 tx-12 btn-sm float-right mg-y-0-force"><div>BACK</div></button>
                        </h6>
                        <div class="row">
                            <div class="input-group mg-r-20 col">
                                <select class="form-control select2" data-placeholder="Choose one" name="wid" id="wid" onchange="getData(1);">
                                    <option value="">Select</option>
                                </select>
                            </div>
                            <div class="input-group mg-r-20 col">
                                <input type="text" class="form-control daterange" placeholder="Select Date" name="datefilter">
                            </div> 
                           <!--  <div class="form-group mg-r-20 col">
                                <div class="custom-file">
                                    <input type="text" class="custom-file-input" id="customFile2">
                                    <label class="custom-file-label custom-file-label-primary" for="customFile2">Search</label>
                                </div>
                            </div> -->
                            <div class="form-group mg-r-20 col">
                                <select class="form-control select2" data-placeholder="Choose one " onchange="getData(1);" id="record">
                                     <option value="10">10 Records</option>
                                     <option value="25">25 Records</option>
                                     <option value="50">50 Records</option>
                                     <option value="100">100 Records</option>
                                </select>
                            </div>    
                        </div>
                       <div class="bd rounded table-responsive">
                            <table class="table table-bordered mg-b-0" id="pickuphistroy-list">
                                <thead class="thead-colored thead-light">
                                    <tr>
                                        <th>Daily Pickup ID</th>
                                        <th>Date</th>
                                        <th>Warehouse</th>
                                        <th>Vehicle</th>
                                        <th>Driver</th>
                                        <th>No. of dustbin</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <tr>
                                        <td><span class="text-success">or2</span></td>
                                        <td>20 jan, 2020</td>
                                        <td>Sec 5, Dubai mall.</td>
                                        <th>
                                            <a href="#" class="media-list-link ">
                                                <div class="pd-y-0-force pd-x-0-force media ">
                                                    <img src="img/ic-truck.png" alt="">
                                                    <div class="media-body">
                                                    <div>
                                                        <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Garbage Trucks</p>
                                                    </div>
                                                    <p class="tx-12 tx-gray-600 mg-b-0">DB254 2565</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </th>     
                                        <td>
                                            <a href="#" class="media-list-link">
                                                <div class="media pd-y-0-force pd-x-0-force">
                                                    <img src="img/img4.jpg" alt="">
                                                    <div class="media-body">
                                                    <div>
                                                        <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Samantha Francis</p>
                                                    </div>
                                                    <p class="tx-12 tx-gray-600 mg-b-0">+971 589658965</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>                                   
                                        <td><span class="text-success">20</span></td>
                                        <td>
                                            <button onclick="location.href='order-details.php'" class="btn btn-success btn-icon mg-b-10 btn-sm"><div><i class="fa fa-eye"></i></div></button>                                            
                                        </td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                        <div class="ht-80  d-flex align-items-center justify-content-center mg-t-20">
                            <ul class="pagination pagination-circle mg-b-0">
                                <!-- <li class="page-item hidden-xs-down">
                                    <a class="page-link" href="#" aria-label="First"><i class="fa fa-angle-double-left"></i></a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item disabled"><span class="page-link">...</span></li>
                                <li class="page-item"><a class="page-link" href="#">10</a></li>
                             
                                <li class="page-item hidden-xs-down">
                                    <a class="page-link" href="#" aria-label="Last"><i class="fa fa-angle-double-right"></i></a>
                                </li> -->
                            </ul>
                        </div>
                    </div>
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
    
    <script src="{{ url('public/frontend/lib/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ url('public/frontend/lib/highlightjs/highlight.pack.min.js') }}"></script>
    <script src="{{ url('public/frontend/lib/select2/js/select2.min.js') }}"></script>
    <script src="{{ url('public/frontend/js/tooltip-colored.js') }}"></script>
    <script src="{{ url('public/frontend/js/popover-colored.js') }}"></script>
    <script src="{{ url('public/frontend/lib/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ url('public/frontend/lib/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="{{ url('public/frontend/js/bracket.js') }}"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.2/jquery.twbsPagination.js"></script>
     <script type="text/javascript">
         var list_ware      = "{{ env('API_URL')}}";
         var pickup_history = "{{ url('pickup-history') }}";
    </script>
<script src="{{ url('public/frontend/frontendjs/pickup_history.js') }}"></script>
</body>

</html>