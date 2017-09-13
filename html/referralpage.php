<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" type="image/png" sizes="32x32" href="image/favicon-32x32.png">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i"
          rel="stylesheet">
    <title>Airport Assist by MUrgency</title>
    <style type="text/css">
        body {
            font-family: 'Lato', sans-serif;
            overflow-x: hidden;
        }

        .landing-banner {
            background: url("image/referral-page/referral-landing.jpg") no-repeat center;
            background-size: cover;
            width: 100%;
            height: 100vh;
            color: #ffffff;
        }

        .landing-banner .brand {
            padding: 2rem;
        }

        .landing-banner .brand img {
            padding-right: 1rem;
        }

        .landing-banner .row {
            background-color:;
        }

        .landing-banner .row:nth-child(1) {
            padding-top: 13rem;
            font-size: 5.5rem;
            font-weight: 700;
        }

        .landing-banner .row:nth-child(2) ul {
            font-size: 2.5rem;
            font-weight: 500;
            margin: 0;
            padding: 0;
        }

        .landing-banner .row:nth-child(2) ul li {
            padding: 1rem 0;
        }

        .intro-section {
            background-color: #e6e6e6;
            padding: 5rem 0;
        }

        .intro-section .row .col-md-6:nth-child(2) p:nth-child(1) {
            font-size: 5rem;
            font-weight: 700;
        }

        .intro-section .row .col-md-6:nth-child(2) > ul {
            padding: 0;
        }

        .intro-section .row .col-md-6:nth-child(2) > ul > li {
            font-size: 2rem;
            color: #222;
            font-weight: 700;
            padding: 0;
        }

        .intro-section .row .col-md-6:nth-child(2) > ul > li > ul {
            color: #555;
            padding: 1rem 0;
        }

        .intro-section .row .col-md-6:nth-child(2) > ul > li > ul > li {
            font-size: 1.3rem;
        }

        .intro-section .row .col-md-6:nth-child(2) > ul > li span {
            color: #c82328;
        }

        .intro-section .row .col-md-6:nth-child(2) .download-section {
            float: right;
        }

        .intro-section .row .col-md-6:nth-child(2) .download-section p {
            font-size: 12px;
        }

        .intro-section .row .col-md-6:nth-child(2) .btn-default {
            color: #fff;
            background: #c82328;
        }

        /*--*/

        .container h1.font-size {
            font-size: 50px;
            padding-bottom: 20px;
            padding-top: 20px;
            font-weight: bold;
        }

        .container h2 span {
            font-size: 16px;
            padding-bottom: 10px;
        }

        .container h4 {
            font-size: 16px;
            padding-bottom: 30px;
        }

        .bjcolor {
            background-color: #e6e6e6;
        }

        .pd-b-50 {
            padding-bottom: 50px;
        }

        .stamp-color {
            background-color: #000;
            color: #ffffff;
        }

        .m-r-10 {
            margin-right: 66px;
            font-size: 10px;
        }

        .stamps-top {
            padding-top: 30px;
            margin-left: -40px;
        }

        .startdow {
            font-weight: bold;
            font-size: 50px;
            padding-top: 50px;
            padding-bottom: 40px;
        }

        .m-r-50 {
            margin-right: 50px;
        }

        /*footer css*/
        /*media icon  */

        .fb-icon {
            background: url("image/icons/FacebookDesat.png") no-repeat;
            width: 30px;
            height: 30px;
        }

        .fb-icon:hover {
            background: url("image/icons/FacebookColor.png") no-repeat;
        }

        .google-icon {
            background: url("image/icons/GoogleDesat.png") no-repeat;
            width: 30px;
            height: 30px;
        }

        .google-icon:hover {
            background: url("image/icons/GoogleColor.png") no-repeat;
        }

        .instagram-icon {
            background: url("image/icons/InstagramDesat.png") no-repeat;
            width: 30px;
            height: 30px;
        }

        .instagram-icon:hover {
            background: url("image/icons/InstagramColor.png") no-repeat;
        }

        .painterest-icon {
            background: url("image/icons/PinterstDesat.png") no-repeat;
            width: 30px;
            height: 30px;
        }

        .painterest-icon:hover {
            background: url("image/icons/PinterstColor.png") no-repeat;
        }

        .twitter-icon {
            background: url("image/icons/TwitterDesat.png") no-repeat;
            width: 30px;
            height: 30px;
        }

        .twitter-icon:hover {
            background: url("image/icons/TwitterColor.png") no-repeat;
        }

        .subs-content {
            border-radius: 0px;
            padding: 0px 0px 20px !important;
            background-image: url(image/airport_news.png);
            background-repeat: no-repeat;
            background-size: cover;
        }

        .newsl {
            /*    padding-left: 24px;*/
            padding-top: 0px;
            font-size: 30px;
            font-weight: 400;
            color: #333;
            text-align: center;
            margin-bottom: 10px;
        }

        .mb-20 {
            margin-bottom: 20px;

        }

        .newsle {
            font-size: 14px;
            font-weight: 400;
            color: #333;
            padding: 0 7px 15px 35px;
            /*
                padding-left: 30px;
                padding-right: 40px;
            */
            text-align: center;
            margin-bottom: 10px;
        }

        .modal-header {
            background-color: transparent;
            color: #000;
            font-size: 25px;
            letter-spacing: 1px;
            text-transform: capitalize;
            font-weight: 400;
            border-bottom: 1px solid transparent;
            padding: 5px 10px;
        }

        .close {
            opacity: 0.7;
        }

        .btn-news {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 4px 13px;
            color: #fff;
            background: rgba(195, 36, 42, 0.95);
            border: 2px solid transparent;
            font-size: 11px;
            font-weight: 400;
            text-transform: uppercase;
            text-decoration: none;
            letter-spacing: 1px;
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            border-radius: 0;
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            box-shadow: none;
            -webkit-transition: all 0.2s cubic-bezier(0.000, 0.000, 0.580, 1.000);
            -moz-transition: all 0.2s cubic-bezier(0.000, 0.000, 0.580, 1.000);
            -o-transition: all 0.2s cubic-bezier(0.000, 0.000, 0.580, 1.000);
            -ms-transition: all 0.2s cubic-bezier(0.000, 0.000, 0.580, 1.000);
            transition: all 0.2s cubic-bezier(0.000, 0.000, 0.580, 1.000);
        }

        .btn-news:hover,
        .btn-news:focus {
            font-weight: 400;
            color: #fff;
            background: #333;
            text-decoration: none;
            outline: none;
            border-color: transparent;
            -webkit-box-shadow: none;
            box-shadow: none;
        }

        .btn-news.btn-subs {
            height: auto;
            padding: 6px 6px;
            font-size: 14px;
            margin-left: -5px;
            letter-spacing: 0.1em;
            line-height: 1.4;
        }

        .btn-mod {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 4px 8px;
            color: #fff;
            background: #343536;
            border: 2px solid transparent;
            font-size: 14px;
            font-weight: 400;
            text-transform: uppercase;
            text-decoration: none;
            letter-spacing: 1px;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            box-shadow: none;
            -webkit-transition: all 0.2s cubic-bezier(0.000, 0.000, 0.580, 1.000);
            -moz-transition: all 0.2s cubic-bezier(0.000, 0.000, 0.580, 1.000);
            -o-transition: all 0.2s cubic-bezier(0.000, 0.000, 0.580, 1.000);
            -ms-transition: all 0.2s cubic-bezier(0.000, 0.000, 0.580, 1.000);
            transition: all 0.2s cubic-bezier(0.000, 0.000, 0.580, 1.000);
        }

        .btn-mod:hover,
        .btn-mod:focus {
            font-weight: 400;
            color: #fff;
            background: #333;
            text-decoration: none;
            outline: none;
            border-color: transparent;
            -webkit-box-shadow: none;
            box-shadow: none;
        }

        .btn-subscribe {
            background: #333;
            color: #fff;
            letter-spacing: 1px;
            padding: 5px 10px;
            margin-top: -2px;
        }

        .btn-subscribe:hover {
            background: #ba2429;
            color: #fff;
            outline: none;
        }

        .btn-subscribe:active {
            background: #ba2429;
            color: #fff;
            outline: none;
        }

        .referral-group-images img {
            box-shadow: 2px 5px 10px rgba(0, 0, 0, .3);
            margin: 1rem 0;
        }

        @media only screen and (max-width: 768px) {

            .landing-banner .row:nth-child(1) {
                font-size: 3rem;
            }

            .landing-banner .row:nth-child(2) ul li {
                font-size: 2rem;
                margin-left: 2rem;
            }

            .intro-section .row .col-md-6:nth-child(2) p:nth-child(1) {
                padding: 2rem 0;
            }

            .intro-section .row .col-md-6:nth-child(2) > ul {
                width: 95%;
                margin-left: 2rem;
            }

            .intro-section .row:nth-child(1) .col-md-6:nth-child(1) img{
                display: block;
                margin: 0 auto;
            }

            .stamps-top {
                padding-top: 0;
                margin-left: 0;
                font-size: 22px;
            }

            .m-r-50 {
                margin-right: 30px;
            }

            .m-r-10 {
                margin-right: 30px;
            }
            .footer-social-icon-set{
                margin-left: 4rem;
            }
        }


    </style>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
        (function () {
            var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/594b84cbe9c6d324a4736bf4/default';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
</head>
<body>


<!--landing section-->

<section class="landing-banner">
    <div class="brand">
        <img src="image/favicon-32x32.png" alt="Murgency Airport Assistance"/><span>Airport Assist by MUrgency</span>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>Win all paid vacation<br>to dazzling Dubai</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul>
                    <li>Refer the <b>Airport Assist</b> by MUrgency app<br>to friends & family.</li>
                    <li>Win a chance to discover Dubai</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!--intro section-->

<section class="intro-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img class="img-responsive" src="image/referral-page/phone-group.png" width="70%" alt="MUrgency">
            </div>
            <div class="col-md-6">
                <p>It's so simple!</p>
                <ul>
                    <li>Refer your friends and family to download the app
                        <ul>
                            <li>Share the unique download link from Airport Assist app through social media</li>
                            <li>Email or WhatsApp the link to your friends and family</li>
                        </ul>
                    </li>
                    <li>Earn points
                        <ul>
                            <li>Earn 1 point when your referred person downloads the app using unique link.</li>
                            <li>Track your earned points on the app</li>
                        </ul>
                    </li>
                    <li>Win big
                        <ul>
                            <li>Be the one to earn the highest points and win a trip</li>
                        </ul>
                    </li>
                    <li>Keep refering till <span>DEC 31, 2017</span></li>
                </ul>
                <div class="download-section">
                    <p><i>Don't have the app yet?</i></p>
                    <a class="btn btn-default" href="#download-section">Download Now</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!--below sections-->

<section class="referral-group-images">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 align="center" class="font-size">What's up for Grabs?</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div align="center">
                    <h2>4 Days | 3 Nights <span>stay in dubai</span></h2>
                    <h4>including <b>Round trip Airfares</b></h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <img align="bottom" src="image/referral-page/img-1.png" width="100%" alt="">
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <img src="image/referral-page/img-2.png" width="100%" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <img src="image/referral-page/img-6.png" width="100%" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <img src="image/referral-page/img-3.png" width="100%" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <img src="image/referral-page/img-4.png" width="100%" alt="">
            </div>
            <div class="col-md-4">
                <img src="image/referral-page/img-5.png" width="100%" height="100%" alt="">
            </div>
        </div>
    </div>
</section>

<section class="bjcolor" id="download-section">
    <div class="container">
        <h1 class="text-center startdow">Start Download</h1>
        <div class="row pd-b-50">
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div style="float: right;">
                    <a href="https://itunes.apple.com/ae/app/airport-assist/id1256650769?mt=8" target="_blank">
                        <img src="image/AirportAppLanding/app_store-btn.png" width="100%" alt="">
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div style="float: left;">
                    <a href="https://play.google.com/store/apps/details?id=com.airport.assistance" target="_blank">
                        <img src="image/AirportAppLanding/google_play-btn.png" width="100%" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!--subscribe modal-->

<div id="overlay_footer" class="modal fade" role="dialog">
    <div class="modal-dialog subs-dialog">
        <!-- Modal content-->
        <div class="modal-content subs-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <!--                <h4 class="modal-title">Modal Header</h4>-->
                <span>&nbsp;</span>
            </div>
            <div class="modal-body col-sm-offset-4" style="padding-right: 0px;">
                <div class="newsl mb-20 animated bounceIn"> STAY CONNECTED</div>
                <div class="newsle animated bounceInLeft"> Enter your email address below to receive latest updates on
                    services and packages.
                </div>
                <form class="form-horizontal form" role="form" method="post">
                    <div class="row mb-20" id="form_Main1">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="input-group">
                                <input placeholder="Enter Your Email"
                                       class="newsletter-field form-control input-md animated bounceInLeft" type="email"
                                       pattern=".{5,100}" name="email" id="email1">
                                <span class="input-group-btn animated bounceInRight">
                                    <button class="btn btn-news btn-subs" name="subscribe" id="subscribe1"
                                            type="button">Subscribe</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="form_Comment1" style="display:none;">
                        <div class="col-sm-offset-2 col-sm-8 alert alert-success" id="subscribe_success_msg1"
                             style="display: block;">
                            <a href="#" class="close" id="close_success1" data-dismiss="alert"
                               aria-label="close">&times;</a>
                            <p><strong>Thankyou!</strong> for subscribing our newsletter.</p>
                        </div>
                    </div>
                    <div class="row" id="form_Comment21" style="display:none;">
                        <div class="col-sm-offset-2 col-sm-8 alert alert-danger" id="subscribe_success_msg21"
                             style="display: block;">
                            <a href="#" class="close" id="close_exist" data-dismiss="alert"
                               aria-label="close">&times;</a>
                            <p>Email Already Exists.</p>
                        </div>
                    </div>
                    <div class="row" id="form_Comment31" style="display:none;">
                        <div class="col-sm-offset-2 col-sm-8 alert alert-info" id="subscribe_success_msg31"
                             style="display: block;">
                            <a href="#" class="close" id="close_wrong" data-dismiss="alert"
                               aria-label="close">&times;</a>
                            <p>Something Went Wrong.</p>
                        </div>
                    </div>
                    <!-- <div style="color:red;margin-left: 35px;" id="error_msg"></div> -->
                    <div class="col-sm-offset-2 col-sm-8" id="error_msg1" style="display: block;">

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<footer>

    <div class="stamp-color">
        <div class="row">
            <div class="col-lg-2 col-xs-4 col-lg-offset-1">
                <img src="image/stamp.png" class="img-responsive img-circle" alt="Airport Assistance" title="stamp">
            </div>
            <div class="col-lg-9 col-xs-8">
                <h2 class="stamps-top">We Ensure Swift, Smooth And Safe Passage Through Airports</h2>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <a href="https://www.murgencyairportassistance.com/" target="_blank">
                    <img src="image/footer-img.png" class="img-responsive center-block" alt="Airport Assistance"
                         title="MUrgency Airport Assistance logo"></a>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
        </div>



        <div class="row m-r-50">
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5"></div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 footer-social-icon-set">
                <a href="https://www.facebook.com/MUAirportAssist/" class=" text-center pull-left fb-icon" target="_blank"> </a>
                <a href="https://plus.google.com/s/MUAirportAssist/top" class=" text-center pull-left google-icon" target="_blank"></a>
                <a href=" https://www.instagram.com/muairportassist/" class="text-center pull-left instagram-icon" target="_blank"><img</a>
                <a href=" https://www.pinterest.com/muairportas0334/" class=" text-center pull-left painterest-icon" target="_blank"></a>
                <a href="https://twitter.com/MUAirportAssist" class=" text-center pull-left twitter-icon " target="_blank"></a>
                <button class="btn btn-mod btn-subscribe" data-toggle="modal" data-target="#overlay_footer">
                    Subscribe
                </button>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
        </div>
        <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-3"></div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-9">
                <div class="text-center m-r-10">MUAirportAssist@MUrgency.com</div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-3"></div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-9">
                <div class="text-center m-r-10">© Copyright 2017 MUrgency Inc.</div>
            </div>
        </div>
    </div>
</footer>


<script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-smooth-scroll/2.2.0/jquery.smooth-scroll.min.js"></script>


<script>
    //Footer Subscription Code
    $('#subscribe1').click(function () {
        var emailaddress = $('#email1').val();
        if (emailaddress != "") {
            if (!validateEmail(emailaddress)) {
                $('#error_msg1').html('<p>Please enter a valid email id.</p>');

            } else {
                $('#error_msg1').html('');
                $.post("subscribe.php", {email: emailaddress}, function (data) {
                    //alert(data);
                    if (data == "1") {
                        $('#form_Main1').hide();
                        //$('#subscribe_success_msg1').html(' <p><strong>Thankyou!</strong> for subscribing our newsletter.</p>');
                        $('#form_Comment1').show();
                        //$('#overlay').delay(5000).fadeOut('slow');
                        $.modal.close();
                        $('#backdrop_modal').removeClass('modal-backdrop');
                        document.getElementById('email1').value = "";
                        //$('.modal-backdrop').remove();
                        //div.classList.remove("modal-backdrop");
                        // alert("email already exist");
                    } else if (data == 2) {
                        $('#form_Comment1').hide();
                        //$('#subscribe_success_msg21').html(' <p>Email Already Exists.</p>');
                        $('#form_Comment21').show();
                        document.getElementById('email1').value = "";
                        //$('#form_Main').show();
                        //alert("email already exist");
                    } else {
                        $('#form_Comment1').hide();
                        $('#form_Comment21').hide();
                        //$('#subscribe_success_msg31').html(' <p>Something Went Wrong.</p>');
                        $('#form_Comment31').show();
                        document.getElementById('email1').value = "";
                        // alert("something went wrong");
                    }
                });
            }
        } else {
            $('#error_msg1').html('<p>Please enter the value</p>');
        }
    });

    $('#email1').click(function () {
        $('#form_Comment1').fadeOut('slow');
        $('#form_Comment21').fadeOut('slow');
        $('#form_Comment31').fadeOut('slow');
    });

    $('#close_success1').click(function () {
        $('#form_Comment1').hide();
        $('#form_Main1').show();
    });

    $('.close').click(function () {
        $('#form_Comment1, #form_Comment21, #form_Comment31, #error_msg1').hide();
        document.getElementById('email1').value = "";
    });


    function validateEmail($email) {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        return emailReg.test($email);
    }


</script>


</body>
</html>
