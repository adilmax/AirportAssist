<?php
$title = "AirportAssist App | Meet & Greet |Fast Track| Concierge services at Airports";
require_once('landingheader.php')

?>
    <!--section 1-->
    <section class="AirportAppLandingBackground">
        <div class="col-md-4 col-md-offset-8"><p class="white brand-heading">Airport Assist</p>
            <p class="white by-MU">by MUrgency</p>
            <p class="white brand-serviceLine">Fast, Easy<br>& Hassle-Free Air Travel</p>
            <p class="white brand-new-connection-line">Make New Connections At Airport</p>
            <p class="white brand-app-services">Skip Long Lines | Overcome Language Limitations |<br>Fast Track Through
                Immigration & Customs</p>
            <p class="white get-the-app-line">Get The APP</p>
            <div class="downloadBtn-app">
                <ul>
                    <li>
                        <a href="https://itunes.apple.com/ae/app/airport-assist/id1256650769?mt=8" target="_blank">
                            <img src="image/AirportAppLanding/app_store-btn.png" width="40%" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="https://play.google.com/store/apps/details?id=com.airport.assistance"
                           target="_blank">
                            <img src="image/AirportAppLanding/google_play-btn.png" width="40%" alt="">
                        </a>
                    </li>
                </ul>
            </div>
            <form id="remindLaterForm" name="remindLaterForm" action="" method="">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <input type="text" id="email" name="email"
                               class="form-control place_holder field_color" value=""
                               placeholder="Email" data-validation="required">
                        <span id="email_error" style="color:#fff; font-size: 13px;"></span>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="button" id="rmlFormButton" name="rmlFormButton" class="btn btn-brand-download"
                           value="Remind Me Later">
                </div>
            </form>
        </div>
    </section>
    <!--////////////////////////////////////////////-->
    <!--Intro Section-->
    <!--////////////////////////////////////////////-->
    <section class="AirportAppLandingInfoLine">
        <div class="container">
            <p class="black text-justify">
                <b><span class="AirportAssist-InIntro">AirportAssist</span></b> by MUrgency is a must have app for all air passengers looking to <b>avoid long
                    queues, save time</b> and assure a hassle free airport experience. You can book airport services at
                arrival, departure,
                or transit in <b>626 airports in 136 countries.</b>
            </p>
            <p class="black text-justify">
                What’s more - you can track your flight, look up exchange rates and chat with other passengers while we
                take care of your airport procedures
            </p>
            <p>
                We customize services for Business Executive, elderly, VIPs, families with kids or passengers with
                language barriers. Change the way you travel with Airport Assist<b><a data-scroll id="anchor1" class="Mu-Airport-brand-color"
                                                                                       href="#getTheApp-Footer">-Download Now</a></b>
            </p>
        </div>
    </section>
    <!--  ///////////////////////////////////////////  -->
    <!--slider section app feature-->
    <!--///////////////////////////////////////////////-->
    <section class="AirportAppLandingSlider"><h2 class="text-center app-feature">App Feature</h2>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active"><img src="image/AirportAppLanding/slider/book-airport-service.png"
                                              alt="book airport service">
                    <div class="carousel-caption "><p class="black l-web-view">Hassle free airport experience is a tap
                            away.<br><span class="Mu-Airport-brand-color">Book Airport Services</span> like Meet and
                            Greet,<br>Fast Track and more</p>
                        <p class="black l-mobile-view"><span class="Mu-Airport-brand-color">Book Airport Services</span><br>arrival, dept or transit</p></div>
                </div>
                <div class="item"><img src="image/AirportAppLanding/slider/meet-people-on-airport.png"
                                       alt="meet people on airport">
                    <div class="carousel-caption"><p class="black l-web-view">Take away the boredom of long waits.<br>Make
                            <span class="Mu-Airport-brand-color">New Connections</span> at airport</p>
                        <p class="black l-mobile-view">Make<span
                                    class="Mu-Airport-brand-color"> New Connections</span> <br>while you wait </p></div>
                </div>
                <div class="item"><img src="image/AirportAppLanding/slider/currency-converter.png"
                                       alt="currency converter">
                    <div class="carousel-caption"><p class="black l-web-view">Look up the latest exchange rate<br>with
                            our <span class="Mu-Airport-brand-color">Currency Converter</span></p>
                        <p class="black l-mobile-view">Latest exchange rate <br>with<span
                                    class="Mu-Airport-brand-color"> Currency Converter</span></p></div>
                </div>
                <div class="item"><img src="image/AirportAppLanding/slider/flight-tracker.png" alt="flight tracker">
                    <div class="carousel-caption"><p class="black l-web-view">Be on time with our<br><span
                                    class="Mu-Airport-brand-color">Flight Tracker</span></p>
                        <p class="black l-mobile-view">Be on time with our<br><span class="Mu-Airport-brand-color">Flight Tracker</span>
                        </p></div>
                </div>
            </div>
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <img src="image/AirportAppLanding/slider/arrow-left.png" alt="left"/>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <img src="image/AirportAppLanding/slider/arrow-right.png" alt="right"/>
            </a>
        </div>
    </section>

    <!---------------------------------------------->
    <!--Booking services-->
    <!------------------------------------------------>
    <section class="AirportAppLandingServices">
        <div class="container"><p class="black text-center bookingLine">Booking any of these services is a tap away with
                Airport Assist</p>
            <div class="row booking-first-row">
                <div class="service-row">
                    <div class="col-md-3 col-sm-6"><img class="center-block"
                                                        src="image/AirportAppLanding/services/meetAndGreet.jpg" alt="">
                        <p class="black text-center service-name">Meet & Greet</p></div>
                    <div class="col-md-3 col-sm-6"><img class="center-block"
                                                        src="image/AirportAppLanding/services/vipService.jpg" alt="">
                        <p class="black text-center service-name">Vip Service</p></div>
                    <div class="col-md-3 col-sm-6"><img class="center-block"
                                                        src="image/AirportAppLanding/services/fastTrackClearance.jpg"
                                                        alt="">
                        <p class="black text-center service-name">Fast Track Clearance</p></div>
                    <div class="col-md-3 col-sm-6"><img class="center-block"
                                                        src="image/AirportAppLanding/services/elderlyAssistance.jpg"
                                                        alt="">
                        <p class="black text-center service-name">Elderly Assistance</p></div>
                </div>
            </div>
            <div class="row booking-second-row">
                <div class="service-row">
                    <div class="col-md-3 col-sm-6"><img class="center-block"
                                                        src="image/AirportAppLanding/services/specialNeeds.jpg" alt="">
                        <p class="black text-center service-name">Special Needs</p></div>
                    <div class="col-md-3 col-sm-6"><img class="center-block"
                                                        src="image/AirportAppLanding/services/transportation.jpg"
                                                        alt="">
                        <p class="black text-center service-name">Transportation</p></div>
                    <div class="col-md-3 col-sm-6"><img class="center-block"
                                                        src="image/AirportAppLanding/services/posterService.jpg" alt="">
                        <p class="black text-center service-name">Porter Service</p></div>
                    <div class="col-md-3 col-sm-6"><img class="center-block"
                                                        src="image/AirportAppLanding/services/loungeService.jpg" alt="">
                        <p class="black text-center service-name">Lounge Service</p></div>
                </div>
            </div>
        </div>
    </section>
    <!--------------------------------->
    <!-- blue app section band -->
    <!---------------------------------->
    <section class="AirportAppLandingAppClick">
        <div class="row row-rl-clear">
            <div class="col-md-8 col-sm-12 col-xs-12"><p class="white text-center clickLine">You Are a Download Away From
                    Changing the Way You Travel</p></div>
            <ul>
                <li><a href="https://itunes.apple.com/ae/app/airport-assist/id1256650769?mt=8" target="_blank"> <img
                                src="image/AirportAppLanding/app_store-btn.png" width="30%" alt=""> </a></li>
                <li><a href="https://play.google.com/store/apps/details?id=com.airport.assistance" target="_blank"> <img
                                src="image/AirportAppLanding/google_play-btn.png" width="30%" alt=""> </a></li>
            </ul>
            <div class="col-md-2 col-sm-6 col-xs-6"></div>
            <div class="col-md-2 col-sm-6 col-xs-6"></div>
        </div>
    </section>
    <!--------------------------------------->
    <!-- Testimonial -->
    <!--------------------------------------->
    <section class="AirportAppLandingTestimonial">
        <div class="row">
            <div class="col-md-7">
                <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                    <div class="carousel-inner">
                        <!-- Quote 1 --> <? if (count($testimonial) > 0) { ?><? for ($i = 0; $i < count($testimonial); $i++) { ?>
                            <div class="item <?= ($i == 0) ? "active" : ""; ?>">
                                <blockquote>
                                    <div class="row">
                                        <div class="col-sm-2 text-center">                                            <? if ($testimonial[$i]->image != '') { ?>
                                                <img class="img-circle" src="<?= $testimonial[$i]->image->getURL(); ?>"
                                                     style="width: 100px;height:100px;border:2px solid #fff;">                                                <? } else { ?>
                                                <img class="img-circle" src="image/default.png"
                                                     style="width: 100px;height:100px;">                                            <? } ?>
                                        </div>
                                        <div class="col-sm-10"><h3
                                                    class="white"><?= $testimonial[$i]->get('title') ?></h3><br/>
                                            <p class="white testimonial_description"><?= $testimonial[$i]->get('shortDescription') ?></p>
                                            <small class="white"><?= $testimonial[$i]->get('firsName') . " " . $testimonial[$i]->get('lastName') ?></small>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                        <?php }
                        } ?>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <iframe width="100%" height="275" src="https://www.youtube.com/embed/rcHTTlk0FAA" frameborder="0"
                        allowfullscreen></iframe>
            </div>
        </div>
    </section>

<?php require_once('landingfooter.php') ?>