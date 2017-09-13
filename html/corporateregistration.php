<?php $title = "Airport Assistance for corporates";
$metaDesc = "Register to join the growing list of corporate customers and receive a special rate on all our Airport Assistance services world-wide.";
require_once('header_inner_registration.php');
?>

<div class="container-fluid margin_top_corporateRegistration  nopadding ">
    <div class="row nopadding">
        <div class="col-lg-12 col-md-12 col-xs-12 nopadding">
            <div class="col-lg-7 col-md-7 col-xs-12 nopadding margin_corpo-bottom">
                <div class="row">
                    <header id="top" class="header_corporate">
                        <div class="text-vertical-left">
                            <div class="landing-text-background-colour-corporate">
                                <div>
                                    <p class="corpo-banner-text">
                                        No more rushing at the airports. We have<br/>you all covered with our <span class="corpo-banner-text-subcolor">PERSONALIZED </span> <br/> 
                                            <span class="corpo-banner-text-subtext">
                                                 Airport Assistance Services
                                            </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </header>
                </div>
                <div class="col-lg-12 col-md-12 col-xs-12 margin-bottom-sub-img">
                    <div class="col-md-4 col-xs-12 col-lg-4 text-center">
                        <div><img src="image/corporatesub1.png"
                                  class="img-circle img-responsive text-center image-corpo-sub"/></div>
                        <div><p class="font-size-corpo text-center">Special Discounted Rate</p></div>
                    </div>

                    <div class="col-md-4 col-xs-12 col-lg-4 text-center">
                        <div><img src="image/corporatesub2.png"
                                  class="img-circle img-responsive text-center image-corpo-sub"/></div>
                        <div><p class="font-size-corpo text-center">Save Time and Hassle for Your<br/> Busy Executives</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12 col-lg-4 text-center">
                        <div><img src="image/corporatesub3.png"
                                  class="img-circle img-responsive text-center image-corpo-sub"/></div>
                        <div><p class="font-size-corpo text-center">Impress Your Business Clients<br/> and Increase Your
                                Business<br/> With Our Special Services</p></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-xs-12 corpo_form_bgcolor" >
                <div class="Register-form">
                    <h3 class="corpo-title corpo-title-head ">CREATE A CORPORATE <br/> ACCOUNT </h3>

                    <h2 class="corpo-title-sub"> WITH US </h2>
                    <p class="corpo-title-content">Register to join the growing list of corporate customers and receive
                        a special rate on all our Airport Assistance services world wide. We know how much in-a-rush
                        business traveler can be. We will ensure a swift, smooth and hassle free airport experience to
                        all your executives, VIPs and business associates.</p>
                    <form action="" method="post" class="form-horizontal form_top">
                        <div class="col-lg-12 col-xs-12">
                            <? if (count($error) > 0) { ?>
                                <ul class="list-group">
                                    <? for ($i = 0; $i < count($error); $i++) { ?>
                                        <li class="list-group-item list-group-item-danger noborder"><?= $error[$i]; ?></li>
                                    <? } ?>
                                </ul>
                            <? } ?>
                            <? if ($signUpStatus) { ?>
                                <div class="alert alert-success">
                                    Your information has been saved successfully.
                                </div>
                            <? } ?>
                        </div>
                        <div class="form-group" class="corpo_element_margin_top">
                            <div
                                class=" col-lg-12 col-xs-12 <?= ($signUpStatus || (count($error) > 0)) ? "" : "empty-corpo"; ?>"
                                id="forCompanyName">
                                <input type="text" class="form-control field_color place_holder " id="companyName"
                                       placeholder="COMPANY NAME" name="companyName" accept=""
                                       data-validation="required"
                                       value="<?= (isset($data['companyName'])) ? $data['companyName'] : ""; ?>"
                                       accesskey="" data-validation-error-msg-required="You must enter company name.">
                            </div>

                        </div>
                        <div class="form-group">
                            <div
                                class=" col-lg-7 col-xs-12 <?= ($signUpStatus || (count($error) > 0)) ? "" : "empty-corpo"; ?>"
                                id="forContactPerson">
                                <input type="text" class="form-control field_color place_holder" id="contactPerson"
                                       placeholder="FIRST NAME" name="contactPerson" accept=""
                                       data-validation="required"
                                       alt="" accesskey=""
                                       data-validation-error-msg-required="You must enter contact person."
                                       value="<?= (isset($data['contactPerson'])) ? $data['contactPerson'] : ""; ?>">
                            </div>
                            <div
                                class="col-lg-5 col-xs-12 margin_corpo-top <?= ($signUpStatus || (count($error) > 0)) ? "" : "empty-corpo"; ?>"
                                id="forLastName">
                                <input type="text" class="form-control field_color place_holder" id="lastName"
                                       placeholder="LAST NAME" name="lastName" accept="" data-validation="required"
                                       value="<?= (isset($data['lastName'])) ? $data['lastName'] : ""; ?>"
                                       accesskey="" data-validation-error-msg-required="You must enter last name">
                            </div>
                        </div>
                        <div class="form-group mobile-form" >
                            <div class="mobile-form-number" >                               
                                    <div class="col-lg-3 col-xs-3 nopadding corpo-mobilecode-field">
                                        <input type="tel" id="mobileCode" class="form-control field_color place_holder"
                                               name="mobileCode" accept="" data-validation="required"
                                               accesskey=""
                                               data-validation-error-msg-required="You must enter mobile code"
                                               style="background-color: #fff;">
                                    </div>                                
                                    <div class="col-lg-6 col-xs-5 nopadding corpo-mobilecode-field <?= (count($error) > 0) ? "" : "empty-mobile-responder"; ?>"
                                    id="forMobile">
                                        <input type="text" name="mobile" class="col-lg-6 form-control field_color place_holder mobile_width"
                                           placeholder="MOBILE NUMBER" id="mobile"
                                           value="<?= (isset($data['mobile'])) ? $data['mobile'] : ""; ?>">
                                        <div id="phoneError" style="color:#a94442!important" class="field_size"></div>
                                        <input type="hidden" name="verifyStatus" id="verifyStatus" value="false">
                                    </div>
                                <div class="col-lg-2 col-xs-2 ">
                                    <button type="button" class="btn btn-default register_button-corpo"
                                            id="verifyDialogue">Verify
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div
                                class=" col-lg-12 col-xs-12 <?= ($signUpStatus || (count($error) > 0)) ? "" : "empty-corpo"; ?>"
                                id="forEmail">
                                <input type="email" class="form-control field_color place_holder " id="email"
                                       placeholder="EMAIL" name="email" accept="" data-validation="required"
                                       value="<?= (isset($data['email'])) ? $data['email'] : ""; ?>"
                                       data-validation-error-msg-required="You must enter email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class=" col-lg-12 col-xs-12 empty-corpo" id="forPassword">
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
                            <div class=" col-lg-12 col-xs-12 empty-corpo" id="forConfPassword">
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
                                <input type="submit" class="btn btn-default register_button corpo_join"
                                       name="join"
                                       value="JOIN TODAY" id="join" disabled="true">
                            </div>
                        </div>
                    </form>
                </div>
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
                    $.post("mobileverification.php", {fullNumber: fullNumber}, function (data) {
                        //alert(data);
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
            $("#join").removeAttr('disabled');
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
    //JQuery related to form's astric
    $("#companyName").keyup(function () {
        if ($("#companyName").val() != "") {
            $("#forCompanyName").removeClass("empty-corpo");
        } else {
            $("#forCompanyName").addClass("empty-corpo");
        }
    });
    $("#contactPerson").keyup(function () {
        if ($("#contactPerson").val() != "") {
            $("#forContactPerson").removeClass("empty-corpo");
        } else {
            $("#forContactPerson").addClass("empty-corpo");
        }
    });
    $("#lastName").keyup(function () {
        if ($("#lastName").val() != "") {
            $("#forLastName").removeClass("empty-corpo");
        } else {
            $("#forLastName").addClass("empty-corpo");
        }
    });
    $("#mobile").keyup(function () {
        if ($("#mobile").val() != "") {
            $("#forMobile").removeClass("empty-mobile-corpo");
        } else {
            $("#forMobile").addClass("empty-mobile-corpo");
        }
    });
    $("#email").keyup(function () {
        if ($("#email").val() != "") {
            $("#forEmail").removeClass("empty-corpo");
        } else {
            $("#forEmail").addClass("empty-corpo");
        }
    });
    $("#password").keyup(function () {
        if ($("#password").val() != "") {
            $("#forPassword").removeClass("empty-corpo");
        } else {
            $("#forPassword").addClass("empty-corpo");
        }
    });
    $("#confPassword").keyup(function () {
        if ($("#confPassword").val() != "") {
            $("#forConfPassword").removeClass("empty-corpo");
        } else {
            $("#forConfPassword").addClass("empty-corpo");
        }
    });

</script> 
