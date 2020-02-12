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
</head>
<body>
     @include('layouts.menu')
    <div class="br-mainpanel">      
        <div class="br-pagebody">            
            <div class="row row-sm ">
            <div class="mg-t-20 w-100"></div>
                <div class="col-lg-12">            
                    <div class="card shadow-base bd-0 pd-25 ">                        
                        <h6 class="tx-inverse tx-uppercase tx-bold tx-14 mg-t-10">Warehouse List 
                            <button onclick="location.href='{{ url('add-warehouse') }}'" class="btn btn-primary pd-x-15 pd-y-10 tx-bold tx-spacing-4 tx-12 btn-sm float-right mg-y-0-force"><div>Warehouse Add</div></button>
                            <div class="form-group float-right mg-r-20" style="width:250px;">
                                <select class="form-control select2" data-placeholder="Choose one " onchange="getData(1);" id="record">
                                   <option value="10">10 Records</option>
                                     <option value="25">25 Records</option>
                                     <option value="50">50 Records</option>
                                     <option value="100">100 Records</option>
                                </select>
                            </div>    
                        </h6>
                       <div class="bd rounded table-responsive">
                            <table class="table table-bordered mg-b-0" id="warehouse-list">
                                <thead class="thead-colored thead-light">
                                    <tr>
                                        <th>Warehouse ID</th>
                                        <th>Warehouse Name</th>
                                        <th>Email</th>
                                        <th>Mobile Number</th>
                                        <th>Address</th>
                                        <th>Action</th>
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
                        <div class="col-lg-12">
                                <div class="form-group mg-b-10-force">
                                    <div id="map_canvas" style="width :100%;position: relative;height: 500px;">
                                   </div>
                                </div>
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
    <script src="{{ url('public/frontend/lib/moment/min/moment.min.js') }}"></script>
    <script src="{{ url('public/frontend/lib/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ url('public/frontend/lib/highlightjs/highlight.pack.min.js') }}"></script>
    <script src="{{ url('public/frontend/lib/select2/js/select2.min.js') }}"></script>
    <script src="{{ url('public/frontend/js/tooltip-colored.js') }}"></script>
    <script src="{{ url('public/frontend/js/popover-colored.js') }}"></script>
    <script src="{{ url('public/frontend/js/bracket.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.2/jquery.twbsPagination.js"></script>
    <script>
         $(".select2").select2();
    </script>
</body>
 <script type="text/javascript">
        //alert();
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
            //alert();
            var warehousedata={
                page          : page,
                perpage       : $("#record").val(),
                //driverstatus : $("#status").val(),
                list          : 'true'
            }
            $.ajax({
                url : "{{ url('warehouse-list') }}",
                type : 'POST',
                data : warehousedata,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success : function(data){
                    var data = JSON.parse(data);
                    console.log(data);//return false; 
                    $("#warehouse-list tbody").html('');
                    if(data.count == 0){
                        $("#warehouse-list tbody").html('<tr><td colspan="6" style="color:red;font-weight:600">No data Found</td></tr>');
                    } else {
                        $("#warehouse-list tbody").html(data.html);
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
       var map;   
    function initMap() {
        var myLatlng = new google.maps.LatLng(28.7041, 77.1025);
        var myOptions = {
            zoom: 8,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
         getmarkerList();
    }
    google.maps.event.addDomListener(window, "load", initMap());
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCntPB-qN_-K60eVMgJkJEy8Dn2ZxvxC6Y&callback=initMap">
    </script> 
    <script type="text/javascript">
        function getmarkerList(){
             var markerlist = "{{ env('API_URL').'dropdownlistwarehouse' }}";
            $.ajax({
                url : markerlist,
                type : 'GET',
                async:false, 
                headers:{ 
                            'Access-Control-Allow-Origin': '*',       
                            'Authorization' : $("#tocken").val()
                        },
                success : function(data){
                    //console.log(data);
                    var data = data.result;
                    var markers =[];
                    for (var i=0; i<data.length; i++) {
                      markers.push(
                       marker = new google.maps.Marker({
                          position: new google.maps.LatLng(data[i].latitude, data[i].longitude),
                          map: map,
                          draggable: false,
                          icon: {
                              url: "{{url('public/frontend/img/warehouse.png')}}"
                            },
                           title: data[i].name
                        })

                      );
                }
                    
                },
                cache : false ,
            }) ;
        }
    </script>
    


</html>