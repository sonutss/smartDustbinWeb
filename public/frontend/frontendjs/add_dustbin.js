$("form#add-dustbin").submit(function(){
    var gsm_moblie_number = $("#gsm_moblie_number").val();
    if($.trim($("#wid").val())==''){
        $("#submit").attr("disabled", false);
        $('html, body').animate({scrollTop: $("#wid").offset().top }, 1000);
        $("#msg_wid").parent().show();
        $("#msg_wid").text('Please enter warehouse wid!');
        setTimeout(function(){ 
            $("#msg_wid").parent().hide();
            $("#msg_wid").text('');
        }, 5000);
        $("#wid").focus();
        return false ;
    }
    else if($.trim($("#name").val())==''){
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
    }  else if($.trim($("#gsm_moblie_number").val())==''){
        $("#submit").attr("disabled", false);
        $('html, body').animate({scrollTop: $("#gsm_moblie_number").offset().top }, 1000);
        $("#msg_gsm_moblie_number").parent().show();
        $("#msg_gsm_moblie_number").text('Please enter gsm_moblie_number number !');
        setTimeout(function(){ 
        $("#msg_gsm_moblie_number").parent().hide();
        $("#msg_gsm_moblie_number").text('');
        }, 5000);
        $("#gsm_moblie_number").focus();
        return false ;
    } else if(!$.isNumeric(gsm_moblie_number)){
        $('html, body').animate({scrollTop: $("#gsm_moblie_number").offset().top }, 1000);
        $("#msg_gsm_moblie_number").parent().show();
        $("#msg_gsm_moblie_number").text('Only digit Accepted !');
        setTimeout(function(){ 
        $("#msg_gsm_moblie_number").parent().hide();
        $("#msg_gsm_moblie_number").text('');
        }, 5000);
        $("#gsm_moblie_number").focus();
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
            wid       : $("#wid").val(),
            name       : $("#name").val(),
            gsm_moblie_number      : $("#gsm_moblie_number").val(),
            latiude        : $("#latitude").val(),
            longitude       : $("#longitude").val(),
            address : $("#address").val(),
        };
        $.ajax({
            url  : add_dustbin,
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
                        window.location.href = dustbin_list;
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