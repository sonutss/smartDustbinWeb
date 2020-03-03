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
        <style type="text/css">
            #chart {
              border: 1px dotted red;
            }
            .table-bordered td {
                vertical-align: middle;
            }

          .chart-container {
            position: relative;
            height: 30vh;
            width: 100%;
          }
/*.circleBoxMain{
                position: relative;
                display: block;
            }*/
            .circleBox{             
                width: auto;
                /*display: inline-block;*/
                height: auto;
                margin:0 auto !important;
                position: absolute;
                top:-15px;
                left:0px;
            }
            
*{margin:0;}
img{width:32.2%;}

</style>
    </head>
<body>
@include('layouts.menu') 
    <div class="br-mainpanel">         
         <div class="tab-pane fade active show" id="posts">
            
                <div class="container-fluid">
                    <img src="">
                    <div class="row">
                 <div class="clearfix w-100 mg-t-20"></div>
                <div class="col-md-12">
                    <div class="card shadow-base bd-0 pd-25 ">
                        <h3 class="tx-inverse tx-uppercase tx-bold tx-14 mg-t-10">Bin Level Management</h3>
                       <!--  <div class="chart-container">
                               <canvas id="chart"></canvas>
                        </div> -->
                         <div class=" mg-t-25">
                            <div class="bd rounded table-responsive" style="overflow:hidden;">
                                <table class="table table-bordered mg-b-0" id="pickup">
                                    <thead class="thead-colored thead-light">
                                        <tr>
                                                <th>GSM Number</th>
                                                <th>Dustbin Name</th>
                                                <th>Address</th>
                                                <th>Percentage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                           
                                            
                                    </tbody>
                                </table>
                             </div>
                        </div>
                    </div>
                </div>             
            </div>           
        </div>
     </div>
        @include('layouts.footer')
     </div>
    </div>
    <script src="{{ url('public/frontend/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('public/frontend/lib/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <script src="{{ url('public/frontend/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('public/frontend/lib/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ url('public/frontend/lib/moment/min/moment.min.js') }}"></script>
    <script src="{{ url('public/frontend/lib/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ url('public/frontend/js/bracket.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
     <script src="{{ url('public/frontend/js/canvas.min.js') }}"></script>
     <script src="{{ url('public/frontend/js/jquery.scrollspeed.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>
    <script src="{{ url('public/frontend/frontendjs/dustbin_data.js') }}"></script>

</body>
</html>