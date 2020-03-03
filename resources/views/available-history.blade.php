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
                        <h6 class="tx-inverse tx-uppercase tx-bold tx-14 mg-t-10">Driver Avialable History 
                            <button class="btn btn-primary pd-x-15 pd-y-10 tx-bold tx-spacing-4 tx-12 btn-sm float-right mg-y-0-force" onclick="resetAll();" style="margin-left:10px;"><div>Reset All</div></button>
                             <button onclick="location.href='{{url('dashboard') }}'" class="btn btn-primary pd-x-15 pd-y-10 tx-bold tx-spacing-4 tx-12 btn-sm float-right mg-y-0-force"><div>BACK</div></button>
                        </h6>
                        <div class="row">
                            <div class="input-group mg-r-20 col">
                                <input type="text" class="form-control daterange" placeholder="Select Date" name="datefilter">
                            </div> 
                          
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
                            <table class="table table-bordered mg-b-0" id="avilablehistory-list">
                                <thead class="thead-colored thead-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Driver</th>
                                        <th>Date</th>
                                        <th>Availble time</th>
                                        <th>Total time</th>
                                        <th>Status</th>
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
         var list_ware        = "{{ env('API_URL')}}";
         var avilable_history = "{{ url('avilable-history') }}";
     </script>
    <script src="{{ url('public/frontend/frontendjs/available_history.js') }}"></script>
</body>

</html>