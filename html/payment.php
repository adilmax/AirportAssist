<?
$title = "MUrgency Airport Assistance| Payment";
$titleName = "Payment";
$content = $titleValue . "payment page to confirm and pay for Departure, Arrival, Transfer / Transit & Lounge Services offered across 500+ Airports around the world (North America, South America, Africa, Europe, Asia and Australasia – Oceania)";
require_once('header.php'); ?>
<div class="middle_image faq-subpage">
    <div></div>
</div>
<div class="row service_text_bg_color">
    <div class="container " style="margin-top: 80px;">
        <form action="" method="post" class="form-horizontal form_top">
            <fieldset>
                <legend><h1>Payment</h1></legend>
                <div class="form-group" style="margin-top:40px;">
                    <label class="col-sm-3 control-label" for="confirmationCode">Service Request Code</label>
                    <div class="col-sm-9 ">
                    <input type="text" class="form-control" name="confirmation" id="confirmation"
                     value="<?=$paymentID;?>"
                                                  placeholder="Enter Service Request Code"
                                                  data-validation="required"
                                                  data-validation-error-msg-required="You must enter a Confirmation Code">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <input type="submit" class="btn btn-default register_button" name="conCode" value="Submit">
                    </div>
                </div>
            </fieldset>
            <? if ($status) { ?>
                <div class="alert alert-danger" role="alert">
                    Sorry.. Not a valid confirmation code.
                </div>
            <? } ?>
        </form>

        <? if ($userDetails != false): ?>
        <form action="" method="post" class="form-horizontal form_top">
            <fieldset>
                <legend>User Details</legend>
                <input type="hidden" name="objectId" value="<?=$userDetails->getObjectId();?>">
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
                    <div class="col-sm-9 label_top"><?= $flightType[$userDetails->flightType] ?></div>
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
                    <div
                        class="col-sm-9 label_top"><?= ($userDetails->classOfTravel != "") ? $classOfTravel[$userDetails->classOfTravel] : "-"; ?></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Arrival Date & Time:</label>
                    <div class="col-sm-9 label_top"><?= $userDetails->arrivalTime ?></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Service Type:</label>
                    <div class="col-sm-9 label_top"><? if ($userDetails->service != "") {
                            $userDetails->service->fetch();
                            $userDetails->service->serviceType->fetch();
                            echo $userDetails->service->serviceType->title;
                        } else {
                            echo "-";
                        } ?></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Service:</label>
                    <div class="col-sm-9 label_top"><? echo $userDetails->service->title ?></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Full Name:</label>
                    <div
                        class="col-sm-9 label_top"><?= $userDetails->title . ". " . $userDetails->firstName . " " . $userDetails->lastName ?></div>
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
                    <label class="col-sm-3 control-label">Total Amount:</label>
                    <div class="col-sm-9 label_top">
                        (<?= ($userDetails->currency != "") ? strtoupper($userDetails->currency->currencyCode) : "USD"; ?>
                        ) <?= $userDetails->totalAmount ?></div>
                    <input type="hidden" name="totalAmount" id="totalAmount" value="<?= $userDetails->totalAmount ?>">
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Advance Amount:</label>
                    <div class="col-sm-9 label_top">
                        (<?= ($userDetails->currency != "") ? strtoupper($userDetails->currency->currencyCode) : "USD"; ?>
                        ) <?= $userDetails->advanceAmount ?></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Pending Amount:</label>
                    <div class="col-sm-9 label_top">
                        (<?= ($userDetails->currency != "") ? strtoupper($userDetails->currency->currencyCode) : "USD"; ?>
                        ) <?= $userDetails->totalAmount - $userDetails->advanceAmount ?></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Payment Status:</label>
                    <div
                        class="col-sm-9 label_top"><?= ($userDetails->paymentStatus) ? "<div class='success_box'>Paid</div>" : "<div class='pending_box'>Pending</div>"; ?></div>
                </div>
                <? if ($userDetails->paymentStatus): ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Transaction ID:</label>
                        <div class="col-sm-9 label_top"><?= $userDetails->transactionID; ?></div>
                    </div>
                <? endif; ?>
                <div class="row">
                    <form action="" method="post">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Coupon Code:</label>
                            <div class="form-group col-md-3">
                                <input type="text" value=""
                                       class="form-control place_holder field_color" name="cardCode" id="cardCode"
                                       placeholder="Enter Gift Card Code">
                                <div id="couponError" style="color: #c4332f;margin-top: 5px;"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-1 ">
                                    <input type="button" class="btn btn-danger" name="cardButton" id="cardButton"
                                           value="Apply Coupon">
                                    <input type="button" class="btn btn-danger" name="removeButton" id="removeButton"
                                           value="Remove Coupon" style="display: none;">
                                    <div class="gif_load" id="loader"></div>
                            </div>

                            <div id="couponAmount" class="hideField">
                                <div class="row">
                                    <div class="col-sm-3 control-label">Amount:</div>
                                    <div class="form-group col-md-3">
                                        <input type="text" value="" class="form-control field_color place_holder"
                                               name="amount" id="amount" placeholder="Enter Amount">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 control-label">Payable Amount :</div>
                                    <div class="form-group col-md-3">
                                        <div id="balance" style="padding-top: 8px;"></div>
                                    </div>
                                </div>
                            </div>

                    </form>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">
                        <button type="submit" class="btn btn-success" name="makePayment" role="button">Make Payment</button>
                    </label>
                </div>
            </fieldset>

            <? endif; ?>

        </form>
    </div>
</div>
<div style="display: none">
    Emergency Airport Assistance payment page to confirm and pay for Departure, Arrival, Transfer / Transit & Lounge
    Services offered across 500+ Airports around the world (North America, South America, Africa, Europe, Asia and
    Australasia – Oceania)";

</div>
<? require_once('footer.php'); ?>


<script type="text/javascript">
    $(function () {
        $.validate();
    });
    $("#cardButton").click(function (event) {
        if ($("#cardCode").val() != "") {
            $("#loader").fadeIn("slow").delay(3000).fadeOut("slow");
            $("#couponError").hide();
            var code = $("#cardCode").val();
            var totalAmount = $("#totalAmount").val();
            $.post("fetchgiftamount.php", {cardCode: code, totalAmount: totalAmount}, function (data) {
                
                if (data != false) {

                    $("#couponAmount").show();
                    $("#amount").val(data);
                    $("#cardButton").hide();
                    $("#removeButton").show();
                    if (parseInt(data) < parseInt(totalAmount)) {
                        var balance = totalAmount - data;
                        $('#balance').html(balance);
                    }
                    else if (parseInt(data) >= parseInt(totalAmount)) {
                        var balance = 0;
                        $('#balance').html(balance);
                    }


                } else {
                    $("#couponError").show();
                    $("#couponError").html("invalid Coupon code");
                }
            });
        } else {
            $("#couponError").html("Must enter your Coupon code");

        }
        event.preventDefault();
    });
    $("#amount").change(function (e) {
        $("#loader").fadeIn("slow").delay(3000).fadeOut("slow");
        var code = $("#cardCode").val();
        var totalAmount = parseInt($("#totalAmount").val());
        var amount = parseInt($('#amount').val());

        $.post("fetchgiftamount.php", {cardCode: code, totalAmount: totalAmount}, function (data) {

            if (data) {

                if (parseInt(data) >= parseInt(amount)) {

                    if (amount < totalAmount) {
                        var balance = totalAmount - amount;
                        $('#balance').html(balance);
                    }
                    else if (amount >= totalAmount) {
                        var balance = amount - totalAmount;
                        $('#balance').html(balance);
                    }

                } else {
                    alert('Enter Amount is greater than coupon amount');
                }


            } else {
                alert("sorry something went wrong. Please try after some time.")
            }
            e.preventDefault();
        });
    });
    $("#removeButton").click(function () {
        $("#amount").val("");
        $("#cardCode").val("");
        $("#couponAmount").hide();
        $("#removeButton").hide();
        $("#cardButton").show();
  });

</script>
  
       