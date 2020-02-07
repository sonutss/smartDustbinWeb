$("form#add-warehouse").submit(function(){
    var mobile = $("#mobile").val();
    if($.trim($("#name").val())==''){
        $("#submit").attr("disabled", false);
        $('html, body').animate({scrollTop: $("#name").offset().top }, 1000);
        $("#msg_name").parent().show();
        $("#msg_name").text('Please enter warehouse name!');
        setTimeout(function(){ 
            $("#msg_name").parent().hide();
            $("#msg_name").text('');
        }, 5000);
        $("#name").focus();
        return false ;
    } else if($.trim($("#email").val())==''){
        $("#submit").attr("disabled", false);
        $('html, body').animate({scrollTop: $("#email").offset().top }, 1000);
        $("#msg_email").parent().show();
        $("#msg_email").text('Please enter email id !');
        setTimeout(function(){ 
        $("#msg_email").parent().hide();
        $("#msg_email").text('');
        }, 5000);
        $("#email").focus();
        return false ;
    } else if($.trim($("#mobile").val())==''){
        $("#submit").attr("disabled", false);
        $('html, body').animate({scrollTop: $("#mobile").offset().top }, 1000);
        $("#msg_mobile").parent().show();
        $("#msg_mobile").text('Please enter mobile number !');
        setTimeout(function(){ 
        $("#msg_mobile").parent().hide();
        $("#msg_mobile").text('');
        }, 5000);
        $("#mobile").focus();
        return false ;
    } else if(!$.isNumeric(mobile)){
        $('html, body').animate({scrollTop: $("#mobile").offset().top }, 1000);
        $("#msg_mobile").parent().show();
        $("#msg_mobile").text('Only digit Accepted !');
        setTimeout(function(){ 
        $("#msg_mobile").parent().hide();
        $("#msg_mobile").text('');
        }, 5000);
        $("#mobile").focus();
        return false ;
    } else if($.trim($("#latitude").val())==''){
        $("#submit").attr("disabled", false);
        $('html, body').animate({scrollTop: $("#latitude").offset().top }, 1000);
        $("#msg_latitude").parent().show();
        $("#msg_latitude").text('Please enter latitude !');
        setTimeout(function(){ 
            $("#msg_latitude").parent().hide();
            $("#msg_latitude").text('');
        }, 5000);
        $("#latitude").focus();
        return false ;
    } else if($.trim($("#longitude").val())==''){
        $("#submit").attr("disabled", false);
        $('html, body').animate({scrollTop: $("#longitude").offset().top }, 1000);
        $("#msg_longitude").parent().show();
        $("#msg_longitude").text('Please enter longitude !');
        setTimeout(function(){ 
        $("#msg_longitude").parent().hide();
        $("#msg_longitude").text('');
        }, 5000);
        $("#longitude").focus();
        return false ;
    } else if($.trim($("#address").val())==''){
        $("#submit").attr("disabled", false);
        $('html, body').animate({scrollTop: $("#address").offset().top }, 1000);
        $("#msg_address").parent().show();
        $("#msg_address").text('Please enter address !');
        setTimeout(function(){ 
        $("#msg_address").parent().hide();
        $("#msg_address").text('');
        }, 5000);
        $("#address").focus();
        return false ;
    } else {
        var arr = {
            name1       : $("#name").val(),
            mobile      : $("#mobile").val(),
            email       : $("#email").val(),
            latt        : $("#latitude").val(),
            longt       : $("#longitude").val(),
            fulladdress : $("#address").val(),
        };
        $.ajax({
            url  : add_warehouse,
            type : 'POST',
            headers:{ 
                'Access-Control-Allow-Origin': '*', 
                'Authorization' : $("#tocken").val(),
            },
            data     : JSON.stringify(arr),
            success  : function(response){
                $("#submit").attr("disabled", false); 
                console.log("response",response) ;//return false ;8
                //var res = $.parseJSON(response);
                if(response.success == true){
                    swal("Success", response.message, "success");
                    setTimeout(function(){ 
                        window.location.href = warehouse_list;
                    }, 3000);
                } else {
                    swal({   
                        title: "Warnings",   
                        text: response.message,   
                        type: "warning",   
                        showCancelButton: true,   
                        confirmButtonColor: "#DD6B55",   
                    });
                }
            }, error : function(data){
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
        return false ;
    }
});