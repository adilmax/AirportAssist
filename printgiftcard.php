<?php

require_once 'class/classGiftCard.php';
$giftCardObj = new airportAssGiftCard\giftCard;

if (isset($_GET['id']) && $_GET['id'] !=""){
    $couponCode = ($_GET['id']);
    $rName = $_GET['rname'];
    $giftCardDetails = $giftCardObj->updateReceiverName($couponCode,$rName);
    require_once 'html/printgiftcard.php';
}else {
    header("HTTP/1.0 404 Not Found");
    echo "<h1>404 Not Found</h1>";
    echo "The page that you have requested could not be found.";
    exit();
}


?>

