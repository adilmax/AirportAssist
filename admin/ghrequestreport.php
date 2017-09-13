<?php
/*
 * controller which handle the request report..
 */
require_once 'class/classGroundHandling.php';
if(!isset($_SESSION['userName'])){
    header("location:login.php");
    exit;
}
$groundHandlingObj = new airportAssGroundHandling\groundHandling;

$page = 1;
$fromDate = "";
$toDate = "";
$deleteStatus = false;
if(isset($_GET['id']) && $_GET['d']==1){
    $objectID = $_GET['id'];
    $deleteStatus = $groundHandlingObj->deleteRequest($objectID);
}
$allRequest = $groundHandlingObj->getAllGhRequest($fromDate, $toDate, $page);
$count = $groundHandlingObj->getAllRequestCount($fromDate, $toDate);
include 'html/ghrequestreport.php';
