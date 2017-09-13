<!DOCTYPE html>
<html>
<head>
<title>Murgency Airport eGift Card</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name = "description" content = "Gift the comfort of Airport Assistance Services to your loved ones with access to airport lounge, Meet & Greet, baggage handling, assistance for elderly & more. Buy eGift Card."> 
</head>
<body onload="window.print();">
<div>
    <? if($giftCardDetails != false) {?>
    <table style="margin:0px auto; width:710px;" cellpadding="0" cellspacing="0">
        <tr>
            <td colspan="2" style="background-color: #FFFFFF;height: 20px;"></td>
        </tr>
        <tr>
            <td style="padding-left: 15px;"><img src="<?=$giftCardDetails->image->getURL()?>" alt="gift card image" title="gift image"/></td>
            <td>
                <h1 style="font-family: Monotype Corsiva;letter-spacing: 1px;color: #be2327;padding-right: 20px;font-size: 72px;">
                    A Gift <br> For You</h1></td>
        </tr>
        <tr>
            <td colspan="2" style="border-top: 8px solid #717171;"></td>
        </tr>
        <tr>
            <td colspan="2">
                <div
                    style="margin-left: 40px;margin-top: 20px;margin-bottom: 20px;font-family: Monotype Corsiva;font-size: 24px;     color: #666;">
                    Dear <?=ucwords($giftCardDetails->receiverName);?>,
                </div>
                <div
                    style='margin-top: 20px; text-align: center;font-family: Monotype Corsiva;font-size: 20px;     color: #666;'>
                    <?=$giftCardDetails->message;?>
                </div>
                <div
                    style='margin-top: 20px; text-align: center;font-family: Monotype Corsiva;font-size: 28px;     color: #666;'>
                    Gift of $<?=$giftCardDetails->amount?>
                </div>
                <div
                    style='margin-top: 20px; text-align: center;font-family: Monotype Corsiva;font-size: 20px;     color: #666;'>
                    Coupon Code: <?=$giftCardDetails->getObjectId();?>
                </div>
                <div
                    style='margin-left: 40px;margin-top: 20px;margin-bottom: 20px;font-family: Monotype Corsiva;font-size: 24px;     color: #666;'>
                    From <br> <?=ucwords($giftCardDetails->senderName);?> <br></div>
            </td>
        </tr>
        <tr>
            <td style="background-color: hsla(0, 2%, 79%, 0.73);font-family: sans-serif;font-size: 14px; " colspan="2">
                <p><span style="padding-left: 12px;line-height:20px;">Visit <a href="https://www.murgencyairportassistance.com/"
                                                              target="_blank"
                                                              style="text-decoration: none;color: #cc1117;font-weight: bold;">www.MUrgencyAirportAssistance</a>                             to book your airport assistance service and redeem your gift card.</span><br>
                    <span style="padding-left: 20px;line-height:20px;">The gift amount could be used towards purchase of any MUrgency Airport Assistance service of the value</span>
                    <br> <span style="padding-left: 33%;line-height:20px;">equal to or  more than the gift amount.</span> <br> <span
                        style="padding-left: 32%;line-height:35px;">Services offered in 426 airport worldwide.</span></p></td>
        </tr>
        <br>
        <tr>
            <td colspan="2"><img src="http://emergencyairportassistance.com/image/email-footer.png" alt="email_footer"
                                 title="footer"/></td>
        </tr>
        <tr>
            <td style="text-align: center;" colspan="2"><a href="https://www.facebook.com/MUAirportAssist"><img
                        alt="facebook_icon" title="facebook_icon"
                        src="http://emergencyairportassistance.com/image/icons/FacebookDesat.png"
                        style="width:30px;"></a> <a href="https://plus.google.com/s/MUAirportAssist/top"><img
                        alt="googleplus_icon" title="googleplus_icon"
                        src="http://emergencyairportassistance.com/image/icons/GoogleDesat.png" style="width:30px;"></a>
                <a href="https://www.instagram.com/muairportassist/"><img alt="instagram_icon" title="instagram_icon"
                                                                          src="http://emergencyairportassistance.com/image/icons/InstagramDesat.png"
                                                                          style="width:30px;"></a> <a
                    href=" https://www.pinterest.com/muairportas0334"><img alt="pinterest_icon" title="pinterest_icon"
                                                                           src="http://emergencyairportassistance.com/image/icons/PinterstDesat.png"
                                                                           style="width:30px;"></a> <a
                    href=" https://twitter.com/MUAirportAssist"><img alt="twitter_icon" title="twitter_icon"
                                                                     src="http://emergencyairportassistance.com/image/icons/TwitterDesat.png"
                                                                     style="width:30px;"></a></td>
        </tr>
        <tr>
            <td style="text-align: center;" colspan="2"><img
                    src="https://gallery.mailchimp.com/7d3ac03131a41b96e089cda40/images/71bb2fef-8a59-459b-99c7-1072d95c1597.png"
                    style="text-align: center;width: 250px;" alt="MUrgency_logo" title="MUrgency_logo"/>
            </td>
        </tr>
        <tr>
            <td colspan="2" height="20px;" style="border-top: 4px solid #a9a5a5;"></td>
        </tr>
    </table>
    <? } ?>
</div>
</body>
</html>