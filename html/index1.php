<?
$title = "MUrgency Airport Assistance | Meet & Greet | VIP | Fast Track | Lounge Access | Ground Handling | Flight Connections";
$titleName = "Home";
$metaDesc = "<em>Airport Assistance in 626 Airports in 136 Countries</em> worldwide, including VIP, meet & greet, fast track, transit support, baggage assistance, access to airport lounges etc. for arrivals, departures, transits, transfers & ground handling services.
";
require_once 'header.php';
?>




<!--subscribe pop up-->

<!--<div id="subscribe-popup-modal" class="modal fade" role="dialog">-->
<!--    <div class="modal-dialog">-->
<!--        <!-- Modal content  -->
<!--        <div class="modal-content">-->
<!--            <div class="modal-body popup" style="border-radius:6px 6px 0 0;">-->
<!--                <button type="button" class="close" data-dismiss="modal">&times;</button>-->
<!--                <div class="row">-->
<!--                    <div class="col-md-offset-7 col-md-5" style="z-index:3">-->
<!--                        <p class="app-dwnld-btn-p">-->
<!--                        <a href="https://hoyc.app.link/VND0plUG2E" target="_blank" class="btn btn-default btn-app-dwnld">Download</a>-->
<!--                        </p>-->
<!--                        <p class="text-capitalize spm-hd">AirportAssist App</p>-->
<!--                        <div class="app-download-img">-->
<!--                            <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--                                <a href="https://itunes.apple.com/ae/app/airport-assist/id1256650769?mt=8"-->
<!--                                   target="_blank">-->
<!--                                    <img src="image/AirportAppLanding/app_store-btn.png" width="90%" alt="">-->
<!--                                </a>-->
<!--                            </div>-->
<!--                            <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--                                <a href="https://play.google.com/store/apps/details?id=com.airport.assistance"-->
<!--                                   target="_blank">-->
<!--                                    <img src="image/AirportAppLanding/google_play-btn.png" width="90%" alt="">-->
<!--                                </a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <p class="spm-ot">Making Hassle Free <br>Travel a Tap Way</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="modal-footer" style="border-radius: 0 0 6px 6px;">-->
<!--                <div class="row">-->
<!--                    <div class="col-md-8 col-md-offset-2">-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!---->


<!-- Modal -->
<div class="modal fade" id="book-service-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Book A Service</h4>
            </div>
            <div class="modal-body">
                <form method="post" class="row" action="index.php" id="bookServiceForm">
                    <div class="form-group col-md-12">
                        <input type="text" value="<?= (isset($data['originAirport'])) ? $data['originAirport'] : ""; ?>"
                               class="form-control" name="bs-originAirportData"
                               id="originAirportData"
                               placeholder="Origin Airport Name or Code"
                               data-validation="required"
                               data-validation-error-msg-required="You must enter a origin airport"
                        />
                    </div>
                    <div class="form-group col-md-12">
                        <input type="email" class="form-control" name="bs-email" id="bs_email" placeholder="Email"
                               data-validation="required email"
                               data-validation-error-msg-required="You must enter a Email"
                        />
                    </div>
                    <div class="form-group col-md-3">
                        <input type='tel' id="countryCode" placeholder="Country Code(+1)"
                               class="form-control field_color place_holder" name="bs-countryCode"
                               data-validation="required length" data-validation-length="1-5"
                               data-validation-error-msg-length="Maximum length should be 5"
                               data-validation-error-msg-required="You must enter a Country Code" value="+1">
                    </div>
                    <div class="form-group col-md-9">
                        <input type="tel" class="form-control" id="bs_mobile" name="bs-mobileNumber"
                               placeholder="Mobile Number"
                               data-validation="required number length"
                               data-validation-length="8-15"
                               data-validation-error-msg-length="length should be 8 - 15"
                               data-validation-error-msg-required="You must enter a mobile number"/>
                    </div>
                    <input type="submit" name="submit-book-service" id="submit-book-service" class="btn btn-default"
                           value="Book Service"/>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Popup Start-->
<div class="modal fade" id="callback-form" role="dialog" xmlns="http://www.w3.org/1999/html">
    <div class="modal-dialog">
        <div class="modal-content">
            <h4 class="text-center">
                Request A Call Back
            </h4>

            <form method="post" action="" name="callform" id="callform">
                <!-- <div>
         
    <div class="alert alert-danger" id="errorDiv" role="alert" style="display: none;padding-top: 5px;">
       
    </div> 
                </div> -->
                <ul>
                    <li>
                        <input type="text" placeholder="Name" name="name" id="name" accept="" data-validation="required"
                               data-validation-error-msg-required="Please enter your name">
                    </li>

                    <li>
                        <input type="text" placeholder="Email" name="email" id="email" data-validation="required"
                               data-validation-error-msg-required="Please enter your email">
                    </li>

                    <li>
                        <div class="row">
                            <input class="phonecode" type="text" placeholder="+91" name="phoneCode" id="phoneCode">
                            <input class="phone" type="text" placeholder="Phone" name="phone" id="phone"
                                   data-validation="required number length" data-validation-length="8-15"
                                   data-validation-error-msg-length="Minimum length should be 8"
                                   data-validation-error-msg-required="Please enter your Mobile Number">
                        </div>
                    </li>

                    <li class="text-center">
                        <button type="submit" class="red-button" name="callbutton" id="callbutton">
                            SUBMIT
                        </button>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>
<!-- Popup end-->
<div id="preloader"></div>
<div class="row" style="overflow-x: hidden !important;">
    <header id="top" class="header">
        <div class="col-md-5 col-sm-12 col-xs-12">
            <div class="AirAssist-features">
                <ul>
                    <li data-toggle="modal" data-target="#flight-form">
                        <div class="feature-icon">
                        </div>
                        <p class="text-center">Flight Tracker</p>
                    </li>
                    <li data-toggle="modal" data-target="#wifi-Model">
                        <div class="feature-icon">
                        </div>
                        <p class="text-center">Wifi Locator</p>
                    </li>
                    <li data-toggle="modal" data-target="#weather-form">
                        <div class="feature-icon">
                        </div>
                        <p class="text-center">Weather</p>
                    </li>
                    <li data-toggle="modal" data-target="#currency-form">
                        <div class="feature-icon">
                        </div>
                        <p class="text-center">Currency Converter</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-7 col-sm-12 col-xs-12">
            <div class="AirAssistOne">
                <div class="AirAssistTwo">
                    <div class="AirportAssist-panel">
                        <p>Airport Assist<br><span>by <img src="image/murgency-logo.png" alt=""></span></p>
                    </div>
                    <div class="AirportAssist-content">
                        <p>Worlds Largest Airport Assistance Network<br>Serving <b>626 Airports in 136 countries</b></p>
                        <p>Fast, Easy & Hassle Free Air Travel</p>
                        <p>Services at Arrival, Departure and Transit<br>that saves you time and stress</p>
                    </div>
                    <div class="AirportAssist-bs">
                        <form id="login-with-fb" action="">
                            <!-- <button class="loginBtn loginBtn--facebook" scope="public_profile,email" onlogin="checkLoginState();">Login</button> -->
                            <!--                            <div style="background-color: red;">-->
                            <div class="fb-btn-wrapper">
                                <div class="fb-login-button" data-max-rows="1" data-size="medium"
                                     data-button-type="login_with" data-show-faces="false" data-auto-logout-link="false"
                                     data-use-continue-as="false" scope="public_profile,email"
                                     onlogin="checkLoginState();"></div>
                            </div>

                            <!--  <div class="fb-btn-wrapper">-->
                            <!--  <fb:login-button scope="public_profile,email"-->
                            <!--   onlogin="checkLoginState();"></fb:login-button>-->
                            <!--   </div>-->
                        </form>
                        <form>
                            <button type="button" class="btn btn-default" data-toggle="modal"
                                    data-target="#book-service-modal">Book Service
                            </button>
                        </form>
                    </div>
                    <div class="AirportAssist-dwa">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="AirportAssist-download">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-2 col-xs-2">
                                            <img src="image/mobile.png" alt="">
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-8">
                                            <div class="col-md-12">
                                                <p>Get The App</p>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <a target="_blank"
                                                   href="https://itunes.apple.com/ae/app/airport-assist/id1256650769?mt=8">
                                                    <img src="image/AirportAppLanding/app_store-btn.png" alt="">
                                                </a>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <a target="_blank"
                                                   href="https://play.google.com/store/apps/details?id=com.airport.assistance">
                                                    <img src="image/AirportAppLanding/google_play-btn.png" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--        <div class="row stats">-->
        <!--            <ul class="statu-ul">-->
        <!--                <li>-->
        <!--                    <button class="btn-flight" data-toggle="modal" data-target="#flight-form">Flight Tracker-->
        <!--                    </button>-->
        <!--                </li>-->
        <!--                <li>-->
        <!--                    <button class="btn-wifi" data-toggle="modal" data-target="#wifi-Model">Wi-Fi Locator</button>-->
        <!--                </li>-->
        <!--                <li>-->
        <!--                    <button class="btn-weather" data-toggle="modal" data-target="#weather-form">Weather</button>-->
        <!--                </li>-->
        <!--                <li>-->
        <!--                    <button class="btn-currencyConverter" data-toggle="modal" data-target="#currency-form">Currency-->
        <!--                        Converter-->
        <!--                    </button>-->
        <!--                </li>-->
        <!--            </ul>-->
        <!--        </div>-->
    </header>
    <div class="modal left fade" id="flight-form" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <h4 class="text-center">
                    Search Your Flight Status
                </h4>
                <div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tab tpl-tabs animate">
                        <li class="active">
                            <a href="#byFlight" data-toggle="tab" id="flight" aria-expanded="false">By Flight</a>
                        </li>
                        <!--<li class="">
                            <a href="#byRoute" data-toggle="tab" id="route" aria-expanded="false">By Route</a>
                        </li>
                        <li class="">
                            <a href="#byAirport" data-toggle="tab" id="airport" aria-expanded="true">By Airport</a>
                        </li>-->
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content tpl-tabs-cont section-text">
                        <div class="tab-pane  fade active in" id="byFlight">
                            <form action="flightdetails.php" method="post" id="byFlight-form">
                                <ul>
                                    <li>
                                        <input type="text" placeholder="Enter An Airline Name or Code"
                                               name="airlineName" id="airlineName" required="true">
                                    <li>
                                    <li>
                                        <input type="text" placeholder="Enter Flight Number" name="flightNumber"
                                               id="flightNumbers" required="true">
                                    <li>
                                    <li>
                                        <input type="text" id="date" placeholder="Departure Date" name="date"
                                               required="true" value='<?= date("Y/m/d"); ?>'>
                                    <li>
                                    <li class="text-center">
                                        <button class="red-button" data-toggle="modal" data-target="#details-form"
                                                name="flightSerachNumber" type="submit">
                                            Search
                                        </button>
                                    </li>
                                </ul>

                            </form>
                        </div>
                        <!--<div class="tab-pane hide" id="byRoute">
                            <form action="" method="post" id="byRoute-form">
                                <ul>
                                    <li>
                                        <input type="text" placeholder="Enter Departure Airport Name Or Code">
                                    <li>
                                    <li>
                                        <input type="text" placeholder="Enter Arrival Airport Name Or Code">
                                    <li>
                                    <li>
                                        <input type="text" id="depDate" placeholder="Departure Date">
                                    <li>
                                    <li class="text-center">
                                        <button class="red-button" data-toggle="modal" data-target="#details-form">
                                            Search
                                        </button>
                                    </li>
                                </ul>
                            </form>
                        </div>
                        <div class="tab-pane hide" id="byAirport">
                            <form action="" method="post" id="byAirport-form">
                                <ul>
                                    <li>
                                        <input type="text" placeholder="Enter An Airport Name Or Code">
                                    <li>
                                    <li>
                                        <div class="row flightRow">
                                            <div class="col-sm-6">
                                                <input type="text" id="deptDate" placeholder="Departure Date">
                                            </div>
                                            <div class="col-sm-6"><select>
                                                    <option selected="selected">
                                                        Current Time Period
                                                    </option>

                                                    <option>
                                                        0000-0600
                                                    </option>

                                                    <option>
                                                        0600-1200
                                                    </option>
                                                    <option>
                                                        1200-1800
                                                    </option>
                                                    <option>
                                                        1800-0000
                                                    </option>
                                                </select></div>
                                        </div>
                                    <li>
                                    <li>
                                        <input type="text" placeholder="Enter An Airline Name or Code(Optional)">
                                    <li>
                                    <li class="flight-radio">
                                        Departures <input type="radio" name="radio" value="Dept"> &nbsp;&nbsp;
                                        Arrivals <input type="radio" name="radio" value="arrival">
                                    <li>
                                    <li class="text-center">
                                        <button class="red-button" data-toggle="modal" data-target="#details-form">
                                            Search
                                        </button>
                                    </li>
                                </ul>
                            </form>
                        </div>-->
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="modal right fade" id="forcast-form" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <h4 class="text-center" id="forcastHeading"><img src="image/weather.png">
                    Weather
                </h4>
                </ul>
                <div class="forecastInfo">
                    <div class="row days"></div>
                    <div class="row temperature"></div>
                    <div class="row humidity"></div>
                    <div class="row pressure"></div>
                    <div class="row windSpeed"></div>
                </div>

            </div>
        </div>
    </div>
    <!-- -end of modal -->
    <!-- Modal -->
    <div class="modal left fade" id="wifi-Model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="text-center" id="currencyHeading">
                        Wifi Locator
                    </h4>
                </div>

                <div class="modal-body">
                    <div class="google-map">
                        <iframe src="https://www.google.com/maps/d/embed?mid=1Z1dI8hoBZSJNWFx2xr_MMxSxSxY&hl=en_US&z=2"
                                width="100%" height="300"></iframe>
                    </div>
                </div>

            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->


    <!-- End of Model -->
    <div class="modal weather fade" id="weather-form" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <h4 class="text-center" id="weatherHeading">
                    Check Weather
                </h4>
                <form action="cityweather.php" method="post" id="weather">
                    <ul>
                        <li>
                            <div class="input-group" id="weatherInfo">
                                <input type="text" placeholder="Enter City Name" name="cityName" id="weatherCity"
                                       required="true">
                                <span class="input-group-btn">
                                <button class="red-button weather-btn" type="submit" name="getWeather"
                                        id="getWeather"><i
                                            class="fa fa-search"></i></button>
                                </span>
                            </div>
                            <!--                            <div id="weatherOutput">-->
                            <!--                                <p id="temp"></p>-->
                            <!--                                <p class="temp"></p>-->
                            <!--                                <p id="humi"></p>-->
                            <!--                                <p id="wind"></p>-->
                            <!--                                <p id="press"></p>-->
                            <!--                                <a href="#forcast-form" data-toggle="modal" data-dismiss="modal" id="more"-->
                            <!--                                   style="display: none;">5 days Forecast <i class="fa fa-arrow-right"-->
                            <!--                                                                             aria-hidden="true"></i></a>-->
                            <!--                                <br>-->
                            <!--                                <a href="javascript:void(0)" id="otherCity" style="display: none;">Change-->
                            <!--                                    City <i class="fa fa-arrow-right" aria-hidden="true"></i></a>-->
                            <!--                            </div>-->
                        <li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
    <!--    end of model -->
    <!--  currency model  -->
    <div class="modal currency fade" id="currency-form" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <h4 class="text-center" id="currencyHeading">
                    Currency Converter
                </h4>
                <form>
                    <div class="currencyFromDiv">
                        <ul>
                            <li>
                                <div class="form-group">
                                    <input type="number" name="currencyFromInput" value="1" id="currencyFromInput"
                                           onkeyup="getBottomCurrencyValues();">
                                </div>
                            </li>
                            <li>
                                <div class="form-group">
                                    <select name="currencyFromSelect" id="currencyFromSelect"
                                            onchange="getBottomCurrencyValues();">
                                        <? for ($i = 0; $i < count($allCurrency); $i++) { ?>
                                            <?php if ($allCurrency[$i]["currency"] == "USD") { ?>
                                                <option selected
                                                        value="<?= $allCurrency[$i]["currency"]; ?>"><?= utf8_encode($allCurrency[$i]["country"]); ?></option>
                                            <?php } ?>
                                            <option value="<?= $allCurrency[$i]["currency"]; ?>"><?= utf8_encode($allCurrency[$i]["country"]); ?></option>
                                        <? } ?>

                                        <option value="USD">US Dollar</option>
                                    </select>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="currencyToDiv">
                        <ul>
                            <li>
                                <div class="form-group">
                                    <input type="number" name="currencyToInput" value="" id="currencyToInput"
                                           onkeyup="getTopCurrencyValues();">
                                </div>
                            </li>
                            <li>
                                <div class="form-group">
                                    <select name="currencyToSelect" id="currencyToSelect"
                                            onchange="getTopCurrencyValues();">
                                        <? for ($i = 0; $i < count($allCurrency); $i++) { ?>
                                            <?php if ($allCurrency[$i]["currency"] == "EUR") { ?>
                                                <option selected
                                                        value="<?= $allCurrency[$i]["currency"]; ?>"><?= utf8_encode($allCurrency[$i]["country"]); ?></option>
                                            <?php } ?>
                                            <option value="<?= $allCurrency[$i]["currency"]; ?>"><?= utf8_encode($allCurrency[$i]["country"]); ?></option>
                                        <? } ?>
                                    </select>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div id="currencyCompareError" style="display: none;">
                        <span>Please select different country currency</span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row aboutus text-justify padding-left ">
    <div class="container about-us-top">
        <div class="col-lg-12 col-md-12 col-xs-12 main_text_p1 text-left mg-t-10"
             itemprop="airport service description">
            <span class="inetial_text">MUrgency Airport Assistance</span>
            offers the finest professional, personalized airport assistance for passengers worldwide, both pre-scheduled
            and in emergencies. We also provide aircraft <a class="anchorColorBlue" href="groundhandlingservices.php"
                                                            target="_blank">ground
                handling service</a> for charters globally.
        </div>

        <div class="col-lg-12 col-md-12 col-xs-12 main_text_p2 text-left mg-t-10"
             itemprop="airport service description">
            Our trained representatives ensure your airport experience is comfortable, convenient and time saving. We
            provide a swift and hassle-free passage through the airport worldwide. We cover airport assistance and
            aircraft ground handling services in 195 countries covering all major cities including <a
                    class="anchorColorBlue"
                    href='http://www.jfkairportassistance.com' target='_blank'>JFK</a>, <a class="anchorColorBlue"
                                                                                           href='http://www.seoulairportassistance.com'
                                                                                           target='_blank'>Seoul</a>, <a
                    class="anchorColorBlue"
                    href='http://www.mumbaiairportassistance.com' target='_blank'>Mumbai</a>, <a class="anchorColorBlue"
                                                                                                 href='http://www.singaporeairportassistance.com'
                                                                                                 target='_blank'>Singapore</a>,
            <a class="anchorColorBlue"
               href='http://www.shanghaiairportassistance.com' target='_blank'>Shanghai</a>, <a class="anchorColorBlue"
                                                                                                href='http://www.londonlutonairportassistance.com'
                                                                                                target='_blank'>London</a>,
            <a class="anchorColorBlue"
               href='http://www.beijingairportassistance.com' target='_blank'>Beijing</a>, <a class="anchorColorBlue"
                                                                                              href='http://www.charlotteairportassistance.com'
                                                                                              target='_blank'>Charlotte</a>,
            <a class="anchorColorBlue"
               href='http://www.chicagoairportassistance.com' target='_blank'>Chicago</a>, <a class="anchorColorBlue"
                                                                                              href='http://www.dallasairportassistance.com'
                                                                                              target='_blank'>Dallas</a>,
            <a class="anchorColorBlue"
               href='http://www.dubaiairportassistance.com' target='_blank'>Dubai</a>, <a class="anchorColorBlue"
                                                                                          href='http://www.frankfurtairportassistance.com'
                                                                                          target='_blank'>Frankfurt</a>,
            <a class="anchorColorBlue"
               href='http://www.guangzhouairportassistance.com' target='_blank'>Guangzhou</a>, <a
                    class="anchorColorBlue"
                    href='http://www.hongkongairportassistance.com' target='_blank'>Hong Kong</a>, <a
                    class="anchorColorBlue"
                    href='http://www.istanbulairportassistance.com' target='_blank'>Istanbul</a>, <a
                    class="anchorColorBlue"
                    href='http://www.jakartaairportassistance.com' target='_blank'>Jakarta</a>, <a
                    class="anchorColorBlue"
                    href='http://www.kualalumpurairportassistance.com' target='_blank'>Kuala Lumpur</a>, <a
                    class="anchorColorBlue"
                    href='http://www.lasvegasairportassistance.com' target='_blank'>Las Vegas</a>, <a
                    class="anchorColorBlue"
                    href='http://www.losangelesairportassistance.com' target='_blank'>Los Angeles</a>, <a
                    class="anchorColorBlue"
                    href='http://www.newyorkairportassistance.com' target='_blank'>New York</a>, <a
                    class="anchorColorBlue"
                    href='http://www.parisairportassistance.co' target='_blank'>Paris</a>, <a class="anchorColorBlue"
                                                                                              href='http://www.saopauloairportassistance.com'
                                                                                              target='_blank'>Sao
                Paulo</a>, <a class="anchorColorBlue"
                              href='http://www.shanghaiairportassistance.com' target='_blank'>Shanghai</a>, and <a
                    class="anchorColorBlue"
                    href='http://www.tokyoairportassistance.com' target='_blank'>Tokyo</a> amongst other cities.<a
                    class="anchorColorBlue"
                    href="airportserved.php">Check full list of Airport Served</a>
        </div>
        <div class="col-lg-12 col-md-12 col-xs-12 main_text_p1 text-left mg-t-10 mg-b-20"
             itemprop="airport service description">
            <p>
                <span class="inetial_text">Airport Assistance Services :</span>
            </p>
            <div class="col-md-4">
                <ul>
                    <li>Fast-track clearance</li>
                    <li>Check-in assistance</li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul>
                    <li>Meet & Greet</li>
                    <li>Transfers & baggage help</li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul>
                    <li>Airport Lounge Access</li>
                    <li>Immigration Assistance</li>
                </ul>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-xs-12 main_text_p2 text-left" itemprop="airport service description">
            <a class="anchorColorBlue" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
               id="accordion">Check our full service
                list</a>.
            <div id="collapseOne" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="main_text_p2">
                        <div class="main_text_p2">Our other services include</div>
                        <?php foreach ($allServiceList as $title => $item) { ?>
                            <div class="col-lg-4 col-md-4 col-xs-12 main_text_p2">
                                <ul>
                                    <?php echo "<li>" . $item->title . "</li>"; ?>
                                </ul>
                            </div>
                        <?php } ?>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            Bronze, Business Class, Coach Service, Corporate Assistance, Emerald, Executive, Fast Track,
                            First Class, Flight Check-in, Flying Companion, Food & Beverages, Gold, , Marhaba, Pearl
                            Assist,
                            Platinum, Pranaam, Priority Pass, Ruby, Saphire, Seat Change, Silver, VIP Service.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--    <div class="col-lg-12 col-md-12 col-xs-12 main_text_p2 text-left" itemprop="airport service description">-->
        <!--        We provide special assistance at the airport to elderly, children, first time flyers, disabled passengers,-->
        <!--        non-English speakers, and mothers with infants. We are experts at assisting and protecting VIP, CEO,-->
        <!--        Celebrities, Music stars, Sports stars, Rock stars, etc. and maintaining total discretion and privacy.-->
        <!--        Travel like a celebrity with our luxury airport services like Airport Red Carpet, Airport Concierge, Airport-->
        <!--        Limo service, Airport Private transfer and VIP Lounge Access.-->
        <!--    </div>-->
        <div class="col-lg-12 col-md-12 col-xs-12 main_text_p1 text-left" itemprop="airport service description">
            <p>
                <span class="inetial_text">Who can avail these services?</span>
            </p>
            <div class="col-md-4">
                <ul>
                    <li>Regular Travelers</li>
                    <li>VIPs and Celebrities</li>
                    <li>Business Executives</li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul>
                    <li>First- time Flyers</li>
                    <li>Passenger with Disability</li>
                    <li>Non-English Speakers</li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul>
                    <li>Mothers with infants</li>
                    <li>Elderly Citizens</li>
                    <li>Minors travelling alone</li>
                </ul>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-xs-12 main_text_p2 text-left" itemprop="airport service description">
            We also provide <a class="anchorColorBlue" href="groundhandlingservices.php" target="_blank">Ground handling
                services</a> (B2B)
            services
            for charters & private aircrafts. They include all the services an aircraft needs during the period it
            remains
            on the ground.
        </div>
        <div class="col-lg-12 col-md-12 col-xs-12 main_text_p2 text-left" itemprop="airport service description">
            We do our best to meet your needs and ensure a pleasant time at the airport for your aircraft, your clients,
            your loved ones and you. A warm welcome awaits you.
        </div>
    </div>
</div>
<div class="row">
    <div class="jumbotron jumbotron_bg_color" itemscope itemtype="http://schema.org/Airport"
         class="landing-text-top">
        <h2 class="text-center" itemprop="services" class="services-bottom"><span
                    class="underline">OUR SERVICES</span>
        </h2>
        <div class="container service_top">
            <div class="row">
                <div class="col-md-3 col-xs-12 col-lg-3 text-center">
                    <img src="image/departure.png" class="img-circle" alt="service" width="100" height="100"
                         alt="service_departure" title="service_departure"/>
                    <div class="aboutus service_margin">
                        <div class="service_padding">
                            <h4 class="text-center service_heading" itemprop="departure"
                                class="departure-padding">
                                Departure</h4>
                            <ul>
                                <li class="popup_margin">Meet traveler at the curb</li>
                                <li class="popup_margin">Keep boarding pass ready</li>
                                <li class="popup_margin">Constant flight monitoring</li>
                                <li class="popup_margin">Assistance with upgrades</li>
                                <li class="popup_margin">Re-booking arrangements</li>
                                <li class="popup_margin">Luggage Handling</li>
                            </ul>
                            <a href="#" data-toggle="modal" data-target="#myModal" class="dialogue-position">more..</a>
                            <p class="clear-right"></p>
                        </div>

                    </div>
                </div>
                <div class="col-md-3 col-xs-12 col-lg-3 text-center">
                    <img src="image/arrival.png" class="img-circle  " alt="service" width="100" height="100"
                         alt="service_arrival" title="service_arrival"/>
                    <div class="aboutus service_margin">
                        <div class="service_padding">

                            <h4 class="text-center service_heading" itemprop="arrival"
                                class="departure-padding">
                                Arrival</h4>
                            <ul>


                                <li class="popup_margin">Meet and greet at arrival gate</li>
                                <li class="popup_margin">Floral Welcome bouquet</li>
                                <li class="popup_margin">Escort from gate to terminal exit</li>
                                <li class="popup_margin">Efficient baggage handling</li>
                                <li class="popup_margin">Limousine services</li>
                                <li class="popup_margin">Connecting flight help</li>
                            </ul>
                            <a href="#" data-toggle="modal" data-target="#myModal3" class="dialogue-position">more..</a>
                            <p class="clear-right"></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12 col-lg-3 text-center">
                    <img src="image/transit.png" class="img-circle  " alt="service" width="100" height="100"
                         alt="service_transfer/transit" title="service_transfer/transit"/>
                    <div class="aboutus service_margin">
                        <div class="service_padding ">
                            <h4 class="text-center service_heading" itemprop="transfer transit"
                                class="departure-padding">Transfer / Transit</h4>
                            <ul>


                                <li class="popup_margin">Connecting flight accommodation</li>
                                <li class="popup_margin">Keeping boarding pass handy</li>
                                <li class="popup_margin">Seat assignments</li>
                                <li class="popup_margin">Constant monitoring of flights</li>
                                <li class="popup_margin">Assistance with upgrades</li>
                                <li class="popup_margin">Pre-boarding</li>

                            </ul>

                            <a href="#" data-toggle="modal" data-target="#myModal2" class="dialogue-position">more..</a>
                            <p class="clear-right"></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12 col-lg-3 text-center">
                    <img src="image/lounge.png" class="img-circle" alt="service" width="100" height="100"
                         alt="service_lounge/other" title="service_lounge/other"/>
                    <div class="aboutus service_margin">
                        <div class="service_padding">
                            <h4 class="text-center service_heading" itemprop="lounge" class="departure-padding">
                                Special
                                Needs</h4>
                            <ul>


                                <li class="popup_margin">Wheelchair assistance at airport</li>
                                <li class="popup_margin">Access to Lounge</li>
                                <li class="popup_margin">Access to business center with PCs</li>
                                <li class="popup_margin">Assistance for disabled passengers</li>
                                <li class="popup_margin">Special meal</li>
                                <li class="popup_margin">Any Special Request</li>
                            </ul>
                            <a href="#" data-toggle="modal" data-target="#myModal1" class="dialogue-position">more..</a>
                            <p class="clear-right"></p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<div class="container padding-left about-us-top">
    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 nopadding">
            <div class="hovereffect">
                <img src="image/disabledcolor.png" class="img-responsive img-width padding-left" alt="disabled"
                     title="disabled"/>
                <div class="overlay">
                    <h2>DISABLED</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 nopadding">
            <div class="hovereffect">
                <img src="image/vip_color.png" class="img-responsive img-width padding-left" alt="vip"
                     title="vip"/>
                <div class="overlay">
                    <h2>VIP</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 nopadding">
            <div class="hovereffect">
                <img src="image/boarding pass-color.png" class="img-responsive img-width padding-left"
                     alt="boarding"
                     title="boarding"/>
                <div class="overlay">
                    <h2>BOARDING</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 nopadding">
            <div class="hovereffect">
                <img src="image/minor_color.png" class="img-responsive img-width padding-left" alt="minor"
                     title="minor"/>
                <div class="overlay">
                    <h2>MINOR</h2>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 nopadding ">
            <div class="hovereffect">
                <img src="image/taxi_color.png" class="img-responsive img-width padding-left" alt="taxi"
                     title="taxi"/>
                <div class="overlay">
                    <h2>TAXI</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 nopadding">
            <div class="hovereffect">
                <img src="image/lounge_color.png" class="img-responsive img-width padding-left" alt="lounge"
                     title="lounge"/>
                <div class="overlay">
                    <h2>LOUNGE</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 nopadding">
            <div class="hovereffect">
                <img src="image/insurance_color.png" class="img-responsive img-width padding-left"
                     alt="insurance"
                     title="insurance"/>
                <div class="overlay">
                    <h2>INSURANCE</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 nopadding">
            <div class="hovereffect">
                <img src="image/car rental_color.png" class="img-responsive img-width padding-left" alt="rental"
                     title="rental"/>
                <div class="overlay">
                    <h2>RENTAL</h2>
                </div>
            </div>
        </div>


    </div>
</div>


<div class="row form_background_color padding-left" id="service_request_form">
    <div class="container" class="request-form-top">
        <h2 class="text-center form_service_padding" class="request-form-bottom"><span
                    class="service_underline">SERVICE REQUEST FORM</span>
        </h2>
        <div class="col-sm-1 col-md-1 col-lg-1"></div>
        <div class="col-sm-11 col-md-11 col-lg-11">

            <form action="" method="post">
                <? if ($status) { ?>
                    <div class="alert alert-success" role="alert">
                        Your request has been placed successfully.
                    </div><? } ?>
                <? if (count($error)) { ?>
                    <div class="alert alert-danger" role="alert">
                    <?php for ($i = 0; $i < count($error); $i++) {
                        echo $error[$i];
                        echo "<br>";
                    } ?>
                    </div><? } ?>
                <div class="col-sm-6 col-md-6 col-lg-6" itemprop="airportassist">
                    <div class="form-group">
                        <input type="text"
                               value="<?= (isset($data['originAirport'])) ? $data['originAirport'] : ""; ?>"
                               class="form-control place_holder field_color" name="originAirport"
                               id="originAirport"
                               placeholder="Origin Airport Name or Code"
                               data-validation="required"
                               data-validation-error-msg-required="You must enter an Orgin Airport"
                        >
                    </div>
                    <div class="form-group">

                        <input type="text"
                               value="<?= (isset($data['arrivalAirport'])) ? $data['arrivalAirport'] : ""; ?>"
                               class="form-control place_holder field_color" name="arrivalAirport"
                               id="arrivalAirport"
                               placeholder="Arrival Airport Name or Code"
                               accept="" data-validation="required"
                               data-validation-error-msg-required="You must enter an Arrival Airport"
                        >
                    </div>
                    <?
                    if (isset($data['serviceType'])) {
                        $serviceTypeValue = $data['service'];
                    } else {
                        $serviceTypeValue = "";
                    }
                    ?>
                    <div class="form-group">
                        <select class="form-control field_color place_holder field_color" name="serviceType"
                                id="serviceType" accept="" data-validation="required"
                                data-validation-error-msg-required="You must select Service Type">
                            <option value="">Select Service Type</option>
                            <? foreach ($serviceType as $key => $value): ?>
                                <option
                                        value="<?= $key ?>" <?= ($serviceTypeValue == $key) ? "selected" : ""; ?>><?= $value ?></option>
                            <? endforeach; ?>
                        </select>
                    </div>

                    <?
                    if (isset($data['service'])) {
                        $service = $data['service'];
                    } else {
                        $service = "";
                    }
                    ?>
                    <div class="limousineFields" style="display: none;">
                        <div class="form-group">
                            <div class="row serviceRequestRadioGroup">
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label><input type="radio" id="IsPickUp1" value="1" data-validation="required"
                                                      data-validation-error-msg-required="You must select one option">Pick
                                            up</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label><input type="radio" id="IsPickUp0" value="0" data-validation="required"
                                                      data-validation-error-msg-required="You must select one option">Drop
                                            off</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                        <textarea class="form-control place_holder field_color" rows="3" id="pickUpOrDropAddress"
                                  placeholder="Pick up/Drop Off Address" data-validation="required"
                                  data-validation-error-msg-required="You must enter Pick Up And Drop Off Address"
                                  style="resize: vertical;"></textarea>
                        </div>
                    </div>
                    <div class="form-group" id="selectServiceDiv">
                        <select class="form-control field_color place_holder field_color" name="service" id="service"
                                data-validation="required"
                                data-validation-error-msg-required="You must select Service">
                            <option value="">Select Service</option>
                            <? foreach ($serviceList as $key => $value): ?>
                                <option
                                        value="<?= $key ?>" <?= ($service == $key) ? "selected" : ""; ?>><?= $value ?></option>
                            <? endforeach; ?>
                        </select>
                    </div>
                    <?
                    if (isset($data['flightType'])) {
                        $flightTypeValue = $data['flightType'];
                    } else {
                        $flightTypeValue = "";
                    }
                    ?>
                    <div class="form-group">

                        <select class="form-control field_color place_holder" name="flightType" id="flightType"
                                accept="" data-validation="required"
                                data-validation-error-msg-required="You must select Flight Type">
                            <option value="">Select Flight Type</option>
                            <? foreach ($flightType as $key => $value): ?>
                                <option
                                        value="<?= $key ?>" <?= ($flightTypeValue == $key) ? "selected" : ""; ?>><?= $value ?></option>
                            <? endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group" id="arrivaflight">
                        <input type="text"
                               value="<?= (isset($data['flightNumber'])) ? $data['flightNumber'] : ""; ?>"
                               class="form-control place_holder field_color" name="flightNumber"
                               id="flightNumber" data-validation="required"
                               data-validation-error-msg-required="You must enter Flight Number"
                               placeholder="Arrival Fight Number" accept="">
                    </div>
                    <div class="form-group dispaly_none" id="transit">

                        <input type="text"
                               value="<?= (isset($data['transitFlightNumber'])) ? $data['transitFlightNumber'] : ""; ?>"
                               class="form-control  place_holder field_color" name="transitFlightNumber"
                               id="transitFlightNumber" placeholder="Transit Flight Number" data-validation="required"
                               data-validation-error-msg-required="You must enter Transit Flight Number" accept="">
                    </div>

                    <!--                    date-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nopadding">
                        <div class="form-group ">
                            <input type='text' class="form-control place_holder field_color"
                                   value="<?= (isset($data['arrivalTime'])) ? $data['arrivalTime'] : ""; ?>"
                                   placeholder="Arrival Date"
                                   name="arrivalTime" id="arrivalTime" data-validation="required"
                                   data-validation-error-msg-required="You must enter Date"/>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nopadding">
                        <div class="form-group ">
                            <input type="text" class="form-control place_holder field_color" name="timing"
                                   id="timing"
                                   placeholder="Arrival Time" data-validation="required"
                                   data-validation-error-msg-required="You must enter Time"/>
                        </div>
                    </div>
                    <div class="row dispaly_none" id="depaDate">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nopadding">
                            <div class="form-group ">
                                <input type='text' class="form-control place_holder field_color" accept=""
                                       value="<?= (isset($data['departureTime'])) ? $data['departureTime'] : ""; ?>"
                                       placeholder="Departure Date"
                                       name="departureTime" id="departureTime" data-validation="required"
                                       data-validation-error-msg-required="You must enter Time"/>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nopadding">
                            <div class="form-group ">
                                <input type="text" class="form-control place_holder field_color" name="departureTiming"
                                       id="departureTiming"
                                       placeholder="Departure Time" data-validation="required"
                                       data-validation-error-msg-required="You must enter date"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 nopadding">
                        <div class="form-group ">
                            <input type="number" class="form-control place_holder field_color" name="adult"
                                   id="adult"
                                   placeholder="Adult"
                                   value="<?= (isset($data['adult'])) ? $data['adult'] : ""; ?>"
                                   data-validation="required"
                                   data-validation-error-msg-required="You must enter Number Of Adult" min="1"
                            >
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 nopadding">
                        <div class="form-group ">
                            <input type="number" class="form-control place_holder field_color" name="children"
                                   id="children" placeholder="Children (2-12 years)"
                                   value="<?= (isset($data['children'])) ? $data['children'] : ""; ?>"
                                   min="0">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 nopadding">
                        <div class="form-group ">
                            <input type="number" class="form-control place_holder field_color" name="infants"
                                   id="infants" placeholder="Infants (0-2 years)"
                                   value="<?= (isset($data['infants'])) ? $data['infants'] : ""; ?>"
                                   min="0">
                        </div>
                    </div>
                    <?
                    if (isset($data['classOfTravel'])) {
                        $classType = $data['classOfTravel'];
                    } else {
                        $classType = "";
                    }
                    ?>
                    <div class="form-group">

                        <select class="form-control field_color place_holder field_color" name="classOfTravel"
                                id="classOfTravel" accept="" data-validation="required"
                                data-validation-error-msg-required="You must select class Of Travel">
                            <option value="">Select Class Of Travel</option>
                            <? foreach ($classOfTravel as $key => $value): ?>
                                <option
                                        value="<?= $key ?>" <?= ($classType == $key) ? "selected" : ""; ?>><?= $value ?></option>
                            <? endforeach; ?>
                        </select>
                    </div>


                </div>
                <div class="col-sm-6 col-md-6 col-lg-6" itemprop="airportassist">
                    <?
                    if (isset($data['title'])) {
                        $titleValue = $data['title'];
                    } else {
                        $titleValue = "";
                    }
                    ?>
                    <div class="form-group">

                        <select class="form-control place_holder field_color" name="title" id="title" accept=""
                                data-validation="required"
                                data-validation-error-msg-required="You must enter a Title">
                            <option value="">Select Title</option>
                            <? foreach ($titleList as $key => $value): ?>
                                <option
                                        value="<?= $key ?>" <?= ($titleValue == $key) ? "selected" : ""; ?>><?= $key ?></option>
                            <? endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">

                        <input type="text" class="form-control place_holder field_color" name="firstName"
                               id="firstName"
                               placeholder="First Name" accept="" data-validation="required"
                               data-validation-error-msg-required="You must enter a First Name"
                               value="<?= (isset($data['firstName'])) ? $data['firstName'] : ""; ?>">
                    </div>
                    <div class="form-group">

                        <input type="text" class="form-control place_holder field_color" id="lastName"
                               name="lastName"
                               placeholder="Last Name" accept="" data-validation="required"
                               data-validation-error-msg-required="You must enter a Last Name"
                               value="<?= (isset($data['lastName'])) ? $data['lastName'] : ""; ?>">
                    </div>
                    <div class="form-group">

                        <input type="email" class="form-control place_holder field_color" id="email"
                               name="email"
                               placeholder="Email"
                               data-validation="required email"
                               data-validation-error-msg-required="You must enter an Email"
                               value="<?= (isset($data['email'])) ? $data['email'] : ""; ?>">
                    </div>


                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 nopadding">
                        <div class="form-group ">
                            <input type='tel' id="mobileCode" placeholder="Country Code(+1)"
                                   class="form-control field_color place_holder" name="mobileCode"
                                   data-validation="required number length"
                                   data-validation-length="1-5"
                                   data-validation-error-msg-required="You must enter a Country Code"
                                   data-validation-error-msg-length="Minimum length should be 1">
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 nopadding">
                        <div class="form-group ">
                            <input type="text" class="form-control place_holder field_color" id="mobile"
                                   name="mobile"
                                   placeholder="Mobile Number"
                                   data-validation="required number length"
                                   data-validation-length="8-15"
                                   data-validation-error-msg-length="Minimum length should be 8"
                                   data-validation-error-msg-required="You must enter a Mobile Number"
                                   value="<?= (isset($data['mobile'])) ? $data['mobile'] : ""; ?>">
                        </div>
                    </div>

                    <!--                    <div class="form-group">-->
                    <!--                        <select class="form-control place_holder field_color" name="currency" id="currency"-->
                    <!--                                accept=""-->
                    <!--                                data-validation="required"-->
                    <!--                                data-validation-error-msg-required="You must enter a Currency" readonly="true">-->
                    <!--                            <!-- <option value="" >[Billing Currency You Prefer]</option> -->
                    <!--                            --><? // for ($i = 0; $i < count($stripeAllowedCurrency); $i++) { ?>
                    <!--                                <option-->
                    <!--                                        value="-->
                    <? //= $stripeAllowedCurrency[$i]->getObjectId(); ?><!--">-->
                    <? //= strtoupper($stripeAllowedCurrency[$i]->currencyCode) . " (" . $stripeAllowedCurrency[$i]->currencyName . ")"; ?><!--</option>-->
                    <!--                            --><? // } ?>
                    <!--                        </select>-->
                    <input type="hidden" name="currency" value="yHVgdg8pRD"/>
                    <!--                    </div>-->

                    <div class="form-group">

                        <textarea class="form-control place_holder field_color" rows="3" id="message" name="message"
                                  placeholder="Message"
                                  style="resize: vertical;"><?= (isset($data['message'])) ? $data['message'] : ""; ?></textarea>
                    </div>
                    <div class="form-group">
                        <div class="row murgencyMemberDiv">
                            <div class="col-md-12">
                                <h4 class="text-center">Are you a member of MUrgencyNetwork as a</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="checkbox">
                                    <label><input type="checkbox" class="checkedAsMember" id="TA" name="checkedAsMember"
                                                  value="1" <?php if (isset($networkCodeValue)) {
                                            echo $networkCodeValue[0] == "TA" ? 'checked' : '';
                                        } ?>>Travel
                                        Agent [TA]</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkbox">
                                    <label><input type="checkbox" class="checkedAsMember" id="CO" name="checkedAsMember"
                                                  value="1" <?php if (isset($networkCodeValue)) {
                                            echo $networkCodeValue[0] == "CO" ? 'checked' : '';
                                        } ?>>Corporate
                                        Client [CO]</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="memberWrapper" class="redone">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <?php if (isset($_GET['code'])) { ?>
                                        <input type="text" class="form-control place_holder field_color"
                                               name="agentOrCorporateID" value="<?php echo $_GET['code']; ?>"
                                               id="agentOrCorporateID"
                                               placeholder="Enter your MUrgencyNetwork id code"/>
                                    <?php } else { ?>
                                        <input type="text" class="form-control place_holder field_color"
                                               name="agentOrCorporateID"
                                               id="agentOrCorporateID"
                                               placeholder="Enter your MUrgencyNetwork id code"/>
                                    <?php }
                                    ?>

                                </div>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-default" data-container="body"
                                        title="what is MUrgencyNetwork id code?" data-toggle="popover"
                                        data-placement="top"
                                        data-content="MUrgencyNetwork Id is the code provided to you on joining the network. If you have forgotten your code, please login to your account to retrieve it.">
                                    ?
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (isset($errorMessage)) { ?>
                        <div class="alert alert-danger">
                            <?php echo $errorMessage; ?>
                        </div>
                    <?php }
                    ?>
                    <input type="submit" class="btn btn-default register_button" name="details" value="SUBMIT"
                           id="details">
                </div>

            </form>
            <input type="submit" id="submit" name="submit" class="btn btn-default register_button"
                   data-toggle="modal"
                   data-target="#callback-form" value="Request Call Back"/>
        </div>

    </div>
    <div class="container ">

        <div class="row text-center padding-left" style="margin-bottom: 40px;">
            <p class="white">Please note that some of the services requires 48 hours notice due to Airport
                Security
                Approval</p>
        </div>
    </div>
</div>


<!------testimonial Start---------->
<div class="container-fluid aboutus">
    <div class='row' style="margin-bottom: 20px;">
        <div class='col-lg-4 youtubeVidPadding'>
            <iframe width="500" height="275" src="https://www.youtube.com/embed/rcHTTlk0FAA" frameborder="0"
                    allowfullscreen></iframe>
        </div>
        <div class='col-lg-8'>
            <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                <!-- Bottom Carousel Indicators -->
                <ol class="carousel-indicators disabled">
                    <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#quote-carousel" data-slide-to="1"></li>
                    <li data-target="#quote-carousel" data-slide-to="2"></li>
                    <li data-target="#quote-carousel" data-slide-to="3"></li>
                    <li data-target="#quote-carousel" data-slide-to="3"></li>
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
                                                <img class="img-circle" src="<?= $testimonial[$i]->image->getURL(); ?>"
                                                     style="width: 100px;height:100px;">
                                                <?
                                            } else { ?>
                                                <img class="img-circle" src="image/default.png"
                                                     style="width: 100px;height:100px;">
                                            <? } ?>
                                        </div>
                                        <div class="col-sm-10">
                                            <h3><?= $testimonial[$i]->get('title') ?></h3><br/>
                                            <p class="testimonial_description"><?= $testimonial[$i]->get('description') ?></p>
                                            <small><?= $testimonial[$i]->get('firsName') . " " . $testimonial[$i]->get('lastName') ?></small>

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
<!------testimonial END---------->

<!-- Departure -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Departure</h4>
            </div>
            <div class="modal-body" itemscope itemtype="http://schema.org/Departure">
                <p>
                <ul>
                    <li class="popup_margin">Meet traveler at the curb</li>
                    <li class="popup_margin">Keep boarding pass ready</li>
                    <li class="popup_margin">Escort through security (where allowed)</li>
                    <li class="popup_margin">Access to private airline clubs (where available)</li>
                    <li class="popup_margin">Constant flight monitoring</li>
                    <li class="popup_margin">Assistance with upgrades</li>
                    <li class="popup_margin">Re-booking arrangements</li>
                    <li class="popup_margin">Luggage Handling</li>
                    <li class="popup_margin">Pre-boarding</li>
                </ul>

                </p>

                <div class="dialogue-position"><a
                            href="http://<?= $_SERVER['SERVER_NAME']; ?>/#service_request_form">Request
                        Service</a></div>
                <div class="dialogue-position"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<!-- Lounge Services-->
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" itemscope itemtype="http://schema.org/Lounge">Special Needs</h4>
            </div>
            <div class="modal-body">
                <p>
                <ul>
                    <li class="popup_margin">Wheelchair assistance at airport</li>
                    <li class="popup_margin">Assistance for elders/seniors passengers</li>
                    <li class="popup_margin">Special assistance for minors traveling alone</li>
                    <li class="popup_margin">Assistance for disabled passengers</li>
                    <li class="popup_margin">Access to Lounge</li>
                    <li class="popup_margin">Assistance for Non English speaking passengers</li>
                    <li class="popup_margin">Access to business center with PCs</li>
                    <li class="popup_margin">Special meal</li>
                    <li class="popup_margin">Any Special Request</li>

                </ul>
                </p>
                <div class="dialogue-position"><a
                            href="http://<?= $_SERVER['SERVER_NAME']; ?>/#service_request_form">Request
                        Service</a></div>
                <div class="dialogue-position"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<!-- Transfer / Transit-->
<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" itemscope itemtype="http://schema.org/Transfer">Transfer / Transit</h4>
            </div>
            <div class="modal-body">
                <p>
                <ul>
                    <li class="popup_margin">Meet and greet at the arrival gate</li>
                    <li class="popup_margin">Assistance through Transfer Desk and check-in formalities</li>
                    <li class="popup_margin">Keeping boarding pass handy</li>
                    <li class="popup_margin">Escort through security (where allowed)</li>
                    <li class="popup_margin">Access to private airline clubs (where available)</li>
                    <li class="popup_margin">Constant monitoring of flights</li>
                    <li class="popup_margin">Seat assignments</li>
                    <li class="popup_margin">Assistance with upgrades</li>
                    <li class="popup_margin">Re-booking arrangements</li>
                    <li class="popup_margin">Connecting flight accommodation</li>
                    <li class="popup_margin">Pre-boarding</li>
                    <li class="popup_margin">Transfer between the Terminals (if needed)</li>
                    <li class="popup_margin">Escort till the departure boarding gate</li>

                </ul>
                </p>
                <div class="dialogue-position"><a
                            href="http://<?= $_SERVER['SERVER_NAME']; ?>/#service_request_form">Request
                        Service</a></div>
                <div class="dialogue-position"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<!-- Arrival-->
<div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" itemscope itemtype="http://schema.org/Arrival">Arrival</h4>
            </div>
            <div class="modal-body">
                <p>
                <ul>
                    <li class="popup_margin">Meet and greet at arrival gate</li>
                    <li class="popup_margin">Floral Welcome bouquet</li>
                    <li class="popup_margin">Escort from gate to terminal exit</li>
                    <li class="popup_margin">Fast track service through all arrival formalities (Immigration,
                        passport
                        control and customs clearance where allowed)
                    </li>
                    <li class="popup_margin">Efficient baggage handling</li>
                    <li class="popup_margin">Limousine services</li>
                    <li class="popup_margin">Escort passengers to the receiving party in the arrivals area</li>
                    <li class="popup_margin">Connecting flight help</li>
                    <li class="popup_margin">Connecting flight accommodation</li>
                </ul>
                </p>
                <div class="dialogue-position"><a
                            href="http://<?= $_SERVER['SERVER_NAME']; ?>/#service_request_form">Request
                        Service</a></div>
                <div class="dialogue-position"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<? $footerTitle = $titleValue; ?>
<? require_once('footer-help.php'); ?>

<script type="text/javascript">


    $(window).load(function () {
        $('#subscribe-popup-modal').modal('show');
    });

    $(function () {

        $.validate();

		$('#airlineName').autocomplete({source: 'flightSearch.php', minLength: 1});

        $('#arrivalAirport').autocomplete({source: 'airportsearch.php', minLength: 1});
        $('#originAirport').autocomplete({source: 'airportsearch.php', minLength: 1});
        $("#arrivalTime").datepicker({
            dateFormat: "dd/ mm / yy",
            autoclose: true,
            todayBtn: true,
        });
        $('#timing').timepicker();

        $("#departureTime").datepicker({
            dateFormat: "dd/ mm / yy",
            autoclose: true,
            todayBtn: true,
        });
        $('#departureTiming').timepicker();
    });

    $("#serviceType").change(function () {
        var serviceType = $("#serviceType").val();

        if (serviceType != 'YllNCfF8tL') {
            $("#preloader").show();
            var serviceType = $("#serviceType").val();
            $('#service').find('option').remove();
            $('#service')
                .append($('<option>', {value: ''})
                    .text('[Select Service]'));
            $.post("servicelist.php", {serviceType: serviceType}, function (data) {
                var dataArray = jQuery.parseJSON(data)
                $('#state').find('option:not(:first)').remove();

                $.each(dataArray, function (key, value) {
                    $('#service')
                        .append($('<option>', {value: key})
                            .text(value));

                });
                $("#preloader").hide();
                $("#selectServiceDiv").show();
            });

            $(".limousineFields").css("display", "none");

            $("#service").attr('data-validation', 'required');
            $("#service").attr('data-validation-error-msg-required', 'You must select Service');

            $("#IsPickUp0").removeAttr('name', 'IsPickUp');
            $("#IsPickUp1").removeAttr('name', 'IsPickUp');

            $("#IsPickUp0").removeAttr('data-validation', 'required');
            $("#IsPickUp0").removeAttr('data-validation-error-msg-required', 'You must select one option');


            $("#IsPickUp1").removeAttr('data-validation', 'required');
            $("#IsPickUp1").removeAttr('data-validation-error-msg-required', 'You must select one option');


            $("#pickUpOrDropAddress").removeAttr('name', 'pickUpOrDropAddress');
            $("#pickUpOrDropAddress").removeAttr('data-validation', 'required');
            $("#pickUpOrDropAddress").removeAttr('data-validation-error-msg-required', 'You must enter Pick Up And Drop Off Address');

            $("#service").removeAttr("data-validation", "required");
            $("#service").removeAttr("data-validation-error-msg-required", "You must select Service");


        } else if (serviceType == 'YllNCfF8tL') {

            $(".limousineFields").css("display", "block");

            $("#IsPickUp0").attr('name', 'IsPickUp');
            $("#IsPickUp1").attr('name', 'IsPickUp');

            $("#pickUpOrDropAddress").attr('name', 'pickUpOrDropAddress');


            $("#selectServiceDiv").hide();

            $("#service").removeAttr('data-validation', 'required');
            $("#service").removeAttr('data-validation-error-msg-required', 'You must select Service');

        }


    });

    $("#flightType").change(function () {

        if ($("#flightType").val() == "1" || $("#flightType").val() == "2") {

            $("#transitFlightNumber").removeAttr("data-validation", "required");
            $("#transitFlightNumber").removeAttr("data-validation-error-msg-required", "You must enter Transit Flight Number");


            $("#departureTime").removeAttr("data-validation", "required");
            $("#departureTime").removeAttr("data-validation-error-msg-required", "You must enter Time");


            $("#departureTiming").removeAttr("data-validation", "required");
            $("#departureTiming").removeAttr("data-validation-error-msg-required", "You must enter date");


        }
    });


    $("#flightType").change(function () {
        if ($("#flightType").val() === "2") {
            $('#flightNumber').attr("placeholder", "Departure Flight Number");
            $('#arrivalTime').attr("placeholder", " Departure Date");
            $('#timing').attr("placeholder", " Departure Time");
            $("#depaDate").hide();
            $("#transit").hide();

        } else if ($("#flightType").val() === "1") {
            $('#arrivalTime').attr("placeholder", " Arrival Date");
            $('#timing').attr("placeholder", " Arrival Time");
            $("#depaDate").hide();
            $("#transit").hide();

        } else if ($("#flightType").val() === "3") {
            $('#transitFlightNumber').attr("placeholder", "Transit Flight Number");
            $('#arrivalTime').attr("placeholder", " Arrival Date");
            $('#timing').attr("placeholder", " Arrival Time");
            $("#depaDate").show();
            $("#transit").show();

        }
    });

</script>
<script type="text/javascript">
    $(function () {
// testimonial--.........
        $(document).ready(function () {
            //Set the carousel options
            $('#quote-carousel').carousel({
                pause: true,
                interval: 5500,
            });
        });
    });
</script>

<script type="text/javascript">
    $('#callform').on('submit', function (e) {

        var name = document.forms["callform"]["name"].value;
        var email = document.forms["callform"]["email"].value;
        var phoneCode = document.forms["callform"]["phoneCode"].value;
        var phone = document.forms["callform"]["phone"].value;

        $.post("callback.php", {name: name, email: email, phoneCode: phoneCode, phone: phone}, function (data) {
            if (data != true) {

                document.getElementById("errorDiv").style.display = "block";
                var li = "";
                for (var i = 0; i < data.length; i++) {
                    li = li + "<li>" + data[i] + "</li>";
                }
                document.getElementById("errorDiv").innerHTML = "<ul>" + li + "</ul>";
            } else {

                window.location.href = 'welcome.php';
            }
        }, 'json');
        e.preventDefault();
    });

    $("#date").datepicker({
        dateFormat: "yy/mm/dd",
        autoclose: true,
        todayBtn: true,
        minDate: -2,
        maxDate: 2
    });
    $("#depDate").datepicker({
        dateFormat: "yy/mm/dd",
        autoclose: true,
        todayBtn: true,
    });
    $("#deptDate").datepicker({
        dateFormat: "yy/mm/dd",
        autoclose: true,
        todayBtn: true,
    });
    $('#route').on('click', function () {
        $("#byRoute").removeClass('hide');
        $("#byRoute").addClass('fade');
        $("#byFlight").removeClass('fade');
        $("#byFlight").addClass('hide');
        $("#byAirport").addClass('hide');
    });
    $('#airport').on('click', function () {
        $("#byRoute").removeClass('fade');
        $("#byRoute").addClass('hide');
        $("#byFlight").removeClass('fade');
        $("#byFlight").addClass('hide');
        $("#byAirport").removeClass('hide');
        $("#byAirport").addClass('fade');


    });
    $('#flight').on('click', function () {
        $("#byRoute").removeClass('fade');
        $("#byRoute").addClass('hide');
        $("#byAirport").removeClass('fade');
        $("#byAirport").addClass('hide');
        $("#byFlight").removeClass('hide');
        $("#byFlight").addClass('fade');
    });
//    $("#getWeather").click(function () {
//        var cityName = $("#weatherCity").val();
//        $.post("weather/weather.php", {cityName: cityName}, function (data) {
//            if (data) {
//                $("#temp").html("Temperature : " + "<b>" + data.temp + "</b>");
//                $("#humi").html("Humidity : " + "<b>" + data.humidity + "</b>");
//                $("#press").html("Pressure : " + "<b>" + data.press + "</b>");
//                $("#wind").html("Wind Speed : " + "<b>" + data.wind + "</b>");
//                $("#weatherHeading").html("Weather in" + " " + $("#weatherCity").val())
//                $("#weatherInfo").hide();
//                $("#otherCity").show();
//                $("#more").show();
//            } else {
//                $("#weatherOutput").html("Oops Something went wrong!");
//            }
//
//        }, "json");
//    });
    $("#more").click(function () {
        var cityName = $("#weatherCity").val();
        $.post("weather/forcast.php", {cityName: cityName}, function (data) {
            if (data) {
                var day = "";
                var temp = "";
                var hum = "";
                var press = "";
                var wind = "";
                for (var i = 0; i < data.length; i++) {
                    day = day + "<div class='col-sm-2 col'><p>" + data[i]['day'] + "</p></div>";
                    temp = temp + "<div class='col-sm-2 col1'><p>" + "Temperature : " + " " + data[i]['temp'] + "</p></div>";
                    hum = hum + "<div class='col-sm-2 col2'><p>" + "Humidity : " + " " + data[i]['humidity'] + "</p></div>";
                    press = press + "<div class='col-sm-2 col3'><p>" + "Pressure : " + " " + data[i]['press'] + "</p></div>";
                    wind = wind + "<div class='col-sm-2 col4'><p>" + "Wind Speed : " + " " + data[i]['wind'] + "</p></div>";
                }
                $(".days").html(day);
                $(".temperature").html(temp);
                $(".humidity").html(hum);
                $(".pressure").html(press);
                $(".windSpeed").html(wind);
                $(document).ready(function () {
                    $(".col:first").addClass("col-sm-offset-1");
                    $(".col1:first").addClass("col-sm-offset-1");
                    $(".col2:first").addClass("col-sm-offset-1");
                    $(".col3:first").addClass("col-sm-offset-1");
                    $(".col4:first").addClass("col-sm-offset-1");
                });
                $("#forcastHeading").html("<img src='image/weather.png'>" + "Weather in" + " " + cityName);

//                $("#humi").html("Humidity : " + "<b>" + data.humidity + "</b>");
//                $("#press").html("Pressure : " + "<b>" + data.press + "</b>");
//                $("#wind").html("Wind Speed : " + "<b>" + data.wind + "</b>");
//                $("#weatherHeading").html("Weather in" + " " + $("#weatherCity").val())
//                $("#weatherInfo").hide();
//                $("#otherCity").show();
//                $("#more").show();
            } else {
                $("#weatherOutput").html("Oops Something went wrong!");
            }

        }, "json");
    });
    $("#otherCity").click(function () {
        $("#weatherCity").val("");
        $("#weatherInfo").show();
        $("#otherCity").hide();
        $("#more").hide();

    });


    //    currency converter


    function currencyCompare() {
        var from = document.getElementById("currencyFromSelect").value;
        var to = document.getElementById("currencyToSelect").value;

        if (from === to) {
            $("#currencyCompareError").show();
        } else {
            $("#currencyCompareError").hide();
        }

    }

    $(document).ready(function () {

        var amount = $('#currencyFromInput').val();
        var from = $('#currencyFromSelect').val();
        var to = $('#currencyToSelect').val();

        var data = {
            'amount': amount,
            'from': from,
            'to': to
        };

        $.ajax({
            url: "currencyajax.php",
            type: 'post',
            data: data,

            success: function (result) {
                $('#currencyToInput').val(result);
                $('#currencyFromInput').val(1);
                return false;
            }
        });

    });


    function getBottomCurrencyValues() {

        currencyCompare();

        var amount = $('#currencyFromInput').val();
        var from = $('#currencyFromSelect').val();
        var to = $('#currencyToSelect').val();


        if ($('#currencyFromInput').val() == "" || isNaN(amount)) {

            var data = {
                'amount': 1,
                'from': from,
                'to': to
            };

            $.ajax({

                url: "currencyajax.php",
                type: 'post',
                data: data,

                success: function (result) {
                    $('#currencyToInput').val(result);
                    $('#currencyFromInput').val(1);
                    return false;
                }
            });


        }
        else {

            var data = {
                'amount': amount,
                'from': from,
                'to': to
            };


            $.ajax({

                url: "currencyajax.php",
                type: 'post',
                data: data,

                success: function (result) {
                    var finalResult = result.replace(/,/g, '');
                    $("#currencyToInput").val(finalResult);
                    // console.log(result);
                }


            });

        }

    }


    function getTopCurrencyValues() {


        currencyCompare();

        var bottomAmount = $('#currencyToInput').val();
        var from = $('#currencyToSelect').val();
        var to = $('#currencyFromSelect').val();


        var data = {
            'amount': bottomAmount,
            'from': from,
            'to': to
        };


        $.ajax({

            url: "currencyajax.php",
            type: 'post',
            data: data,

            success: function (result) {
                var finalResult = result.replace(/,/g, '');
                $("#currencyFromInput").val(finalResult);
                // console.log(result);
            }


        });

    }

    $(document).ready(function () {

        $("#memberWrapper").hide();

        $('input[type="checkbox"]').click(function () {
            if ($(this).prop("checked") == true) {
                $("#memberWrapper").show();
                $("#agentOrCorporateID").attr('data-validation', 'required');
                $("#agentOrCorporateID").attr('data-validation-error-msg-required', 'You must enter murgency network Id');
            }
            else if ($(this).prop("checked") == false) {
                $("#memberWrapper").hide();
                $("#agentOrCorporateID").removeAttr('data-validation', 'required');
                $("#agentOrCorporateID").removeAttr('data-validation-error-msg-required', 'You must enter murgency network Id');
            }
        });

        $('input.checkedAsMember').on('change', function () {
            $('input.checkedAsMember').not(this).prop('checked', false);
        });

    });

    $(function () {
        $('[data-toggle="popover"]').popover()
    })


    $(document).ready(function () {
        var url = window.location.href;

        if (url.indexOf('code') != -1) {
            $('#memberWrapper').show();
            $("#agentOrCorporateID").attr('data-validation', 'required');
            $("#agentOrCorporateID").attr('data-validation-error-msg-required', 'You must enter murgency network Id');
//            if (url.indexOf('code=TA') != -1) {
//                $("#TA").prop('checked', 'true');
//            } else if (url.indexOf('code=TA') == '') {
//                $("#TA").prop('checked', 'false');
//            } else if (url.indexOf('code=CO') != -1) {
//                $("#CO").prop('checked', 'true');
//            } else if (url.indexOf('code=CO') == '') {
//                $("#CO").prop('checked', 'false');
//            }
        }
        else {
            $('#memberWrapper').hide();
            $("#agentOrCorporateID").removeAttr('data-validation', 'required');
            $("#agentOrCorporateID").removeAttr('data-validation-error-msg-required', 'You must enter murgency network Id');
        }
    });

    $("#subscribe-btn").click(function () {

        var email = $("#subscribe-email").val();

        var data = {
            'email': email
        };

        $.ajax({
            url: 'index.php',
            data: data,
            type: 'POST',
            success: function () {
                $("#subscribe-popup-modal").modal('hide');
            },
            error: function () {
                alert("not ok");
            }

        });

    });

    $("#weatherForm").submit( function(){
        alert("dasdas");
    });


    //---- facebook login script
    function statusChangeCallback(response) {
        if (response.status === 'connected') {
           $.ajax({
				url: 'facebookuserlogin.php',
				type: 'POST',
				data: { "status": true},
				cache: true,
				dataType: "json",
				success: function (result) {
					if (result.error == "")
					{
						if(result.firstName != null && result.firstName != "")
						{
							document.getElementById('firstName').value = result.firstName;
						}
						if(result.lastName != null && result.lastName != "")
						{
							document.getElementById('lastName').value = result.lastName;
						}
						if(result.email != null && result.email != "")
						{
							document.getElementById('email').value = result.email;
						}

						window.location.href = window.location.href+"#service_request_form";
					}
					else {
						alert(result.error);
					}
				},
				error: function (data, textStatus, errorThrown) {
					alert("Something went wrong. Please try again later.");
				}
			});

        }
        else if (response.status === 'not_authorized') {
            //The person is logged into Facebook, but not your app.
        }
        else {
            // The person is not logged into Facebook, so we're not sure if they are logged into this app or not.
        }
    }


    function checkLoginState() {
        FB.getLoginStatus(function (response) {
            statusChangeCallback(response);
        });
    }


    window.fbAsyncInit = function () {

        FB.init({
            appId: '1449018095403725',
            cookie: true,		// enable cookies to allow the server to access the session
            xfbml: true,		// parse social plugins on this page
            version: 'v2.5'		// use graph api version 2.5
        });


        /*FB.getLoginStatus(function(response){
            statusChangeCallback(response);
        }); */

    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.10";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    //---- end facebook login script


    //-------------------- country code

    $("#countryCode").intlTelInput({
        utilsScript: "build/js/utils.js"
    });

    $(function () {
        var regExp = /[a-z]/i;
        $('#countryCode').on('keydown keyup', function (e) {
            var value = String.fromCharCode(e.which) || e.key;

            // No letters
            if (regExp.test(value)) {
                e.preventDefault();
                return false;
            }
        });
    });




</script>