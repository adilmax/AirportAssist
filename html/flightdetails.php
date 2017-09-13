<?php
$title = "flight Tracker Details";
$source = "test";
$class = "flight-body-background";

require_once 'html/header_inner.php';
//----------------------------------------------------

if (isset($flightDetails) && !empty($flightDetails)) {
    if (isset($flightDetails['flightStatuses']) && !empty($flightDetails['flightStatuses'])) {
        $arr = $flightDetails['appendix']['airports'];
        for ($i = 0; $i < count($arr); $i++) {
            $cityName[$arr[$i]['fs']] = array("airportName" => $arr[$i]['name'], "cityName" => $arr[$i]['city'], "cityCode" => $arr[$i]['cityCode']);
        }
        
        if(count($flightDetails['appendix']['airlines'])>0){
            for($i=0;$i<count($flightDetails['appendix']['airlines']);$i++){
                if($flightDetails['appendix']['airlines'][$i]['fs'] == strtoupper($airlineCode)){
                    $data_array['flightName'] = $flightDetails['appendix']['airlines'][$i]['name'];
                }
            }
        }else{
            $data_array['flightName'] = $flightDetails['appendix']['airlines'][0]['name'];
        }
        
        
        $data_array['flightCode'] = $flightDetails['flightStatuses'][0]['carrierFsCode'];
        $data_array['flightNumber'] = $flightDetails['flightStatuses'][0]['flightNumber'];
        $data_array['searchDate'] = date_format(date_create($flightDetails['request']['date']['interpreted']), "D, d M");
        $data_array['flightCount'] = count($flightDetails['flightStatuses']);
        $data_array['searchFormDate'] = date_format(date_create($flightDetails['request']['date']['interpreted']), "Y/m/d");

        ?>

        <!-- html part starts -->
		<div class="flight-search-header">
			<h4 id="flightHeading">Flight Status</h4>
		</div>
        <section class="flight-search-wrapper">
            <form action="flightdetails.php" method="post" id="byFlight-form" class="has-validation-callback">
                <div class="row">
                    <div class="col-md-3">
                        <label for="airlineName">Airline Name/Code</label>
                        <input type="text" class="form-control mt-mb" name="airlineName" id="airlineName" required="true"
                               value="<?= $data_array['flightCode'] ?>" placeholder="">
                    </div>
                    <div class="col-md-3">
                        <label for="flightNumber">Flight Number</label>
                        <input type="text" class="form-control mt-mb" name="flightNumber" id="flightNumbers" required="true"
                               value="<?= $data_array['flightNumber'] ?>" placeholder="">
                    </div>
                    <div class="col-md-3">
                        <label for="date">Departure Date</label>
                        <input type="text" class="form-control mt-mb" name="date" id="date" required="true"
                               value="<?= $data_array['searchFormDate'] ?>" placeholder="">
                    </div>
                    <div class="col-md-3">
                        <label for="flightSerachNumber">&nbsp;</label>
                        <button type="submit" class="btn btn-danger btn-block m-b" name="flightSerachNumber" name="1"
                                id="flightSerachNumber">SEARCH FLIGHT
                        </button>
                    </div>
                </div>
            </form>
        </section>

        <section class="flight-main-wrapper">
            <div class="container-fluid flight-upper-wrapper">
                <h3 class="airNameNumber"><?= $data_array['flightName'] . " " . $data_array['flightCode'] . " " . $data_array['flightNumber'] ?></h3>
                <h5 class="flight-grey-color font-weight-bold"><?= $data_array['flightCount'] ?> flight(s) found</h5>
                <p class="flight-wrapper-date"><?= $data_array['searchDate'] ?></p>
            </div>

            <div class="panel-group" id="accordion">


                <?

                //flight rows
                $flightrows = '';
                $arr = $flightDetails['flightStatuses'];
                for ($i = 0; $i < count($arr); $i++) {
                    $data_row['rowCount'] = $i + 1;
                    $data_row['rowShow'] = $i == 0 ? "in" : "";
                    $data_row['arrow'] = $i == 0 ? "up" : "down";


                    $data_row['departureCity'] = $cityName[$arr[$i]['departureAirportFsCode']]['cityName'];
                    $data_row['arrivalCity'] = $cityName[$arr[$i]['arrivalAirportFsCode']]['cityName'];;


                    $data_row['departureAirportCode'] = $arr[$i]['departureAirportFsCode'];
                    $data_row['arrivalAirportCode'] = $arr[$i]['arrivalAirportFsCode'];


                    $data_row['departureTerminal'] = (isset($arr[$i]['airportResources']['departureTerminal'])) ? $arr[$i]['airportResources']['departureTerminal'] : "-";
                    $data_row['arrivalTerminal'] = (isset($arr[$i]['airportResources']['arrivalTerminal'])) ? $arr[$i]['airportResources']['arrivalTerminal'] : "-";


                    $data_row['departureGate'] = (isset($arr[$i]['airportResources']['departureGate'])) ? $arr[$i]['airportResources']['departureGate'] : "-";
                    $data_row['arrivalGate'] = (isset($arr[$i]['airportResources']['arrivalGate'])) ? $arr[$i]['airportResources']['arrivalGate'] : "-";


                    $data_row['scheduleDepartureDate'] = $fObj->converToDate($arr[$i]['departureDate']['dateLocal']);
                    $data_row['scheduleArrivalDate'] = $fObj->converToDate($arr[$i]['arrivalDate']['dateLocal']);


                    $data_row['scheduleDepartureTime'] = $fObj->converToTime($arr[$i]['operationalTimes']['publishedDeparture']['dateLocal']);
                    $data_row['scheduleArrivalTime'] = $fObj->converToTime($arr[$i]['operationalTimes']['publishedArrival']['dateLocal']);


                    $data_row['flightCode'] = $arr[$i]['carrierFsCode'] . ' ' . $arr[$i]['flightNumber'];


// delay condition
///////////////////////////////////////////////////////////////////////////////////////////////////////
                    if (isset($arr[$i]['delays'])) {
                        if (isset($arr[$i]['delays']['arrivalGateDelayMinutes']))
                            $delayMinutes = $arr[$i]['delays']['arrivalGateDelayMinutes'];
                        else if (isset($arr[$i]['delays']['departureGateDelayMinutes']))
                            $delayMinutes = $arr[$i]['delays']['departureGateDelayMinutes'];
                        else
                            $delayMinutes = 0;
                    }


                    if (isset($delayMinutes) && $delayMinutes >= 5) {
                        $date2 = strtotime($fObj->converToTime($arr[$i]['operationalTimes']['publishedDeparture']['dateUtc'])) + ($delayMinutes * 60);
                        $date3 = strtotime($fObj->converToTime($arr[$i]['operationalTimes']['publishedArrival']['dateUtc'])) + ($delayMinutes * 60);

                        $flightTimesClass = "flight-red-color";
                        $flightRangeClass = "delayRangeClass";
                        $flightStatusClass = "flight-delayed";

                        switch ($arr[$i]['status']) {
                            case 'L':
                                $flightStatus = "LANDED : DELAYED BY " . $delayMinutes . " MIN";
                                $data_row['flightPosition'] = "100";

                                break;
                            case 'A':
                                $currentTime = gmdate(DATE_ATOM);
                                $date1 = strtotime($currentTime);
                                $date2 = strtotime($fObj->converToTime($arr[$i]['operationalTimes']['publishedDeparture']['dateUtc'])) + ($delayMinutes * 60);
                                $date3 = strtotime($fObj->converToTime($arr[$i]['operationalTimes']['publishedArrival']['dateUtc'])) + ($delayMinutes * 60);

                                if ($date1 < $date2) {
                                    $flightStatus = "SCHEDULED : DELAYED BY " . $delayMinutes . " MIN";
                                    $data_row['flightPosition'] = "0";
                                } else if ($date1 > $date2 && $date1 < $date3) {
                                    $flightStatus = "EN ROUTE : DELAYED BY " . $delayMinutes . " MIN";
                                    $data_row['flightPosition'] = "50";
                                } else if ($date1 > $date3) {
                                    $flightStatus = "LANDED : DELAYED BY " . $delayMinutes . " MIN";
                                    $data_row['flightPosition'] = "100";
                                }

                                break;

                            default:
                                $flightStatus = $flightStatusArray[$arr[$i]['status']] . " : DELAYED BY " . $delayMinutes . " MIN";
                                $data_row['flightPosition'] = "0";

                                break;
                        }
                    } else {
                        $flightTimesClass = "flight-green-color";
                        $flightRangeClass = "rangeClass";
                        $flightStatusClass = "flight-scheduled";

                        switch ($arr[$i]['status']) {
                            case 'L':
                                $flightStatus = "LANDED : ON TIME";
                                $data_row['flightPosition'] = "100";

                                break;
                            case 'A':
                                $currentTime = gmdate(DATE_ATOM);
                                $date1 = strtotime($currentTime);
                                $date2 = strtotime($arr[$i]['operationalTimes']['publishedDeparture']['dateUtc']);
                                $date3 = strtotime($arr[$i]['operationalTimes']['publishedArrival']['dateUtc']);

                                if ($date1 < $date2) {
                                    $flightStatus = "SCHEDULED : ON TIME";
                                    $data_row['flightPosition'] = "0";
                                } else if ($date1 > $date2 && $date1 < $date3) {
                                    $flightStatus = "EN ROUTE : ON TIME";
                                    $data_row['flightPosition'] = "50";
                                } else if ($date1 > $date3) {
                                    $flightStatus = "LANDED : ON TIME";
                                    $data_row['flightPosition'] = "100";
                                }

                                break;

                            default:
                                $data_row['flightPosition'] = "0";
                                $flightStatus = $flightStatusArray[$arr[$i]['status']] . " : ON TIME";

                                break;
                        }
                    }
// end delay condition
///////////////////////////////////////////////////////////////////////////////////////////////////////

                    $data_row['flightTimesClass'] = $flightTimesClass;
                    $data_row['flightRangeClass'] = $flightRangeClass;
                    $data_row['flightStatus'] = "<span class='" . $flightStatusClass . "'>" . $flightStatus . "</span>";


                    //---------departure date
                    if (isset($arr[$i]['operationalTimes']['actualGateDeparture']['dateLocal']))
                        $departureDate = $fObj->converToDate($arr[$i]['operationalTimes']['actualGateDeparture']['dateLocal']);
                    else if (isset($arr[$i]['operationalTimes']['estimatedGateDeparture']['dateLocal']))
                        $departureDate = $fObj->converToDate($arr[$i]['operationalTimes']['estimatedGateDeparture']['dateLocal']);
                    else
                        $departureDate = $data_row['scheduleDepartureDate'];


                    if (isset($arr[$i]['operationalTimes']['actualGateDeparture']['dateLocal']))
                        $departureTime = $fObj->converToTime($arr[$i]['operationalTimes']['actualGateDeparture']['dateLocal']);
                    else if (isset($arr[$i]['operationalTimes']['estimatedGateDeparture']['dateLocal']))
                        $departureTime = $fObj->converToTime($arr[$i]['operationalTimes']['estimatedGateDeparture']['dateLocal']);
                    else if (isset($delayMinutes) && $delayMinutes >= 20)
                        $departureTime = '-';
                    else
                        $departureTime = $data_row['scheduleDepartureTime'];
                    //---------departure date end


                    //---------arrival date
                    if (isset($arr[$i]['operationalTimes']['actualGateArrival']['dateLocal']))
                        $arrivalDate = $fObj->converToDate($arr[$i]['operationalTimes']['actualGateArrival']['dateLocal']);
                    else if (isset($arr[$i]['operationalTimes']['estimatedGateArrival']['dateLocal']))
                        $arrivalDate = $fObj->converToDate($arr[$i]['operationalTimes']['estimatedGateArrival']['dateLocal']);
                    else
                        $arrivalDate = $data_row['scheduleArrivalDate'];


                    if (isset($arr[$i]['operationalTimes']['actualGateArrival']['dateLocal']))
                        $arrivalTime = $fObj->converToTime($arr[$i]['operationalTimes']['actualGateArrival']['dateLocal']);
                    else if (isset($arr[$i]['operationalTimes']['estimatedGateArrival']['dateLocal']))
                        $arrivalTime = $fObj->converToTime($arr[$i]['operationalTimes']['estimatedGateArrival']['dateLocal']);
                    else if (isset($delayMinutes) && $delayMinutes >= 20)
                        $arrivalTime = '-';
                    else
                        $arrivalTime = $data_row['scheduleArrivalTime'];
                    //---------arrival date end


                    $data_row['finalDepartureDate'] = $departureDate;
                    $data_row['finalDepartureTime'] = $departureTime;

                    $data_row['finalArrivalDate'] = $arrivalDate;
                    $data_row['finalArrivalTime'] = $arrivalTime;


                    ?>

                    <!-- html flight rows start -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title" data-toggle="collapse" data-parent="#accordion"
                                 href="#collapse<?= $data_row['rowCount'] ?>">
                                <i class="fa fa-angle-<?= $data_row['arrow'] ?> fa-2x fa-2x right"
                                   aria-hidden="true"></i>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="flightCityName"><?= $data_row['departureCity'] ?>
                                            to <?= $data_row['arrivalCity'] ?> - <?= $data_row['flightCode'] ?></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <?= $data_row['flightStatus'] ?>
                                        <br>
                                        <span class="landedTime"><?= $data_row['scheduleDepartureTime'] ?> <strong>&rarr;</strong> <?= $data_row['scheduleArrivalTime'] ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="collapse<?= $data_row['rowCount'] ?>"
                             class="panel-collapse collapse <?= $data_row['rowShow'] ?>">
                            <div class="panel-body">
                                <div class="container-fluid flight-down-wrapper">
                                    <div class="row" style="text-align: center;">
                                        <div class="col-lg-2 col-md-2 col-xs-3 ">
                                            <h1 class="iataCode"><?= $data_row['departureAirportCode'] ?></h1>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-xs-6">
                                            <input type="range" min="0" max="100"
                                                   value='<?= $data_row['flightPosition'] ?>'
                                                   class='<?= $data_row['flightRangeClass'] ?>'/>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-xs-3">
                                            <h1 class="iataCode"><?= $data_row['arrivalAirportCode'] ?></h1>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-xs-12 pad-l">
                                            <div class="row ">
                                                <div class="col-md-12 col-xs-12 cityTime">
                                                    <?= $data_row['departureCity'] ?>
                                                    - <?= $data_row['finalDepartureDate'] ?>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                    <h4 class="flight-grey-color">Departure</h4>
                                                    <h3 class='<?= $data_row['flightTimesClass'] ?>'><?= $data_row['finalDepartureTime'] ?></h3>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                    <h4 class="flight-grey-color">Terminal</h4>
                                                    <h1 class="font-size14"><?= $data_row['departureTerminal'] ?></h1>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                    <h4 class="flight-grey-color">Gate</h4>
                                                    <h1 class="font-size14"><?= $data_row['departureGate'] ?></h1>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-xs-12">
                                                    <h5 class="flight-grey-color">Scheduled
                                                        departure <?= $data_row['scheduleDepartureTime'] ?></h5>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-6 col-xs-12 pad-l">
                                            <div class="hidebBorder"></div>
                                            <div class="row">
                                                <div class="col-md-12 col-xs-12 cityTime">
                                                    <?= $data_row['arrivalCity'] ?>
                                                    - <?= $data_row['finalArrivalDate'] ?>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                    <h4 class="flight-grey-color">Arrival</h4>
                                                    <h3 class='<?= $data_row['flightTimesClass'] ?>'><?= $data_row['finalArrivalTime'] ?></h3>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                    <h4 class="flight-grey-color">Terminal</h4>
                                                    <h1 class="font-size14"><?= $data_row['arrivalTerminal'] ?></h1>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                    <h4 class="flight-grey-color ">Gate</h4>
                                                    <h1 class="font-size14"><?= $data_row['arrivalGate'] ?></h1>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-xs-12">
                                                    <h5 class="flight-grey-color">Scheduled
                                                        arrival <?= $data_row['scheduleArrivalTime'] ?></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- html flight rows ends -->

                    <?
                }
                //end flight rows


                ?>


            </div>
        </section>
        <!-- html part ends -->

        <?
    } else {
        ?>

		<div class="flight-search-header">
			<h4 id="flightHeading">Flight Status</h4>
		</div>
        <!-- html part starts -->
        <section class="flight-search-wrapper">
            <form action="flightdetails.php" method="post" id="byFlight-form" class="has-validation-callback">
                <div class="row">
                    <div class="col-md-3">
                        <label for="airlineName">Airline Name/Code</label>
                        <input type="text" class="form-control" name="airlineName" id="airlineName" required="true"
                               value="<?= $airlineCode ?>" placeholder="">
                    </div>
                    <div class="col-md-3">
                        <label for="flightNumber">Flight Number</label>
                        <input type="text" class="form-control" name="flightNumber" id="flightNumbers" required="true"
                               value="<?= $airlineNumber ?>" placeholder="">
                    </div>
                    <div class="col-md-3">
                        <label for="date">Departure Date</label>
                        <input type="text" class="form-control" name="date" id="date" required="true"
                               value="<?= $departureDate ?>" placeholder="">
                    </div>
                    <div class="col-md-3">
                        <label for="flightSerachNumber">&nbsp;</label>
                        <button type="submit" class="btn btn-danger btn-block" name="flightSerachNumber" name="1"
                                id="flightSerachNumber">SEARCH FLIGHT
                        </button>
                    </div>
                </div>
            </form>
        </section>

        <div style="padding: 60px 0 70px; margin: 0 auto; width: 60%;"><h2>There are no flights to display. Please try
                another flight number.</h2></div>

        <?
    }
}
else if( isset($airlineCode) && isset($airlineNumber) &&  isset($departureDate) )
{
	?>
		<div class="flight-search-header">
			<h4 id="flightHeading">Flight Status</h4>
		</div>
		<section class="flight-search-wrapper">
			<form action="flightdetails.php" method="post" id="byFlight-form" class="has-validation-callback">
				<div class="row">
					<div class="col-md-3">
						<label for="airlineName">Airline Name/Code</label>
						<input type="text" class="form-control" name="airlineName" id="airlineName" required="true" value="<?=$airlineCode?>" placeholder="">
					</div>
					<div class="col-md-3">
						<label for="flightNumber">Flight Number</label>
						<input type="text" class="form-control" name="flightNumber" id="flightNumbers" required="true" value="<?=$airlineNumber?>" placeholder="">
					</div>
					<div class="col-md-3">
						<label for="date">Departure Date</label>
						<input type="text" class="form-control" name="date" id="date" required="true" value="<?=$departureDate?>" placeholder="">
					</div>
					<div class="col-md-3">
						<label for="flightSerachNumber">&nbsp;</label>
						<button type="submit" class="btn btn-danger btn-block" name="flightSerachNumber" name="1" id="flightSerachNumber">SEARCH FLIGHT</button>
					</div>
				</div>
			</form>
		</section>
		<div style="text-align: center; padding: 60px 0 70px; margin: 0 auto; width: 60%;"><h2>Something went wrong. Please try again later</h2></div>
	<?
}
else
{
	?>
		<div class="flight-search-header">
			<h4 id="flightHeading">Flight Status</h4>
		</div>
		<section class="flight-search-wrapper">
			<form action="flightdetails.php" method="post" id="byFlight-form" class="has-validation-callback">
				<div class="row">
					<div class="col-md-3">
						<label for="airlineName">Airline Name/Code</label>
						<input type="text" class="form-control mt-mb" name="airlineName" id="airlineName" required="true" value="" placeholder="">
					</div>
					<div class="col-md-3">
						<label for="flightNumber">Flight Number</label>
						<input type="text" class="form-control mt-mb" name="flightNumber" id="flightNumbers" required="true" value="" placeholder="">
					</div>
					<div class="col-md-3">
						<label for="date">Departure Date</label>
						<input type="text" class="form-control mt-mb" name="date" id="date" required="true" value="<?=date("Y/m/d")?>" placeholder="">
					</div>
					<div class="col-md-3">
						<label for="flightSerachNumber">&nbsp;</label>
						<button type="submit" class="btn btn-danger btn-block m-b" name="flightSerachNumber" name="1" id="flightSerachNumber">SEARCH FLIGHT</button>
					</div>
				</div>
			</form>
		</section>
	<?
}
//----------------------------------------------------
require_once 'html/footer-flight.php';
?>

<script type="text/javascript">
    $(document).ready(function () {

        $.validate();

        $('#airlineName').autocomplete({source: 'flightSearch.php', minLength: 1});

        $('#accordion .panel-collapse').on('shown.bs.collapse', function () {
            $(this).prev().find(".fa").removeClass("fa-angle-down").addClass("fa-angle-up");
        });

        //The reverse of the above on hidden event:

        $('#accordion .panel-collapse').on('hidden.bs.collapse', function () {
            $(this).prev().find(".fa").removeClass("fa-angle-up").addClass("fa-angle-down");
        });

        $("#date").datepicker({
            dateFormat: "yy/mm/dd",
            autoclose: true,
            todayBtn: true,
            minDate: -2,
            maxDate: 2
        });

    });
</script>