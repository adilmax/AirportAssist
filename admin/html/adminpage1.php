<? $title = "Request Details";
$titleName = "Request Details";
require_once('header.php'); ?>

<div class="row service_text_bg_color">
    <div class="container " style="margin-top: 80px;">
        <form action="" method="post" class="form-horizontal form_top">
            <? if ($status) { ?>
                <div class="alert alert-danger" role="alert">
                    Sorry.. Not a valid confirmation code.
                </div>
            <? } ?>
            <? if ($userDetails != false): ?>
                <fieldset>
                    <legend>Request Details</legend>
                    <div class="form-group" style="margin-top: 40px;">
                        <label class="col-sm-3 control-label">Domain Name:</label>
                        <div class="col-sm-9 label_top"><?= $userDetails->domainName ?></div>
                    </div>
                    <div class="form-group" style="margin-top: 40px;">
                        <label class="col-sm-3 control-label">Origin Airport:</label>
                        <div class="col-sm-9 label_top"><?= $userDetails->originAirport ?></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Arrival Airport:</label>
                        <div class="col-sm-9 label_top"><?= $userDetails->arrivalAirport ?></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Flight Type:</label>
                        <div class="col-sm-9 label_top"><?= $flightType[$userDetails->flightType]; ?></div>
                    </div>
                    <? if ($userDetails->flightType == 3) { ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Transit Flight Number:</label>
                            <div class="col-sm-9 label_top"><?= $userDetails->transitFlightNumber ?></div>
                        </div>
                    <? } ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Flight Number:</label>
                        <div class="col-sm-9 label_top"><?= $userDetails->flightNumber ?></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Adults:</label>
                        <div class="col-sm-9 label_top"><?= $userDetails->adult ?></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Children:</label>
                        <div class="col-sm-9 label_top"><?= $userDetails->children ?></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Infants:</label>
                        <div class="col-sm-9 label_top"><?= $userDetails->infants ?></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Class Of Travel:</label>
                        <div class="col-sm-9 label_top"><?= ($userDetails->classOfTravel != "") ? $classOfTravel[$userDetails->classOfTravel] : "-"; ?></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Arrival Date & Time:</label>
                        <div class="col-sm-9 label_top"><?= $userDetails->arrivalTime ?></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Departure Date & Time:</label>
                        <div class="col-sm-9 label_top"><?= $userDetails->departureTime; ?></div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Service Type:</label>
                        <div class="col-sm-9 label_top"><?
                            if ($userDetails->service != "") {
                                $userDetails->service->fetch();
                                $userDetails->service->serviceType->fetch();
                                $userDetails->service->serviceType->getObjectId();
                                echo $userDetails->service->serviceType->title;
                            } else if ($userDetails->serviceType != "") {
                                $userDetails->serviceType->fetch();
                                echo $userDetails->serviceType->title;
                            } else {

                                echo "-";
                            } ?></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Service:</label>
                        <div class="col-sm-9 label_top"><? if ($userDetails->service != "") {
                                $userDetails->service->fetch();
                                echo $userDetails->service->title;
                            } else {
                                echo "-";
                            } ?></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Full Name:</label>
                        <div class="col-sm-9 label_top"><?= $userDetails->title . ". " . $userDetails->firstName . " " . $userDetails->lastName ?></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email:</label>
                        <div class="col-sm-9 label_top"><?= $userDetails->email ?></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Mobile Number:</label>
                        <div class="col-sm-9 label_top"><?= $userDetails->mobile ?></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Message:</label>
                        <div class="col-sm-9 label_top"><?= $userDetails->message ?></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Network Id:</label>
                        <div class="col-sm-9 label_top">
                            <?php
                            if ($userDetails->agentOrCorporateID != "") {
                                $userDetails->agentOrCorporateID->fetch();
                                echo $userDetails->agentOrCorporateID->getObjectId();
                            } else {
                                echo "-";
                            }

                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Type:</label>
                        <div class="col-sm-9 label_top">
                            <?php
                            if ($userDetails->agentOrCorporateID != "") {
                                if ($userDetails->agentOrCorporateID->isCorporate == true) {
                                    echo "Corporate";
                                } else if ($userDetails->agentOrCorporateID->isAgent == true) {
                                    echo "Agency";
                                } else {
                                    echo "-";
                                }
                            } else {
                                echo "-";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Name:</label>
                        <div class="col-sm-9 label_top">
                            <?php
                            if ($userDetails->agentOrCorporateID != "") {
                                if ($userDetails->agentOrCorporateID->isCorporate == true) {
                                    echo $userDetails->agentOrCorporateID->companyName;
                                } else if ($userDetails->agentOrCorporateID->isAgent == true) {
                                    echo $userDetails->agentOrCorporateID->agencyName;
                                } else {
                                    echo "-";
                                }
                            } else {
                                echo "-";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email:</label>
                        <div class="col-sm-9 label_top">
                            <?php
                            if ($userDetails->agentOrCorporateID != "") {
                                echo $userDetails->agentOrCorporateID->email;
                            } else {
                                echo "-";
                            }
                            ?></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Contact Number:</label>
                        <div class="col-sm-9 label_top"><?
                            if ($userDetails->agentOrCorporateID != "") {
                                echo $userDetails->agentOrCorporateID->contactNumber;
                            } else {
                                echo "-";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Request Status:</label>
                        <div class="col-sm-9 label_top"><?=$requestStatusValue;?></div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-3 control-label">Repeating Customer</label>
                        <div class="col-sm-9 label_top"><?= ($userDetails->isRepeatCustomer==true) ? 'Yes' : 'No'; ?></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Admin Comment:</label>
                        <div class="col-sm-9 label_top"><?=($userDetails->comment!="")?$userDetails->comment:"-";?></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Payment Status:</label>
                        <div class="col-sm-9 label_top"><?= ($userDetails->paymentStatus) ? "<div class='success_box'>Paid</div>" : "<div class='pending_box'>Pending</div>"; ?></div>
                    </div>
                    <? if ($userDetails->paymentStatus): ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Transaction ID:</label>
                            <div class="col-sm-9 label_top"><?= $userDetails->transactionID; ?></div>
                        </div>
                    <? endif; ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Total
                            Amount(<?= ($userDetails->currency != "") ? strtoupper($userDetails->currency->currencyCode) : ""; ?>
                            ) </label>
                        <div class="col-sm-7 label_top"><input type="text" class="form-control" name="totalAmount"
                                                               id="totalAmount" placeholder="Enter Total Amount"
                                                               value="<?= ($userDetails->totalAmount != "") ? $userDetails->totalAmount : "" ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Advance
                            Amount(<?= ($userDetails->currency != "") ? strtoupper($userDetails->currency->currencyCode) : ""; ?>
                            ) </label>
                        <div class="col-sm-7 label_top"><input type="text" class="form-control" name="advanceAmount"
                                                               id="advanceAmount" placeholder="Enter Advance Amount"
                                                               value="<?= ($userDetails->advanceAmount != "") ? $userDetails->advanceAmount : "" ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3 control-label">
                            <input type="button" class="btn btn-default register_button" id="amountButton"
                                   value="Update Amount">
                        </div>

                        <div class="col-sm-2 control-label">
                            <a href="edituserdetails.php?userId=<?php echo $userDetails->getObjectId(); ?>" class="btn btn-success">Update Details</a>
                        </div> 
                    </div>
                    <input type="hidden" name="conCode" id="conCode" value="<?= $conCode; ?>">
                    <input id="closedPersonName" value="<?=$closedPersonName;?>" name="closedPersonName" type="hidden">
                </fieldset>
            <? endif; ?>
        </form>
    </div>
</div>
<? require_once('footer.php'); ?>
<script type="text/javascript">
    $(function () {
        $.validate();
        $("#amountButton").click(function () {
            $("#amountButton").val('Updating..');
            var conCode = $("#conCode").val();
            var amount = $("#totalAmount").val();
            var advanceAmount = $("#advanceAmount").val();
            var closedPersonName = $("#closedPersonName").val();
            $.post("updateamount.php", {amount: amount, conCode: conCode, advance: advanceAmount,closedPersonName:closedPersonName}, function (data) {
                if (data) {
                    $("#amountButton").val('Updated');
                } else {
                    alert("sorry something went wrong. Please try after some time.")
                }
            });
        });
    });
</script>
  
       