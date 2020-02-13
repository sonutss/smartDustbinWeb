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
    <link rel="stylesheet" href="{{ url('public/frontend/css/bracket.css') }}">
     <meta name="csrf-token" content="{{ csrf_token() }}">
     <link href="{{ asset('public/frontend/sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
     @include('layouts.menu')
    <div class="br-mainpanel">      
        <div class="br-pagebody">            
            <div class="row row-sm ">
            <div class="mg-t-20 w-100"></div>
                <div class="col-lg-12">            
                    <div class="card shadow-base bd-0 pd-25 ">                        
                        <h6 class="tx-inverse tx-uppercase tx-bold tx-14 mg-t-10">Pickup List 
                              <button onclick="location.href='{{ url('pickup-create') }}'" class="btn btn-primary pd-x-15 pd-y-10 tx-bold tx-spacing-4 tx-12 btn-sm float-right mg-y-0-force"><div>Schedule Pickup</div></button>   
                        </h6>
                       <div class="bd rounded table-responsive">
                            <table class="table table-bordered mg-b-0" id="pickup">
                                <thead class="thead-colored thead-light">
                                    <tr>
                                        <th>Pickup ID</th>
                                        <th>Date</th>
                                        <th>Vehicle</th>
                                        <th>Driver</th>
                                        <th>No. of dustbin</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <tr>
                                        <td><span class="text-success">or2</span></td>
                                        <td>20 jan, 2020</td>
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
                                                    <p class="tx-12 tx-gray-600 mg-b-0">Abu Al qasim</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>                                   
                                        <td><span class="text-success">20</span></td>
                                        <td><span class="text-success">Active</span></td>
                                        <td>
                                            <button  class="btn btn-success btn-icon mg-b-10 btn-sm"><div><i class="fa fa-eye"></i></div></button>                                            
                                            <button  class="btn btn-danger btn-icon mg-b-10 btn-sm"><div><i class="fa fa-trash"></i></div></button>                                            
                                        </td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                        <div class="ht-80  d-flex align-items-center justify-content-center mg-t-20">
                           <!--  <ul class="pagination pagination-circle mg-b-0">
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
                            </ul> -->
                        </div>
                    </div>
                </div>              
            </div>
        </div>
       @include('layouts.footer')
        <input type="hidden" name="tocken" id="tocken" value="{{ Session::get('auth_key') }}">
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
    <script src="{{ asset('public/frontend/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('public/frontend/sweetalert/jquery.sweet-alert.custom.js') }}"></script>

    <script>
         $(".select2").select2();
    </script>
    <script type="text/javascript">
        getData();
        //alert();
        // $('.pagination').twbsPagination({
        //     totalPages: 1,
        //     startPage: 1,
        //     visiblePages: 5,
        //     href: false,
        //     loop: false,
        //     onPageClick: function (event, page) {
        //         getData(page);
        //     },
        // });  
        function getData(){
            //alert();
            var pickup={
                //page          : page,
                //perpage       : $("#record").val(),
                //driverstatus : $("#status").val(),
                list          : 'true'
            }
            $.ajax({
                url : "{{ url('pickup') }}",
                type : 'POST',
                data : pickup,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success : function(data){
                    var data = JSON.parse(data);
                    console.log(data);//return false; 
                    $("#pickup tbody").html('');
                    if(data.count == 0){
                        $("#pickup tbody").html('<tr><td colspan="6" style="color:red;font-weight:600">No data Found</td></tr>');
                    } else {
                        $("#pickup tbody").html(data.html);
                        // if(page == 1){
                        //     $('.pagination').twbsPagination('destroy');
                        //     $('.pagination').twbsPagination({
                        //         totalPages: data.count,
                        //         href: false,
                        //     }).on('page', function (event, page) {
                        //         console.log(page);
                        //        getData(page);
                        //     }); 
                        // }
                    } 
                },
                cache : false ,
            }) ;

        }

        function completedPickup(vid){
            var postdata = "{{ env('API_URL') }}";
            var pickup = "{{ url('pickup') }}";
            //alert();
            var parms={
                vid          : vid
            }
            $.ajax({
                url : postdata+'completedVehicle',
                type: 'POST',
                data : JSON.stringify(parms),
                async:false, 
                headers:{ 
                            'Access-Control-Allow-Origin': '*',       
                            'Authorization' : $("#tocken").val()
                        }, 
                success: function(response){
                    $("#submit").attr("disabled", false); 
                    //console.log("response",response) ;return false ;
                    //var res = $.parseJSON(response);
                    if(response.success == true){
                        swal("Success", response.message, "success");
                        setTimeout(function(){ 
                            window.location.href = pickup;
                        }, 5000);
                    } else {
                        swal({   
                            title: "Warnings",   
                            text: "Vehicle Not Assigned !!",   
                            type: "warning",   
                            showCancelButton: true,   
                            confirmButtonColor: "#DD6B55",   
                        });
                    }
                }, error: function(data){
                    $("#submit").attr("disabled", false);
                    var rr = $.parseJSON(data.responseText) ;
                    console.log('data',rr.success);//return false ;
                    if(rr.success == false){
                         swal({   
                            title: "Warnings",   
                            text: rr.message,   
                            type: "warning",   
                            showCancelButton: true,   
                            confirmButtonColor: "#DD6B55",   
                        });  
                    } 
                },
                cache : false ,
                contentType : 'application/json',
                processData: false 
            });
            
        }
    </script>
</body>

</html>