<?php
$title = "flight Tracker Details";
$subtitle = "india";
$serverName = "";
$isCity = "";
require_once 'header_inner.php';
?>
<body>
<div>
    <section class="small-section flight-section bg-white">
        <div class="container relative">
            <div class="row">
                <div class="col-sm-12 bg_gray">
                    <h4 class="ft-heading">Pick Your Flight</h4>
                </div>

            </div>
            <div class="row fl">
                <div class="col-sm-12 fl-details">
                    G8 701 Flight Status
                </div>
                <div class="f-list">
                    <p>This flight has multiple segments. Please select a segment from the list.</p>
                    <p><a href="#">G8 701 from (CCU) Kolkata to (JAI) Jaipur</a></p>
                    <p><a href="#">G8 701 from (JAI) Jaipur to (AMD) Ahmedabad</a></p>
                    <p><a href="#">G8 701 from (AMD) Ahmedabad to (COK) Kochi</a></p>

                </div>
            </div>
        </div>

    </section>
    <section class="small-section flight-section bg-white">
        <div class="container relative">
            <div class="row">
                <div class="col-sm-12 bg_gray">
                    <h4 class="ft-heading">(G8) GoAir 701 Flight Status</h4>
                    <ul class="nav nav-tabs nav-tab tpl-tabs animate">
                        <li class="active">
                            <a href="#overview" data-toggle="tab" id="overview-tab" aria-expanded="false">Overview</a>
                        </li>
                        <li class="">
                            <a href="#departure" data-toggle="tab" id="departure-tab"
                               aria-expanded="false">Departure</a>
                        </li>
                        <li class="">
                            <a href="#arrival" data-toggle="tab" id="arrival-tab" aria-expanded="true">Arrival</a>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="row fl tab-pane  fade active in" id="overview">
                <div class="col-sm-12 fl-details">
                    G8 701 Flight Status
                </div>
                <div class="text-center">
                    <div class="flightName">(G8) GoAir 701</div>
                    <div class="route">(CCU) Kolkata, IN to (JAI) Jaipur, IN</div>
                </div>
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="statusBlock">
                        <div class="statusLabel">Status:</div>
                        <div class="statusType">Landed</div>
                        <div class="statusLastUpdated">
                            Last change to status more than 3 hours ago
                        </div>
                    </div>
                </div>

                <div class="col-sm-8 col-sm-offset-2 flightDetails">
                    <div class="col-sm-6">
                        <p class="status-Type">DEPARTURE</p>
                        <p class="statusTitle">Scheduled Departure:</p>
                        <p class="statusValue">6:30 AM - Tue Feb-28-2017</p>
                        <p class="statusTitle">Arrival Terminal:</p>
                        <p class="statusValue">2</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="status-Type">ARRIVAL</p>
                        <p class="statusTitle">Scheduled Arrival:</p>
                        <p class="statusValue">6:30 AM - Tue Feb-28-2017</p>
                        <p class="statusTitle">Actual Arrival: </p>
                        <p class="statusValue">7:47 AM - Tue Feb-28-2017 (runway)</p>
                        <p class="statusTitle">Baggage Claim:</p>
                        <p class="statusValue">N/A</p>

                    </div>
                </div>
            </div>
            <div class="row fl tab-pane hide" id="departure">
                <div class="col-sm-12 fl-details">
                    G8 701 Departure Status
                </div>
                <div class="text-center">
                    <div class="flightName">(CCU) Netaji Subhas Chandra Bose Airport</div>
                    <div class="route">Kolkata, IN</div>
                </div>
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="statusBlock">
                        <div class="statusLabel">Status:</div>
                        <div class="statusType">Landed</div>
                        <div class="statusLastUpdated">
                            Last change to status more than 3 hours ago
                        </div>
                    </div>
                </div>

                <div class="col-sm-8 col-sm-offset-2 flightDetails">
                    <div class="col-sm-6">
                        <p class="status-Type">GATE</p>
                        <p class="statusTitle">Scheduled Departure:</p>
                        <p class="statusValue">6:30 AM - Tue Feb-28-2017</p>
                        <p class="statusTitle">Actual Departure:</p>
                        <p class="statusValue">N/A</p>
                        <p class="statusTitle">Local Time (UTC +5:30):</p>
                        <p class="statusValue">3:45 PM - Tue Feb-28-2017</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="status-Type">RUNWAY</p>
                        <p class="statusTitle">Scheduled Departure:</p>
                        <p class="statusValue">6:30 AM - Tue Feb-28-2017</p>
                        <p class="statusTitle">Actual Departure: </p>
                        <p class="statusValue">7:47 AM - Tue Feb-28-2017 (runway)</p>
                    </div>
                </div>
            </div>
            <div class="row fl tab-pane hide" id="arrival">
                <div class="col-sm-12 fl-details">
                    G8 701 Arrival Status
                </div>
                <div class="text-center">
                    <div class="flightName">(JAI) Jaipur Airport</div>
                    <div class="route">Jaipur, IN</div>
                </div>
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="statusBlock">
                        <div class="col-sm-6">
                            <div class="statusLabel">Status:</div>
                            <div class="statusType">Landed</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="statusLabel">Arrival Terminal:</div>
                            <div class="statusType">2</div>
                        </div>
                        <div class="statusLastUpdated">
                            Last change to status more than 3 hours ago
                        </div>
                    </div>
                </div>

                <div class="col-sm-8 col-sm-offset-2 flightDetails">
                    <div class="col-sm-6">
                        <p class="status-Type">GATE</p>
                        <p class="statusTitle">Scheduled Arrival:</p>
                        <p class="statusValue">6:30 AM - Tue Feb-28-2017</p>
                        <p class="statusTitle">Estimated Arrival:</p>
                        <p class="statusValue">6:30 AM - Tue Feb-28-2017</p>
                        <p class="statusTitle">Local Time (UTC +5:30):</p>
                        <p class="statusValue">4:05 PM - Tue Feb-28-2017</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="status-Type">RUNWAY</p>
                        <p class="statusTitle">Scheduled Arrival:</p>
                        <p class="statusValue">6:30 AM - Tue Feb-28-2017</p>
                        <p class="statusTitle">Actual Arrival: </p>
                        <p class="statusValue">7:47 AM - Tue Feb-28-2017 (runway)</p>
                        <p class="statusTitle">Baggage Claim:</p>
                        <p class="statusValue">N/A</p>

                    </div>
                </div>
            </div>
        </div>

    </section>
    <section class="small-section flight-section bg-white">
        <div class="container relative">
            <div class="row fl">
                <div class="col-sm-12 fl-details">
                    G8 701 Flight Information
                </div>
                <div class="flightInfo">
                    <p><label>Route:</label> From (CCU) Kolkata, IN to (JAI) Jaipur, IN</p>
                    <p><label>Duration:</label> 2h 20m</p>
                    <p><label>Equipment:</label>Airbus A320 (Scheduled)</p>
                    <p><label>On-Time Rating:</label>No rating available</p>
                </div>
            </div>
        </div>
    </section>
</div>
</body>
<?php
require_once 'footer-flight.php';
?>
<script>
    $('#departure-tab').on('click', function () {
        $("#departure").removeClass('hide');
        $("#departure").addClass('fade');
        $("#overview").removeClass('fade');
        $("#overview").addClass('hide');
        $("#arrival").addClass('hide');
    });

    $('#arrival-tab').on('click', function () {
        $("#departure").removeClass('fade');
        $("#departure").addClass('hide');
        $("#overview").removeClass('fade');
        $("#overview").addClass('hide');
        $("#arrival").removeClass('hide');
        $("#arrival").addClass('fade');

    });
    $('#overview-tab').on('click', function () {
        $("#departure").removeClass('fade');
        $("#departure").addClass('hide');
        $("#arrival").removeClass('fade');
        $("#arrival").addClass('hide');
        $("#overview").removeClass('hide');
        $("#overview").addClass('fade');
    });
</script>