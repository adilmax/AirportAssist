<?php
$title = "Airport Assistance Services across India | Delhi, Mumbai, Chennai, Hyderabad, Bangalore, Kolkatta";
$metaDesc = "MUrgency provides Airport assistance services across 195 countries including India comprising, Meet & Greet, Lounge Access, Check-in Assistance, Special Assistance for Children, Elderly and VIPs, Limousine Service.";
//$titleName = "India";
$serverName = "";
$isCity = "";
require_once 'header.php';
?>
<body>
<div>
    <section class="page-section  bg-dark fullwidth-slider"
             data-background="../image/india_landing_wh.jpg">
        <div class="container" style="position: absolute;top: 150px;">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="ias-Name">Airport Assistance Services</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="ias-Name-Ind">In All Major Airports in INDIA</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 ind-request-btn">
                            <button onclick="location.href='#bookServices'" type="button" class="res-at-ins">
                                REQUEST SERVICE
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row stats" id="currency-converter">
                <ul class="india-status-ul">
                    <li>
                        <button class="btn-flight" data-toggle="modal" data-target="#flight-form">Flight Tracker
                        </button>
                    </li>
                    <li>
                        <button class="btn-wifi" data-toggle="modal" data-target="#wifi-Model">Wi-Fi Locator</button>
                    </li>
            
                    <li>
                        <button class="btn-weather" data-toggle="modal" data-target="#weather-form">Weather</button>
                    </li>
                    <li>
                        <button class="btn-currencyConverters" data-toggle="modal" data-target="#currency-form">Currency
                            Converter
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </section>
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
                                               id="flightNumber" required="true">
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
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!---end of modal--->
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
    <!--    end of modal-->
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
                <form action="" method="post" id="weather">
                    <ul>
                        <li>
                            <div class="input-group" id="weatherInfo">
                                <input type="text" placeholder="Enter City Name" id="weatherCity">
                                <span class="input-group-btn">
                                <button class="red-button weather-btn" type="button" id="getWeather"><i
                                            class="fa fa-search"></i></button>
                                </span>
                            </div>
                            <div id="weatherOutput">
                                <p id="temp"></p>
                                <p class="temp"></p>
                                <p id="humi"></p>
                                <p id="wind"></p>
                                <!--                                <p id="press"></p>-->
                                <a href="#forcast-form" data-toggle="modal" data-dismiss="modal" id="more"
                                   style="display: none;">5 days Forecast <i class="fa fa-arrow-right"
                                                                             aria-hidden="true"></i></a>
                                <br>
                                <a href="javascript:void(0)" id="otherCity" style="display: none;">Change
                                    City <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                            </div>
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
    <!--    end of model -->
    <section class="page-section small-section bg-white cancer">
        <div class="container relative">
            <div class="row">
                <div class="heading-blog"></div>
                <!-- Content -->
                <div class="col-sm-7">
                    <div class="ml-15">
                        <h1 class="heading-cencer">Airport assistance service in india</h1>
                        <div class="heading-hr-cencer"></div>
                    </div>
                    <!-- Post -->
                    <div class="blog-item">
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- Text Intro -->
                                <div class="blog-item-body">
                                    <p class="text-justify">
                                        MUrgency Airport Assistance offers services at various domestic and
                                        international airports across India such as Delhi, Mumbai, Kolkata, Bengaluru,
                                        Chennai, Kochi, Goa, Hyderabad, and many more. We address and assist all
                                        departure, arrival, and transit needs of our customers. They include lounge
                                        access, meet & greet, check-in assistance, escort to the aircraft, baggage
                                        handling, VIP service and more.</p>

                                    <p class="text-justify"> When in India, you can ensure a swift passage at the
                                        airport. We arrange for
                                        fast track through security, immigration, and customs, so you can skip the long
                                        lines at the airport.</p>

                                    <P class="text-justify">Our services also extend to special needs. You can request
                                        for elderly
                                        assistance, medical oxygen, assistance for the physically impaired, mothers with
                                        infants and non - English speaking passenger. Request for special meals, safety
                                        assistance, and seat accommodation. We meet all airport needs and requirements
                                        to ensure you have a quick, safe, and comfortable journey.

                                    </P>
                                    <p class="airport-list">
                                        <i
                                                class="fa fa-caret-down" aria-hidden="true"></i><a class="airport-list"
                                                data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                                id="servicelink"
                                                aria-expanded="true" class="treatment-list"><i class="icon-layers"></i>
                                            List of Airport</a>
                                    </p>
                                    <div class="row" id="servicelist" hidden="true">
                                        <div class="col-sm-3">
                                            <ul class="servicelist">
                                                <li>Agartala</li>
                                                <li>Agatti Island</li>
                                                <li>Agra</li>
                                                <li>Ahmedabad</li>
                                                <li>Aizawl</li>
                                                <li>Akola</li>
                                                <li>Allahabad</li>
                                                <li>Along</li>
                                                <li>Amritsar</li>
                                                <li>Aurangabad</li>
                                                <li>Bagdogra</li>
                                                <li>Balurghat</li>
                                                <li>Bangalore</li>
                                                <li>Bareli</li>
                                                <li>Belgaum</li>
                                                <li>Bellary</li>
                                                <li>Bhatinda</li>
                                                <li>Bhavnagar</li>
                                                <li>Bhopal</li>
                                                <li>Bhubaneswar</li>
                                                <li>Bhuj</li>
                                                <li>Bikaner</li>
                                                <li>Bilaspur</li>
                                                <li>Bombay (Mumbai)</li>
                                                <li>Calcutta (Kolkata)</li>
                                                <li>Car Nicobar</li>
                                                <li>Chandigarh</li>
                                                <li>Coimbatore</li>
                                                <li>Cooch Behar</li>
                                                <li>Cuddapah</li>
                                                <li>Daman</li>
                                                <li>Daparizo</li>

                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <ul class="servicelist">
                                                <li>Darjeeling</li>
                                                <li>Dehra Dun</li>
                                                <li>Delhi</li>
                                                <li>Deparizo</li>
                                                <li>Dhanbad</li>
                                                <li>Dharamsala</li>
                                                <li>Dibrugarh</li>
                                                <li>Dimapur</li>
                                                <li>Diu</li>
                                                <li>Gaya</li>
                                                <li>Goa</li>
                                                <li>Gorakhpur</li>
                                                <li>Guna</li>
                                                <li>Guwahati</li>
                                                <li>Gwalior</li>
                                                <li>Hissar</li>
                                                <li>Hubli</li>
                                                <li>Hyderabad</li>
                                                <li>Imphal</li>
                                                <li>Indore</li>
                                                <li>Jabalpur</li>
                                                <li>Jagdalpur</li>
                                                <li>Jaipur</li>
                                                <li>Jaisalmer</li>
                                                <li>Jammu</li>
                                                <li>Jamnagar</li>
                                                <li>Jamshedpur</li>
                                                <li>Jeypore</li>
                                                <li>Jodhpur</li>
                                                <li>Jorhat</li>
                                                <li>Kailashahar</li>
                                                <li>Kamalpur</li>
                                                <li>Kandla</li>
                                                <li>Kanpur</li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <ul class="servicelist">
                                                <li>Keshod</li>
                                                <li>Khajuraho</li>
                                                <li>Khowai</li>
                                                <li>Kochi</li>
                                                <li>Kolhapur</li>
                                                <li>Kota</li>
                                                <li>Kozhikode</li>
                                                <li>Kulu</li>
                                                <li>Leh</li>
                                                <li>Lilabari</li>
                                                <li>Lucknow</li>
                                                <li>Ludhiana</li>
                                                <li>Madras (Chennai)</li>
                                                <li>Madurai</li>
                                                <li>Malda</li>
                                                <li>Mangalore</li>
                                                <li>Mohanbari</li>
                                                <li>Muzaffarnagar</li>
                                                <li>Muzaffarpur</li>
                                                <li>Mysore</li>
                                                <li>Nagpur</li>
                                                <li>Nanded</li>
                                                <li>Nasik</li>
                                                <li>Neyveli</li>
                                                <li>Osmanabad</li>
                                                <li>Pantnagar</li>
                                                <li>Pasighat</li>
                                                <li>Pathankot</li>
                                                <li>Patna</li>
                                                <li>Pondicherry</li>
                                                <li>Porbandar</li>
                                                <li>Port Blair</li>
                                                <li>Pune</li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <ul class="servicelist">
                                                <li>Puttaparthi</li>
                                                <li>Raipur</li>
                                                <li>Rajahmundry</li>
                                                <li>Rajkot</li>
                                                <li>Rajouri</li>
                                                <li>Ramagundam</li>
                                                <li>Ranchi</li>
                                                <li>Ratnagiri</li>
                                                <li>Rewa</li>
                                                <li>Rourkela</li>
                                                <li>Rupsi</li>
                                                <li>Salem</li>
                                                <li>Satna</li>
                                                <li>Shillong</li>
                                                <li>Sholapur</li>
                                                <li>Silchar</li>
                                                <li>Simla</li>
                                                <li>Srinagar</li>
                                                <li>Surat</li>
                                                <li>Tezpur</li>
                                                <li>Tezu</li>
                                                <li>Thanjavur</li>
                                                <li>Thiruvananthapuram</li>
                                                <li>Tiruchirapally</li>
                                                <li>Tirupati</li>
                                                <li>Tuticorin</li>
                                                <li>Udaipur</li>
                                                <li>Vadodara</li>
                                                <li>Varanasi</li>
                                                <li>Vijayawada</li>
                                                <li>Visakhapatnam</li>
                                                <li>Warangal</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sidebar -->
                <div class="col-sm-5 col-md-4 col-md-offset-1 sidebar">
                    <!-- Widget -->
                    <div class="widget">
                        <div class="widget-body cont">
                            <h1>QUICK CONTACT</h1>
                            <form method="post" action="">
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
                                <div class="mb-20 mb-md-10">
                                    <!-- Name -->
                                    <input type="text" name="firstName" id="firstName"
                                           class="form-control input-sm mb-15"
                                           placeholder="First Name"
                                           value="<?= (isset($data['firstName'])) ? $data['firstName'] : ""; ?>"
                                           accept="" data-validation="required"
                                           data-validation-error-msg-required="You must enter First Name">
                                </div>
                                <div class="mb-20 mb-md-10">
                                    <!-- Name -->
                                    <input type="text" name="lastName" id="lastName" class="form-control input-sm mb-15"
                                           placeholder="Last Name"
                                           value="<?= (isset($data['lastName'])) ? $data['lastName'] : ""; ?>" accept=""
                                           data-validation="required"
                                           data-validation-error-msg-required="You must enter Last Name">
                                </div>
                                <div class="mb-20 mb-md-10">
                                    <!-- email -->
                                    <input type="text" name="email" id="email" class="form-control input-sm mb-15"
                                           placeholder="Email"
                                           value="<?= (isset($data['email'])) ? $data['email'] : ""; ?>" accept=""
                                           data-validation="required email"
                                           data-validation-error-msg-required="You must enter Email">
                                </div>
                                 <div class="mb-20 mb-md-10">
                                    <!-- email -->
                                    <input type="text" name="quickOrigin" id="quickOrigin" class="form-control input-sm mb-15"
                                           placeholder="Airport Service Needed"
                                           value="<?= (isset($data['quickOrigin'])) ? $data['quickOrigin'] : ""; ?>" accept=""
                                           data-validation="required"
                                           data-validation-error-msg-required="Airport Service Needed">
                                </div>
                                <div class="mb-20 mb-md-10">
                                    <!-- <span></span>  -->
                                    <input type="submit" class="btn btn-default register_button" name="quickBtn"
                                           id="quickBtn" value="SUBMIT">

                                </div>
                            </form>
                        </div>

                        <div class="widget">
                            <div class="text-center callback-number">
                                <h3>CALL : +1 - 650 2346332</h3>
                            </div>
                        </div>
                    </div>
                    <!-- End Widget -->
                </div>
                <!-- End Sidebar -->
            </div>
        </div>
    </section>
    <div class="container service_top">
        <div class="row">
        </div>
    </div>
    <section class="bg-white">
        <div class="container-flude nopadding">
            <div class="row nopadding">
                <div class="text-center">
                    <h1>Our Service</h1>
                    <div class="heading-hr-center"></div>
                </div>
                <!-- Content -->
                <div class="col-md-3 col-xs-12 col-lg-3 depart-padding text-center">
                    <img src="../image/departure.png" class="img-circle" alt="service" width="100" height="100"
                         alt="service_departure" title="service_departure"/>
                    <div class="our-service service_margin">
                        <div class="service_padding">
                            <!-- <a href="#Departure" id="departureFun" class="service_heading" onclick="depaFunction();">Departure</a> -->
                            <h4 class="text-center service_heading" onclick="depaFunction();" itemprop="departure" class="departure-padding">
                                Departure</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12 col-lg-3 text-center">
                    <img src="../image/arrival.png" class="img-circle  " alt="service" width="100" height="100"
                         alt="service_arrival" title="service_arrival"/>
                    <div class="our-service service_margin">
                        <div class="service_padding">
                        <!-- <a href="#Arrival" id="Arrival" class="service_heading" onclick="arrivalFunction();">Arrival</a> -->
                            <h4 class="text-center service_heading" onclick="arrivalFunction();" itemprop="arrival" class="departure-padding">
                                Arrival</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12 col-lg-3 text-center">
                    <img src="../image/transit.png" class="img-circle  " alt="service" width="100" height="100"
                         alt="service_transfer/transit" title="service_transfer/transit"/>
                    <div class="our-service service_margin">
                        <div class="service_padding">
                        <!-- <a href="#TransferTransit" class="service_heading_transit" onclick="transitFunction();">Transit</a> -->
                        <h4 class="text-center service_heading" onclick="transitFunction();" itemprop="Transit" class="departure-padding">
                                Transit</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12 col-lg-3 arrival-padding text-center" id="bookServices">
                    <img src="../image/limousine.png" class="img-circle" alt="service" width="100" height="100"
                         alt="limousin" title="service_lounge/other"/>
                    <div class="our-service service_margin">
                        <div class="service_padding">
                        <!-- <a href="#Limousine" class="service_heading_limousin" onclick="limousineFunction();">Limousine Service</a> -->
                            <h4 class="text-center service_heading" onclick="limousineFunction();" itemprop="Limousine" class="departure-padding">
                                Limousine Service</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--    Start book services-->

    <section class="small-section bg-blue mt-20">
        <div class="container relative">
            <div class="row">
                <div class="col-sm-6 align-right">
                    <h3 class="white">BOOK SERVICE</h3>
                </div>
                <form method="post" action="">
                    <div class="col-sm-3">
                        <select id="services" name="services" class="input-sm form-control mb-5 mt-20">
                            <!--                        <option>[Select Service Type]</option>-->
                            <?php foreach ($services as $key => $value) { ?>
                                <option value="<?= $key; ?>" <?= ($key == $formId) ? "selected" : ""; ?>><?= $value; ?></option>
                            <? } ?>
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--    end book services-->
    <!--    Start Arrival services-->
    <section class="small-section bg-white">
        <div class="container relative">
            <div class="row services" id="Arrival">
                <div class="col-sm-4 col-sm-offset-1">
                    <h3>Arrival Services</h3>
                    <div class="popular-treatment">
                        <ul>
                            <li class="popular-treatment"><span>&#10003;</span>&nbsp;Meet and greet at arrival</li>
                            <li class="popular-treatment"><span>&#10003;</span>&nbsp;Passport fast track</li>
                            <li class="popular-treatment"><span>&#10003;</span>&nbsp;Visa and security clearance</li>
                            <li class="popular-treatment"><span>&#10003;</span>&nbsp;Baggage handling service</li>
                            <li class="popular-treatment"><span>&#10003;</span>&nbsp;Cart transport inside airport</li>
                            <li class="popular-treatment"><span>&#10003;</span>&nbsp;Escort to your vehicle</li>
                            <li class="popular-treatment"><span>&#10003;</span>&nbsp;Floral welcome bouquet</li>
                        </ul>
                    </div>
                    <p class="arrival-more-p"><a class="arrival-more" href="https://www.murgencyairportassistance.com/ourservices">Read More</a></p>
                </div>
                <div class="col-sm-6">
                    <form method="post" action="" id="arrivalForm">
                        <? if ($status) { ?>
                            <div class="alert alert-success" role="alert">
                                Your request has been placed successfully.
                            </div><? } ?>
                        <? if (count($errorArrival)) { ?>
                            <div class="alert alert-danger" role="alert">
                            <?php for ($i = 0; $i < count($errorArrival); $i++) {
                                echo $errorArrival[$i];
                                echo "<br>";
                            } ?>
                            </div><? } ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Name<span class="asteric">*</span></label>
                                <input type="text" name="arrivalName" id="arrivalName"
                                       class="form-control input-sm mb-15"
                                       placeholder="Enter Name"
                                       value="<?= (isset($data['arrivalName'])) ? $data['arrivalName'] : ""; ?>"
                                       accept=""
                                       data-validation="required"
                                       data-validation-error-msg-required="You must enter Name">
                            </div>
                            <div class="col-sm-6">
                                <label>Email<span class="asteric">*</span></label>
                                <input type="text" name="arrivalEmail" id="arrivalEmail"
                                       class="form-control input-sm mb-15"
                                       placeholder="Email"
                                       value="<?= (isset($data['arrivalEmail'])) ? $data['arrivalEmail'] : ""; ?>"
                                       accept="" data-validation="required email"
                                       data-validation-error-msg-required="You must enter Email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Origin Airport<span class="asteric">*</span></label>
                                <input type="text" name="arrivalOriginAirport" id="originAirport"
                                       class="form-control input-sm mb-15"
                                       placeholder="Origin Airport"
                                       value="<?= (isset($data['arrivalOriginAirport'])) ? $data['arrivalOriginAirport'] : ""; ?>"
                                       accept="" data-validation="required"
                                       data-validation-error-msg-required="You must enter Origin Airport">
                            </div>
                            <div class="col-sm-6">
                                <label>Arrival Airport<span class="asteric">*</span></label>
                                <input type="text" name="arrivalAirport" id="arrivalAirport"
                                       class="form-control input-sm mb-15"
                                       placeholder="Arrival Airport"
                                       value="<?= (isset($data['arrivalAirport'])) ? $data['arrivalAirport'] : ""; ?>"
                                       accept="" data-validation="required"
                                       data-validation-error-msg-required="You must enter Arrival Airport">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Arrival Date<span class="asteric">*</span></label>
                                <i class="fa fa-calendar date-icon" aria-hidden="true"></i>
                                <input type="text" name="arrivalTime" id="arrivalDate"
                                       class="form-control input-sm mb-15"
                                       placeholder="Arrival Date"
                                       value="<?= (isset($data['arrivalTime'])) ? $data['arrivalTime'] : ""; ?>"
                                       accept="" data-validation="required"
                                       data-validation-error-msg-required="You must enter Arrival Date">
                            </div>
                            <div class="col-sm-6">
                                <label>Flight Number<span class="asteric">*</span></label>
                                <input type="text" name="flightNumber" id="flightNumber"
                                       class="form-control input-sm mb-15"
                                       placeholder="Flight Number"
                                       value="<?= (isset($data['flightNumber'])) ? $data['flightNumber'] : ""; ?>"
                                       accept="" data-validation="required"
                                       data-validation-error-msg-required="You must enter Flight Number">

                            </div>
                        </div>
                        <div>
                            <input type="hidden" name="arrivalService" id="Arrival" value="Arrival">
                        </div>
                        <div class="col-sm-12 pb-20">
                            <input type="submit" class="btn btn-default register_button" name="arrivalBtn"
                                   id="arrivalBtn" value="SUBMIT">

                        </div>
                        <div class="note">
                            <p class="text-justify"><b>Note:</b>&nbsp;Please note that some of the services requires 48
                                hours notice
                                due to Airport Security <span class="note-spane">Approval Some of the service may not be available at all the Airports.</span>
                            </p>
                        </div>
                    </form>

                </div>

            </div>
            <!--    end Arrival services-->

            <!--    Start Departure services-->
            <div class="row services" id="Departure">
                <div class="col-sm-4 col-sm-offset-1">
                    <h3>Departure Services</h3>
                    <div class="popular-treatment">
                        <ul>
                            <li><span>&#10003;</span>&nbsp;Meet and greet at the airport</li>
                            <li><span>&#10003;</span>&nbsp;Lounge access</li>
                            <li><span>&#10003;</span>&nbsp;Fast track – passport and customs</li>
                            <li><span>&#10003;</span>&nbsp;Escort to aircraft</li>
                            <li><span>&#10003;</span>&nbsp;Check-in assistance</li>
                            <li><span>&#10003;</span>&nbsp;Baggage handling service</li>
                            <li><span>&#10003;</span>&nbsp;Upgrades and re-booking</li>
                            <li><span>&#10003;</span>&nbsp;Flight monitoring</li>
                        </ul>
                    </div>
                     <p class="arrival-more-p"><a class="arrival-more" href="https://www.murgencyairportassistance.com/ourservices">Read More</a></p>
                </div>
                <div class="col-sm-6">
                    <form method="post" action="" id="departureForm">
                        <? if ($status) { ?>
                            <div class="alert alert-success" role="alert">
                                Your request has been placed successfully.
                            </div><? } ?>
                        <? if (count($errorDepar)) { ?>
                            <div class="alert alert-danger" role="alert">
                            <?php for ($i = 0; $i < count($errorDepar); $i++) {
                                echo $errorDepar[$i];
                                echo "<br>";
                            } ?>
                            </div><? } ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Name<span class="asteric">*</span></label>
                                <input type="text" name="departureName" id="departureName"
                                       class="form-control input-sm mb-15"
                                       placeholder="Enter Name"
                                       value="<?= (isset($data['departureName'])) ? $data['departureName'] : ""; ?>"
                                       accept="" data-validation="required"
                                       data-validation-error-msg-required="You must enter Name">
                            </div>
                            <div class="col-sm-6">
                                <label>Email<span class="asteric">*</span></label>
                                <input type="text" name="departureEmail" id="departureEmail"
                                       class="form-control input-sm mb-15"
                                       placeholder="Email"
                                       value="<?= (isset($data['departureEmail'])) ? $data['departureEmail'] : ""; ?>"
                                       accept="" data-validation="required email"
                                       data-validation-error-msg-required="You must enter Email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Departure Airport<span class="asteric">*</span></label>
                                <input type="text" name="departureAirport" id="departureAirport"
                                       class="form-control input-sm mb-15"
                                       value="<?= (isset($data['departureAirport'])) ? $data['departureAirport'] : ""; ?>"
                                       placeholder="Departure Airport" accept="" data-validation="required"
                                       data-validation-error-msg-required="You must enter Departure Airport">
                            </div>
                            <div class="col-sm-6">
                                <label>Destination Airport<span class="asteric">*</span></label>
                                <input type="text" name="destinationAirport" id="destinationAirport"
                                       class="form-control input-sm mb-15"
                                       placeholder="Departure Airport"
                                       value="<?= (isset($data['destinationAirport'])) ? $data['destinationAirport'] : ""; ?>"
                                       accept=""
                                       data-validation="required"
                                       data-validation-error-msg-required="You must enter Destination Airport">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Departure Date<span class="asteric">*</span></label>
                                <i class="fa fa-calendar date-icon-depar" aria-hidden="true"></i>
                                <input type="text" name="departureTime" id="departureTime" placeholder="Departure Date"
                                       class="form-control input-sm mb-15"
                                       value="<?= (isset($data['departureTime'])) ? $data['departureTime'] : ""; ?>"
                                       accept=""
                                       data-validation="required"
                                       data-validation-error-msg-required="You must enter Departure Date">
                            </div>
                            <div class="col-sm-6">
                                <label>Departure Flight Number<span class="asteric">*</span></label>
                                <input type="text" name="departureFlightNumber" id="departureFlightNumber"
                                       class="form-control input-sm mb-15"
                                       placeholder="Flight Number"
                                       value="<?= (isset($data['departureFlightNumber'])) ? $data['departureFlightNumber'] : ""; ?>"
                                       accept=""
                                       data-validation="required"
                                       data-validation-error-msg-required="You must enter Flight Number">
                                <div>
                                    <input type="hidden" name="departureService" id="Departure" value="Departure">
                                </div>

                            </div>
                            </div>
                        <div class="col-sm-12 pb-20">
                            <input type="submit" class="btn btn-default register_button" name="departureBtn"
                                       id="departureBtn" value="SUBMIT">
                        </div>
                        <div class="note">
                            <p class="text-justify"><b>Note:</b>&nbsp;Please note that some of the services requires 48
                                hours notice
                                due to Airport Security <span class="note-spane">Approval Some of the service may not be available at all the Airports.</span>
                            </p>
                        </div>
                    </form>

                </div>
            </div>
            <!--    end Departure services-->

            <!--    Start Transit services-->
            <div class="row services" id="TransferTransit">
                <div class="col-sm-4 col-sm-offset-1">
                    <h3>Transit Service</h3>
                    <div class="popular-treatment">
                        <ul>
                            <li class="popular-treatment"><span>&#10003;</span>&nbsp;Meet and greet at the airport</li>
                            <li class="popular-treatment"><span>&#10003;</span>&nbsp;Visa and security clearance</li>
                            <li class="popular-treatment"><span>&#10003;</span>&nbsp;Passport fast track</li>
                            <li class="popular-treatment"><span>&#10003;</span>&nbsp;Lounge access</li>
                            <li class="popular-treatment"><span>&#10003;</span>&nbsp;Escort to aircraft</li>
                            <li class="popular-treatment"><span>&#10003;</span>&nbsp;Connecting flight accommodation
                            </li>
                            <li class="popular-treatment"><span>&#10003;</span>&nbsp;Cart transport inside aircraft</li>
                            <li class="popular-treatment"><span>&#10003;</span>&nbsp;Bagging handling service</li>
                            <li class="popular-treatment"><span>&#10003;</span>&nbsp;Flight monitoring</li>
                            <li class="popular-treatment"><span>&#10003;</span>&nbsp;Upgrades and re-booking.</li>
                        </ul>
                    </div>
                    <p class="arrival-more-p"><a class="arrival-more" href="https://www.murgencyairportassistance.com/ourservices">Read More</a></p>
                </div>
                <div class="col-sm-6">
                    <form method="post" action="" id="transitForm">
                        <? if ($status) { ?>
                            <div class="alert alert-success" role="alert">
                                Your request has been placed successfully.
                            </div><? } ?>
                        <? if (count($errorTransit)) { ?>
                            <div class="alert alert-danger" role="alert">
                            <?php for ($i = 0; $i < count($errorTransit); $i++) {
                                echo $errorTransit[$i];
                                echo "<br>";
                            } ?>
                            </div><? } ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Name<span class="asteric">*</span></label>
                                <input type="text" name="transitName" id="transitName"
                                       class="form-control input-sm mb-15"
                                       placeholder="Enter Name"
                                       value="<?= (isset($data['transitName'])) ? $data['transitName'] : ""; ?>"
                                       accept="" data-validation="required"
                                       data-validation-error-msg-required="You must enter Name">
                            </div>
                            <div class="col-sm-6">
                                <label>Email<span class="asteric">*</span></label>
                                <input type="text" name="transitEmail" id="transitEmail"
                                       class="form-control input-sm mb-15"
                                       placeholder="Email"
                                       value="<?= (isset($data['transitEmail'])) ? $data['transitEmail'] : ""; ?>"
                                       accept="" data-validation="required email"
                                       data-validation-error-msg-required="You must enter Email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Origin Airport<span class="asteric">*</span></label>
                                <input type="text" name="transitOriginAirport" id="originAirports"
                                       class="form-control input-sm mb-15"
                                       placeholder="Origin Airport"
                                       value="<?= (isset($data['transitOriginAirport'])) ? $data['transitOriginAirport'] : ""; ?>"
                                       accept="" data-validation="required"
                                       data-validation-error-msg-required="You must enter Origin Airport">
                            </div>
                            <div class="col-sm-6">
                                <label>Arrival Airport<span class="asteric">*</span></label>
                                <input type="text" name="transitArrivalAirport" id="arrivalAirports"
                                       class="form-control input-sm mb-15"
                                       placeholder="Arrival Airport"
                                       value="<?= (isset($data['transitArrivalAirport'])) ? $data['transitArrivalAirport'] : ""; ?>"
                                       accept="" data-validation="required"
                                       data-validation-error-msg-required="You must enter Arrival Airport">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Arrival Date<span class="asteric">*</span></label>
                                <i class="fa fa-calendar date-icon" aria-hidden="true"></i>
                                <input type="text" name="transitArrivalTime" id="arrivDate"
                                       class="form-control input-sm mb-15"
                                       placeholder="Arrival Date"
                                       accept="" data-validation="required"
                                       data-validation-error-msg-required="You must enter Arrival Date">
                            </div>
                            <div class="col-sm-6">
                                <label>Flight Number<span class="asteric">*</span></label>
                                <input type="text" name="transitFlightNumber" id="transitFlightNumber"
                                       class="form-control input-sm mb-15"
                                       placeholder="Flight Number"
                                       value="<?= (isset($data['transitFlightNumber'])) ? $data['transitFlightNumber'] : ""; ?>"
                                       accept="" data-validation="required"
                                       data-validation-error-msg-required="You must enter Flight Number">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <label>Departure Airport<span class="asteric">*</span></label>
                                <input type="text" name="transitDepartureAirport" id="departureAirports"
                                       class="form-control input-sm mb-15"
                                       placeholder="Departure Airport"
                                       value="<?= (isset($data['transitDepartureAirport'])) ? $data['transitDepartureAirport'] : ""; ?>"
                                       placeholder="Departure Airport" accept="" data-validation="required"
                                       data-validation-error-msg-required="You must enter Departure Airport">
                            </div>
                            <div class="col-sm-6">
                                <label>Destination Airport<span class="asteric">*</span></label>
                                <input type="text" name="transitDestinationAirport" id="destinationAirports"
                                       class="form-control input-sm mb-15"
                                       placeholder="Departure Airport"
                                       value="<?= (isset($data['transitDestinationAirport'])) ? $data['transitDestinationAirport'] : ""; ?>"
                                       accept=""
                                       data-validation="required"
                                       data-validation-error-msg-required="You must enter Destination Airport">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Departure Date<span class="asteric">*</span></label>
                                <i class="fa fa-calendar date-icon-depar" aria-hidden="true"></i>
                                <input type="text" name="transitDepartureTime" id="departDate"
                                       class="form-control input-sm mb-15"
                                       placeholder="Departure Date"
                                       data-validation="required"
                                       data-validation-error-msg-required="You must enter Departure Date">
                            </div>
                            <div class="col-sm-6">
                                <label>Departure Flight Number<span class="asteric">*</span></label>
                                <input type="text" name="transitDepartureFlightNumber" id="flightNumber"
                                       class="form-control input-sm mb-15"
                                       placeholder="Flight Number"
                                       value="<?= (isset($data['transitDepartureFlightNumber'])) ? $data['transitDepartureFlightNumber'] : ""; ?>"
                                       accept=""
                                       data-validation="required"
                                       data-validation-error-msg-required="You must enter Flight Number">
                            </div>
                            <div>
                                <input type="hidden" name="transitService" id="transit" value="Transit / Transfer">
                            </div>
                            <div class="col-sm-12 pb-20">
                                <input type="submit" class="btn btn-default register_button" name="transitBtn"
                                       id="transitBtn" value="SUBMIT">
                            </div>
                            <div class="note">
                                <p class="text-justify"><b>Note:</b>&nbsp;Please note that some of the services requires
                                    48 hours notice
                                    due to Airport Security <span class="note-spane">Approval Some of the service may not be available at all the Airports.</span>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--    end Transit services-->

            <!--    Start Limousine services-->
            <div class="row services" id="Limousine">
                <div class="col-sm-4 col-sm-offset-1">
                    <h3>Limousine Service</h3>

                    <div class="popular-treatment">
                        <ul>
                            <li class="popular-treatment"><span>&#10003;</span>&nbsp;Mobility and health-related service
                            </li>
                            <li class="popular-treatment"><span>&#10003;</span>&nbsp;Special meals</li>
                            <li class="popular-treatment"><span>&#10003;</span>&nbsp;Traveling with infants</li>
                            <li class="popular-treatment"><span>&#10003;</span>&nbsp;Traveling with pets</li>
                            <li class="popular-treatment"><span>&#10003;</span>&nbsp;Safety assistant</li>
                            <li class="popular-treatment"><span>&#10003;</span>&nbsp;Unaccompanied minor service</li>
                        </ul>
                    </div>
                    <p class="arrival-more-p"><a class="arrival-more" href="https://www.murgencyairportassistance.com/ourservices">Read More</a></p>
                </div>
                <div class="col-sm-6">
                    <form method="post" action="" id="limousineForm">
                        <? if ($status) { ?>
                            <div class="alert alert-success" role="alert">
                                Your request has been placed successfully.
                            </div><? } ?>
                        <? if (count($errorLimousine)) { ?>
                            <div class="alert alert-danger" role="alert">
                            <?php for ($i = 0; $i < count($errorLimousine); $i++) {
                                echo $errorLimousine[$i];
                                echo "<br>";
                            } ?>
                            </div><? } ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <label> First Name<span class="asteric">*</span></label>
                                <input type="text" name="limousineName" id="limousineName"
                                       class="form-control input-sm mb-15"
                                       placeholder="Enter Name"
                                       value="<?= (isset($data['limousineName'])) ? $data['limousineName'] : ""; ?>"
                                       accept="" data-validation="required"
                                       data-validation-error-msg-required="You must enter First Name">
                            </div>
                            <div class="col-sm-6">
                                <label>Last Name<span class="asteric">*</span></label>
                                <input type="text" name="limousineLastName" id="lastName"
                                       class="form-control input-sm mb-15"
                                       placeholder="Last Name"
                                       value="<?= (isset($data['limousineLastName'])) ? $data['limousineLastName'] : ""; ?>"
                                       accept="" data-validation="required"
                                       data-validation-error-msg-required="You must enter Last Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Email<span class="asteric">*</span></label>
                                <input type="text" name="limousineEmail" id="limousineEmail"
                                       class="form-control input-sm mb-15"
                                       placeholder="Email"
                                       value="<?= (isset($data['limousineEmail'])) ? $data['limousineEmail'] : ""; ?>"
                                       accept="" data-validation="required email"
                                       data-validation-error-msg-required="You must enter Email">

                            </div>
                            <div class="col-sm-6">
                                <label>Date<span class="asteric">*</span></label>
                                <i class="fa fa-calendar date-icon-limousine" aria-hidden="true"></i>
                                <input type="text" name="limousineArrivalTime" id="limoDate"
                                       class="form-control input-sm mb-15"
                                       placeholder="Date" placeholder="Email" data-validation="required"
                                       data-validation-error-msg-required="You must enter an Date">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 mb-15">
                                <div id="addresses">
                                    <input type="radio" name="IsPickUp" class="addressRadio" id="conditionPickup"
                                           value="pickupAddress" checked>
                                    Pickup
                                    &nbsp;
                                    <input type="radio" name="IsPickUp" class="addressRadio" id="conditionDropoff"
                                           value="dropAddress"> Drop
                                    off
                                </div>
                            </div>
                        </div>

                        <div class="addresses" id="pickupAddress">
                            <div class="row">
                                <div class="col-sm-6">

                                    <label>Name of Airport<span class="asteric">*</span></label>
                                    <input type="text" name="limousineOriginAirport" id="airportName"
                                           class="form-control input-sm mb-15"
                                           placeholder="Airport Name"
                                           value="<?= (isset($data['limousineOriginAirport'])) ? $data['limousineOriginAirport'] : ""; ?>"
                                           accept="" data-validation="required"
                                           data-validation-error-msg-required="You must enter Airport Name">
                                </div>
                                <div class="col-sm-6">
                                    <label>Flight Number<span class="asteric">*</span></label>
                                    <input type="text" name="limousineFlightNumber" id="flightNumber"
                                           class="form-control input-sm mb-15"
                                           placeholder="Flight Number"
                                           value="<?= (isset($data['limousineFlightNumber'])) ? $data['limousineFlightNumber'] : ""; ?>"
                                           accept="" data-validation="required "
                                           data-validation-error-msg-required="You must enter Flight Number">
                                </div>
                            </div>
                            <div class="row" id="pickUpAddress">
                                <div class="col-sm-12">
                                    <label>Pickup Address</label>
                                    <textarea class="form-control place_holder field_color" rows="3"
                                              id="limousinePickUpOrDropAddress"  name="limousinePickUpOrDropAddress"  placeholder="Address"
                                              style="resize: vertical;"></textarea>
                                </div>

                            </div>
                        </div>
                        <div class="hideField" id="dropAddress">
                            <div class="row">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Drop off Address</label>
                                        <textarea class="form-control place_holder field_color" rows="3"
                                                  id="limousinePickUpOrDropAddresses"  name="limousinePickUpOrDropAddresses"
                                                  placeholder="Address"
                                                  style="resize: vertical;"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div>
                                <input type="hidden" name="limousineService" id="limousineService" value="Limousine">
                            </div>
                            <div class="col-sm-12 pb-20">
                                <input type="submit" class="btn btn-default register_button" name="limousineBtn"
                                       id="limousineBtn" value="SUBMIT">
                            </div>
                            <div class="note">
                                <p class="text-justify"><b>Note:</b>&nbsp;Please note that some of the services requires 48
                                    hours notice
                                    due to Airport Security <span class="note-spane">Approval Some of the service may not be available at all the Airports.</span>
                                </p>
                            </div>
                </div>
                </form>
            </div>
            <!--           end Limousine Service-->
        </div>
</div>
</section>
<!--           end all Book Service-->

<section class="small-section bg-blue">
    <div class="container relative">
        <div class="row bg-white">
            <!------testimonial Start---------->
            <div class="container aboutus">
                <div class='row' style="margin-bottom: 20px;">
                    <div class='col-lg-12'>
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
                                                            <img class="img-circle" src="../image/default.png"
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
            <!------testimonial END---------->

        </div>
    </div>
</section>

<section class="small-section bg-white">
    <div class="container relative">

        <div class="row">

            <!-- Content -->
            <div class="col-sm-10 col-sm-offset-1">

                <div class="blog-item">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs tpl-tabs animate">
                        <li class="active">
                            <a href="">Visa Requirement</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tpl-tabs-cont section-text" id="tab-content">
                        <div class="tab-pane">
                            <p class="text-justify">
                                Tourist Visa is now available online for those visiting India for recreation,
                                sightseeing, meet friends or relatives, short medical treatment or casual business
                                visit. It is valid for 30 days. Apply online, pay the fee, and print and carry the
                                electronic travel authorization. You will need a valid passport for six months,
                                photograph, visa application, proof of address, letter of invitation, bank statement,
                                and relevant flight tickets.
                            </p>
                            <p class="text-justify" id="extraContent">Visa on arrival is applicable for Brazil,
                                Cambodia, Australia, Cook Islands, Fiji, Finland, Germany, Djibouti, Indonesia, Israel,
                                Japan, Jordan, Kenya, Kiribati, Laos, Luxembourg, Marshall Islands, Mauritius, Mexico,
                                Micronesia, Myanmar, Nauru, New Zealand, Niue Island, Norway, Oman, Palau, Palestine,
                                Papua New Guinea, Philippines, Republic of Korea, Russia, Samoa, Singapore, Solomon
                                Islands, Thailand, Tonga, Tuvalu, UAE, Ukraine, USA, Vanuatu, Vietnam. This visa is
                                valid for 30 days single entry only at international airports such as Delhi, Mumbai,
                                Bengaluru, Chennai, Kochi, Goa, Hyderabad, Trivandrum and Kolkata.
                            </p>
                            <a id="ReadMore" class="treatment-list-more">Read More</a>
                        </div>
                    </div>
                    <br>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs tpl-tabs animate">
                        <li class="active">
                            <a href="">Country Info</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tpl-tabs-cont section-text" id="tab-content">
                        <div class="tab-pane">
                            <p class="text-justify">
                                India is a land of color, spirituality, wonder, adventure, chaos, and sublime. It is a
                                diverse land of people, history, culture, language, cuisine, religion, and terrain. The
                                Himalayas crown India in the north while the peninsula is lined with gorgeous beaches.
                                It is dotted with rivers, wildlife reserves, temples, historical monuments, and yoga
                                centers. India is a democratic and secular country hosts several festivals and cultural
                                programs that boasts of its rich heritage.

                            </p>
                            <p class="text-justify" id="extraCountryContent">Indian Currency Rupees: <a
                                        class="treatment-list-more" href="#currency-converter"
                                        > Currency Convertor</a><br>Best Months To Visit: December to March
                            </p>


                            <a id="countryReadMore" class="treatment-list-more">Read More</a>
                        </div>
                    </div>
                    <br>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs tpl-tabs animate">
                        <li class="active">
                            <a href="">Sightseeing</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tpl-tabs-cont section-text" id="tab-content">
                        <div class="tab-pane">
                            <p class="text-justify">
                                India has a lot to offer that you cannot cover in one lifetime. It offers wildlife
                                safaris, grand temples, forts, palaces, beaches, hill stations, boat tours, and
                                adventure activities. Discover the Taj Mahal, the Golden Temple, Gir National Park,
                                Moonscapes of Ladakh, Golconda Fort, Red Fort, Ajanta Caves, and Andaman Islands.
                            </p>
                            <p class="text-justify" id="extraSiteContent" hidden="true">The must-visit festivals include
                                Pushkar Fair in Rajasthan, International Kite Festival in Gujarat, Goa Carnival in Goa,
                                Losar Festival in Ladakh, Thaipuism Festival in Tamil Nadu, Jaisalmer Desert Festival in
                                Rajasthan, and Bihu Festival in Assam.
                                Festival in Rajasthan, and Bihu Festival in Assam.
                            </p>
                            <p class="text-justify">No two days are the same in India, so bring your sense of adventure
                                to enjoy the life in the city and country.</p>
                            <a id="siteReadMore" class="treatment-list-more">Read More</a>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
</body>
<?php require_once('footer-help.php'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        // For select servicess......
        $('.services').hide();
        $("<?php echo '#' . $formId; ?>").show();
        $('#services').change(function () {
            $('.services').hide();
            $('#' + $(this).val()).show();
        });
        // For pickup and drop off hidden field
        $("input[name = 'IsPickUp']").click(function () {
            if ($('#conditionPickup').is(":checked")){
                $('#dropAddress').hide();
                $('#pickUpAddress').show();
            } else if($('#conditionDropoff').is(":checked")){
                $('#pickUpAddress').hide();
                $('#dropAddress').show();
            }
        });

        $(function () {
            $.validate();
        });
        $("#servicelink").click(function () {
            $("#servicelist").animate({height: 'toggle'}, "slow");
        });
        $('#quickOrigin').autocomplete({source: 'airportsearch.php', minLength: 1});
        $('#arrivalAirport').autocomplete({source: 'airportsearch.php', minLength: 1});
        $('#originAirport').autocomplete({source: 'airportsearch.php', minLength: 1});
        $('#arrivalAirports').autocomplete({source: 'airportsearch.php', minLength: 1});
        $('#originAirports').autocomplete({source: 'airportsearch.php', minLength: 1});

        $('#departureAirport').autocomplete({source: 'airportsearch.php', minLength: 1});
        $('#destinationAirport').autocomplete({source: 'airportsearch.php', minLength: 1});
        $('#departureAirports').autocomplete({source: 'airportsearch.php', minLength: 1});
        $('#destinationAirports').autocomplete({source: 'airportsearch.php', minLength: 1});
        $('#airportName').autocomplete({source: 'airportsearch.php', minLength: 1});
        $('#airportNames').autocomplete({source: 'airportsearch.php', minLength: 1});


    });


</script>
<script>
    $("#arrivalDate").datepicker({
        dateFormat: "dd/ mm / yy",
        autoclose: true,
        todayBtn: true,
    });
    $("#departureTime").datepicker({
        dateFormat: "dd/ mm / yy",
        autoclose: true,
        todayBtn: true,
    });

    $("#arrivDate").datepicker({
        dateFormat: "dd/ mm / yy",
        autoclose: true,
        todayBtn: true,
    });
    $("#departDate").datepicker({
        dateFormat: "dd/ mm / yy",
        autoclose: true,
        todayBtn: true,
    });
    $("#limoDate").datepicker({
        dateFormat: "dd/ mm / yy",
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
    $("#getWeather").click(function () {
        var cityName = $("#weatherCity").val();
        $.post("weather/weather.php", {cityName: cityName}, function (data) {
            if (data) {
                $("#temp").html("Temperature : " + "<b>" + data.temp + "</b>");
                $("#humi").html("Humidity : " + "<b>" + data.humidity + "</b>");
                $("#press").html("Pressure : " + "<b>" + data.press + "</b>");
                $("#wind").html("Wind Speed : " + "<b>" + data.wind + "</b>");
                $("#weatherHeading").html("Weather in" + " " + $("#weatherCity").val())
                $("#weatherInfo").hide();
                $("#otherCity").show();
                $("#more").show();
            } else {
                $("#weatherOutput").html("Oops Something went wrong!");
            }

        }, "json");
    });
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
                $("#forcastHeading").html("<img src='../image/weather.png'>" + "Weather in" + " " + cityName);

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


    $(document).ready(function () {

        var extraContent = $("#extraContent");
        var ReadMore = $("#ReadMore");


        $("#extraContent").hide();

        $("#ReadMore").click(function () {
            if ($("#ReadMore").text() == 'Read More') {
                $("#extraContent").slideToggle();
                $("#ReadMore").text('Less');

            } else if ($("#ReadMore").text() == 'Less') {
                $("#extraContent").slideToggle();
                $("#ReadMore").text('Read More');
            }
        });

        var extraCountryContent = $("#extraCountryContent");
        var countryReadMore = $("#countryReadMore");


        $("#extraCountryContent").hide();

        $("#countryReadMore").click(function () {
            if ($("#countryReadMore").text() == 'Read More') {
                $("#extraCountryContent").slideToggle();
                $("#countryReadMore").text('Less');

            } else if ($("#countryReadMore").text() == 'Less') {
                $("#extraCountryContent").slideToggle();
                $("#countryReadMore").text('Read More');
            }
        });

        var extraSiteContent = $("#extraSiteContent");
        var siteReadMore = $("#siteReadMore");


        $("#extraSiteContent").hide();

        $("#siteReadMore").click(function () {
            if ($("#siteReadMore").text() == 'Read More') {
                $("#extraSiteContent").slideToggle();
                $("#siteReadMore").text('Less');

            } else if ($("#siteReadMore").text() == 'Less') {
                $("#extraSiteContent").slideToggle();
                $("#siteReadMore").text('Read More');
            }
        });

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
        
        function depaFunction () {
            $('.services').hide();
            $('#services').val("Departure");
            $('#Departure').show();
         }
         function arrivalFunction () {
            $('.services').hide();
            $('#services').val("Arrival");
            $('#Arrival').show();

        }
            function transitFunction () {
            $('.services').hide();
            $('#services').val("TransferTransit");
            $('#TransferTransit').show();
         }
          function limousineFunction () {
            $('.services').hide();
            $('#services').val("Limousine");
            $('#Limousine').show();
         }

            function wifiMap() {
            var x = document.getElementById('wifi-map');
            if (x.style.display === 'block') {
             x.style.display = 'none';
            } else {
            x.style.display = 'block';
            }
        }
</script>

</html>