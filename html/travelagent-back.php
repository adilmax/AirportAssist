<?php $title = "Airport assistance| Ground handling services| Airport meet and greet | VIP travel services|
Airport concierge| Ramp Services|Crew Assistance";
require_once('header_inner_registration.php');
?>

<div class="container-fluid margin_top_travel_agent nopadding">
    <div class="row  nopadding">
        <div class="col-lg-12 col-md-12 col-xs-12 nopadding">
            <!-----start first column-------->
            <div class="col-lg-8 col-md-8 col-xs-12 main_image margin-bottom_travel nopadding">
                <div class="row">
                    <header id="
    top" class="header_travel">

                        <div class="text-vertical-center">
                            <div class="landing-text-background-colour_travel">
                                <div><p class="landing_image_text1">Deliver unforgettable travel experiences to<br/>your
                                        customers with our<b class="landing_image_text">PERSONALIZED</b></p></div>
                                <h2 class="landing_image_text_H1">Airport Assistance Services</h2>
                            </div>

                        </div>
                    </header>
                </div>
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <div class="col-md-4 col-xs-12 col-lg-4 text-center">
                        <div>
                            <img src="image/agentsub1.png" class="img-responsive image-travel-sub" alt="" title=""/>
                        </div>
                        <div>
                            <p>Receive special rate</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12 col-lg-4 text-center">
                        <div>
                            <img src="image/agentsub2.png" class="img-responsive image-travel-sub" alt="" title=""/>
                        </div>
                        <div>
                            <p>Get ahead of your competitor by offering personalized service</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12 col-lg-4 text-center">
                        <div>
                            <img src="image/agentsub3.png" class="img-responsive image-travel-sub" alt="" title=""/>
                        </div>
                        <div>
                            <p>Increase satisfied customer base</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end first column -->
            <!--start  second column -->
            <div class="col-lg-4 col-md-4 col-xs-12 work_with_us_form">
<div class="Register-form">
              
			<h3 class="travel_agent">TRAVEL AGENT </h3>
                <h2 class="work_withus">WORK WITH US </h2>
                <p class="travel_paragraph">Join our ever growing Travel Agents community & give your customers the best
                    airport experience.Be it check-ins, transits,VIP access, baggage assistance, meet & greet or any
                    other airport assistance, we have got you covered.</p>
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
                    <div class="form-group">
                        <div
                            class=" col-lg-12 travel_field <?= ($signUpStatus || (count($error) > 0)) ? "" : "empty_travel"; ?>"
                            id="forAgencyName">
                            <input type="text" class="form-control field_color place_holder" id="agencyName"
                                   placeholder="AGENCY NAME" name="agencyName" accept="" data-validation="required"
                                   value="<?= (isset($data['agencyName'])) ? $data['agencyName'] : ""; ?>"
                                   data-validation-error-msg-required="You must enter Agency Name">
                        </div>
                        <!--                    <div class=" col-lg-4 travel_field">
                                                <input type="text" class="form-control field_color place_holder" id="iata" placeholder="IATA#" name="iata" >
                                            </div>-->
                    </div>
                    <div class="form-group">
                        <div
                            class=" col-lg-6 travel_field <?= ($signUpStatus || (count($error) > 0)) ? "" : "empty_travel"; ?>"
                            id="forFirstName">
                            <input type="text" class="form-control field_color place_holder" id="firstName"
                                   placeholder="FIRST NAME" name="firstName" accept="" data-validation="required"
                                   data-validation-error-msg-required="You must enter First Name"
                                   value="<?= (isset($data['firstName'])) ? $data['firstName'] : ""; ?>">
                        </div>
                        <div
                            class=" col-lg-6 travel_field <?= ($signUpStatus || (count($error) > 0)) ? "" : "empty_travel"; ?>"
                            id="forLastName">
                            <input type="text" class="form-control field_color place_holder" id="lastName"
                                   placeholder="LAST NAME" name="lastName" accept="" data-validation="required"
                                   value="<?= (isset($data['lastName'])) ? $data['lastName'] : ""; ?>"
                                   data-validation-error-msg-required="You must enter Last name">
                        </div>
                    </div>

                   <div class="form-group mobile-form"><div class="mobile-form-number">
                        <div class="col-lg-3 col-xs-3 nopadding travel-mobilecode-field">
                            <input type="tel" id="mobileCode" class="form-control field_color place_holder"
                                   name="mobileCode" accept="" data-validation="required"
                                   accesskey="" data-validation-error-msg-required="You must enter mobile code"
                                   style="background-color: #fff;">
                        </div>
                        <div
                            class="col-lg-6 col-xs-5 nopadding <?= ($signUpStatus || (count($error) > 0)) ? "" : "empty-mobile-travel"; ?> travel-field_mobile"
                            id="forMobile">
                            <input type="text" name="mobile" class="form-control field_color place_holder"
                                   placeholder="MOBILE NUMBER" id="mobile"
                                   value="<?= (isset($data['mobile'])) ? $data['mobile'] : ""; ?>">
                            <div id="phoneError" style="color:#a94442!important" class="field_size"></div>
                            <input type="hidden" name="verifyStatus" id="verifyStatus" value="false">
                        </div>
                        <div class="col-lg-2 col-xs-2 nopadding">
                            <button type="button" class="btn btn-default register_button-travel" id="verifyDialogue">
                                Verify
                            </button>
                        </div>
                        </div>
						</div>
                    <div class="form-group">
                        <div class=" col-lg-12 <?= ($signUpStatus || (count($error) > 0)) ? "" : "empty_travel"; ?>"
                             id="forEmail">
                            <input type="email" class="form-control field_color place_holder" id="email"
                                   placeholder="EMAIL" name="email" accept="" data-validation="required"
                                   value="<?= (isset($data['email'])) ? $data['email'] : ""; ?>"
                                   data-validation-error-msg-required="You must enter Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class=" col-lg-12 empty_travel" id="forPassword">
                            <input type="password" class="form-control field_color place_holder" id="password"
                                   placeholder="PASSWORD" name="password" accept="" data-validation="required length"
                                   data-validation-error-msg-required="You must enter Password"
                                   data-validation-length="8-50"
                                   data-validation-error-msg-length="Minimum length should be 8">
                            <div id="pass_error" class="dispaly_none" style="color:#a94442;"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class=" col-lg-12 empty_travel" id="forConfPassword">
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
                            <input type="submit" class="btn btn-default register_button travel-join register-button" name="joinUs"
                                   value="JOIN TODAY" id="joinUs" disabled="true">
                        </div>
                    </div>

                </form>
            </div>
      </div>      
			<!-- end second column -->
        
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
                <div id="verifyText" style="margin-top: 10px;"></div>
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
                                    $("#phoneError").html("Mobile already registered.").style.borderColor = "red";
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
            $("#joinUs").removeAttr('disabled');
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
    $("#agencyName").keyup(function () {
        if ($("#agencyName").val() != "") {
            $("#forAgencyName").removeClass("empty_travel");
        } else {
            $("#forAgencyName").addClass("empty_travel");
        }
    });
    $("#firstName").keyup(function () {
        if ($("#firstName").val() != "") {
            $("#forFirstName").removeClass("empty_travel");
        } else {
            $("#forFirstName").addClass("empty_travel");
        }
    });
    $("#lastName").keyup(function () {
        if ($("#lastName").val() != "") {
            $("#forLastName").removeClass("empty_travel");
        } else {
            $("#forLastName").addClass("empty_travel");
        }
    });
    $("#mobile").keyup(function () {
        if ($("#mobile").val() != "") {
            $("#forMobile").removeClass("empty-mobile-travel");
        } else {
            $("#forMobile").addClass("empty-mobile-travel");
        }
    });
    $("#email").keyup(function () {
        if ($("#email").val() != "") {
            $("#forEmail").removeClass("empty_travel");
        } else {
            $("#forEmail").addClass("empty_travel");
        }
    });
    $("#password").keyup(function () {
        if ($("#password").val() != "") {
            $("#forPassword").removeClass("empty_travel");
        } else {
            $("#forPassword").addClass("empty_travel");
        }
    });
    $("#confPassword").keyup(function () {
        if ($("#confPassword").val() != "") {
            $("#forConfPassword").removeClass("empty_travel");
        } else {
            $("#forConfPassword").addClass("empty_travel");
        }
    });

</script> 
