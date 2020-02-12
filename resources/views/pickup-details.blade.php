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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">
    </head>
<body>
@include('layouts.menu') 
    <div class="br-mainpanel"> 
        <div class="tab-content br-pagebody">
            <div class="row row-sm mg-t-20">
                <div class="clearfix w-100 mg-t-20"></div>
                <div class="col-sm-6 col-lg-4 mg-t-20 mg-sm-t-0">
                    <div class="card  shadow-base widget-7 mg-b-f-0">
                        <div class="w-100">
                            <div class="row row-sm w-100">
                                 <div class="col-sm-6 col-lg-6 mg-t-20">
                                    <h5 class="">Pickup Status</h5>
                                </div>
                                <div class="col-sm-6 col-lg-6 mg-t-20">
                                    <p class="">
                                        @if($decode['dustbinData'][0]['Groupstatus']==1) <strong class="text-danger">Completed</strong> 
                                        @else 
                                        <strong class="text-success">Active</strong>
                                        @endif
                                    </p>
                                </div>
                                <div class="col-sm-6 col-lg-6 mg-t-20">
                                    <h5 class="">Daily Pickup ID</h5>
                                    <p class="mg-b-20">{{$decode['dustbinData'][0]['groupName']}}</p>
                                </div>
                                <div class="col-sm-6 col-lg-6 mg-t-20">
                                    <h5 class="">Pickup Date</h5>
                                    <p class="mg-b-20">{{$decode['dustbinData'][0]['dataassignDate']}}</p>
                                </div>
                                <div class="col-sm-6 col-lg-6 mg-t-20">
                                    <h5 class="">Start Time</h5>
                                    <p class="mg-b-20">10:20 AM</p>
                                </div>
                                <div class="col-sm-6 col-lg-6 mg-t-20">
                                    <h5 class="">End Time</h5>
                                    <p class="mg-b-20">03:20 OM</p>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
                <div class="col-sm-6 col-lg-4 mg-t-20 mg-sm-t-0">
                    <div class="card shadow-base widget-7 mg-b-f-0">
                        <div class="tx-center">
                            <a href="#"><img src="{{url('public/frontend/img/ic-truck.png') }}" class="wd-100 rounded-circle" alt=""></a>
                            <h4 class="tx-normal tx-inverse tx-roboto mg-t-20">{{$decode['dustbinData'][0]['VehicleRC']}}</h4>
                            <p class="mg-b-20">{{$decode['dustbinData'][0]['VehicleName']}} </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mg-t-20 mg-sm-t-0">
                    <div class="card shadow-base widget-7 mg-b-f-0">
                        <div class="tx-center">
                            <a href="#"><img src="{{env('STORAGE_PATH')}}drivers/{{$decode['dustbinData'][0]['driverphoto']}}" class="wd-100 rounded-circle" alt=""></a>
                            <h4 class="tx-normal tx-inverse tx-roboto mg-t-20">{{$decode['dustbinData'][0]['driverName']}}</h4>
                            <p class="mg-b-20">{{$decode['dustbinData'][0]['drivermobile']}} </p>
                        </div>                      
                    </div>
                </div>               
            </div>
            <div class="tab-pane fade active show" id="posts">
                <div class="row">
                    <div class="clearfix w-100 mg-t-20"></div>
                    <div class="col-md-12">
                        <div class="card shadow-base bd-0 pd-25 ">
                         <div class=" mg-t-25">
                             <div class="bd rounded table-responsive">
                            <table class="table table-bordered mg-b-0" id="pickup">
                                <thead class="thead-colored thead-light">
                                    <tr>
                                        <th>GSM Number</th>
                                        <th>Dustbin Name</th>
                                        <th>Address</th>
                                        <th>Distance</th>
                                        <th>Duration</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($decode['dustbinData'][0]['data'] as $key => $value)
                                        
                                    <tr>
                                        <td>{{ $value['gsm_moblie_number'] }}</td>
                                        <td><span class="text-success">{{ $value['name'] }}</span></td>
                                        <td>{{ $value['address'] }}</td>
                                        <td>{{ $value['distance'] }}</td>
                                        <td>{{ $value['duration'] }}</td>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                         </div>
                        </div>
                    </div>
                </div>
             
                    </div>
            <div class="tab-pane fade active show" id="posts">
                <div class="row">
                <div class="clearfix w-100 mg-t-20"></div> 
                    <div class="col-lg-12">            
                        <div class="card shadow-base bd-0 pd-25 ">                        
                            <div class=" mg-t-25">
                                 <div id="map_canvas" style="width :100%;position: relative;height: 500px;">
                                   </div>
                            </div>
                        </div>
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
    <script src="{{ url('public/frontend/js/bracket.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script>
        $(function() {
            'use strict'
            $(window).resize(function() {
                minimizeMenu();
            });
            minimizeMenu();
            function minimizeMenu() {
                if (window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1199px)').matches) {
                    $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
                    $('body').addClass('collapsed-menu');
                    $('.show-sub + .br-menu-sub').slideUp();
                } else if (window.matchMedia('(min-width: 1200px)').matches && !$('body').hasClass('collapsed-menu')) {
                    $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
                    $('body').removeClass('collapsed-menu');
                    $('.show-sub + .br-menu-sub').slideDown();
                }
            }
        });
        $('.gallery').each(function() { // the containers for all your galleries
                $(this).magnificPopup({
                    delegate: 'a', // the selector for gallery item
                    type: 'image',
                    gallery: {
                    enabled:true
                    }
                });
            });
    </script>
    
    <script type="text/javascript">
    var map;
    function initMap() {
        var data = "{{json_encode($decode['dustbinData'][0]['data'])}}";
        var jsondata = JSON.parse(data.replace(/&quot;/g,'"'));
         map = new google.maps.Map(document.getElementById('map_canvas'),
            {
                center:  new google.maps.LatLng(28.7041, 77.1025), 
                zoom: 5
            });
            for (var i=0; i<jsondata.length; i++) {
               var marker = new google.maps.Marker({
                    position:new google.maps.LatLng(jsondata[i].latiude, jsondata[i].longitude),
                  icon: {
                          url: "{{url('public/frontend/img/dus40.png')}}"
                        },
                    map: map,
                    title:jsondata[i].name
                  });
            }
    }
   
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCntPB-qN_-K60eVMgJkJEy8Dn2ZxvxC6Y&callback=initMap">
    </script> 
   
</body>
</html>