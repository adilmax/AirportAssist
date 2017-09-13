<?php $title = "Work with Us -  Join MUrgency Airport Assistance";
$metaDesc ="Pursue your career as Airport Assistant. Jobs now open. Fill up the simple form to apply.";
require_once('header_inner_registration.php');
?>

<div class="container-fluid margin_top_responder  nopadding ">
    <div class="row nopadding">
        <div class="col-lg-12 col-md-12 col-xs-12 nopadding">
            <div class="col-lg-7 col-md-8 col-xs-12 nopadding margin_bottom_responder">
                <div class="row">
                    <header id="top" class="header_responder">
                        <div class="text-vertical-left">
                            <div class="landing-text-background-colour-responder">
                                <div>
                                    <p class="responder-banner-text">
                                        Join to be a part of Global Community<br/> of <span
                                            class="responder-banner-text-subcolor">MUrgency Airport Assistants</span> in<br/>
                                        <span class="responder-banner-text-subtext"><h2>136 countries
                                                Worldwide</h2></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </header>
                </div>
                <div class="col-lg-12 col-md-12 col-xs-12 margin-bottom-sub-img-responder">
                    <div class="col-md-4 col-xs-12 col-lg-4 text-center">
                        <div><img src="image/corporatesub2.png"
                                  class="img-circle img-responsive text-center image-responder-sub"/></div>
                        <div><p class="font-size-corpo text-center font-size-responder">Flexible work hour<br/> Work
                                as per your schedule</p></div>
                    </div>

                    <div class="col-md-4 col-xs-12 col-lg-4 text-center">
                        <div><img src="image/respondersub2.png"
                                  class="img-circle img-responsive text-center image-responder-sub"/></div>
                        <div><p class="font-size-corpo text-center font-size-responder">Earn additional income</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12 col-lg-4 text-center">
                        <div><img src="image/respondersub3.png"
                                  class="img-circle img-responsive text-center image-responder-sub"/></div>
                        <div><p class="font-size-corpo text-center font-size-responder">Become part of a global Network</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-4 col-xs-12 corpo_form_bgcolor">
                <div class="Register-form">
                    <h3 class="responder-title">BECOME AN AIRPORT ASSISTANT</h3>
                    <h2 class="responder-title-sub">WORK WITH US </h2>
                    <p class="responder-title-content">Join our ever-growing workforce. Pursue a career in Airport Assistance & meet travelers from across the world. Just enter your details & we will get in touch with you.</p>
                    <form action="" method="post" class="form-horizontal form_top">
                        <div class="col-lg-12 col-xs-12">
                            <? if (count($error) > 0) { ?>
                                <ul class="list-group">
                                    <? for ($i = 0; $i < count($error); $i++) { ?>
                                        <li class="list-group-item list-group-item-danger noborder"><?= $error[$i]; ?></li>
                                    <? } ?>
                                </ul>
                            <? } ?>

                        </div>
                        <div class="form-group" class="responder_element_margin_top">
                            <div class=" col-lg-6 col-xs-12 <?= (count($error) > 0) ? "" : "empty-responder"; ?>"
                                 id="forFirstName">
                                <input type="text" class="form-control field_color place_holder" id="firstName"
                                       placeholder="FIRST NAME" name="firstName" accept="" data-validation="required"
                                       data-validation-error-msg-required="You must enter first name"
                                       value="<?= (isset($data['firstName'])) ? $data['firstName'] : ""; ?>">
                            </div>
                            <div
                                class=" col-lg-6 col-xs-12 <?= (count($error) > 0) ? "" : "empty-responder"; ?> margin_responder-top"
                                id="forLastName">
                                <input type="text" class="form-control field_color place_holder" id="lastName"
                                       placeholder="LAST NAME" name="lastName" accept="" data-validation="required"
                                       value="<?= (isset($data['lastName'])) ? $data['lastName'] : ""; ?>"
                                       data-validation-error-msg-required="You must enter last name">
                            </div>
                        </div>
                        <div class="form-group mobile-form">
                            <div class="mobile-form-number-register">

                                <div class="col-lg-3 col-xs-3 nopadding responder-mobilecode-field">
                                    <input type="tel" id="mobileCode" class="form-control field_color place_holder"
                                           name="mobileCode" accept="" data-validation="required"
                                           data-validation-error-msg-required="You must enter mobile code"
                                           style="background-color: #fff;">
                                </div>
                                <div class="col-lg-6 col-xs-5 nopadding responder-mobile-field responder-field <?= (count($error) > 0) ? "" : "empty-mobile-responder"; ?>"
                                    id="forMobile">
                                    <input type="text" name="mobile" class="form-control field_color place_holder mobile_width_responder"
                                           placeholder="MOBILE NUMBER" id="mobile"
                                           value="<?= (isset($data['mobile'])) ? $data['mobile'] : ""; ?>">
                                    <div id="phoneError" style="color:#a94442" class="field_size"></div>
                                    <input type="hidden" name="verifyStatus" id="verifyStatus" value="false">
                                </div>
                                <div class="col-lg-2 col-xs-2 ">
                                    <button type="button" class="btn btn-default register_button-responder"
                                            id="verifyDialogue">
                                        Verify
                                    </button>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class=" col-lg-12 col-xs-12 <?= (count($error) > 0) ? "" : "empty-responder"; ?>"
                                 id="forEmail">
                                <input type="email" class="form-control field_color place_holder " id="email"
                                       placeholder="EMAIL" name="email" accept="" data-validation="required"
                                       value="<?= (isset($data['email'])) ? $data['email'] : ""; ?>"
                                       data-validation-error-msg-required="You must enter email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class=" col-lg-12 col-xs-12 empty-responder" id="forPassword">
                                <input type="password" class="form-control field_color place_holder" id="password"
                                       placeholder="PASSWORD" name="password" accept=""
                                       data-validation="required length"
                                       data-validation-error-msg-required="You must enter Password"
                                       data-validation-length="8-50"
                                       data-validation-error-msg-length="Minimum length should be 8">
                                <div id="pass_error" class="dispaly_none" style="color:#a94442;"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class=" col-lg-12 col-xs-12 empty-responder" id="forConfPassword">
                                <input type="password" class="form-control field_color place_holder" id="confPassword"
                                       placeholder="CONFIRM PASSWORD" name="confPassword" accept=""
                                       data-validation="required length"
                                       accesskey="" data-validation-error-msg-required="You must enter Confirm Password"
                                       data-validation-length="8-50"
                                       data-validation-error-msg-length="Minimum length should be 8">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12 button-form">
                                <input type="submit"
                                       class="btn btn-default register_button responder_join register-button"
                                       name="register"
                                       value="JOIN TODAY" id="register" disabled="true">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="verifyModel" tabindex="-1" role="dialog" aria-labelledby="Verify">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="verifyModelLabel">Verify Phone</h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success " id="codeSuccess" style="display: none;"></div>
                    <input type="text" class="form-control" id="verifyCode" placeholder="Enter Verification Code"
                           name="verifyCode">
                    <div id="verifyText" class="corpo_element_margin_top"></div>
                    <div id="codeError" style="color:#a94442"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-default register_button" name="buttonVerifyCode"
                            id="buttonVerifyCode">Verify
                    </button>
                </div>
            </div>
        </div>
    </div>
    <?php require_once('footer_inner_registration.php'); ?>
    <script type="text/javascript" src="js/cookie.js"></script>
    <script type="text/javascript">
        $("#success-alert").hide();
        $("#success-alert").alert();
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function () {
            $("#success-alert").alert('close');
        });

        $.get("http://ipinfo.io", function (response) {
            countryName = response.country;
            $("#mobileCode").intlTelInput({
                preferredCountries: [countryName.toLowerCase()],
            });
        }, "jsonp");

        $("#verifyDialogue").click(function () {
            var mobileNumber = $("#mobile").val();
            var code = $("#mobileCode").val().replace(/ /g, '');
            if (mobileNumber !== "") {
                var reg = new RegExp("^[1-9][0-9]*");
                if (reg.test(mobileNumber)) {
                    if (mobileNumber.replace(/ /g, '').length > 8) {
                        var fullNumber = code.replace("+", '00') + mobileNumber;
                        //alert(fullNumber);

                        $.post("mobileverification.php", {fullNumber: fullNumber}, function (data) {
                            //  alert(data);
                            if (data != "2" && data != "3") {
                                $("#phoneError").hide();
                                $.cookie('codeNumber', data);
                                $("#verifyText").html("<p class='small'>Verification code sent to <b>" + $("#mobileCode").val() + mobileNumber + "</b></p>");
                                $("#verifyStatus").val(false);
                                $('#verifyModel').modal();

                            } else {
                                switch (data) {
                                    case "2":
                                        $("#phoneError").html("Something went wrong.Please try after some time.");
                                        break;
                                    case "3":
                                        $("#phoneError").html("Mobile already registered.");
                                        break;

                                }
                            }
                        });
                    } else {
                        $("#phoneError").html("Not a valid Mobile Number");
                    }
                } else {
                    $("#phoneError").html("Not a valid Mobile Number");
                }
            } else {
                $("#phoneError").html("Please Enter Mobile Number");
            }
        });
        $("#buttonVerifyCode").click(function () {
            var sentCode = $.cookie('codeNumber');
            var enteredCode = $("#verifyCode").val();
            if (parseInt(sentCode) === parseInt(enteredCode)) {
                $("#verifyStatus").val(true);
                $("#codeSuccess").html(" Verification has been done successfully.");
                $("#codeSuccess").show();
                $("#mobile").attr('readonly', 'true');
                $("#verifyDialogue").attr('disabled', 'disabled');
                $("#codeError").hide();
                $("#register").removeAttr('disabled');
            } else {
                $("#codeError").html("Verification code which you entered is not matched.");
                $("#codeSuccess").hide();
            }
        });

        var password = document.getElementById("password"), confPassword = document.getElementById("confPassword");
        function validatePassword() {
            if (password.value != confPassword.value) {
                $("#pass_error").html("Password and confirm password needs to be same");
                document.getElementById("password").style.borderColor = "#a94442";
                document.getElementById("confPassword").style.borderColor = "#a94442";
                $("#pass_error").show();
            } else {
                $("#pass_error").hide();
                document.getElementById("password").style.borderColor = "#ccc";
                document.getElementById("confPassword").style.borderColor = "#ccc";
            }
        }
        password.onchange = validatePassword;
        confPassword.onkeyup = validatePassword;

        $(function () {
            $.validate();
        });
        /* $("#register").click(function(){
         if($("#firstName").val() === ""){
         $("#firstName_error").html('Please Enter First Name');
         }
         if($("#firstName").val() === ""){
         $("#firstName_error").html('Please Enter First Name');
         }
         if($("#firstName").val() === ""){
         $("#firstName_error").html('Please Enter First Name');
         }*/
        // });
    </script>

    <script type="text/javascript">
        //JQuery related to form's astric
        $("#firstName").keyup(function () {
            if ($("#firstName").val() != "") {
                $("#forFirstName").removeClass("empty-responder");
            } else {
                $("#forFirstName").addClass("empty-responder");
            }
        });
        $("#lastName").keyup(function () {
            if ($("#lastName").val() != "") {
                $("#forLastName").removeClass("empty-responder");
            } else {
                $("#forLastName").addClass("empty-responder");
            }
        });
        $("#mobile").keyup(function () {
            if ($("#mobile").val() != "") {
                $("#forMobile").removeClass("empty-mobile-responder");
            } else {
                $("#forMobile").addClass("empty-mobile-responder");
            }
        });
        $("#email").keyup(function () {
            if ($("#email").val() != "") {
                $("#forEmail").removeClass("empty-responder");
            } else {
                $("#forEmail").addClass("empty-responder");
            }
        });
        $("#password").keyup(function () {
            if ($("#password").val() != "") {
                $("#forPassword").removeClass("empty-responder");
            } else {
                $("#forPassword").addClass("empty-responder");
            }
        });
        $("#confPassword").keyup(function () {
            if ($("#confPassword").val() != "") {
                $("#forConfPassword").removeClass("empty-responder");
            } else {
                $("#forConfPassword").addClass("empty-responder");
            }
        });

    </script> 
