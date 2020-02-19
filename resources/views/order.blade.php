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
     <style type="text/css">
         a[data-tool-tip]{
            position: relative;
            text-decoration: none;
            color: rgba(255,255,255,0.75);
        }

a[data-tool-tip]::after{
    content: attr(data-tool-tip);
    display: block;
    position: absolute;
    background-color: dimgrey;
    padding: 1em 3em;
    color: white;
    border-radius: 5px;
    font-size: .5em;
    bottom: 0;
    left: -180%;
    white-space: nowrap;
    transform: scale(0);
    transition: 
    transform ease-out 150ms,
    bottom ease-out 150ms;
}

a[data-tool-tip]:hover::after{
    transform: scale(1);
    bottom: 200%;
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
                                        <th>Warehouse</th>
                                        <th>No. of dustbin</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
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
                                    <th>#</th>                                   
                                    <th>Driver</th>
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
                        <ul class="pagination pagination-circle mg-b-0">
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" onclick="saveModalData()">Assign</button>
                  <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

          <div id="modaldemo9" class="modal fade">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content bd-0 tx-14">
                <div class="modal-header pd-y-20 pd-x-25">
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Not Availabe Driver</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body pd-25">
                    <div class="bd table-responsive">
                        <table class="table table-bordered" id="not-available">
                            <thead class="thead-colored thead-light">
                                <tr>
                                    <th>#</th>                                   
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
                <div class="modal-footer">
                  <!-- <button type="button" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" onclick="saveModalData1()">Save changes</button> -->
                  <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.2/jquery.twbsPagination.js"></script>

    <script>
         $(".select2").select2();
         var postdata = "{{ env('API_URL') }}";
         $(function(){
            // $('.modal-effect').on('click', function(e){
            //     e.preventDefault();
            //     var effect = $(this).attr('data-effect');
            //     $('#modaldemo8').addClass(effect);
            //     $('#modaldemo8').modal('show');
            // });
            $('#modaldemo8').on('hidden.bs.modal', function (e) {
                $(this).removeClass (function (index, className) {
                    return (className.match (/(^|\s)effect-\S+/g) || []).join(' ');
                });
            });
            $('#modaldemo9').on('hidden.bs.modal', function (e) {
                $(this).removeClass (function (index, className) {
                    return (className.match (/(^|\s)effect-\S+/g) || []).join(' ');
                });
            });
        });
          $('.pagination').twbsPagination({
            totalPages: 1,
            startPage: 1,
            visiblePages: 5,
            href: false,
            loop: false,
            onPageClick: function (event, page) {
                openModalAvailable(wid,page);
                openModalNotAvailable(wid,page);
            },
        }); 
         function openModalAvailable(wid,page){

            var effect = $(this).attr('data-effect');
                $('#modaldemo8').addClass(effect);
                $('#modaldemo8').modal('show');
            var avilable={
                page          : page,
                perpage       : 10,
                wid           : wid,
                list          : 'true'
            }
            console.log(avilable);
                $.ajax({
                url : "{{url('available-vehicle')}}",
                type : 'POST',
                data : avilable,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success : function(data){
                    var data = JSON.parse(data);
                    console.log(data);//return false; 
                    $("#available-vehicle tbody").html('');
                    if(data.count == 0){
                        $("#available-vehicle tbody").html('<tr><td colspan="6" style="color:red;font-weight:600">No data Found</td></tr>');
                    } else {
                        $("#available-vehicle tbody").html(data.html);
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

         function openModalNotAvailable(wid,page){

            var effect = $(this).attr('data-effect');
                $('#modaldemo9').addClass(effect);
                $('#modaldemo9').modal('show');
            var notavilable={
                page          : page,
                perpage       : 10,
                wid           : wid,
                list          : 'true'
            }
            console.log(notavilable);
                $.ajax({
                url : "{{url('notavailable-vehicle')}}",
                type : 'POST',
                data : notavilable,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success : function(data){
                    var data = JSON.parse(data);
                    console.log(data);//return false; 
                    $("#not-available tbody").html('');
                    if(data.count == 0){
                        $("#not-available tbody").html('<tr><td colspan="6" style="color:red;font-weight:600">No data Found</td></tr>');
                    } else {
                        $("#not-available tbody").html(data.html);
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
            // var postdata = "{{ env('API_URL') }}";
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
        function saveModalData(){
            alert();
               var parms = {
                    wid : $('#warehouseID').val(),
                    driverID : $('#driverid').val(),
                    vehicelID : $('#vehicleid').val(),
               }
               console.log(parms);
        }
    </script>
</body>

</html>