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
                        <h6 class="tx-inverse tx-uppercase tx-bold tx-14 mg-t-10">Dustbin List 
                            <button onclick="location.href='order.php'" class="btn btn-primary pd-x-15 pd-y-10 tx-bold tx-spacing-4 tx-12 btn-sm float-right mg-y-0-force"><div>back</div></button>
                            <div class="form-group float-right mg-r-20" style="width:250px;">
                                <select class="form-control select2" data-placeholder="Choose one ">
                                    <option label="Choose one">No. od records</option>
                                    <option value="Firefox"></option>
                                </select>
                            </div>                            
                        </h6>
                         <div>
                        
                       <div  id="pickup"></div>
                      

                           <!--  <table class="table table-bordered mg-b-0" id="pickup">
                                <thead class="thead-colored thead-light">
                                    <tr>
                                        <th>
                                            <label class="ckbox mg-b-0">
                                                <input type="checkbox">
                                                <span></span>
                                            </label> 
                                        </th>
                                        <th>Dustbin Name</th>
                                        <th>GSM Number</th>
                                        <th>Distance</th>
                                        <th>Duration</th>
                                        <th>Data Percentage</th>
                                       
                                    </tr>
                                </thead>
                                <tbody> -->
                                    <!-- <tr>
                                        <td scope="row">1</td>
                                        <td>
                                            <label class="ckbox">
                                                <input type="checkbox">
                                                <span></span>
                                            </label>                                           
                                        </td>
                                        <td>DN-4545</td>
                                        <td>5798555697864</td>
                                        <td>7879898797667</td>                                       
                                        <td><span class="text-danger">60%</span></td>
                                      
                                    </tr>
                                    <tr>
                                        <td scope="row">2</th>
                                        <td>
                                            <label class="ckbox">
                                                <input type="checkbox">
                                                <span></span>
                                            </label> 
                                        </td>
                                        <td>DN-4545</td>
                                        <td>5798555697864</td>
                                        <td>7879898797667</td>                                       
                                        <td><span class="text-danger">80%</span></td>
                                       
                                    </tr> -->
                               <!--  </tbody>
                            </table> -->

                        </div>
                    </div>
                      <!--   <div class="form-layout-footer mg-t-30 tx-center">
                            <button class="btn btn-primary">Create</button>
                            <button class="btn btn-secondary">Cancel</button>
                        </div> -->
                       <!--  <div class="ht-80  d-flex align-items-center justify-content-center mg-t-20">
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
        <input type="hidden" name="groupname" id="groupname" value="{{ uniqid() }}">
        <input type="hidden" name="assigndate" id="assigndate" value="{{ date('Y-m-d H:i:s') }}">
        <input type="hidden" name="tocken" id="tocken" value="{{ Session::get('auth_key') }}">
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
                url : "{{ url('pickup-create') }}",
                type : 'POST',
                data : pickup,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success : function(data){
                    var data = JSON.parse(data);
                    console.log(data);//return false; 
                    $("#pickup").html('');
                    if(data.count == 0){
                        $("#pickup").html('<tr><td colspan="6" style="color:red;font-weight:600">No data Found</td></tr>');
                    } else {
                        $("#pickup").html(data.html);
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
      function getCheckData(wid){
        var postdata = "{{ env('API_URL') }}";
        var pickup = "{{ url('pickup') }}";
        checkList = [];
        $.each($("input[name='check[]']:checked"), function(i,val){
              checkList.push(val.value);
              
            });
        var parms = {
                    groupname : $('#groupname').val(),
                    wid       : wid,
                    did       : checkList,
                    assigndate : $('#assigndate').val() 
        } 
        $.ajax({
                url : postdata+'assignVehicle',
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
                    if(response.success == true && response.dataResults!=0){
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