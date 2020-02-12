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
                    <div class="card shadow-base widget-7 mg-b-f-0">
                        <div class="tx-center">
                            <a href="#"><img src="{{url('public/frontend/img/ic-truck.png')}}" class="wd-100 rounded-circle" alt=""></a>
                            <h4 class="tx-normal tx-inverse tx-roboto mg-t-20">{{ $decode['result']['singledata']['vehicle_rc'] }}</h4>
                            <p class="mg-b-20">{{ $decode['result']['singledata']['model_name'] }}, {{ $decode['result']['singledata']['mgf_year'] }} </p>
                        </div>
                        <div class="tx-left w-100">
                            <h5 class="">Truck Type </h5>
                            <p class="mg-b-20">{{ $decode['result']['singledata']['trucktype'] }}</p>
                            <h5 class="">Truck Capacity</h5>
                            <p class="mg-b-20">{{ $decode['result']['singledata']['capacity'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 col-lg-8 mg-t-20 mg-sm-t-0">
                    <div class="card ">
                        <div class="card-body ">
                            <div class="row row-sm">
                                <div class="col-sm-4 col-lg-4 mg-t-20">
                                    <h5 class="">RC Issue Date</h5>
                                    <p class="mg-b-20">
                                        <?php $date =  date_create($decode['result']['singledata']['rc_issue']);
                                               $date1 = date_format($date,"Y-m-d");
                                               $yrdata= strtotime($date1);
                                                echo date('M,Y', $yrdata); 
                                         ?>
                                    </p>
                                </div>
                                <div class="col-sm-4 col-lg-4 mg-t-20">
                                    <h5 class="">RC Expiry Date</h5>
                                    <p class="mg-b-20"><?php $date =  date_create($decode['result']['singledata']['rc_expire']);
                                               $date1 = date_format($date,"Y-m-d");
                                               $yrdata= strtotime($date1);
                                                echo date('M,Y', $yrdata); 
                                         ?></p>
                                </div>
                                <div class="col-sm-4 col-lg-4 mg-t-20">
                                    <h5 class="">Issuing Country</h5>
                                    <p class="mg-b-20">{{ $decode['result']['singledata']['issue_country'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card ">
                        <div class="card-body ">
                            <div class="row row-sm">
                                <div class="col-sm-4 col-lg-4 mg-t-20">
                                    <h5 class="">Insurance Number</h5>
                                    <p class="mg-b-20">{{ $decode['result']['singledata']['insurance_no'] }}</p>
                                </div>
                                <div class="col-sm-4 col-lg-4 mg-t-20">
                                    <h5 class="">Issue Date</h5>
                                    <p class="mg-b-20">
                                        <?php $date =  date_create($decode['result']['singledata']['insurance_issue_date']);
                                               $date1 = date_format($date,"Y-m-d");
                                               $yrdata= strtotime($date1);
                                                echo date('M,Y', $yrdata); 
                                         ?>
                                             
                                         </p>
                                </div>
                                <div class="col-sm-4 col-lg-4 mg-t-20">
                                    <h5 class="">Expiry Date</h5>
                                    <p class="mg-b-20"> 
                                        <?php $date =  date_create($decode['result']['singledata']['insurance_expire_date']);
                                               $date1 = date_format($date,"Y-m-d");
                                               $yrdata= strtotime($date1);
                                                echo date('M,Y', $yrdata); 
                                         ?>
                                             
                                         </p>
                                </div>
                                <div class="col-sm-4 col-lg-4 mg-t-20">
                                    <h5 class="">Insurance Company Name</h5>
                                    <p class="mg-b-20">{{ $decode['result']['singledata']['insurance_company'] }}</p>
                                </div>
                                <div class="col-sm-4 col-lg-4 mg-t-20">
                                    <h5 class="">Type of Cover </h5>
                                    <p class="mg-b-20">{{ $decode['result']['singledata']['insurance_cover'] }}</p>
                                </div>
                                <div class="col-sm-4 col-lg-4 mg-t-20">
                                    <h5 class="">Coverage Limit </h5>
                                    <p class="mg-b-20">{{ $decode['result']['singledata']['coverage_limit'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ht-70 bg-gray-100 pd-x-20 d-flex align-items-center justify-content-center shadow-base w-100">
                            <ul class="nav nav-outline active-info align-items-center flex-row" role="tablist">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#posts" role="tab">Daily Pickup History</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#photos" role="tab">Driver List</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#doc" role="tab">Document</a></li>
                            </ul>
                        </div>
                </div>
            </div>
            <div class="tab-pane fade active show" id="posts">
                <div class="row">
                    <div class="col-lg-12 mg-t-30">
                        <div class="media-list bg-white rounded shadow-base">
                            <h6 class="tx-gray-800 tx-uppercase tx-semibold tx-14 pd-t-20 pd-b-10 pd-l-20">Daily Pickup History</h6>
                            <div class="bd rounded table-responsive">
                                <table class="table table-bordered mg-b-0">
                                    <thead class="thead-colored thead-light">
                                        <tr>
                                            <th>Daily Pickup ID</th>
                                            <th>Date</th>
                                            <th>Driver</th>
                                            <th>No. of dustbin</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($decode['dustbinData'])>0)
                                        @foreach($decode['dustbinData'] as $key => $val)
                                        <tr>
                                            <td><span class="text-success">{{$val['groupName']}}</span></td>
                                            <td> <?php $date =  date_create($val['dataassignDate']);
                                               $date1 = date_format($date,"Y-m-d");
                                               $yrdata= strtotime($date1);
                                                echo date('d M,Y', $yrdata); 
                                         ?></td>
                                            <td>
                                                <a href="#" class="media-list-link">
                                                    <div class="media pd-y-0-force pd-x-0-force">
                                                        <img src="{{env('STORAGE_PATH') }}/drivers/{{$val['driverphoto']}}" alt="">
                                                        <div class="media-body">
                                                        <div>
                                                            <p class="mg-b-0 tx-medium tx-gray-800 tx-13">{{$val['driverName']}}</p>
                                                        </div>
                                                        <p class="tx-12 tx-gray-600 mg-b-0">{{$val['drivermobile']}}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>                                   
                                            <td><span class="text-success">{{$val['dustbincount']}}</span></td>
                                            <td>@if($val['assignstatus']==1)
                                                <span class="text-success">Active</span>
                                                @else
                                                <span class="text-danger">Completed</span>
                                            @endif</td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr><td><strong style="color: red;">No data found !!</strong></td></tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <!-- <div class="ht-80  d-flex align-items-center justify-content-center mg-t-20">
                                <ul class="pagination pagination-circle mg-b-0">
                                    <li class="page-item hidden-xs-down">
                                        <a class="page-link" href="#" aria-label="First"><i class="fa fa-angle-double-left"></i></a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item disabled"><span class="page-link">...</span></li>
                                    <li class="page-item"><a class="page-link" href="#">10</a></li>
                                
                                    <li class="page-item hidden-xs-down">
                                        <a class="page-link" href="#" aria-label="Last"><i class="fa fa-angle-double-right"></i></a>
                                    </li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="photos">
                <div class="row">
                    <div class="col-lg-12 mg-t-30">
                        <div class="media-list bg-white rounded shadow-base">
                        <h6 class="tx-gray-800 tx-uppercase tx-semibold tx-14 pd-t-20 pd-b-10 pd-l-20">Driver List</h6>
                            <div class="bd rounded table-responsive">
                                <table class="table table-bordered mg-b-0">
                                    <thead class="thead-colored thead-light">
                                        <tr>
                                            <th>Assigned Driver</th>
                                            <!-- <th></th>
                                            <th>Assigned time</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($decode['result']['driverList'] as $key=>$val)
                                        <tr>
                                            <td>
                                                <a href="#" class="media-list-link">
                                                    <div class="media pd-y-0-force pd-x-0-force">
                                                        <img src="{{env('STORAGE_PATH')}}/drivers/{{$val['driver_image']}}" alt="">
                                                        <div class="media-body">
                                                        <div>
                                                            <p class="mg-b-0 tx-medium tx-gray-800 tx-13">{{$val['name'] }}</p>
                                                        </div>
                                                        <p class="tx-12 tx-gray-600 mg-b-0">{{$val['mobile_no'] }}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>                                   
                                            <!-- <td><span class="text-success">50</span></td>
                                            <td>Current</td> -->
                                           
                                        </tr>
                                        @endforeach
                                        <!-- <tr>
                                            <td>
                                                <a href="#" class="media-list-link">
                                                    <div class="media pd-y-0-force pd-x-0-force">
                                                        <img src="{{url('public/frontend/img/img4.jpg') }}" alt="">
                                                        <div class="media-body">
                                                        <div>
                                                            <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Samantha Francis</p>
                                                        </div>
                                                        <p class="tx-12 tx-gray-600 mg-b-0">+971 589658965</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>                                   
                                            <td><span class="text-success">50</span></td>
                                            <td>12 Apr, 2018 to 10 Oct, 2019</td>
                                           
                                        </tr> -->
                                    </tbody>
                                </table>
                            </div>
                            <!-- <div class="ht-80  d-flex align-items-center justify-content-center mg-t-20">
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
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="doc">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card pd-20 pd-xs-30 shadow-base bd-0 mg-t-30">
                            <h6 class="tx-gray-800 tx-uppercase tx-semibold tx-14 ">Recent Photos</h6>
                            <div class="row row-xs">
                                <div class="col-6 col-sm-4 col-md-4 mg-t-10">
                                    <div class="gallery">
                                        <a href="{{env('STORAGE_PATH')}}uploads/{{ $decode['result']['document']['vehiclephoto'] }}" class="image-link">
                                            <img class=" img-fluid" src="{{env('STORAGE_PATH')}}uploads/{{ $decode['result']['document']['vehiclephoto'] }}" />
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4 col-md-4 mg-t-10">
                                    <div class="gallery">
                                        <a href="{{env('STORAGE_PATH')}}uploads/{{ $decode['result']['document']['registrationcard'] }}" class="image-link">
                                            <img class=" img-fluid" src="{{env('STORAGE_PATH')}}uploads/{{ $decode['result']['document']['registrationcard'] }}" />
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4 col-md-4 mg-t-10">
                                    <div class="gallery">
                                        <a href="{{env('STORAGE_PATH')}}uploads/{{ $decode['result']['document']['insurancephoto'] }}" class="image-link">
                                            <img class=" img-fluid" src="{{env('STORAGE_PATH')}}uploads/{{ $decode['result']['document']['insurancephoto'] }}" />
                                        </a>
                                    </div>
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
</body>
</html>