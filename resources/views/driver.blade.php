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
                        <h6 class="tx-inverse tx-uppercase tx-bold tx-14 mg-t-10">Driver List 
                            <button onclick="location.href='{{url('add-driver')}}'" class="btn btn-primary pd-x-15 pd-y-10 tx-bold tx-spacing-4 tx-12 btn-sm float-right mg-y-0-force"><div>Add Driver</div></button> 
                            <div class="form-group float-right  mg-r-20" style="width:250px;">
                                <select class="form-control select2" data-placeholder="Choose one" id='status'>
                                    <option label="Choose one" value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <div class="form-group float-right  mg-r-20" style="width:250px;">
                                <select class="form-control select2" data-placeholder="Choose one" id='avablitystatus'>
                                    <option label="Choose one" value="">Select Avilability Status</option>
                                    <option value="0">Available</option>
                                    <option value="1">Unavailable</option>
                                </select>
                            </div>
                            <div class="form-group float-right mg-r-20" style="width:250px;" >
                                <select class="form-control select2" data-placeholder="Choose one " onchange="getData(1);" id="record">
                                     <option value="10">10 Records</option>
                                     <option value="25">25 Records</option>
                                     <option value="50">50 Records</option>
                                     <option value="100">100 Records</option>
                                </select>
                            </div>
                        </h6>
                       <div class="bd rounded table-responsive">
                            <table class="table table-bordered mg-b-0" id="driver-list">
                                <thead class="thead-colored thead-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>email</th>
                                        <th>Mobile Number</th>
                                        <th>App User ID</th>
                                        <th>Vehicle Assigned</th>
                                        <th>Status</th>
                                        <th>AVAILABILITY</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class="ht-80  d-flex align-items-center justify-content-center mg-t-20">
                            <ul class="pagination pagination-circle mg-b-0" id="pagination">
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
            <div id="modaldemo8" class="modal fade">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content bd-0 tx-14">
                <div class="modal-header pd-y-20 pd-x-25">
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Availabe Vehicle</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body pd-25">
                   <div class="modal-body pd-25">
                    <div class="bd table-responsive">
                        <table class="table table-bordered" id="assign-vehicle">
                            <thead class="thead-colored thead-light">
                                <tr>
                                    <th>Vehicle</th>
                                    <th>Vehicle capacity</th>
                                    <th>Select</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="ht-80  d-flex align-items-center justify-content-center mg-t-20">
                        <ul class="pagination pagination-circle mg-b-0" id="pagination1">
                        </ul>
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" onclick="assigning();">Save changes</button>
                  <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-dismiss="modal">Close</button>
                </div>
                <input type="hidden" name="tocken" value="{{ Session::get('auth_key') }}" id="tocken">
              </div>
            </div>
          </div>
        </div>
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
     <script src="{{ asset('public/frontend/sweetalert/sweetalert.min.js') }}"></script>
         <script src="{{ asset('public/frontend/sweetalert/jquery.sweet-alert.custom.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.2/jquery.twbsPagination.js"></script>
    <script>
         $(".select2").select2();
         $(".select2").select2();
          $(function(){
            $('#modaldemo8').on('hidden.bs.modal', function (e) {
                $(this).removeClass (function (index, className) {
                    return (className.match (/(^|\s)effect-\S+/g) || []).join(' ');
                });
            });
        });
          var DriverID=0;
          function openVehicleModel(page,driverId){
                var effect = $(this).attr('data-effect');
                 $('#modaldemo8').addClass(effect);
                $('#modaldemo8').modal('show');
                var vehicle={
                page          : page,
                perpage       : 5,
                list          : 'true'
                }
                DriverID=driverId;
                $.ajax({
                url : "{{url('vehicle-assign')}}",
                type : 'POST',
                data : vehicle,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success : function(data){
                    var data = JSON.parse(data); 
                    $("#assign-vehicle tbody").html('');
                    if(data.count == 0){
                        $("#assign-vehicle tbody").html('<tr><td colspan="6" style="color:red;font-weight:600">No data Found</td></tr>');
                    } else {
                        $("#assign-vehicle tbody").html(data.html);
                        if(page == 1){
                            $('#pagination1').twbsPagination('destroy');
                            $('#pagination1').twbsPagination({
                                totalPages: data.count,
                                href: false,
                            }).on('page', function (event, page) {
                               openVehicleModel(page,driverId);
                            }); 
                        }
                    } 
                },
                cache : false ,
            }) ;
          }
      function assigning(){
        var params = {
            vehicleId:$("input[name='vehicle_id']:checked").val(),
            DriverId:DriverID
        }
        console.log(params);
        //return false;
        $.ajax({
                url : "{{ env('API_URL').'remappedVehicledriver' }}",
                type: 'POST',
                 headers:{ 
                            'Access-Control-Allow-Origin': '*',       
                            'Authorization' : $("#tocken").val()
                 },
                data : JSON.stringify(params),
                async:false, 
                success: function(response){
                    $("#submit").attr("disabled", false);
                    console.log("response",response) ;
                    if(response.success == true){
                         params={};
                        swal("Success", response.message, "success");
                        setTimeout(function(){ 

                            window.location.href = "{{url('driver-list')}}";
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
                },
                cache : false ,
                contentType : 'application/json',
                processData: false 
            });

      }    
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#status').change(function(){
                $('#avablitystatus').val(['']); 
                 getData(1);
       
            }).trigger('change');
             $('#avablitystatus').change(function(){
                $('#status').val(['']); 
                getData(1);
            }).trigger('change');
        });

    </script>
    <script type="text/javascript">
        //alert();
        $('#pagination').twbsPagination({
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
            //alert();
            var driverdata={
                page            : page,
                perpage         : $("#record").val(),
                driverstatus    : $("#status").val(),
                avablitystatus  : $("#avablitystatus").val(),
                list            : 'true'
            }
            console.log(driverdata);
            $.ajax({
                url : "{{ url('driver-list') }}",
                type : 'POST',
                data : driverdata,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success : function(data){
                    var data = JSON.parse(data);
                    console.log(data);//return false; 
                    $("#vehicle-list tbody").html('');
                    if(data.count == 0){
                        $("#driver-list tbody").html('<tr><td colspan="6" style="color:red;font-weight:600">No data Found</td></tr>');
                    } else {
                        $("#driver-list tbody").html(data.html);
                        if(page == 1){
                            $('#pagination').twbsPagination('destroy');
                            $('#pagination').twbsPagination({
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

        function updateStatus(vid,status){
             var postdata = "{{ env('API_URL') }}";
            var driver_list = "{{ url('driver-list') }}";
            //alert();
            var parms={
                driverID          : vid,
                status1            : status
            }
            console.log(parms);//return false;
            $.ajax({
                url : postdata+'driverStatusChange',
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
                        swal("Success", response.result, "success");
                        setTimeout(function(){ 
                            window.location.href = driver_list;
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