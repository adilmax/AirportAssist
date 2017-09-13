<?php
$title = " Airport Lounge Vouchers | Buy Gift Cards | Travel Gift Vouchers";
$titleName = "Send Your MUrgency eGift Cards";
$metaDesc = "Gift the comfort of Airport Assistance Services to your loved ones with access to airport lounge, Meet & Greet, baggage handling, assistance for elderly & more. Buy eGift Card.";
require_once 'header_inner.php';
?>
<div class="row">

</div>
<div class="row service_text_bg_color padding-left">
    <div class="container " style="margin-top: 120px;">
        <fieldset>
            <legend>GIFT CARD DETAILS</legend>

            <div class="carddetail-from">
                <div class="container">
                    <div class="row">
                        <? if ($sendStatus) { ?>
                            <div id="paymentSuccess" class="alert alert-success col-md-8 col-md-offset-1"><h4>Payment
                                    Success!</h4>Your payment process has been completed successfully.
                            </div>
                        <? }
                        ?>
                        <? if (count($giftCardDetails) > 0){ ?>
                        <? for ($i = 0; $i < count($giftCardDetails); $i++) {
                            $objectID = $giftCardDetails[$i]->getObjectId(); ?>
                            <form action="" method="post" class="gc_form">
                                <input type="hidden" value="<?= $objectID; ?>" name="objectId">
                                <?php if (count($error) > 0) { ?>
                                    <div class="alert alert-danger col-md-8 col-md-offset-1">
                                        <ul style="list-style: none">
                                            <? for ($j = 0; $j < count($error); $j++) { ?>
                                                <li>
                                                    <?= $error[$j]; ?>
                                                </li>
                                            <? } ?>

                                        </ul>
                                    </div>
                                <? } ?>
                                <!-- cart products -->
                                <div class="col-md-12 insid-wrapper gc_pt10">
                                    <div class="col-lg-4">
                                        <div class="row show_image">
                                            <? if ($giftCardDetails[$i]->image != '') { ?>
                                                <div>
                                                    <div><img src="<?= $giftCardDetails[$i]->image->getURL(); ?>"
                                                              title="Image"
                                                              class="img-responsive img-thumbnail blog_image"
                                                              style="width:150px;height:120px"/></div>
                                                </div>
                                            <? } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="gift_title">MUrgency eGift Card</div>
                                        <span><b>From: </b></span><span><?= $giftCardDetails[$i]->get('senderEmail'); ?></span><br>
                                        <span><b>Amount: </b></span><span><?= $giftCardDetails[$i]->get('amount'); ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <span><b>Message: </b></span><span><?= $giftCardDetails[$i]->get('message') ?></span>
                                    </div>

                                    <div class="col-md-12 insid-wrapper gift_send gc_pt10">
                                        <div class="col-md-8">
                                            <span><b>Recipient Name: &nbsp;&nbsp;&nbsp;</b></span>
                                            <input type="text" name="receiverName" placeholder="Enter Recipient Name"
                                                   class="input-md" accept="" data-validation="required"
                                                   data-validation-error-msg-required="You must enter recipient name"
                                                   id="receiverName_<?=$objectID?>">
                                            <div id="receiverError" style="color: #a94442"></div>
                                            <br>
                                            <span><b>Recipient Email: &nbsp;&nbsp;&nbsp;</b> </span>
                                            <input type="email" name="receiverEmail" placeholder="Enter Recipient Email"
                                                   class="input-md" accept="" data-validation="required"
                                                   data-validation-error-msg-required="You must enter recipient email">
                                        </div>
                                        <div class="col-md-4 send_gift">
                                            <button class="btn btn-card btn-medium printGift" style="margin-bottom: 25px;"
                                               value="<?=$objectID?>" >Print
                                                Gift</button>

                                            <br>
                                            <input type="submit" class="btn btn-card btn-medium"
                                                   value="Email Gift"
                                                   name="sendGift"/>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        <? } ?>

                    </div>
                </div>
                <?php } else { ?>
                    <div>No Information..</div>
                <?php } ?>
            </div>
        </fieldset>
    </div>
</div>

<? require_once('footer_inner.php'); ?>

<script type="text/javascript">
    $(function () {
        $.validate();
    });
    $('#paymentSuccess').delay(1000).fadeOut(10000);

    $(".printGift").click(function (event) {
        var objectId= $(this).attr('value');
        if ($("#receiverName_" + objectId).val() != "") {
            var rName = $("#receiverName_" + objectId).val();
            window.open('printgiftcard?id=' + objectId + '&rname=' + rName, '_blank');
        } else {
            $("#receiverError").html("You must enter recipient name");
        }
        event.preventDefault();
    });
</script>
