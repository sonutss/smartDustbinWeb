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
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
    
</head>
<body>
   @include('layouts.menu')
   <div class="br-mainpanel" data-select2-id="14">      
        <div class="br-pagebody" data-select2-id="13">            
            <div class="row row-sm " data-select2-id="12">
            <div class="mg-t-20 w-100"></div>
                <div class="col-lg-12" data-select2-id="11">            
                    <div class="card shadow-base bd-0 pd-25 " data-select2-id="10">                        
                        <h6 class="tx-inverse tx-uppercase tx-bold tx-14 mg-t-10">Daily Pickup History 
                            <button onclick="location.href='order.php'" class="btn btn-primary pd-x-15 pd-y-10 tx-bold tx-spacing-4 tx-12 btn-sm float-right mg-y-0-force"><div>bACK</div></button>
                        </h6>
                        <div class="row" data-select2-id="9">
                            <div class="input-group mg-r-20 col" data-select2-id="8">
                                <select class="form-control select2 select2-hidden-accessible" data-placeholder="Choose one " data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option label="Choose one" data-select2-id="3">Warehouse</option>
                                    <option value="Firefox" data-select2-id="17"></option>
                                </select><span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="2" style="width: 232.5px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-50t0-container"><span class="select2-selection__rendered" id="select2-50t0-container" role="textbox" aria-readonly="true" title="Warehouse">Warehouse</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                            </div>
                            <div class="input-group mg-r-20 col">
                                <input type="text" class="form-control daterange" placeholder="tO">
                            </div> 
                            <div class="form-group mg-r-20 col">
                                <div class="custom-file">
                                    <input type="text" class="custom-file-input" id="customFile2">
                                    <label class="custom-file-label custom-file-label-primary" for="customFile2">Search</label>
                                </div>
                            </div>
                            <div class="form-group mg-r-20 col">
                                <select class="form-control select2 select2-hidden-accessible" data-placeholder="Choose one " data-select2-id="4" tabindex="-1" aria-hidden="true">
                                    <option label="Choose one" data-select2-id="6">No. od records</option>
                                    <option value="Firefox"></option>
                                </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="5" style="width: 232.5px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-l5fx-container"><span class="select2-selection__rendered" id="select2-l5fx-container" role="textbox" aria-readonly="true" title="No. od records">No. od records</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                            </div>    
                        </div>
                       <div class="bd rounded table-responsive">
                            <table class="table table-bordered mg-b-0">
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
                                    <tr>
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
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="ht-80  d-flex align-items-center justify-content-center mg-t-20">
                            <ul class="pagination pagination-circle mg-b-0">
                                <li class="page-item hidden-xs-down">
                                    <a class="page-link" href="#" aria-label="First"><i class="fa fa-angle-double-left"></i></a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item disabled"><span class="page-link">...</span></li>
                                <li class="page-item"><a class="page-link" href="#">10</a></li>
                             
                                <li class="page-item hidden-xs-down">
                                    <a class="page-link" href="#" aria-label="Last"><i class="fa fa-angle-double-right"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>              
            </div>
        </div>
        <footer class="br-footer">
            <div class="footer-left">
                <div class="mg-b-2">Copyright © 2020. All Rights Reserved.</div>
            </div>         
        </footer>    </div>
    
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
    <script src="{{ url('public/frontend/lib/moment/min/moment.min.js') }}"></script>
    <script src="{{ url('public/frontend/lib/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.2/jquery.twbsPagination.js"></script>
    <script>
        $(".select2").select2();
    </script>
    <script type="text/javascript">
        $('.pagination').twbsPagination({
            totalPages: 1,
            startPage: 1,
            visiblePages: 5,
            href: false,
            loop: false,
            onPageClick: function (event, page) {
                getData(page);
            },
        });  
        function getData(page){
            var vehicledata={
                page          : page,
                perpage       : $("#record").val(),
                vehiclestatus : $("#status").val(),
                list          : 'true'
            }
            $.ajax({
                url : "{{ url('vehicle-list') }}",
                type : 'POST',
                data : vehicledata,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success : function(data){
                    var data = JSON.parse(data);
                    //console.log(data);return false; 
                    $("#vehicle-list tbody").html('');
                    if(data.count == 0){
                        $("#vehicle-list tbody").html('<tr><td colspan="6" style="color:red;font-weight:600">No data Found</td></tr>');
                    } else {
                        $("#vehicle-list tbody").html(data.html);
                        if(page == 1){
                            $('.pagination').twbsPagination('destroy');
                            $('.pagination').twbsPagination({
                                totalPages: data.count,
                                href: false,
                            }).on('page', function (event, page) {
                                console.log(page);
                               getData(page);
                            }); 
                        }
                    } 
                },
                cache : false ,
            }) ;
        }
    </script> 
     <script>
       
        $('.daterange').daterangepicker();
        $(".select2").select2();
    </script>
</body>

</html>