<?
$title = "Payment";
$titleName = "Payment";
require_once('header_inner.php'); 
$showAmount = $amount / 100;
?>
<div class="row service_text_bg_color" style="padding-top: 5%;margin-bottom: 5%;">
    <div class="container " <?=($source !="m")?'style="margin-top: 80px;"':"";?>>
        <fieldset>
            <legend>Card Details</legend>
            <form action="" method="POST" id="payment-form" role="form">

                <?php // Show PHP errors, if they exist:
                if (isset($errors) && !empty($errors) && is_array($errors)) {
                    echo '<div class="alert alert-danger"><h4>Error!</h4>The following error(s) occurred:<ul>';
                    foreach ($errors as $e) {
                        echo "<li>$e</li>";
                    }
                    echo '</ul></div>';
                } ?>
                <?
                if ($successStatus) {
                    echo $successStatus;
                }else {  ?>
                <div id="payment-errors" class="col-md-5 col-md-offset-3"></div>

                <div class="col-xs-12 col-md-5 col-md-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                Payment Details  <? if($source == "m"){?><span class='pull-right fa fa-usd'><b><?=$showAmount;?></b></span><? } ?>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <label for="cardNumber">
                                        CARD NUMBER</label>
                                    <div class="col-xs-12 col-md-12">
                                        <div class="form-group">

                                            <div class="input-group">
                                                <input type="text" autocomplete="off" class="card-number form-control"
                                                       name='cards-number' id='cards-number'
                                                       placeholder="Debit/Credit Card Number">
                                        <span class="input-group-addon"><span
                                                class="fa fa-credit-card-alt"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <label for="expityMonth">
                                        EXPIRY DATE</label>
                                    <div class="form-group">
                                        <div class="col-xs-6 col-lg-6 pl-ziro">
                                            <select class="card-expiry-month form-control select_text_color"
                                                    name="expiry-month" id='expiry-month'>
                                                <option value="">Month</option>
                                                <option value="01">Jan (01)</option>
                                                <option value="02">Feb (02)</option>
                                                <option value="03">Mar (03)</option>
                                                <option value="04">Apr (04)</option>
                                                <option value="05">May (05)</option>
                                                <option value="06">June (06)</option>
                                                <option value="07">July (07)</option>
                                                <option value="08">Aug (08)</option>
                                                <option value="09">Sep (09)</option>
                                                <option value="10">Oct (10)</option>
                                                <option value="11">Nov (11)</option>
                                                <option value="12">Dec (12)</option>
                                            </select>
                                        </div>
                                        <div class="col-xs-6 col-lg-6 pl-ziro">
                                            <select class="card-expiry-year form-control select_text_color"
                                                    name="expiry-year"
                                                    id='expiry-year' required>
                                                <? echo $currentYear = date("Y"); ?>
                                                <option value="">Year</option>
                                                <? for ($i = 0; $i < 11; $i++): ?>
                                                    <option
                                                        value="<?= $currentYear; ?>"><?= $currentYear; ?></option>
                                                    <? ++$currentYear;endfor; ?>
                                            </select></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <label for="cvCode" class="cvCode">
                                        CVV2 CODE</label>
                                    <div class="form-group">
                                        <div class="col-xs-6 col-lg-6 pl-ziro">
                                            <input type="password" class="card-cvc form-control" name="cvv" id="cvv"
                                                   placeholder="CVV2"
                                                   autocomplete="off" required>
                                        </div>
                                        <div class="col-xs-6 col-lg-6 pl-ziro">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <? if($source != "m"){?>
                    <a href="javascript:void(0);" class="btn btn-danger btn-lg btn-block" role="button">Invoice Total <span
                            class="fa fa-usd"></span><?= $amount / 100; ?></span></a>
                    <br/>
                    <? } ?>
                    <button type="submit" class="btn btn-success btn-lg btn-block" name="submitBtn" id="submitBtn">Pay
                        Now
                    </button>
                </div>
                <?php } ?>
            </form>
        </fieldset>
    </div>
</div>
<? require_once('footer_inner.php'); ?>
<?php

// Set the Stripe key:
// Uses STRIPE_PUBLIC_KEY from the config file.
echo '<script type="text/javascript">Stripe.setPublishableKey("' . STRIPE_PUBLIC_KEY . '");</script>'; ?>
<script type="text/javascript" src="js/pay.js"></script>
