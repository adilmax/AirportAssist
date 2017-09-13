<?php $title = "Welcome";
$titleName = "Welcome";
require_once('header_inner.php');
?>
<!--<div class="row">
    <div class="middle_image faq-subpage">
        <div></div>
    </div>
</div> -->
<div class="row">
    <div class="container margin_top">
            <!--        <div class="col-lg-2 col-md-2 col-xs-12 nopadding"></div>-->
            <div class="col-lg-12 col-md-12 col-xs-12 registration_right_contant_bgcolor" >
                <div class="text-center">
                    <h3>Hello <?= $senderName;?></h3>
                </div>
                <div class="text-center margin_top_welcome">
                    <h3>Your gift card purchase has been successful.</h3> 
                </div>
                
                <div class="text-center margin_top_welcome">
                    <h3>Thank you for choosing <span style="color: red;">MUrgency Airport Assistance</span> Gift Card</h3> 
                </div>
                <div class="text-center margin_top_welcome" style="padding-bottom:20px;">
                    <a href="giftcards" class="btn btn-card btn-medium btn-border" style="margin-right:60px;">Buy more gift card</a>
                    <a href="http://www.murgencyairportassistance.com/" class="btn btn-card btn-medium btn-border" >Home page</a>
                    
                </div>
                
            </div>
    </div>
</div>

<?php require_once('footer_inner.php');?>
