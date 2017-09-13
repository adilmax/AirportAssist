<? $title = "Request Details";
$titleName = "Request Details";
require_once('header.php'); ?>


<div class="row service_text_bg_color">
    <div class="container" style="margin-top: 80px;">
        <form action="" method="post" class="form-horizontal form_top">
            <? if ($status) { ?>
                <div class="alert alert-danger" role="alert">
                    Sorry.. Not a valid confirmation code.
                </div>
            <? } ?>
            <? if ($userDetails != false): ?>
                <fieldset>
                    <legend>Request Details</legend>
                    <?php if (isset($result)) {
                        if ($result == true) { ?>
                            <div class="alert alert-success alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php echo "data get updated"; ?>
                            </div>
                        <?php } else if ($result == false) { ?>
                            <div class="alert alert-danger alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php echo "data not updated"; ?>
                            </div>
                        <?php } else { ?>
                            <div class="alert alert-danger alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php echo "error while data updating"; ?>
                            </div>
                        <?php }
                    } ?>
                    <div class="form-group" style="margin-top: 40px;">
                        <label class="col-sm-3 control-label">Origin Airport:</label>
                        <div class="col-sm-9 label_top">
                            <input type="text" class="form-control" name="updateOriginAirport" id="AdminOriginAirport"
                                   value="<?= $userDetails->originAirport; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Arrival Airport:</label>
                        <div class="col-sm-9 label_top">
                            <input type="text" class="form-control" name="updateArrivalAirport" id="AdminArrivalAirport"
                                   value="<?= $userDetails->arrivalAirport; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Flight Type:</label>
                        <div class="col-sm-9 label_top">
                            <select id="FlightType" name="updateFlightType" class="form-control">
                                <?php
                                $flightType = [1 => 'Arrival', 2 => 'Departure', 3 => 'Transit'];
                                foreach ($flightType as $key => $item) {
                                    if ($flightType[$userDetails->flightType] == $item) { ?>
                                        <option value="<?= $key; ?>" selected>
                                            <?= $item; ?>
                                        </option>
                                    <?php } else { ?>
                                        <option value="<?= $key; ?>">
                                            <?= $item; ?>
                                        </option>
                                    <?php }
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" id="transitFlightNumber">
                        <label class="col-sm-3 control-label">Transit Flight Number:</label>
                        <div class="col-sm-9 label_top">
                            <input type="text" class="form-control" name="updateTransitFlightNumber"
                                   value="<?= $userDetails->transitFlightNumber; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Flight Number:</label>
                        <div class="col-sm-9 label_top">
                            <input type="text" class="form-control" name="updateFlightNumber"
                                   value="<?= $userDetails->flightNumber; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Adults:</label>
                        <div class="col-sm-9 label_top">
                            <input type="number" class="form-control" name="updateAdults"
                                   value="<?= $userDetails->adult; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Children:</label>
                        <div class="col-sm-9 label_top">
                            <input type="number" class="form-control" name="updateChildren"
                                   value="<?= $userDetails->children; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Infants:</label>
                        <div class="col-sm-9 label_top">
                            <input type="number" class="form-control" name="updateInfants"
                                   value="<?= $userDetails->infants; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Class Of Travel:</label>
                        <div class="col-sm-9 label_top">
                            <select id="" name="updateClassOfTravel" class="form-control">
                                <?php $classOfTravel = [1 => 'Economy', 2 => 'Buisness', 3 => 'First', 4 => 'Premium Economy'];
                                foreach ($classOfTravel as $key => $item) {
                                    if ($classOfTravel[$userDetails->classOfTravel] == $item) { ?>
                                        <option value="<?= $key; ?>" selected>
                                            <?= $item; ?>
                                        </option>
                                    <?php } else { ?>
                                        <option value="<?= $key; ?>">
                                            <?= $item; ?>
                                        </option>
                                    <?php }
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Arrival Date & Time:</label>
                        <div class="col-sm-9 label_top">
                            <input type="text" class="form-control" name="updateArrivalDateAndTime" id="arrivalDate"
                                   value="<?php echo $userDetails->arrivalTime; ?>">
                        </div>
                    </div>
                    <div class="form-group" id="departureTimingFiled">
                        <label class="col-sm-3 control-label">Departure Date & Time:</label>
                        <div class="col-sm-9 label_top">
                            <input type="text" class="form-control" name="updateDepartureDateAndTime" id="departureDate"
                                   value="<?php echo $userDetails->departureTime; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Service Type:</label>
                        <div class="col-md-9">
                            <select class="form-control field_color place_holder field_color" name="updateServiceType"
                                    id="serviceType">
                                <option value="">Select Service Type</option>
                                <? foreach ($serviceType as $key => $value): ?>
                                    <option
                                            value="<?= $key; ?>" <?= ($serviceTypeId == $key) ? "selected" : ""; ?>><?= $value; ?></option>
                                <? endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" id="serviceFiled">
                        <label class="col-sm-3 control-label">Service:</label>
                        <div class="col-md-9">
                            <div id="selectServiceDiv">
                                <select class="form-control field_color place_holder field_color" name="updateService"
                                        id="service">
                                    <option value="">Select Service</option>
                                    <? foreach ($serviceList as $key => $value): ?>
                                        <option
                                                value="<?= $key; ?>" <?= ($serviceId == $key) ? "selected" : ""; ?>><?= $value; ?></option>
                                    <? endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" id="limousineField">
                        <label class="col-sm-3 control-label">Pick Up Or Drop Off:</label>
                        <div class="col-md-9 label_top">
                            <div class="col-md-3 radio">
                                <label>
                                    <input type="radio" name="updateIsPickUp"
                                           value="1" <?php echo ($userDetails->IsPickUp == '1') ? 'checked' : ''; ?> >Pick
                                    Up
                                </label>
                            </div>
                            <div class="col-md-3 radio">
                                <label>
                                    <input type="radio" name="updateIsPickUp"
                                           value="0" <?php echo ($userDetails->IsPickUp == '0') ? 'checked' : ''; ?> >Drop
                                    Off
                                </label>
                            </div>
                        </div>

                        <label class="col-sm-3 control-label">Pick Up Or Drop Off Address:</label>
                        <div class="col-md-9 label_top">
                                <textarea name="updatePickUpOrDropAddress" rows="5"
                                          class="form-control"><?php echo $userDetails->pickUpOrDropAddress; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Full Name:</label>
                        <div class="col-sm-3 label_top">
                            <select id="" name="updateTitle" class="form-control">
                                <?php $title = ['Mr' => 'Mr', 'Miss' => 'Miss', 'Mrs' => 'Mrs', 'Ms' => 'Ms'];
                                foreach ($title as $item) {
                                    if ($userDetails->title == $item) { ?>
                                        <option value="<?= $item; ?>" selected>
                                            <?= $item; ?>
                                        </option>
                                    <?php } else { ?>
                                        <option value="<?= $item; ?>">
                                            <?= $item; ?>
                                        </option>
                                    <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control label_top" name="updateFirstName"
                                   value="<?php echo $userDetails->firstName; ?>">
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control label_top" name="updateLastName"
                                   value="<?php echo $userDetails->lastName; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email:</label>
                        <div class="col-sm-9 label_top">
                            <input type="text" class="form-control" name="updateEmailId"
                                   value="<?= $userDetails->email ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Mobile Number:</label>
                        <?php $mobile = explode(" ", $userDetails->mobile); ?>
                        <div class="col-sm-2 label_top">
                            <input type="text" name="updateCountryCode" class="form-control" value="<?= $mobile[0]; ?>">
                        </div>
                        <div class="col-sm-7 label_top">
                            <input type="text" name="updateMobileNumber" class="form-control"
                                   value="<?= $mobile[2]; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Message:</label>
                        <div class="col-sm-9 label_top">
                            <input type="text" name="updateMessage" class="form-control"
                                   value="<?= $userDetails->message ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Request Status:</label>
                        <div class="col-sm-9 label_top">
                            <select name="status" class="form-control">
                                <? foreach ($requestStatusArray as $key => $value) { ?>
                                    <option value="<?= $key; ?>" <?= ($userDetails->status == $key) ? "selected" : ""; ?>><?= $value; ?></option>
                                <? } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Repeat Customer:</label>
                        <div class="col-sm-9 label_top">
                            <input type="checkbox" name="isRepeatCustomer"
                                   value="1" <?= ($userDetails->isRepeatCustomer == true) ? "checked" : ""; ?>>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Admin Message:</label>
                        <div class="col-sm-9 label_top">
                            <textarea name="comment" class="form-control"><?= trim($userDetails->comment); ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Vendor Name</label>
                        <div class="col-md-9 label_top">
                            <select name="vendorName" class="form-control">
                                <option value="">select Vendor Name</option>
                                <?php for ($i=0;$i<count($vendorList);$i++) {  ?>
                                    <option value="<?php echo $vendorList[$i]->getObjectId(); ?>" <?= ($vendorList[$i]->getObjectId() == $vendorName) ? "selected" : ""; ?>><?php echo $vendorList[$i]->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Amount</label>
                        <div class="col-md-5 label_top">
                            <input type="text" class="form-control" name="vendorAmount"
                                   value="<?php echo $userDetails->vendorAmount; ?>">
                        </div>
                        <div class="col-md-4 label_top">
                            <select name="vendorCurrency" class="form-control">
                                <option value="">select Currency</option>
                                <?php for ($i=0;$i<count($currencyValues);$i++) {  ?>
                                    <option value="<?php echo $currencyValues[$i]->getObjectId(); ?>" <?= ($currencyValues[$i]->getObjectId() == $vendorCurrency) ? "selected" : ""; ?>><?php echo $currencyValues[$i]->currencyCode; ?></option>
                               <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Payment Mode</label>
                        <div class="col-md-9 label_top">
                            <select name="paymentMode" class="form-control">
                                <option value="">select Payment Mode</option>
                                <?php for ($i=0;$i<count($paymentMode);$i++) {  ?>
                                    <option value="<?php echo $paymentMode[$i]->getObjectId(); ?>" <?= ($paymentMode[$i]->getObjectId() == $paymentModeValue) ? "selected" : ""; ?>><?php echo $paymentMode[$i]->paymentTitle; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Greeter Name</label>
                        <div class="col-md-9 label_top">
                            <input type="text" class="form-control" name="greeterName"
                                   value="<?php echo $userDetails->greeterName; ?>" placeholder="Greeter Name"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Greeter Number</label>
                        <div class="col-md-9 label_top">
                            <input type="text" class="form-control" name="greeterNumber"
                                   value="<?php echo $userDetails->greeterNumber; ?>" placeholder="Greeter Number"/>
                        </div>
                    </div>
                    <input type="hidden" name="updateUserId" value="<?php echo $userId; ?>">
                    <div class="form-group">
                        <div class="col-md-5 col-md-offset-3">
                            <input type="submit" class="btn btn-success" value="update request"
                                   name="updateUserDetails"/>
                        </div>
                    </div>
                </fieldset>
            <? endif; ?>
        </form>
    </div>
</div>


<? require_once('footer.php'); ?>

<script>

</script>

<script>
    $(function () {
        $('#AdminOriginAirport').autocomplete({source: "airportsearchadmin.php", minLength: 1});
        $('#AdminArrivalAirport').autocomplete({source: "airportsearchadmin.php", minLength: 1});
    });


    //    $("#serviceType").change(function () {
    //
    //        var serviceType = $("#serviceType").val();
    //
    //        var data = {
    //            'serviceType': serviceType
    //        };
    //
    //        $.ajax({
    //            type: 'GET',
    //            url: 'servicelist.php',
    //            data: data,
    //            success: function (response) {
    //                $("#sanmit").val(response);
    //            }
    //        });
    //
    //    });


    $("#serviceType").change(function () {

        var serviceType = $("#serviceType").val();

        if (serviceType != 'YllNCfF8tL') {

            var serviceType = $("#serviceType").val();

            $('#service').find('option').remove();
            $('#service')
                .append($('<option>', {value: ''})
                    .text('[Select Service]'));
            $.post("servicelist.php", {serviceType: serviceType}, function (data) {
                var dataArray = jQuery.parseJSON(data);
                $('#state').find('option:not(:first)').remove();

                $.each(dataArray, function (key, value) {
                    $('#service')
                        .append($('<option>', {value: key})
                            .text(value));

                });
                $("#preloader").hide();
                $("#selectServiceDiv").show();
            });
            $("#serviceFiled").css('display', 'block');
            $("#limousineField").css('display', 'none');
        } else if (serviceType == 'YllNCfF8tL') {
            $("#serviceFiled").css('display', 'none');
            $("#limousineField").css('display', 'block');
        }

    });

    $(document).ready(function () {

        if ($("#serviceType").val() == "YllNCfF8tL") {
            $("#serviceFiled").css('display', 'none');
            $("#limousineField").css('display', 'block');
        } else if ($("#serviceType").val() != "YllNCfF8tL") {
            $("#serviceFiled").css('display', 'block');
            $("#limousineField").css('display', 'none');
        }

        if ($("#serviceType").val() == "v2VSvfZO7a") {
            $("#departureTimingFiled").css("display", "block");
        } else if ($("#serviceType").val() != "v2VSvfZO7a") {
            $("#departureTimingFiled").css("display", "none");

        }

        if ($("#FlightType").val() == "3") {
            $("#transitFlightNumber").css("display", "block");
        } else if ($("#FlightType").val() != "3") {
            $("#transitFlightNumber").css("display", "none");
        }

    });


    $("#serviceType").change(function () {
        if ($("#serviceType").val() == "v2VSvfZO7a") {
            $("#departureTimingFiled").css("display", "block");
        } else if ($("#serviceType").val() != "v2VSvfZO7a") {
            $("#departureTimingFiled").css("display", "none");

        }
    });


    $("#FlightType").change(function () {
        if ($("#FlightType").val() == "3") {
            $("#transitFlightNumber").css("display", "block");
        } else if ($("#FlightType").val() != "3") {
            $("#transitFlightNumber").css("display", "none");
        }
    });


</script>