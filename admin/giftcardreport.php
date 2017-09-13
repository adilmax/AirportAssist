<?php
/*
 * controller which handle the request report..
 */

require_once 'class/classGiftCard.php';
if(!isset($_SESSION['userName'])){
    header("location:login.php");
    exit;
}
$userModel = new airportAssGiftCard\giftCard;

$fromDate = "";
$toDate = "";
$deleteStatus = false;
if(isset($_GET['id']) && $_GET['d']==1){
    $objectID = $_GET['id'];
    $deleteStatus = $userModel->deleteRequest($objectID);
}
$page = 1;
if(isset($_POST['next'])|| isset($_POST['prev'])){
    if(isset($_POST['page']) && $_POST['page']){
        $page = $_POST['page'];
    }
}
$allRequest = $userModel->getAllRequest($fromDate, $toDate, $page);
echo "count".$count = $userModel->getAllRequestCount($fromDate, $toDate);
include 'html/giftcardreport.php';
