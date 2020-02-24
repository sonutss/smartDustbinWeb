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
                               openModalAvailable(page);
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
                               openModalNotAvailable(page);
                            }); 
                        }
                    } 
                },
                cache : false ,
            }) ;


         }
    </script>
    <script type="text/javascript">
      
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>
<script>
  const socket = io('http://3.6.124.196:3002/');

   socket.on('connect',function(data) {
        console.log("Server is connected");
    });
    socket.on('group_dataDustbin', (dataSet)=>{
     $("#pickup tbody").html('');
     console.log(dataSet);
     var html ='';
      if(dataSet.length!=0){
        for(var x=0;x<dataSet.length;x++){
            if(dataSet[x].vehicleID == 0){
                var vehicleID = '<a href="#" class="media-list-link ">'
                                                +'<div class="pd-y-0-force pd-x-0-force media ">'
                                                    +'<img src="./public/frontend/img/ic-truck.png" alt="">'
                                                    +'<div class="media-body">'
                                                    +'<div>'
                                                        +'<p class="mg-b-0 tx-medium tx-gray-800 tx-13">Not Assigned</p>'
                                                    +'</div>'
                                                    
                                                    +'</div>'
                                                +'</div>'
                                            +'</a>';
            var driverID ='<a href="#" class="media-list-link ">'
                                                +'<div class="pd-y-0-force pd-x-0-force media ">'
                                                    +'<img src="./public/frontend/img/ic-truck.png" alt="">'
                                                    +'<div class="media-body">'
                                                    +'<div>'
                                                        +'<p class="mg-b-0 tx-medium tx-gray-800 tx-13">Not Assigned</p>'
                                                    +'</div>'
                                               
                                                    +'</div>'
                                                +'</div>'
                                            +'</a>';
             var driverstatus = '<span class="text-danger">Not Assigned</span>';                                 
            }else{
                var vehicleID = '<a href="#" class="media-list-link ">'
                                                +'<div class="pd-y-0-force pd-x-0-force media ">'
                                                    +'<img src="./public/frontend/img/ic-truck.png" alt="">'
                                                    +'<div class="media-body">'
                                                    +'<div>'
                                                        +'<p class="mg-b-0 tx-medium tx-gray-800 tx-13">'+dataSet[x].VehicleName+'</p>'
                                                    +'</div>'
                                                    +'<p class="tx-12 tx-gray-600 mg-b-0">'+dataSet[x].VehicleRC+'</p>'
                                                    +'</div>'
                                                +'</div>'
                                            +'</a>';
                    var driverID ='<a href="#" class="media-list-link">'
                                                +'<div class="media pd-y-0-force pd-x-0-force">'
                                                    +'<img src="{{env('STORAGE_PATH')}}drivers/'+dataSet[x].DriverPhoto+'" alt="">'
                                                    +'<div class="media-body">'
                                                    +'<div>'
                                                        +'<p class="mg-b-0 tx-medium tx-gray-800 tx-13">'+dataSet[x].Drivername+'</p>'
                                                    +'</div>'
                                                   +'<p class="tx-12 tx-gray-600 mg-b-0">'+dataSet[x].Drivermobile+'</p>'
                                                    +'</div>'
                                                +'</div>'
                                            +'</a>';
                    var driverstatus = '<span class="text-success">Assigned</span>';                        
            }
            html += '<tr>'
                                        +'<td><span class="text-success">'+dataSet[x].groupName+'</span></td>'
                                        +'<td>'+dataSet[x].dataassignDate+'</td>'
                                        +'<th>'
                                           +vehicleID
                                        +'</th>'     
                                        +'<td>'+driverID
                                        +'</td>' 
                                        +'<td>'
                                            +dataSet[x].warehousename
                                        +'</td>'                                  
                                        +'<td><span class="text-success">'+dataSet[x].datacount+'</span></td>'
                                        +'<td>'+driverstatus+'</td>'
                                        +'<td>'
                                            +'<a href="view-details/'+dataSet[x].groupName+'"><button  class="btn btn-primary btn-icon mg-b-10 btn-sm"><div><i class="fa fa-eye"></i></div></button></a>'

                                            +'<button  class="btn btn-success btn-icon mg-b-10 btn-sm" title="Availabe Vehicle"  onclick="openModalAvailable('+dataSet[x].warehouseID+',1)"><div><i class="fa fa-check"></i></div></button>'

                                            +'<button  class="btn btn-danger btn-icon mg-b-10 btn-sm" title="Not Availabe vehicle" onclick="openModalNotAvailable('+dataSet[x].warehouseID+',1)"><div><i class="fa fa-times"></i></div></button>'                                                   
                                        +'</td>'
                                    +'</tr>';

                                  
          }
            $("#pickup tbody").append(html);  
      }else{
        html+= '<tr><td colspan="6" style="color:red;text-align:center;font-weight:600;">No record found !!</td></tr>';
      }
      
    });
</script>

</body>

</html>