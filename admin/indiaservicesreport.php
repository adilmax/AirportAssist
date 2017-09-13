<?php
/**
 * Created by PhpStorm.
 * User: Adil
 * Date: 3/22/2017
 * Time: 11:36 AM
 */

require_once 'class/classAirportServices.php';

if(!isset($_SESSION['userName'])){
    header("location:login.php");
    exit;
}
$userModel = new airportServices\services;

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
$allRequest = $userModel->getAllIndiaRequest($fromDate, $toDate, $page);
$count = $userModel->getAllRequestCount($fromDate, $toDate);
$flightType = [1=>'Arrival',2=>'Departure',3=>'Transit', 4=>'Limousine'];
include 'html/indiaservicesreport.php';
