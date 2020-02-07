<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dustbin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('public/frontend/css/bracket.css') }}">
    <link href="{{ asset('public/frontend/sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v" style="background-image:linear-gradient(to right, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.7)), url({{ url('public/frontend/img/images.jpg') }});background-size: 100%;background-position: center center,; ">
        <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
            <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> Dustbin <span class="tx-info"></span> <span class="tx-normal">]</span></div>
            <div class="tx-center mg-b-40"></div>
            <form id="signin" class="form-signin">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="username" name="email" id="email">
                        <small class="form-element-hint cus_error" style="display:none;color:red;">
                            <strong id="msg_email"></strong>
                        </small>
                </div>
                <div class="form-group mg-b-40">
                    <input type="password" class="form-control" placeholder="password" name="password" id="password">
                     <small class="form-element-hint cus_error" style="display:none;color:red;">
                        <strong id="msg_password"></strong>
                    </small>
                    <a href="#" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
                </div>
                <button type="button" class="btn btn-info btn-block" id="submit">Sign In</button>
                <!-- <button type="submit" onclick="location.href='dashboard.php'" class="btn btn-info btn-block" id="submit">Sign In</button> -->
            </form>
            <div class="mg-t-30 tx-center"><p>&copy; 2020 All rights reserved<p></div>
        </div>
    </div>
    <script src="{{ url('public/frontend/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('public/frontend/lib/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <script src="{{ url('public/frontend/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/frontend/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('public/frontend/sweetalert/jquery.sweet-alert.custom.js') }}"></script>
    <script type="text/javascript">
        $("#submit").click(function(){
                if($("#email").val()==''){
                    $("#submit").attr("disabled", false);
                    $('html, body').animate({scrollTop: $("#email").offset().top }, 1000);
                    $("#msg_email").parent().show();
                    $("#msg_email").text('Please enter email address !');
                    setTimeout(function(){ 
                        $("#msg_email").parent().hide();
                        $("#msg_email").text('');
                    }, 5000);
                    $("#user_email").focus();
                    return false ;
                } else if($("#password").val()==''){
                    $("#submit").attr("disabled", false);
                    $('html, body').animate({scrollTop: $("#password").offset().top }, 1000);
                    $("#msg_password").parent().show();
                    $("#msg_password").text('Please enter password !');
                    setTimeout(function(){ 
                    $("#msg_password").parent().hide();
                    $("#msg_password").text('');
                    }, 5000);
                    $("#password").focus();
                    return false ;
                } else {

                    var userlogin={
                        email:$("#email").val(),
                        password:$("#password").val()
                    }
                    $.ajax({
                        url : "{{ url('login') }}",
                        type : 'POST',
                        data : userlogin,
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success : function(response){
                            var response = JSON.parse(response);
                        $("#submit").attr("disabled", false); 
                            if(response.status == 'true'){
                                swal("Success", response.message, "success");
                                setTimeout(function(){
                                    window.location.href = "{{ url('dashboard') }}";
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
                        }, error:function(request, status, error){
                         console.log("ddsfgdfgdfg"+request.responseJSON);return false;
                            $("#submit").attr("disabled", false);
                            swal({   
                                title: "Warnings",   
                                text: request.responseJSON.message,   
                                type: "warning",   
                                showCancelButton: true,   
                                confirmButtonColor: "#DD6B55",   
                            });
                            setTimeout(function(){
                                window.location.reload(true); 
                            }, 5000);
                        },
                        cache : false ,
                    }) ;
                    // return false ;
                }
            });
        
    </script>
</body>

</html>