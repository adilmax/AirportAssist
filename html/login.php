<?php
$title = "Airport assistance| Ground handling services| Airport meet and greet | VIP travel services|Airport concierge| Ramp Services|Crew Assistance";
require_once('responder_header.php');
?>
<div class="row margin-login">
    <div class="container-fluid">
        <form action="" method="post" class="form-horizontal form_top" autocomplete="off" >
                <fieldset class="padding-fieldset" >
                    
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4 login_border" >                       
                        <h4 class="login_title">Login To Your Account</h4>
                        <? 
                        if(count($error)>0){?>
               
                            <ul class="list-group" id="error-alert">
                                <?for($i=0;$i<count($error);$i++){?>
                                    <li class="list-group-item list-group-item-danger noborder" ><?=$error[$i];?></li>
                                <?}?>
                            </ul>

                        <?}?>
                    <div class="container">
                    <div class="row" style="margin-left: 2px;">
                    <div class="form-group">
                        <div class="col-lg-4" >
                            <input type="text" value ="" class="form-control field_color place_holder" name="username" id="username" placeholder="Username" 
                                   accept=""data-validation="required" autocomplete="off"
                            accesskey=""data-validation-error-msg-required="You must enter Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class=" col-lg-4" >
                            <input type="password" value ="" class="form-control field_color place_holder" name="password" id="password" placeholder="Password" 
                                   accept=""data-validation="required length" autocomplete="off" 
                            accesskey=""data-validation-error-msg-required="You must enter Password"
                            data-validation-length="8-50" data-validation-error-msg-length="Minimum length should be 8">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-4">
                            <input type="submit" class="login_button" name="login" value="Login" id="login" >
                        </div>
                    </div>
                    <div class="form-group" id="login-footer">
                    <div class="col-lg-4 login-bottom">
                        <a href="registration">Register </a>
                        <a href="#" data-toggle="modal" data-target="#changePassword" style="float:right;">Forgot password</a>
                    </div>
                    </div>
                    </div>
                    </div>
                </div>
                    <div class="col-lg-4"></div>
            </fieldset>
        </form>
    </div>
</div>
<div id="changePassword" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Reset Password</h4>
          </div>
            <div class="modal-body" style="margin:20px 0px 50px 0px;">
                <div class="alert alert-success dispaly_none" id="success_send">
                    <p>
                        Check your email - we sent you an email with reset password link.Please click on the link for reset your password.
                    </p>
                </div>
                <div class="alert alert-danger dispaly_none" id="error_send">
                    <p>
                       sorry no such email id available in the system...
                    </p>
                </div>
                <div class="col-lg-12" id="resetPassword">
                    <div class="form-group">

                            <div class=" col-lg-8">
                                <input type="text" class="form-control field_color place_holder" id="email" placeholder="Enter Email" name="email" accept=""data-validation="required" value="<?=(isset($data['email']))?$data['email']:"";?>"
                                       accesskey=""data-validation-error-msg-required="You must enter Email">
                                <div id="error_send_pass" style="color: red;"></div>

                            </div>
                             <div class=" col-lg-2">
                                 <input type="button" name="reset" value="Send Link" class="btn btn-default" id="reset">
                             </div>
                    </div>
                </div>
          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

    </div>
</div>
<?php require_once('responder_footer.php');?>

<script type="text/javascript">
    $(function() {     
        $.validate();  
        $("#reset").click(function (){
            var email = $("#email").val();
            if(email !== ""){
                if(validateEmail(email)){
                    $("#error_send_pass").html("");
                    $.post("resetpassword.php",{email:email},function(data){
                        if(data){                           
                            $("#resetPassword").hide();
                            $("#error_send").hide();
                            $("#success_send").show();
                        }else{
                            $("#success_send").hide();
                            $("#error_send").show();
                        }
                    });
                }else{
                    $("#error_send_pass").html("You must enter valid email.");
                }
            }else{
                $("#error_send_pass").html("You must enter email.");
            }
        });
        
    });
    function validateEmail(email){
        var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (filter.test(email)){
            return true;
        }else {
            return false;
        }
    }

</script>