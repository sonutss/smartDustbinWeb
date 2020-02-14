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
        .ckbox span:before{
            background-color: #090909;
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
                                    <h4 class="tx-normal tx-roboto tx-inverse mg-b-20 w-100">Warehouse Vehicle Mapping</h4>
                                </div>
                            </div>
                            <div class="row row-sm mg-t-20" id="vehicle-list">
                            <!--  <div></div> -->
                                <!-- <div class="col-lg-6 mg-t-20 mg-lg-t-0" >
                                    <div class="card  ht-100p pd-25 bd">
                                        <div class="row">
                                            <div class="col-lg-6 ">
                                                <a href="#" class="media-list-link ">
                                                    <div class="pd-y-0-force pd-x-0-force media ">
                                                        <img src="{{ url('public/frontend/img/ic-truck.png') }}" alt="">
                                                        <div class="media-body">
                                                            <div>
                                                                <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Garbage Trucks</p>
                                                            </div>
                                                            <p class="tx-12 tx-gray-600 mg-b-0">DB254 2565</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-lg-6">
                                                <a id="btnRightMenu" href="#" class="media-list-link float-right pos-relative">
                                                    <div class="media pd-y-0-force pd-x-0-force">
                                                        <img src="{{ url('public/frontend/img/ic-02.png') }}" alt="">
                                                        <div class="media-body">
                                                            <div>
                                                                <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Driver Name</p>
                                                            </div>
                                                            <p class="tx-12 tx-gray-600 mg-b-0">No number</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                            <div class="ht-80  d-flex align-items-center justify-content-center mg-t-20">
                                <ul class="pagination pagination-circle mg-b-0 mg-t-30">
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
                          <div class="w-100 mg-l-100">
                            <button class="btn btn-primary mg-l-90" onclick="SubmitData()" id="assign">Assign</button>
                          </div>
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
                vehicleList(page);
            },
        });  
        function getData(page){
            var vehicledata={
                page          : page,
                perpage       : '10',
                list          : 'true'
            }
            $.ajax({
                url : "{{ url('warehouse-vehicle-mapping') }}",
                type : 'POST',
                data : vehicledata,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success : function(data){
                    var data = JSON.parse(data);
                    //console.log(data);return false; 
                    $("#vehicle-list").html('');
                    if(data.count == 0){
                        $("#vehicle-list").html('<tr><td colspan="6" style="color:red;font-weight:600">No data Found</td></tr>');
                    } else {
                        $("#vehicle-list").html(data.html);
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
        function vehicleList(page){
            var vehicledata={
                page          : page,
                perpage       : '10',
                list          : 'true'
            }
            $.ajax({
                url : "{{ url('vehicle-not-assign') }}",
                type : 'POST',
                data : vehicledata,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success : function(data){
                    var data = JSON.parse(data);
                    //console.log(data);return false; 
                    $("#driver-list").html('');
                    if(data.count == 0){
                        $('#assign').css("display", "none");
                        $("#driver-list").html('<tr><td colspan="6" style="color:red;font-weight:600">No data Found</td></tr>');
                    } else {
                        $("#driver-list").html(data.html);
                        if(page == 1){
                            $('.pagination').twbsPagination('destroy');
                            $('.pagination').twbsPagination({
                                totalPages: data.count,
                                href: false,
                            }).on('page', function (event, page) {
                                console.log(page);
                               vehicleList(page);
                            }); 
                        }
                    } 
                },
                cache : false ,
            }) ;
        }
        var obj={};
        function right_slide(thiss){
            var this_id = $(thiss).data('val');
            obj.whareId=this_id;
           $('body').addClass('show-right');
           $('body').removeClass('show-left');
        }
           
        function SubmitData(){
             var vehicleList = []; 
           $.each($("input[name='check_veh[]']:checked"), function(i,val){
            //console.log(val.value);
              vehicleList.push([obj.whareId,val.value]);
              
            });         
            console.log(vehicleList);
          
            // var data = obj.whareId;
            // for(var x=0;x<vehicleList.length;x++){
            //     recordSet[x] = vehicleList[x]; 
            //     for(var y=0;y<data.length;y++){
            //         //console.log(y);
            //         recordSet.push(data,vehicleList);
            //     }
            //     //recordSet.push(obj.whareId,vehicleList[x]);
            // }
            // console.log(recordSet);
               //console.log(obj.whareId); 
              // console.log(data);
               
            if(obj.whareId==undefined || obj.whareId==""){
                console.log("Please Select Driver");
            }else{
                $.ajax({
                url : "{{ env('API_URL').'mappedwherehousewithvehicle' }}",
                type: 'POST',
                 headers:{ 
                            'Access-Control-Allow-Origin': '*',       
                            'Authorization' : $("#tocken").val()
                 },
                data : JSON.stringify({dataSet:vehicleList}),
                async:false, 
                
                success: function(response){
                    $("#submit").attr("disabled", false);
                    console.log("response",response) ;
                    if(response.success == true){
                         obj={};

                     $("#"+$("#selectedrow").val()).removeClass('selectdRow');
                      $('body').removeClass('show-right');
                      $('body').addClass('show-left');
                        swal("Success", response.message, "success");
                        setTimeout(function(){ 

                            window.location.href = "{{url('warehouse-vehicle-mapping')}}";
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
                    // $.each(rr.errors, function(key, value){
                    //     $("#"+key).parent().addClass('form-has-error');
                    //     $("#msg_"+key).parent().show();
                    //     $("#msg_"+key).text(value);
                    //     setTimeout(function(){ 
                    //         $("#"+key).parent().removeClass('form-has-error');
                    //         $("#msg_"+key).parent().hide();
                    //         $("#msg_"+key).text('');
                    //     }, 8000);
                    // });
                },
                cache : false ,
                //contentType : false,
                contentType : 'application/json',
                processData: false 
            });

            }
            
        }
        function selectedrow(ids,data){
           $("#"+$("#selectedrow").val()).removeClass('selectdRow');
            $("#selectedrow").val(ids.id);
            obj.DriverId=data;
           $("#"+ids.id).addClass('selectdRow');
        }

    </script> 
</body>

</html>