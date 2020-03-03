$(function(){
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
        //   $('.pagination').twbsPagination({
        //     totalPages: 1,
        //     startPage: 1,
        //     visiblePages: 5,
        //     href: false,
        //     loop: false,
        //     onPageClick: function (event, page) {
        //         openModalAvailable(wid,page,groupid);
        //         // openModalNotAvailable(wid,page);
        //     },
        // });
            var groupid = 0;
            var wid = 0;
            var dustbincount = 0; 
        function openModalAvailable(xyz,wid,page){
               //console.log($(xyz).data('dustbincount'))
                dustbincount = $(xyz).data('dustbincount'); 
                groupid = $(xyz).data('groupname');
                
                wid     = wid;    
            var effect = $(this).attr('data-effect');
                $('#modaldemo8').addClass(effect);
                $('#modaldemo8').modal('show');
            var avilable={
                page          : page,
                perpage       : 10,
                wid           : wid,
                list          : 'true',
                show          : 'true'
            }
            //console.log(avilable);
             //return false;
                $.ajax({
                url : available_vehicle,
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
                               // console.log(page);
                               getData(page);
                            }); 
                        }
                    } 
                },
                cache : false ,
            }) ;
        }


// $("input[name='vehicle_id']:checked").on("click",function(){
        
//         console.log("val gety"+ getvalue);
// });      

        function saveModalData(){
            var vehicle_id = $("input[name='vehicle_id']:checked").val();
            var vcapacity = $("input[name='vehicle_id']:checked").data("value");
            // alert();
            //console.log("vehicle_id"+ vehicle_id);return false;
           // var vcapacity = $("input[name='vehicle_capacity']").val();
            // vehicle_capacity = $("").data('vehiclecapacity');
            //console.log('vehicl'+vcapacity);
            //console.log('dustbincount'+dustbincount);
        if(dustbincount<=vcapacity)
        {
                 var params = {
                    groupid : groupid,
                    vid : vehicle_id,
               }
               $.ajax({
                url : manualReassignPickup,
                type: 'POST',
                 headers:{ 
                            'Access-Control-Allow-Origin': '*',       
                            'Authorization' : $("#tocken").val()
                 },
                data : JSON.stringify(params),
                async:false, 
                success: function(response){
                    $("#submit").attr("disabled", false);
                   // console.log("response",response) ;
                    if(response.success == true){
                         params={};
                        swal("Success", response.message, "success");
                        setTimeout(function(){ 

                            window.location.href = pickup;
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
                    //console.log('data',rr.success);
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
        }else{
             swal({   
                            title: "Warnings",   
                            text: "To assign order no. of dustbin should not be greater then vehicle capacity !!",   
                            type: "warning",   
                            showCancelButton: true,   
                            confirmButtonColor: "#DD6B55",   
                        });
        }
              
        }

        // function openModalNotAvailable(wid,page){
        //     var effect = $(this).attr('data-effect');
        //         $('#modaldemo9').addClass(effect);
        //         $('#modaldemo9').modal('show');
        //     var notavilable={
        //         page          : page,
        //         perpage       : 10,
        //         wid           : wid,
        //         list          : 'true'
        //     }
        //     console.log(notavilable);
        //         $.ajax({
        //         url : "{{url('notavailable-vehicle')}}",
        //         type : 'POST',
        //         data : notavilable,
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         success : function(data){
        //             var data = JSON.parse(data);
        //             console.log(data);//return false; 
        //             $("#not-available tbody").html('');
        //             if(data.count == 0){
        //                 $("#not-available tbody").html('<tr><td colspan="6" style="color:red;font-weight:600">No data Found</td></tr>');
        //             } else {
        //                 $("#not-available tbody").html(data.html);
        //                 if(page == 1){
        //                     $('.pagination').twbsPagination('destroy');
        //                     $('.pagination').twbsPagination({
        //                         totalPages: data.count,
        //                         href: false,
        //                     }).on('page', function (event, page) {
        //                         console.log(page);
        //                        getData(page);
        //                     }); 
        //                 }
        //             } 
        //         },
        //         cache : false ,
        //     }) ;
        // }
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
            var pickupdata={
                //page          : page,
                //perpage       : $("#record").val(),
                //driverstatus : $("#status").val(),
                list          : 'true'
            }
            $.ajax({
                url : pickup,
                type : 'POST',
                data : pickupdata,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success : function(data){
                    var data = JSON.parse(data);
                    //console.log(data);//return false; 
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
                    //console.log('data',rr.success);//return false ;
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
        