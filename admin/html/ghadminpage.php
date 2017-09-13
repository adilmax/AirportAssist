<?php
$title = "Ground Handling Request Details";
$titleName = "Request Details";

include_once("header.php");
?>
<body>

<? if ($userDetails != false): ?>
    <div class="ghadminpage_wrapper">
        <legend>Request Details</legend>
        <div class="row">
            <div class="col-md-6">
                <div class="form_wrapper">
                    <p class="form_header">Contact Information</p>
                    <hr>
                    <div class="row">
                        <div class="row">
                            <div class="col-md-4">
                                <p class="Form_lable">First Name :</p>
                            </div>
                            <div class="col-md-8">
                                <p><?= ($userDetails->fname != "") ? $userDetails->fname : "-"; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="Form_lable">Last Name :</p>
                            </div>
                            <div class="col-md-8">
                                <p><?= ($userDetails->lname != "") ? $userDetails->lname : "-"; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="Form_lable">Company Name :</p>
                            </div>
                            <div class="col-md-8">
                                <p><?= ($userDetails->cname != "") ? $userDetails->cname : "-"; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="Form_lable">Phone Number :</p>
                            </div>
                            <div class="col-md-8">
                                <p><?= ($userDetails->mobileNumber != "") ? $userDetails->mobileNumber : "-"; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="Form_lable">Country :</p>
                            </div>
                            <div class="col-md-8">
                                <p><?= ($userDetails->country != "") ? $userDetails->country : "-"; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="Form_lable">Email Address :</p>
                            </div>
                            <div class="col-md-8">
                                <p><?= ($userDetails->email != "") ? $userDetails->email : "-"; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="Form_lable">Address :</p>
                            </div>
                            <div class="col-md-8">
                                <p><?= ($userDetails->address != "") ? $userDetails->address : "-"; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="Form_lable">SITATEX :</p>
                            </div>
                            <div class="col-md-8">
                                <p><?= ($userDetails->SITATEX != "") ? $userDetails->SITATEX : "-"; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="Form_lable">Fax :</p>
                            </div>
                            <div class="col-md-8">
                                <p><?= ($userDetails->fax != "") ? $userDetails->fax : "-"; ?></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form_wrapper"
                ">
                <p class="form_header">Flight Information</p>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <p class="Form_lable">Airport Where Service Required :</p>
                    </div>
                    <div class="col-md-6">
                        <p><?= ($userDetails->servicePlace != "") ? $userDetails->servicePlace : "-"; ?></p>
                    </div>
                    <div class="col-md-6">
                        <p class="Form_lable">Airport Type :</p>
                    </div>
                    <div class="col-md-6">
                        <p><?= ($userDetails->aircraftType != "") ? $userDetails->aircraftType : "-"; ?></p>
                    </div>
                    <div class="col-md-6">
                        <p class="Form_lable">Airport Registry :</p>
                    </div>
                    <div class="col-md-6">
                        <p><?= ($userDetails->aircraftRegistry != "") ? $userDetails->aircraftRegistry : "-"; ?></p>
                    </div>
                    <div class="col-md-6">
                        <p class="Form_lable">Flight Category :</p>
                    </div>
                    <div class="col-md-6">
                        <p><?= ($userDetails->flightCat != "") ? $userDetails->flightCat : "-"; ?></p>
                    </div>
                    <div class="col-md-6">
                        <p class="Form_lable">Flight Number :</p>
                    </div>
                    <div class="col-md-6">
                        <p><?= ($userDetails->flightNumber != "") ? $userDetails->flightNumber : "-"; ?></p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="Form_lable">Arrival Date & Tim:</p>
                        </div>
                        <div class="col-md-6">
                            <?php if ($userDetails->arrivalDate != "") { ?>
                                <p><?= ($userDetails->arrivalDate->format("d-F-Y") != "") ? $userDetails->arrivalDate->format("d-F-Y") : " "; ?></p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="Form_lable">UTC TIME :</p>
                        </div>
                        <div class="col-md-6">
                            <p><?= ($userDetails->arrivalTime != "") ? $userDetails->arrivalTime : "-"; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="Form_lable">Arriving From Origin Airport :</p>
                        </div>
                        <div class="col-md-6">
                            <p><?= ($userDetails->originAirport != "") ? $userDetails->originAirport : "-"; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="Form_lable">Date Of Departure :</p>
                        </div>
                        <div class="col-md-6">
                            <?php
                            if ($userDetails->departureDate != "") {
                                ?>
                                <p><?= ($userDetails->departureDate->format("d-F-Y") != "") ? $userDetails->departureDate->format("d-F-Y") : "-"; ?></p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="Form_lable">UTC TIME :</p>
                        </div>
                        <div class="col-md-6">
                            <p><?= ($userDetails->departureTime != "") ? $userDetails->departureTime : "-"; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="Form_lable">Departing To Destination Airport :</p>
                        </div>
                        <div class="col-md-6">
                            <p><?= ($userDetails->destinationAirport != "") ? $userDetails->destinationAirport : "-"; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="Form_lable">Will You Require Fuel :</p>
                        </div>
                        <div class="col-md-6">
                            <p><?= ($userDetails->fuelRequirement != "") ? $userDetails->fuelRequirement : "-"; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="Form_lable">Operator :</p>
                        </div>
                        <div class="col-md-6">
                            <p><?= ($userDetails->operator != "") ? $userDetails->operator : "-"; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="Form_lable">Purpose Of Flight :</p>
                        </div>
                        <div class="col-md-6">
                            <p><?= ($userDetails->purpose != "") ? $userDetails->purpose : "-"; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form_wrapper"
            ">
            <p class="form_header">Crew and Passenger Information</p>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <p class="Form_lable">Captain's Name :</p>
                </div>
                <div class="col-md-6">
                    <p><?= ($userDetails->capName != "") ? $userDetails->capName : "-"; ?>
                </div>
                <div class="col-md-6">
                    <p class="Form_lable">Captain's Mobile :</p>
                </div>
                <div class="col-md-6">
                    <p><?= ($userDetails->capMobileNumber != "") ? $userDetails->capMobileNumber : "-"; ?>
                </div>
                <div class="col-md-6">
                    <p class="Form_lable">Number Of Crew Arriving :</p>
                </div>
                <div class="col-md-6">
                    <p><?= ($userDetails->numCrewArrival != "") ? $userDetails->numCrewArrival : "-"; ?>
                </div>
                <div class="col-md-6">
                    <p class="Form_lable">Number Of Crew Departing:</p>
                </div>
                <div class="col-md-6">
                    <p><?= ($userDetails->numCrewDeparture != "") ? $userDetails->numCrewDeparture : "-"; ?>
                </div>
                <div class="col-md-6">
                    <p class="Form_lable">Number Of Passangers Arriving :</p>
                </div>
                <div class="col-md-6">
                    <p><?= ($userDetails->numPassengerArrival != "") ? $userDetails->numPassengerArrival : "-"; ?>
                </div>
                <div class="col-md-6">
                    <p class="Form_lable">Number Of Passangers Departing :</p>
                </div>
                <div class="col-md-6">
                    <p><?= ($userDetails->numPassengerDeparture != "") ? $userDetails->numPassengerDeparture : "-"; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form_wrapper"
        ">
        <p class="form_header">RAMP SERVICES</p>
        <hr>
        <div class="row">
            <div class="row">
                <div class="col-md-6">
                    <p class="Form_lable">Ground Support / Handling Offerings :</p>
                </div>
                <div class="col-md-6">
                    <p><?php if (count($userDetails->rampSupport) > 0) {
                            for ($i = 0; $i < count($userDetails->rampSupport); $i++) {
                                echo $userDetails->rampSupport[$i];
                                echo "<br>";
                            }
                        } else {
                            echo "-";
                        } ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p class="Form_lable">Ground Equipment :</p>
                </div>
                <div class="col-md-6">
                    <p><?php if (count($userDetails->rampEquipment) > 0) {
                            for ($i = 0; $i < count($userDetails->rampEquipment); $i++) {
                                echo $userDetails->rampEquipment[$i];
                                echo "<br>";
                            }
                        } else {
                            echo "-";
                        } ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p class="Form_lable">VIP PASSENGER HANDLING:</p>
                </div>
                <div class="col-md-6">
                    <p><?php if (count($userDetails->vipServices) > 0) {
                            for ($i = 0; $i < count($userDetails->vipServices); $i++) {
                                echo $userDetails->vipServices[$i];
                                echo "<br>";
                            }
                        } else {
                            echo "-";
                        } ?></p>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>

<? endif ?>

</body>

<?php
include_once("footer.php"); ?>
