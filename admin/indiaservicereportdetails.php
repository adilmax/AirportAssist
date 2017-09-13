<?php
/**
 * Created by PhpStorm.
 * User: Adil
 * Date: 3/23/2017
 * Time: 1:50 PM
 */

require_once 'class/classAirportServices.php';

if(!isset($_SESSION['userName'])){
    header("location:login.php");
    exit;
}
$userModel = new airportServices\services;
$status = false;
$userDetails = [];
$conCode = "";
if (isset($_GET['d']) && $_GET['d'] !=""){
    $conCode = $_GET['d'];
    $userDetails = $userModel->getDetails($conCode);
    if($userDetails->currency != ""){
        $userDetails->currency->fetch();
    }
    $status = ($userDetails != false)?false:true;
    require_once('html/indiaservicereportdetails.php');
}else{
    header("HTTP/1.0 404 Not Found");
    echo "<h1>404 Not Found</h1>";
    echo "The page that you have requested could not be found.";
    exit();
}
?>