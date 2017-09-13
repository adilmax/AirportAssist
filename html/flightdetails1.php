<?php
$title = "flight Tracker Details";
require_once 'header_inner.php';
?>
<body>
<div>
    <!--<section class="small-section flight-section bg-white">
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

    </section>-->
    <?php if(count($flightDetails)>0){?>
    <section class="small-section flight-section bg-white">
        <div class="container relative">
            <div class="row">
                <div class="col-sm-12 bg_gray">
                    <h4 class="ft-heading">(<?=$code;?>) <?=$airLineName;?> <?=$airNumber;?> Flight Status</h4>
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
                    <?=$code;?> <?=$airNumber;?> Flight Status
                </div>
                <div class="text-center">
                    <div class="flightName">(<?=$code;?>) <?=$airLineName;?> <?=$airNumber;?></div>
                    <div class="route"><?=$route;?></div>
                </div>
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="statusBlock">
                        <div class="statusLabel">Status:</div>
                        <div class="statusType_overview"><?=$flightStatus;?></div>
                        <div class="statusLastUpdated">
                           
                        </div>
                    </div>
                </div>

                <div class="col-sm-8 col-sm-offset-2 flightDetails">
                    <div class="col-sm-6">
                        <p class="status-Type">DEPARTURE</p>
                        <p class="statusTitle">Scheduled Departure:</p>
                        <? if(is_object($departureDateObject)){?>
                        <p class="statusValue"><?=$departureDateObject->format("h:i A");?> - <?=$departureDateObject->format("D");?> <?=$departureDateObject->format("M-d-Y");?> </p>
                        <? } else{?>
                        <p class="statusValue">N/A</p>
                        <? }?>
                        <p class="statusTitle">Departure Gate :</p>
                        <p class="statusValue"><?=$departureGate;?> ( Terminal - <?=$departureTerminal;?> )</p>
                        <p class="statusTitle">Arrival  Terminal:</p>
                        <p class="statusValue"><?=$arrivalTerminal;?></p>

                    </div>
                    <div class="col-sm-6">
                        <p class="status-Type">ARRIVAL</p>
                        <p class="statusTitle">Scheduled Arrival:</p>
                         <? if(is_object($arrivalDateObject)){?>
                        <p class="statusValue"><?=$arrivalDateObject->format("h:i A");?> - <?=$arrivalDateObject->format("D");?> <?=$arrivalDateObject->format("M-d-Y");?> </p>
                        <? } else{?>
                        <p class="statusValue">N/A</p>
                        <? }?>
                        <p class="statusTitle"></p>

                        <p class="statusTitle">Estimated Gate Arrival: </p>
                        <? if(is_object($estimatedGateArrivalObject)){?>
                        <p class="statusValue"><?=$estimatedGateArrivalObject->format("h:i A");?> - <?=$estimatedGateArrivalObject->format("D");?> <?=$estimatedGateArrivalObject->format("M-d-Y");?>(runway)</p>
                        <? } else{?>
                        <p class="statusValue">N/A</p>
                        <? }?>
                        <p class="statusTitle">Baggage Claim:</p>
                        <p class="statusValue"><?=$baggageClaim;?></p>
                        
                    </div>
                </div>
            </div>
            <div class="row fl tab-pane hide" id="departure">
                <div class="col-sm-12 fl-details">
                    <?=$code;?> <?=$airNumber;?> Departure Status
                </div>
                <div class="text-center">
                    <div class="flightName">(<?=$destinationAirportCode;?>) <?=$destinationAirportName;?></div>
                    <div class="route"><?=$destinationCity;?><?=$destinationStateCode;?> <?=$destinationCountryCode;?></div>
                </div>
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="statusBlock">
                        
                        <div class="col-sm-6">
                            <div class="statusLabel"><?=$flightStatus;?></div>
                            <div class="statusType">Delayed <?=$departureGateDelay;?> minutes</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="statusLabel">Departure Gate:</div>
                            <div class="statusType"><?=$departureGate;?> (Terminal - <?=$departureTerminal;?>)</div>
                        </div>
                        <div class="statusLastUpdated">
                            &nbsp
                        </div>
                    </div>
                </div>

                <div class="col-sm-8 col-sm-offset-2 flightDetails">
                    <div class="col-sm-6">
                        <p class="status-Type">GATE</p>
                        <p class="statusTitle">Scheduled Departure:</p>
                        <? if(is_object($scheduledGateDeparture)){?>
                        <p class="statusValue"><?=$scheduledGateDeparture->format("h:i A");?> - <?=$scheduledGateDeparture->format("D");?> <?=$scheduledGateDeparture->format("M-d-Y");?></p>
                        <? } else{?>
                        <p class="statusValue">N/A</p>
                        <? }?>
                        
                        <p class="statusTitle">Actual Departure:</p>
                        <? if(is_object($actualGateDeparture)){?>
                        <p class="statusValue"><?=$actualGateDeparture->format("h:i A");?> - <?=$actualGateDeparture->format("D");?> <?=$actualGateDeparture->format("M-d-Y");?></p>
                        <? } else{?>
                        <p class="statusValue">N/A</p>
                        <? }?>
                        <p class="statusTitle">Local Time (UTC +<?=$departureUTCHour;?>):</p>
                        <? if(is_object($departureLocalTime)){?>
                        <p class="statusValue"><?=$departureLocalTime->format("h:i A");?> - <?=$departureLocalTime->format("D");?> <?=$departureLocalTime->format("M-d-Y");?></p>
                        <? } else{?>
                        <p class="statusValue">N/A</p>
                        <? }?>
                    </div>
                    <div class="col-sm-6">
                        <p class="status-Type">RUNWAY</p>
                        <p class="statusTitle">Scheduled Departure:</p>
                        <? if(is_object($scheduledRunWayDeparture)){?>
                        <p class="statusValue"><?=$scheduledRunWayDeparture->format("h:i A");?> - <?=$scheduledRunWayDeparture->format("D");?> <?=$scheduledRunWayDeparture->format("M-d-Y");?></p>
                        <? } else{?>
                        <p class="statusValue">N/A</p>
                        <? }?>
                        <p class="statusTitle">Actual Departure: </p>
                        <? if(is_object($actualRunWayDeparture)){?>
                        <p class="statusValue"><?=$actualRunWayDeparture->format("h:i A");?> - <?=$actualRunWayDeparture->format("D");?> <?=$actualRunWayDeparture->format("M-d-Y");?></p>
                        <? } else{?>
                        <p class="statusValue">N/A</p>
                        <? }?>
                    </div>
                </div>
            </div>
            <div class="row fl tab-pane hide" id="arrival">
                <div class="col-sm-12 fl-details">
                    <?=$code;?> <?=$airNumber;?> Arrival Status
                </div>
                <div class="text-center">
                    <div class="flightName">(<?=$arrivalAirportCode;?>) <?=$arrivalAirportName;?></div>
                    <div class="route"><?=$arrivalCity;?> <?=$arrivalStateCode;?> <?=$arrivalCountryCode;?></div>
                </div>
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="statusBlock">
                        
                        <div class="col-sm-7">
                            <div class="statusLabel"><?=$flightStatus;?></div>
                            <div class="statusType">Delayed <?=$arrivalGateDelay;?> minutes</div>
                        </div>
                        <div class="col-sm-5">
                            <div class="statusLabel">Arrival Terminal:</div>
                            <div class="statusType"><?=$arrivalTerminal;?></div>
                        </div>
                        <div class="statusLastUpdated">
                            &nbsp
                        </div>
                    </div>
                </div>

                <div class="col-sm-8 col-sm-offset-2 flightDetails">
                    <div class="col-sm-6">
                        <p class="status-Type">GATE</p>
                        <p class="statusTitle">Scheduled Arrival:</p>
                         <? if(is_object($scheduledGateArrival)){?>
                        <p class="statusValue"><?=$scheduledGateArrival->format("h:i A");?> - <?=$scheduledGateArrival->format("D");?> <?=$scheduledGateArrival->format("M-d-Y");?></p>                       
                        <? } else{?>
                        <p class="statusValue">N/A</p>
                        <? }?>
                        <p class="statusTitle">Estimated Arrival:</p>
                        <? if(is_object($estimatedGateArrivalObject)){?>
                        <p class="statusValue"><?=$estimatedGateArrivalObject->format("h:i A");?> - <?=$estimatedGateArrivalObject->format("D");?> <?=$estimatedGateArrivalObject->format("M-d-Y");?></p>                       
                        <? } else{?>
                        <p class="statusValue">N/A</p>
                        <? }?>
                        <p class="statusTitle">Actual Arrival:</p>
                        <? if(is_object($actualGateArrival)){?>
                        <p class="statusValue"><?=$actualGateArrival->format("h:i A");?> - <?=$actualGateArrival->format("D");?> <?=$actualGateArrival->format("M-d-Y");?></p>                       
                        <? } else{?>
                        <p class="statusValue">N/A</p>
                        <? }?>
                        <p class="statusTitle">Local Time (UTC +<?=$arrivalUTCHour;?>):</p>
                        <? if(is_object($departureLocalTime)){?>
                        <p class="statusValue"><?=$arrivalLocalTime->format("h:i A");?> - <?=$arrivalLocalTime->format("D");?> <?=$arrivalLocalTime->format("M-d-Y");?></p>
                        <? } else{?>
                        <p class="statusValue">N/A</p>
                        <? }?>
                    </div>
                    <div class="col-sm-6">
                        <p class="status-Type">RUNWAY</p>
                        <p class="statusTitle">Scheduled Arrival:</p>
                         <? if(is_object($scheduledRunwayArrival)){?>
                        <p class="statusValue"><?=$scheduledRunwayArrival->format("h:i A");?> - <?=$scheduledRunwayArrival->format("D");?> <?=$scheduledRunwayArrival->format("M-d-Y");?></p>                       
                        <? } else{?>
                        <p class="statusValue">N/A</p>
                        <? }?>
                        <p class="statusTitle">Estimated Arrival: </p>
                        <? if(is_object($estimatedRunwayArrival)){?>
                        <p class="statusValue"><?=$estimatedRunwayArrival->format("h:i A");?> - <?=$estimatedRunwayArrival->format("D");?> <?=$estimatedRunwayArrival->format("M-d-Y");?></p>                       
                        <? } else{?>
                        <p class="statusValue">N/A</p>
                        <? }?>

                        <p class="statusTitle">Actual Arrival: </p>
                        <? if(is_object($actualRunwayArrival)){?>
                        <p class="statusValue"><?=$actualRunwayArrival->format("h:i A");?> - <?=$actualRunwayArrival->format("D");?> <?=$actualRunwayArrival->format("M-d-Y");?></p>                       
                        <? } else{?>
                        <p class="statusValue">N/A</p>
                        <? }?>
                        <p class="statusTitle">Baggage Claim:</p>
                        <p class="statusValue"><?=$baggageClaim;?></p>

                    </div>
                </div>
            </div>
        </div>

    </section>
    <section class="small-section flight-section bg-white">
        <div class="container relative">
            <div class="row fl">
                <div class="col-sm-12 fl-details">
                    <?=$code;?> <?=$airNumber;?> Flight Information
                </div>
                <div class="flightInfo">
                    <p><label>Route:</label> From <?=$route;?></p>
                    <p><label>Duration:</label> <?=$totalHours;?>h <?=$totalMinutes;?>m</p>
                    <p><label>Equipment:</label><?=$equipments?></p>
                </div>
            </div>
        </div>
    </section>
</div>
    <? }else{ ?>
        <div class="row">
            <div class="content" style="margin-top:100px;">
                <div class="alert alert-danger">
                        Sorry!! No flight details available.
                </div>
            </div>
        </div>
    <? }?>
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