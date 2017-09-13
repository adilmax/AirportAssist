<?php
require_once 'class/classGroundHandling.php';
if(!isset($_SESSION['userName'])){
    header("location:login.php");
    exit;
}
$groundHandlingObj = new airportAssGroundHandling\groundHandling;
$status = false;
$userDetails = [];
$conCode ="";

if (isset($_GET['d']) && $_GET['d'] !=""){
    $conCode = $_GET['d'];
    $userDetails = $groundHandlingObj->getDetails($conCode);
    if($userDetails){
    }
    $status = ($userDetails != false)?false:true;
    require_once('html/ghadminpage.php');
}else{
    header("HTTP/1.0 404 Not Found");
    echo "<h1>404 Not Found</h1>";
    echo "The page that you have requested could not be found.";
    exit();
}
require_once('html/ghadminpage.php');

?>