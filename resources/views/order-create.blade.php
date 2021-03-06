<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content=".">
    <meta name="author" content="">
    <title>Dustbin</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('layouts.css')
    <link href="{{ url('public/frontend/lib/select2/css/select2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('public/frontend/css/bracket.css') }}">
    <link href="{{ asset('public/frontend/sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css">
    <style type="text/css">
        .show-grid [class^=col-] {
            padding-top: 10px;
            padding-bottom: 10px;
            border: 1px solid #ddd;
            border: 1px solid rgba(86,61,124,.2);
            list-style: none;
        }
        .inactive { 
           color: #ccc;
            background-color: #fafafa;
        } 
    </style>
</head>
<body>
    @include('layouts.menu')
    <div class="br-mainpanel">      
        <div class="br-pagebody">            
            <div class="row row-sm ">
            <div class="mg-t-20 w-100"></div>
                <div class="col-lg-12">            
                    <div class="card shadow-base bd-0 pd-25 ">                        
                        <h6 class="tx-inverse tx-uppercase tx-bold tx-14 mg-t-10">Dustbin List 
                            <button onclick="location.href='{{url('pickup')}}'" class="btn btn-primary pd-x-15 pd-y-10 tx-bold tx-spacing-4 tx-12 btn-sm float-right mg-y-0-force"><div>BACK</div></button>
                           <!--  <div class="form-group float-right mg-r-20" style="width:250px;">
                                <select class="form-control select2" data-placeholder="Choose one ">
                                    <option label="Choose one">No. od records</option>
                                    <option value="Firefox"></option>
                                </select>
                            </div>  --> 
                        </h6>
                            <div>
                                <div class="row">
                                    <div class="input-group col-md-4" style="margin-right: 0px;">
                                        <select class="form-control select2" data-placeholder="Choose one" name="wid" id="wid" onchange="getData(1);">
                                            <option value="">Select Warehouse</option>
                                        </select>
                                    </div>
                                 <div class="form-group col-md-4" style="margin-right: 0px;">
                                    <select class="form-control select2" data-placeholder="Choose one " onchange="getData(1);" id="dataperfrom">
                                         <option value="">Select Datapercentage</option>
                                         <option value="10">0-10%</option>
                                         <option value="25">0-25%</option>
                                         <option value="50">0-50%</option>
                                         <option value="75">0-75%</option>
                                         <option value="100">0-100%</option>
                                    </select>
                                </div> 
                                <div class="form-group col-md-4" style="margin-right: 0px;">
                                    <select class="form-control select2" data-placeholder="Choose one " onchange="getData(1);" id="record">
                                         <option value="10">10 Records</option>
                                         <option value="25">25 Records</option>
                                         <option value="50">50 Records</option>
                                         <option value="100">100 Records</option>
                                    </select>
                                </div>    
                            </div>                        
                            <div  id="pickup"></div>   
                           <!--  <table class="table table-bordered mg-b-0" id="pickup">
                                <thead class="thead-colored thead-light">
                                    <tr>
                                        <th>
                                            <label class="ckbox mg-b-0">
                                                <input type="checkbox">
                                                <span></span>
                                            </label> 
                                        </th>
                                        <th>Dustbin Name</th>
                                        <th>GSM Number</th>
                                        <th>Distance</th>
                                        <th>Duration</th>
                                        <th>Data Percentage</th>
                                       
                                    </tr>
                                </thead>
                                <tbody> -->
                                    <!-- <tr>
                                        <td scope="row">1</td>
                                        <td>
                                            <label class="ckbox">
                                                <input type="checkbox">
                                                <span></span>
                                            </label>                                           
                                        </td>
                                        <td>DN-4545</td>
                                        <td>5798555697864</td>
                                        <td>7879898797667</td>                                       
                                        <td><span class="text-danger">60%</span></td>
                                      
                                    </tr>
                                    <tr>
                                        <td scope="row">2</th>
                                        <td>
                                            <label class="ckbox">
                                                <input type="checkbox">
                                                <span></span>
                                            </label> 
                                        </td>
                                        <td>DN-4545</td>
                                        <td>5798555697864</td>
                                        <td>7879898797667</td>                                       
                                        <td><span class="text-danger">80%</span></td>
                                       
                                    </tr> -->
                               <!--  </tbody>
                            </table> -->

                        </div>
                    </div>
                      <!--   <div class="form-layout-footer mg-t-30 tx-center">
                            <button class="btn btn-primary">Create</button>
                            <button class="btn btn-secondary">Cancel</button>
                        </div> -->
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
         <div id="modaldemo8" class="modal fade">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content bd-0 tx-14">
                <div class="modal-header pd-y-20 pd-x-25">
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Availabe Driver</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body pd-25">
                    <div class="bd table-responsive">
                        <table class="table table-bordered" id="available-vehicle">
                            <thead class="thead-colored thead-light">
                                <tr>                                
                                    <th>Driver</th>
                                    <th>Vehicle</th>
                                    <th>Vehicle capacity</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                
                            </tbody>
                        </table>
                    </div>
                   <div class="ht-80  d-flex align-items-center justify-content-center mg-t-20">
                        <ul class="pagination pagination-circle mg-b-0">
                        </ul>
                    </div>
                </div>
               <!--  <div class="modal-footer">
                <button type="button" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" onclick="saveModalData()">Assign</button>
                  <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-dismiss="modal">Close</button>
                </div> -->
              </div>
            </div>
          </div>
          <!-- modela -->
          <div id="modaldemo9" class="modal fade">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content bd-0 tx-14">
                <div class="modal-header pd-y-20 pd-x-25">
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Un-availabe Driver</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body pd-25">
                    <div class="bd table-responsive">
                        <table class="table table-bordered" id="available-vehicle">
                            <thead class="thead-colored thead-light">
                                <tr>                                   
                                    <th>Driver</th>
                                    <th>Vehicle</th>
                                    <th>Vehicle capacity</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                
                            </tbody>
                        </table>
                    </div>
                   <div class="ht-80  d-flex align-items-center justify-content-center mg-t-20">
                        <ul class="pagination pagination-circle mg-b-0">
                        </ul>
                    </div>
                </div>
                <!-- <div class="modal-footer">
                <button type="button" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" onclick="saveModalData()">Assign</button>
                  <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-dismiss="modal">Close</button>
                </div> -->
              </div>
            </div>
          </div>
        <input type="hidden" name="groupname" id="groupname" value="{{ uniqid() }}">
        <input type="hidden" name="assigndate" id="assigndate" value="{{ date('Y-m-d H:i:s') }}">
        <input type="hidden" name="tocken" id="tocken" value="{{ Session::get('auth_key') }}">
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
    <script src="{{ url('public/frontend/js/tooltip-colored.js') }}"></script>
    <script src="{{ url('public/frontend/js/popover-colored.js') }}"></script>
    <script src="{{ url('public/frontend/js/bracket.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.2/jquery.twbsPagination.js"></script>
    <script src="{{ asset('public/frontend/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('public/frontend/sweetalert/jquery.sweet-alert.custom.js') }}"></script>
    <script>
        var list_ware               =  "{{ env('API_URL')}}";
        var pickup_create           = "{{ url('pickup-create') }}";
        var postdata                = "{{ env('API_URL') }}";
        var pickup                  = "{{ url('pickup') }}";
        var available_vehicle       = "{{url('available-vehicle')}}";
        var notavailable_vehicle    = "{{url('notavailable-vehicle')}}";
    </script>
    <script src="{{ url('public/frontend/frontendjs/order_create.js') }}"></script>
</body>

</html>