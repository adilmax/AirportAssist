<?php
$title = "Add Airport Wifi Details";
require_once('wifiheader.php');
?>

<div class="container">
    <section class="addWifiDetails-header">
        <div class="col-md-12">
            <h1 class="text-center">
                Add Wifi Details
            </h1>
        </div>
    </section>

    <?php

    if ($error) { ?>
        <div class="col-md-12">
            <div class="alert alert-danger">
                <p>
                    <?php echo $errorMessage; ?>
                </p>
            </div>
        </div>
    <?php } ?>
    <?php

    if ($status) { ?>
        <div class="col-md-12">
            <div class="alert alert-success">
                <p>Successfully Saved</p>
            </div>
        </div>
    <?php } ?>

    <section class="add-wifi-details-form-wrapper">
        <form action="" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text"
                               value="<?= (isset($data['originAirport'])) ? $data['originAirport'] : ""; ?>"
                               class="form-control place_holder field_color" name="airportName"
                               id="AirportNameOrCode"
                               placeholder="Airport Name or Code"
                               data-validation="required"
                               data-validation-error-msg-required="You must enter an Airport Name"
                        >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="password" placeholder="Password"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="network" placeholder="network"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="locationLounge" placeholder="Location Lounge"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="airwaysLounge" placeholder="Airways Lounge"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="details" placeholder="details"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="freeWifi" class="form-control" placeholder="Free Wifi"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="timeLimit" class="form-control" placeholder="Time Limit"/>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="submit" class="btn btn-danger" value="submit" name="submitWifiDetails">
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>

<?php
require_once('footer.php');
?>

<script type="text/javascript">

    $(function () {

        $.validate();
    });

    $('#AirportNameOrCode').autocomplete({source: 'airportnamesearch.php', minLength: 1});


</script>

