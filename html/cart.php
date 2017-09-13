<?php
$title = " Airport Lounge Vouchers | Buy Gift Cards | Travel Gift Vouchers";
$titleName = "MUrgency eGift Cards Carts";
$metaDesc = "Gift the comfort of Airport Assistance Services to your loved ones with access to airport lounge, Meet & Greet, baggage handling, assistance for elderly & more. Buy eGift Card.";
require_once 'header_inner.php';
?>
<div class="row" xmlns="http://www.w3.org/1999/html">

</div>
<div class="row service_text_bg_color padding-left">
    <div class="container " style="margin-top: 120px;">
        <fieldset>
            <legend>CART DETAILS</legend>

            <div class="col-md-offset-1 col-md-10">
            <?php
                $cartCount = (isset($_SESSION['content']))?count($_SESSION['content']):0;
                if($cartCount == 0){?>

                <div class="alert alert-danger">
                    We are sorry.. Your cart is empty..
                </div>

                <?php

                }else{?>
                <form method="post" action="" class="gc_form">
                   <?php if(count($error) > 0) { ?>
                   <div class="alert alert-danger"> <ul style="list-style: none">
                   <? for ($j=0; $j < count($error); $j++) { ?>
                     <li>
                       <?= $error[$j];  ?>
                     </li>
                   <? } ?>

                    </ul></div>
                   <?  } ?>
            <table class="table table-striped shopping-cart-table">
                <tbody>
                <tr>
                    <th class="hidden-xs">
                    #
                    </th>
                    <th>
                       Image
                    </th>
                    <th>
                        Message
                    </th>
                    <th>
                        Amount
                    </th>
                    <th>
                     Remove
                    </th>
                </tr>
                <tr>
                    <?php $c=0;$totalAmount = 0;$totalOfferAmount=0;for($i=0;$i<$cartCount;$i++){
                    $totalAmount +=   $_SESSION['content'][$i]['amount'];
                    $amount = $_SESSION['content'][$i]['amount'];
                    $percentage = (10/100)*($_SESSION['content'][$i]['amount']);
                    $offerAmount = $amount - $percentage;
                    $totalOfferAmount +=  $offerAmount;
                    ?>
                    <td class="hidden-xs">
                        <?=++$c;?>
                    </td>
                    <td>
                        <img class="giftImage" src="giftcard/<?=$_SESSION['content'][$i]['image'];?>" alt="Gift Card Image">
                    </td>
                    <td><p><?=$_SESSION['content'][$i]['message'];?></p></td>
                    <td>
                        <strike><p>&nbsp;&nbsp;$ <?=$amount;?>&nbsp;&nbsp;</p></strike>
                        <p>&nbsp;&nbsp;<i class="fa fa-dollar"></i>&nbsp;<?=$offerAmount;?></p>
                    </td>
                    <td>
                        <a href="deletecart?d=<?=$i;?>"><i class="fa fa-times"></i> <span class="hidden-xs">Remove</span></a>
                    </td>
                </tr>
                <?php }?>
                </tbody>
            </table>
            <hr>
            <div class="row form">
                <div class="col-sm-6">
                    <label>Your Name : </label>
                     <input placeholder="Enter your name" name="senderName" class="input-md mb-xs-10" style="width: 250px;" type="text" accept="" data-validation="required"
                            data-validation-error-msg-required="You must enter sender name">
                  </div>
                <div class="col-sm-6 text-align">
                    <label>Email Name : </label>
                    <input placeholder="Enter your email" name="senderEmail" class="input-md mb-xs-10" style="width: 250px;" type="text"  accept="" data-validation="required"
                           data-validation-error-msg-required="You must enter sender email">

                </div>
            </div>
            <hr>
                 <div class="row">
                <div class="col-sm-6">
                    <strike><p>&nbsp;Total Amount : $ <b><?=  number_format($totalAmount,2);?></b>&nbsp;</p></strike>
                    <p>&nbsp;Total Amount : <i class="fa fa-dollar"></i> <b><?=  number_format($totalOfferAmount,2);?>&nbsp;</p>
                </div>
                <div class="col-sm-6 text-align">
                    <button type="submit" name="payment" id="payment" class="btn btn-card btn-medium">Make Payment</button>
                </div>
            </div>
            <hr>
            <div style="margin-bottom: 8%;">

            </div>
           </form>
                <?php }?>
           </div>
        </fieldset>
    </div>
</div>



<? require_once('footer_inner.php'); ?>
<script type="text/javascript">
    $(function () {
        $.validate();
    });
</script>
