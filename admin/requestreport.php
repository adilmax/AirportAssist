<?php
/*
 * controller which handle the request report..
 */

require_once 'class/classUser.php';
if(!isset($_SESSION['userName'])){
    header("location:login.php");
    exit;
}
$userModel = new airportAssUser\user;

$fromDate = "";
$toDate = "";
$deleteStatus = false;
if(isset($_GET['id']) && $_GET['d']==1){
    $objectID = $_GET['id'];
    $deleteStatus = $userModel->deleteRequest($objectID);
}
$page = 1;
$firstName ="";
$lastName = "";
$email = "";
$mobile = "";

if ($_SESSION['userName'] == 'manjula' || $_SESSION['userName'] == 'anand' ){
    $requestStatus = 3;
}else{
    $requestStatus = "";

}
if (isset($_POST['search']) || isset($_POST['next'])|| isset($_POST['prev'])){
    $data = $_POST;
    if(isset($_POST['page']) && $_POST['page']){
        $page = $_POST['page'];
    }
    if(isset($_POST['firstName']) && $_POST['firstName']!=""){
        $firstName = $_POST['firstName'];
    }
    if(isset($_POST['lastName']) && $_POST['lastName']!=""){
        $lastName = $_POST['lastName'];
    }
    if(isset($_POST['email']) && $_POST['email']!=""){
        $email = $_POST['email'];
    }
    if(isset($_POST['mobile']) && $_POST['mobile']!=""){
        $mobile = $_POST['mobile'];
    }
    if(isset($_POST['status']) && $_POST['status']!=""){
       $requestStatus = $_POST['status'];
    }
}
$allRequest = $userModel->getAllRequest($fromDate, $toDate, $page, $firstName, $lastName, $email, $mobile,$requestStatus);
$count = $userModel->getAllRequestCount($fromDate, $toDate);



$flightType = [1=>'Arrival',2=>'Departure',3=>'Transit'];
$status = [1=>"Pending",2=>'Processed',3=>'Payment Success',4=>'Refund',5=>'Closed',6=>'Cancelled'];
include 'html/requestreport.php';
