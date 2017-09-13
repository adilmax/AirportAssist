<?php
$title = "View Airport Wifi Details";
require_once('wifiheader.php');
?>

<section class="viewWifiDetails-header">
    <div class="col-md-12">
        <h1 class="text-center">
            View Wifi Details
        </h1>
    </div>
</section>
 <section class="add-wifi-details-form-wrapper">
        <form action="" method="post">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text"
                                    value="<?=(isset($airportName))?$airportName : "";?>"
                                    class="form-control place_holder field_color" name="airportName"
                                    id="AirportNameOrCode"
                                    placeholder="Airport Name or Code"
                                    data-validation="required"
                                    data-validation-error-msg-required="You must enter an Airport Name">                                 
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <input type="submit" class="btn btn-danger" value="submit" name="submitWifiDetails">
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </form>
</section>
<? if($wifiDetails != false){?>
    <section class="add-wifi-details-form-wrapper">
        <div class="container">
        <div class="table-responsive" style="font-size:13px;">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Password</th>
                    <th>Network</th>
                    <th>Location Lounge</th>
                    <th>Airways Lounge</th>
                    <th>Details</th>
                    <th>Free Wifi</th>
                    <th>Time Limit</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    $c = 0;
                    for($i=0;$i<count( $wifiDetails->wifiDetails);$i++){
                        $wifiDetails->wifiDetails[$i]->fetch();
                ?>
                <tr>
                    <td><?=++$c;?>
                    <td><?=$wifiDetails->wifiDetails[$i]->password;?></td>
                    <td><?=$wifiDetails->wifiDetails[$i]->network;?></td>
                    <td><?=$wifiDetails->wifiDetails[$i]->locationLounge;?></td>
                    <td><?=$wifiDetails->wifiDetails[$i]->airwaysLounge;?></td>
                    <td><?=$wifiDetails->wifiDetails[$i]->details;?></td>
                    <td><?=$wifiDetails->wifiDetails[$i]->freeWifi;?></td>
                    <td><?=$wifiDetails->wifiDetails[$i]->timeLimit;?></td>
                </tr>
                <? } ?>
                </tbody>
            </table>
            </div>
        </div>
    </section>
<? } ?>

<?php
require_once('footer.php');
?>

<script type="text/javascript">

    $(function () {

        $.validate();
    });

    $('#AirportNameOrCode').autocomplete({source: 'airportnamesearch.php', minLength: 1});


</script>

