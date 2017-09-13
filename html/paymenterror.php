<?
$title = "Payment Error";
$titleName = "Payment Error";
require_once('header_inner.php'); ?>
<div class="row service_text_bg_color" style="padding-top: 5%;margin-bottom: 5%;">
    <div class="container " style="margin-top: 80px;">
        <fieldset>
            <legend>Error Message</legend>
            <?php 
            if($errorMessage != ""){?>
            <div class="alert alert-danger">
                <?=$errorMessage;?>
            </div>

           <?  }?>
        </fieldset>
    </div>
</div>
<? require_once('footer_inner.php'); ?>
