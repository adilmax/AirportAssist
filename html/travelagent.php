<?php $title = "Travel Agents – Join MUrgency Airport Assistance Network";
$metaDesc = "Join our ever-growing Travel Agents community & give your customers the best airport experience. Join the network today";
require_once('header_inner_registration.php');
?>
<section>
<div class="container-fluid margin_top_travel_agent nopadding">
    <div class="row  nopadding">
        <div class="col-lg-12 col-md-12 col-xs-12 nopadding">
            <!-----start first column-------->
            <div class="col-lg-7 col-md-7 col-xs-12 main_image margin-bottom_travel nopadding">
                <div class="row">
                    <header id="top" class="header_travel">
                        <div class="text-vertical-center">
                            <div class="landing-text-background-colour_travel">
                                <div><p class="landing_image_text1">Deliver unforgettable travel experiences to<br/>your
                                        customers with our<span class="landing_image_text">PERSONALIZED</span></p></div>
                                <h2 class="landing_image_text_H1">Airport Assistance Services</h2>
                            </div>

                        </div>
                    </header>
                </div>
            </div>
            <!-- end first column -->
            <!--start  second column -->
            <div class="col-lg-5 col-md-5 col-xs-12 work_with_us_form">
                <div class="Register-form" id="agent-form">
                    <h3 class="travel_agent">TRAVEL AGENT </h3>
                    <h2 class="work_withus">WORK WITH US </h2>
                    <p class="travel_paragraph">Join our ever growing Travel Agents community & give your customers the
                        best
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
                                    class=" col-lg-12  <?= ($signUpStatus || (count($error) > 0)) ? "" : "empty_travel"; ?>"
                                    id="forAgencyName">
                                <input type="text" class="form-control field_color place_holder" id="agencyName"
                                       placeholder="AGENCY NAME" name="agencyName" accept="" data-validation="required"
                                       value="<?= (isset($data['agencyName'])) ? $data['agencyName'] : ""; ?>"
                                       data-validation-error-msg-required="You must enter Agency Name">
                            </div>
                            <!--                    <div class=" col-lg-4 ">
                                                    <input type="text" class="form-control field_color place_holder" id="iata" placeholder="IATA#" name="iata" >
                                                </div>-->
                        </div>
                        <div class="form-group">
                            <div class=" col-lg-6  <?= ($signUpStatus || (count($error) > 0)) ? "" : "empty_travel"; ?>"
                                 id="forFirstName">
                                <input type="text" class="form-control field_color place_holder" id="firstName"
                                       placeholder="FIRST NAME" name="firstName" accept="" data-validation="required"
                                       data-validation-error-msg-required="You must enter First Name"
                                       value="<?= (isset($data['firstName'])) ? $data['firstName'] : ""; ?>">
                            </div>
                            <div
                                    class=" col-lg-6  <?= ($signUpStatus || (count($error) > 0)) ? "" : "empty_travel"; ?>"
                                    id="forLastName">
                                <input type="text" class="form-control travel_field field_color place_holder _lastname"
                                       id="lastName"
                                       placeholder="LAST NAME" name="lastName" accept="" data-validation="required"
                                       value="<?= (isset($data['lastName'])) ? $data['lastName'] : ""; ?>"
                                       data-validation-error-msg-required="You must enter Last name">
                            </div>
                        </div>

                        <div class="form-group mobile-form">
                            <div class="mobile-form-number-travel">
                                <div class="col-lg-3  col-xs-3 nopadding travel-mobilecode-field">
                                    <input type="tel" id="mobileCode" class="form-control field_color place_holder"
                                           name="mobileCode" accept="" data-validation="required"
                                           accesskey="" data-validation-error-msg-required="You must enter mobile code"
                                           style="background-color: #fff;">
                                </div>
                                <div class="col-lg-6 col-xs-4 nopadding mobile-width <?= ($signUpStatus || (count($error) > 0)) ? "" : "empty-mobile-travel"; ?> travel-field_mobile"
                                     id="forMobile">
                                    <input type="text" name="mobile" class="form-control field_color place_holder"
                                           placeholder="MOBILE NUMBER" id="mobile"
                                           value="<?= (isset($data['mobile'])) ? $data['mobile'] : ""; ?>">
                                    <div id="phoneError" style="color:#a94442!important" class="field_size"></div>
                                    <div class="col-lg-4 col-xs-4 nopadding">
                                        <input type="hidden" name="verifyStatus" id="verifyStatus" value="false">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-xs-2 nopadding">
                                    <button type="button" class="btn btn-default register_button-travel"
                                            id="verifyDialogue">
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
                                       placeholder="PASSWORD" name="password" accept=""
                                       data-validation="required length"
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
                                <input type="submit" class="btn btn-default register_button travel-join register-button"
                                       name="joinUs" value="JOIN TODAY" id="joinUs" disabled="true">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
         </div>
        </div>
    </div>
</section>    
            <!-- end second column -->

            <!------testimonial Start---------->
            <section>
                <div class="container-fluid aboutus">
                    <div class='row' style="margin-bottom: 20px;">
                        <!-- <div class='col-lg-2'></div> -->
                        <div class='col-lg-8 col-lg-offset-2'>
                            <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                                <!-- Bottom Carousel Indicators -->
                                <ol class="carousel-indicators disabled">
                                    <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#quote-carousel" data-slide-to="1"></li>
                                    <li data-target="#quote-carousel" data-slide-to="2"></li>
                                    <li data-target="#quote-carousel" data-slide-to="3"></li>
                                    <li data-target="#quote-carousel" data-slide-to="4"></li>
                                    <li data-target="#quote-carousel" data-slide-to="5"></li>
                                    <li data-target="#quote-carousel" data-slide-to="6"></li>
                                </ol>
                                <!-- Carousel Slides / Quotes -->
                                <div class="carousel-inner">
                                    <!-- Quote 1 -->
                                    <? if (count($testimonial) > 0) { ?>
                                        <? for ($i = 0; $i < count($testimonial); $i++) { ?>
                                            <div class="item <?= ($i == 0) ? "active" : ""; ?>">

                                                <blockquote>
                                                    <div class="row">
                                                        <div class="col-sm-2 text-center">
                                                            <? if ($testimonial[$i]->image != '') { ?>
                                                                <img class="img-circle"
                                                                     src="<?= $testimonial[$i]->image->getURL(); ?>"
                                                                     style="width: 100px;height:100px;">
                                                            <? } else { ?>
                                                                <img class="img-circle" src="image/default.png"
                                                                     style="width: 100px;height:100px;">
                                                            <? } ?>
                                                        </div>

                                                        <div class="col-sm-10">
                                                            <h3><?= $testimonial[$i]->get('title') ?></h3><br/>
                                                            <p class="testimonial_description"><?= $testimonial[$i]->get('description') ?></p>
                                                            <small><?= $testimonial[$i]->get('firsName') ?> <?= ($testimonial[$i]->get('lastName') != "") ? "from" : ""; ?> <?= $testimonial[$i]->get('lastName') ?></small>

                                                        </div>
                                                    </div>

                                                </blockquote>
                                            </div>
                                        <? }
                                    } ?>

                                </div>
                            </div>
                        </div>
                        <div class='col-lg-2'></div>
                    </div>
                </div>
            </section>
            <!------testimonial END---------->
            <section class="work-section">
                <div class="container relative">
                    <div class="section-heading">Why to join <span class="heading-color">MUrgency Travel Agent's Network</span>?</div>
                    <!-- Row -->
                      <!-- Row -->
                    <div class="row pr-20">
                        <!-- Col -->
                        <div class="icon">
                            <div class="col-sm-2">
                                <img class="workicon" src="image/icons/icon/Global.png"/>
                            </div>
                        </div>
                        <div class="col-sm-4 nopadding">
                            <h3 class="steps-heading">Global Access</h3>
                            <div class="join-text">
                                We are your one point of contact to airport assistance services at 626 domestic and
                                international airports, worldwide. Join the global network to get prompt and efficient
                                service.
                            </div>
                        </div>
                        <!-- End Col -->
                        <!-- Col -->
                        <div class="icon">
                            <div class="col-sm-2">
                                <img class="workicon" src="image/icons/icon/Save-Time,-Save-Money.png"/>
                            </div>
                        </div>
                        <div class="col-sm-4 nopadding">
                            <h3 class="steps-heading">Save Time, Save Money</h3>
                            <div class="join-text">
                                You have the perfect package—special rates for travel agents and one-stop shop for all
                                airport assistance services. It is a time-saving effort with valued added benefits.
                            </div>
                        </div>
                        <!-- Col -->
                    </div>
                    <!-- End Row -->
                    <!-- Row -->
                    <div class="row pr-20">
                        <!-- Col -->
                        <div class="icon">
                            <div class="col-sm-2">
                                <img class="workicon" src="image/icons/icon/Satisfied-Customers.png"/>
                            </div>
                        </div>
                        <div class="col-sm-4 nopadding">
                            <h3 class="steps-heading">Quality Service, Satisfied Customer</h3>
                            <div class="join-text">
                                Joining our network gives you access to a global market. In turn, you can offer your
                                customers the best deals for quality, airport assistance services anywhere in the world.
                                Customer satisfaction is the priority and our proficient service 365 days, ensures the
                                customer is happy.

                            </div>
                        </div>
                        <!-- End Col -->
                          <!-- Col -->
                        <div class="icon">
                            <div class="col-sm-2">
                                <img class="workicon" src="image/icons/icon/Special-Rates.png"/>
                            </div>
                        </div>
                        <div class="col-sm-4 nopadding">
                            <h3 class="steps-heading">Special Benefits</h3>
                            <div class="join-text">
                                Once you become the part of MUrgency Travel Agents network on filling the form, you are
                                entitled to special benefits for airport assistance services, like no surcharge for late
                                bookings, first priority, dedicated team to handle request offered only to travel
                                agents.
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>

                    <div class="row pr-20">
                        <!-- Col -->
                        <div class="icon">
                            <div class="col-sm-2">
                                <img class="workicon" src="image/icons/icon/competition.png"/>
                            </div>
                        </div>
                        <div class="col-sm-4 nopadding">
                            <h3 class="steps-heading">Get Ahead Of Competition</h3>
                            <div class="join-text">
                                Working as a team, increases the alacrity and efficiency of the service you provide to
                                your customer. Your prompt service and our global access pushes you ahead of the
                                competition.
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="icon">
                            <div class="col-sm-2">
                                <img class="workicon" src="image/icons/icon/Increase-business.png"/>
                            </div>
                        </div>
                        <div class="col-sm-4 nopadding">
                            <h3 class="steps-heading"> Increase Business</h3>
                            <div class="join-text">
                                Excellent customer service ensures loyal clientele that will publicize your brand and
                                improve your credit. You will be their airport assistance service provider for all their
                                trips.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="landing-button_ourservices_div">
                    <a href="#agent-form" class="landing-button_joinnetwork">Join Agents Network</a>
                </div>
            </section>
            <section class="pb-40">
                <div class="container">
                    <div class="row ">
                        <div class=" col-md-7 video-container">
                            <iframe width="650" height="380" src="https://www.youtube.com/embed/wV8VpTC4VMc"
                                    frameborder="0"
                                    allowfullscreen></iframe>
                        </div>
                        <div class="col-md-5 banner-bgcolor">
                            <p class="font-styles">Airport Assistance<br>Services you can Offer<br>your valued customers
                            </p>
                            <div class="landing-button_ourservices_div">
                                <a href="http://www.murgencyairportassistance.com/ourservices"
                                   class="landing-button_ourservice">Check Full List of Services</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

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
                        alert(data);
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
