<?php
/**
 * Created by PhpStorm.
 * User: Adil
 * Date: 3/23/2017
 * Time: 1:51 PM
 */

$title = "India Service Request Details";
$titleName = "India Service Request Details";
require_once('header.php');?>

<div class="row service_text_bg_color">
    <div class="container " style="margin-top: 80px;">
        <form action="" method="post" class="form-horizontal form_top" >
            <? if($status){?>
                <div class="alert alert-danger" role="alert">
                    Sorry.. Not a valid confirmation code.
                </div>
            <? } ?>
            <? if($userDetails != false):?>
                <fieldset>
                    <legend>Request Details</legend>
                    <div class="form-group" style="margin-top: 40px;">
                        <label class="col-sm-3 control-label">Domain Name:</label>
                        <div class="col-sm-9 label_top"><?=$userDetails->domainName?></div>
                    </div>
                    <div class="form-group" style="margin-top: 40px;">
                        <label class="col-sm-3 control-label">Origin Airport:</label>
                        <div class="col-sm-9 label_top"><?= ($userDetails->originAirport != "") ? $userDetails->originAirport : "-"; ?></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Arrival Airport:</label>
                        <div class="col-sm-9 label_top"><?= ($userDetails->arrivalAirport != "") ? $userDetails->arrivalAirport : "-"?></div>
                    </div>
                    <div class="form-group" style="margin-top: 40px;">
                        <label class="col-sm-3 control-label">Departure Airport:</label>
                        <div class="col-sm-9 label_top"><?= ($userDetails->departureAirport != "") ? $userDetails->departureAirport : "-" ?></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Destination Airport:</label>
                        <div class="col-sm-9 label_top"><?= ($userDetails->destinationAirport != "") ? $userDetails->destinationAirport : "-"?></div>
                    </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Transit Flight Number:</label>
                            <div class="col-sm-9 label_top"><?= ($userDetails->transitFlightNumber != "") ? $userDetails->transitFlightNumber : "-"?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Departure Flight Number:</label>
                            <div class="col-sm-9 label_top"><?= ($userDetails->departureFlightNumber != "") ? $userDetails->departureFlightNumber : "-"?></div>
                        </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Flight Number:</label>
                        <div class="col-sm-9 label_top"><?= ($userDetails->flightNumber != "") ? $userDetails->flightNumber : "-"?></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Arrival Date & Time:</label>
                        <div class="col-sm-9 label_top"><?= ($userDetails->arrivalTime != "") ? $userDetails->arrivalTime : "-"?></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Departure Date & Time:</label>
                        <div class="col-sm-9 label_top"><?= ($userDetails->departureTime != "") ? $userDetails->departureTime : "-"?></div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">India Service:</label>
                        <div class="col-sm-9 label_top"><?= ($userDetails->indiaServices != "") ? $userDetails->indiaServices : "-" ?></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Full Name:</label>
                        <div class="col-sm-9 label_top"><?=$userDetails->title.". ".$userDetails->firstName." ".$userDetails->lastName?></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email:</label>
                        <div class="col-sm-9 label_top"><?= ($userDetails->email !="") ? $userDetails->email : "-"?> </div>
                    </div>
                   
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Address:</label>
                        <div class="col-sm-9 label_top"><?= ($userDetails->pickUpOrDropAddress != "") ? $userDetails->pickUpOrDropAddress : "-"?></div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Payment Status:</label>
                        <div class="col-sm-9 label_top"><?=($userDetails->paymentStatus)?"<div class='success_box'>Paid</div>":"<div class='pending_box'>Pending</div>";?></div>
                    </div>
                    <?if($userDetails->paymentStatus):?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Transaction ID:</label>
                            <div class="col-sm-9 label_top"><?=$userDetails->transactionID;?></div>
                        </div>
                    <? endif ;?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Total Amount(<?=($userDetails->currency !="")?strtoupper($userDetails->currency->currencyCode):"";?>) </label>
                        <div class="col-sm-7 label_top">    <input type="text" class="form-control" name="totalAmount" id="totalAmount" placeholder="Enter Total Amount" value="<?=($userDetails->totalAmount!="")?$userDetails->totalAmount:""?>"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Advance Amount(<?=($userDetails->currency !="")?strtoupper($userDetails->currency->currencyCode):"";?>) </label>
                        <div class="col-sm-7 label_top">    <input type="text" class="form-control" name="advanceAmount" id="advanceAmount" placeholder="Enter Advance Amount" value="<?=($userDetails->advanceAmount!="")?$userDetails->advanceAmount:""?>"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3 control-label"> <input type="button" class="btn btn-default register_button" id="amountButton" value="Update">

                        </div>

                    </div>

                    <input type="hidden" name="conCode" id="conCode" value="<?= $conCode;?>">
                </fieldset>

            <? endif; ?>

        </form>
    </div>
</div>
<? require_once('footer.php');?>
<script type="text/javascript">
    $(function() {
        $.validate();
        $("#amountButton").click(function(){
            $("#amountButton").val('Updating..');
            var conCode = $("#conCode").val();
            var amount = $("#totalAmount").val();
            var advanceAmount = $("#advanceAmount").val();
            $.post("updateamount.php",{amount:amount,conCode:conCode,advance:advanceAmount},function(data){
                if(data){
                    $("#amountButton").val('Updated');
                }else{
                    alert("sorry something went wrong. Please try after some time.")
                }
            });
        });
    });
</script>