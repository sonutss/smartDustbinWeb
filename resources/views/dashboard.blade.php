<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content=".">
    <meta name="author" content="">
    <title>Dustbin</title>
    @include('layouts.css')
    <link rel="stylesheet" href="{{ url('public/frontend/css/bracket.css') }}">
    <style type="text/css">
          .hide{
            visibility: hidden;
        }
    </style>
</head>
<body>
    @include('layouts.menu')
<div class="br-mainpanel" style="position: relative;">
    <div class="br-pagebody">            
            <div class="row row-sm ">
            <div class="mg-t-20 w-100"></div>
                <div class="col-sm-6 col-xl-4">
                    <div class="bg-primary rounded overflow-hidden">
                        <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                            <i class=" tx-60 lh-0 tx-white op-7"><img width="65" src="{{url('public/frontend/img/ic4.png')}}"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Total Dustbin</p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1" id="dustbin"></p>
                            </div>
                        </div>
                        <div id="ch1" class="ht-50 tr-y-1 rickshaw_graph"><svg width="364" height="50"><g><path d="M0,25Q26.288888888888888,19.291666666666664,30.333333333333332,19.374999999999996C36.4,19.499999999999996,54.6,25.0625,60.666666666666664,26.25S84.93333333333334,30.875,91,31.25S115.26666666666667,30.625,121.33333333333333,30S145.6,24.25,151.66666666666666,25S175.93333333333334,35.625,182,37.5S206.26666666666665,43.75,212.33333333333331,43.75S236.6,38.4375,242.66666666666666,37.5S266.93333333333334,35.3125,273,34.375S297.26666666666665,27.8125,303.3333333333333,28.125S327.59999999999997,37.8125,333.66666666666663,37.5Q337.71111111111105,37.291666666666664,364,25L364,50Q337.71111111111105,50,333.66666666666663,50C327.59999999999997,50,309.4,50,303.3333333333333,50S279.06666666666666,50,273,50S248.73333333333332,50,242.66666666666666,50S218.39999999999998,50,212.33333333333331,50S188.06666666666666,50,182,50S157.73333333333332,50,151.66666666666666,50S127.39999999999999,50,121.33333333333333,50S97.06666666666666,50,91,50S66.73333333333333,50,60.666666666666664,50S36.4,50,30.333333333333332,50Q26.288888888888888,50,0,50Z" class="area" fill="rgba(255,255,255,0.5)"></path></g></svg></div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4 mg-t-20 mg-sm-t-0">
                    <div class="bg-primary rounded overflow-hidden">
                        <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                            <i class="tx-60 lh-0 tx-white op-7"><img width="65" src="{{url('public/frontend/img/ic-5.png')}}"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Total Warehouse</p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1" id="warehouse"></p>
                            </div>
                        </div>
                        <div id="ch3" class="ht-50 tr-y-1 rickshaw_graph"><svg width="364" height="50"><g><path d="M0,25Q26.288888888888888,21.458333333333332,30.333333333333332,21.875C36.4,22.5,54.6,30.9375,60.666666666666664,31.25S84.93333333333334,26.25,91,25S115.26666666666667,18.75,121.33333333333333,18.75S145.6,23.125,151.66666666666666,25S175.93333333333334,35.625,182,37.5S206.26666666666665,43.75,212.33333333333331,43.75S236.6,38.4375,242.66666666666666,37.5S266.93333333333334,35.3125,273,34.375S297.26666666666665,27.8125,303.3333333333333,28.125S327.59999999999997,37.8125,333.66666666666663,37.5Q337.71111111111105,37.291666666666664,364,25L364,50Q337.71111111111105,50,333.66666666666663,50C327.59999999999997,50,309.4,50,303.3333333333333,50S279.06666666666666,50,273,50S248.73333333333332,50,242.66666666666666,50S218.39999999999998,50,212.33333333333331,50S188.06666666666666,50,182,50S157.73333333333332,50,151.66666666666666,50S127.39999999999999,50,121.33333333333333,50S97.06666666666666,50,91,50S66.73333333333333,50,60.666666666666664,50S36.4,50,30.333333333333332,50Q26.288888888888888,50,0,50Z" class="area" fill="rgba(255,255,255,0.5)"></path></g></svg></div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4 mg-t-20 mg-xl-t-0">
                    <div class="bg-primary rounded overflow-hidden">
                        <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                            <i class="tx-60 lh-0 tx-white op-7"><img width="65" src="{{url('public/frontend/img/ic-6.png')}}"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Total Vehicles</p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1" id="vehicle"></p>
                            </div>
                        </div>
                        <div id="ch2" class="ht-50 tr-y-1 rickshaw_graph"><svg width="364" height="50"><g><path d="M0,25Q26.288888888888888,40.541666666666664,30.333333333333332,40.625C36.4,40.75,54.6,27.8125,60.666666666666664,26.25S84.93333333333334,24.625,91,25S115.26666666666667,30.625,121.33333333333333,30S145.6,20.8125,151.66666666666666,18.75S175.93333333333334,10.625,182,9.375S206.26666666666665,5,212.33333333333331,6.25S236.6,20.9375,242.66666666666666,21.875S266.93333333333334,16.5625,273,15.625S297.26666666666665,12.1875,303.3333333333333,12.5S327.59999999999997,17.5,333.66666666666663,18.75Q337.71111111111105,19.583333333333332,364,25L364,50Q337.71111111111105,50,333.66666666666663,50C327.59999999999997,50,309.4,50,303.3333333333333,50S279.06666666666666,50,273,50S248.73333333333332,50,242.66666666666666,50S218.39999999999998,50,212.33333333333331,50S188.06666666666666,50,182,50S157.73333333333332,50,151.66666666666666,50S127.39999999999999,50,121.33333333333333,50S97.06666666666666,50,91,50S66.73333333333333,50,60.666666666666664,50S36.4,50,30.333333333333332,50Q26.288888888888888,50,0,50Z" class="area" fill="rgba(255,255,255,0.5)"></path></g></svg></div>
                    </div>
                </div>
                
                <div class="col-sm-6 col-xl-4 mg-t-20 mg-xl-t-20">
                    <div class="bg-primary rounded overflow-hidden">
                        <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                            <i class=" tx-60 lh-0 tx-white op-7"><img width="65" src="{{url('public/frontend/img/ic-7.png')}}"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Total Drivers</p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1" id="driver"></p>
                            </div>
                        </div>
                        <div id="ch4" class="ht-50 tr-y-1 rickshaw_graph"><svg width="364" height="50"><g><path d="M0,25Q26.288888888888888,21.458333333333332,30.333333333333332,21.875C36.4,22.5,54.6,30.9375,60.666666666666664,31.25S84.93333333333334,26.25,91,25S115.26666666666667,18.75,121.33333333333333,18.75S145.6,23.125,151.66666666666666,25S175.93333333333334,35.625,182,37.5S206.26666666666665,43.75,212.33333333333331,43.75S236.6,38.4375,242.66666666666666,37.5S266.93333333333334,35.3125,273,34.375S297.26666666666665,27.8125,303.3333333333333,28.125S327.59999999999997,37.8125,333.66666666666663,37.5Q337.71111111111105,37.291666666666664,364,25L364,50Q337.71111111111105,50,333.66666666666663,50C327.59999999999997,50,309.4,50,303.3333333333333,50S279.06666666666666,50,273,50S248.73333333333332,50,242.66666666666666,50S218.39999999999998,50,212.33333333333331,50S188.06666666666666,50,182,50S157.73333333333332,50,151.66666666666666,50S127.39999999999999,50,121.33333333333333,50S97.06666666666666,50,91,50S66.73333333333333,50,60.666666666666664,50S36.4,50,30.333333333333332,50Q26.288888888888888,50,0,50Z" class="area" fill="rgba(255,255,255,0.5)"></path></g></svg></div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4 mg-t-20 mg-xl-t-20">
                    <div class="bg-primary rounded overflow-hidden">
                        <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                            <i class=" tx-60 lh-0 tx-white op-7"><img width="65" src="{{url('public/frontend/img/ic-6.png')}}"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Today Pickup</p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1" id="pickup"></p>
                            </div>
                        </div>
                        <div id="ch41" class="ht-50 tr-y-1 rickshaw_graph"><svg width="364" height="50"><g><path d="M0,25Q26.288888888888888,21.458333333333332,30.333333333333332,21.875C36.4,22.5,54.6,30.9375,60.666666666666664,31.25S84.93333333333334,26.25,91,25S115.26666666666667,18.75,121.33333333333333,18.75S145.6,23.125,151.66666666666666,25S175.93333333333334,35.625,182,37.5S206.26666666666665,43.75,212.33333333333331,43.75S236.6,38.4375,242.66666666666666,37.5S266.93333333333334,35.3125,273,34.375S297.26666666666665,27.8125,303.3333333333333,28.125S327.59999999999997,37.8125,333.66666666666663,37.5Q337.71111111111105,37.291666666666664,364,25L364,50Q337.71111111111105,50,333.66666666666663,50C327.59999999999997,50,309.4,50,303.3333333333333,50S279.06666666666666,50,273,50S248.73333333333332,50,242.66666666666666,50S218.39999999999998,50,212.33333333333331,50S188.06666666666666,50,182,50S157.73333333333332,50,151.66666666666666,50S127.39999999999999,50,121.33333333333333,50S97.06666666666666,50,91,50S66.73333333333333,50,60.666666666666664,50S36.4,50,30.333333333333332,50Q26.288888888888888,50,0,50Z" class="area" fill="rgba(255,255,255,0.5)"></path></g></svg></div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4 mg-t-20 mg-xl-t-20">
                    <div class="bg-primary rounded overflow-hidden">
                        <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                            <i class=" tx-60 lh-0 tx-white op-7"><img width="65" src="{{url('public/frontend/img/ic-6.png')}}"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">All Pickup</p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1" id="all_pickup"></p>
                            </div>
                        </div>
                        <div id="ch42" class="ht-50 tr-y-1 rickshaw_graph"><svg width="364" height="50"><g><path d="M0,25Q26.288888888888888,21.458333333333332,30.333333333333332,21.875C36.4,22.5,54.6,30.9375,60.666666666666664,31.25S84.93333333333334,26.25,91,25S115.26666666666667,18.75,121.33333333333333,18.75S145.6,23.125,151.66666666666666,25S175.93333333333334,35.625,182,37.5S206.26666666666665,43.75,212.33333333333331,43.75S236.6,38.4375,242.66666666666666,37.5S266.93333333333334,35.3125,273,34.375S297.26666666666665,27.8125,303.3333333333333,28.125S327.59999999999997,37.8125,333.66666666666663,37.5Q337.71111111111105,37.291666666666664,364,25L364,50Q337.71111111111105,50,333.66666666666663,50C327.59999999999997,50,309.4,50,303.3333333333333,50S279.06666666666666,50,273,50S248.73333333333332,50,242.66666666666666,50S218.39999999999998,50,212.33333333333331,50S188.06666666666666,50,182,50S157.73333333333332,50,151.66666666666666,50S127.39999999999999,50,121.33333333333333,50S97.06666666666666,50,91,50S66.73333333333333,50,60.666666666666664,50S36.4,50,30.333333333333332,50Q26.288888888888888,50,0,50Z" class="area" fill="rgba(255,255,255,0.5)"></path></g></svg></div>
                    </div>
                </div>
            </div>
            <div class="row row-sm mg-t-20">
                <div class="col-lg-7">
                    <div class="card shadow-base bd-0 pd-25 ">
                        <div class="d-md-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Delivery Overview</h6>
                            </div>
                           <!--  <div class="wd-200 mg-t-20 mg-md-t-0">
                                <select class="form-control select2" data-placeholder="Choose location">
                                    <option selected="" disabled="" label="Choose one"></option>
                                    <option value="1" selected="">All Dustbin</option>
                                    <option value="2">All Warehouse</option>
                                </select>
                            </div> -->
                        </div>
                         <div id="map_canvas" style="width :100%;position: relative;height: 400px;">
                                   </div>
                        <div class="row row-xs mg-t-25">
                            <div class="col-sm-6">
                                <div class="tx-center pd-y-15 bd">
                                    <p class="mg-b-5 tx-uppercase tx-10 tx-mont tx-semibold"><img src="{{url('public/frontend/img/warehouse.png')}}">No. of Warehouse</p>
                                    <h4 class="tx-lato tx-inverse tx-bold mg-b-0" id="no_warehouse"></h4>
                                </div>
                            </div>
                            <div class="col-sm-6 mg-t-20 mg-sm-t-0">
                                <div class="tx-center pd-y-15 bd">
                                    <p class="mg-b-5 tx-uppercase tx-10 tx-mont tx-semibold"><img src="{{url('public/frontend/img/dustbin.png')}}">No. of Dustbin</p>
                                    <h4 class="tx-lato tx-inverse tx-bold mg-b-0" id="no_dustbin"></h4>
                                </div>
                            </div>
                          <!--   <div class="col-sm-4 mg-t-20 mg-sm-t-0">
                                <div class="tx-center pd-y-15 bd">
                                    <p class="mg-b-5 tx-uppercase tx-10 tx-mont tx-semibold">No. of Vehicle</p>
                                    <h4 class="tx-lato tx-inverse tx-bold mg-b-0">25</h4>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card shadow-base bd-0 pd-25 ">
                        <div class="d-md-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">today pickup list</h6>
                            </div>
                            <div class="wd-200 mg-t-20 mg-md-t-0 hide">
                                <select class="form-control select2" data-placeholder="Choose location">
                                </select>
                            </div>
                        </div>
                        <div class="bd rounded table-responsive mg-t-20">
                            <table class="table table-bordered mg-b-0" id="pickup_list">
                                <thead class="thead-colored thead-light">
                                    <tr>
                                        <th>Pickup ID</th>
                                        <th>No. of dustbin</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><span class="text-success"></span></td>
                                        <td><span class="text-success"></span></td>
                                        <td>
                                                                                        
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>                        
                    </div>
                </div>
               
            </div>
        </div>
        <footer class="br-footer">
            <div class="footer-left">
                <div class="mg-b-2">Copyright © 2020. All Rights Reserved.</div>
            </div>         
        </footer>
        <div class="resize-sensor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; z-index: -1; visibility: hidden;"><div class="resize-sensor-expand" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 100000px; height: 100000px;"></div></div><div class="resize-sensor-shrink" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%"></div></div></div>
 </div>
       <input type="hidden" name="tocken" value="{{ Session::get('auth_key') }}" id="tocken"> 
        @include('layouts.script')
</body>
<script type="text/javascript">
        getdasboard();
        function getdasboard(){
             var markerlist = "{{ env('API_URL').'dashboard' }}";
            $.ajax({
                url : markerlist,
                type : 'GET',
                async:false, 
                headers:{ 
                            'Access-Control-Allow-Origin': '*',       
                            'Authorization' : $("#tocken").val()
                        },
                success : function(data){
                    if(data.success === true){
                        var data1 = data.dresult;
                        //console.log(data1.dustbinTotal);
                        $('p#dustbin').text(data1.dustbinTotal);
                        $('p#warehouse').text(data1.warehouseTotal);
                        $('p#vehicle').text(data1.vehiclesTotal);
                        $('p#driver').text(data1.driversTotal);
                        $('p#pickup').text(data1.todaypicup);
                        $('p#all_pickup').text(data1.allpicup);
                        $('#no_warehouse').text(data1.warehouseTotal);
                        $('#no_dustbin').text(data1.dustbinTotal);

                        var markers =[];
                        var markers1 =[];
                        for (var i=0; i<data1.googleDustbinMapMarker.length; i++) {
                          markers.push(
                           marker = new google.maps.Marker({
                              position: new google.maps.LatLng(data1.googleDustbinMapMarker[i].latiude, data1.googleDustbinMapMarker[i].longitude),
                              map: map,
                              draggable: false,
                              icon: {
                                  url: "{{url('public/frontend/img/dus40.png')}}"
                                },
                               title:data1.googleDustbinMapMarker[i].name
                            })

                          );
                        }

                        for (var i=0; i<data1.googleDustbinMapMarker.length; i++) {
                          markers1.push(
                           marker = new google.maps.Marker({
                              position: new google.maps.LatLng(data1.googleWarehouseMapMarker[i].latitude, data1.googleWarehouseMapMarker[i].longitude),
                              map: map,
                              draggable: false,
                              icon: {
                                  url: "{{url('public/frontend/img/ware40.png')}}"
                                },
                               title:data1.googleWarehouseMapMarker[i].name
                            })

                          );
                        }
                         $("#pickup_list tbody").html('');
                        if(data.data==0){
                            $("#pickup_list tbody").append('<tr><td colspan="6" style="color:red;font-weight:600">No data Found</td></tr>');
                        }
                        else{
                          for(var i=0;i<data.data.length;i++){
                            var status;
                            if(data.data[i].groupStatus==1){
                                status ='<span class="text-danger">Completed</span>';
                                 }
                                 else{
                                    status ='<span class="text-success">Active</span>';
                                 }
                                $("#pickup_list tbody").append('<tr>'+
                                            +'<td>'+(i+1)+'</td>'
                                            +'<td>'+data.data[i].groupName+'</td>'
                                            +'<td>'+data.data[i].dustbincount+'</td>'
                                            +'<td>'+status+'</td>'  
                                            +'<td><a href="view-details/'+data.data[i].groupName+'"><div><i class="fa fa-eye"></i></div></a></td>'  
                                       +'</tr>');
                           
                            }  
                        }
                        

                    }
                }
                    
                    
            }) ;
        }
    </script>
<script type="text/javascript">
       var map;   
    function initMap() {
        var myLatlng = new google.maps.LatLng(28.7041, 77.1025);
        var myOptions = {
            zoom: 9,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
         getdasboard();
    }
    google.maps.event.addDomListener(window, "load", initMap());
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCntPB-qN_-K60eVMgJkJEy8Dn2ZxvxC6Y&callback=initMap">
    </script> 

</html>