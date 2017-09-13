<?php

require_once('class/classGiftCard.php');

$giftCardModel = new airportAssGiftCard\giftCard;

if(isset($_POST['cardCode'])) {
   $code = $_POST['cardCode'];
   $result = $giftCardModel->getAmount($code);
    echo $result;

}else{
    header("Http/1.0 404 Not Found");
    echo "<h1>404 Not Found</h1>";
    echo "The page that you have requested could not be found.";
    exit();
}
?>

