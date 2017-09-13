<?php
require_once 'class/classGiftCard.php';
if(!isset($_SESSION['userName'])){
    header("location:login.php");
    exit;
}
$giftCardModel = new airportAssGiftCard\giftCard;
$status = false;
$userDetails = [];
$objectID ="";

if (isset($_GET['d']) && $_GET['d'] !=""){
    $objectID = $_GET['d'];
    $userDetails = $giftCardModel->getDetails($objectID);
    
    require_once('html/giftcarddetails.php');
}else{
    header("HTTP/1.0 404 Not Found");
    echo "<h1>404 Not Found</h1>";
    echo "The page that you have requested could not be found.";
    exit();
}
require_once('html/giftcarddetails.php');

?>