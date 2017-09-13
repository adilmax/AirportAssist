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


$type = "";
$allRequest = $userModel->getAllCorporateTravelDetails($type);

$typeList = [1=>'Corporate',2=>'Travel Agent',3=>'Responder'];

if(isset($_POST['submit'])){
    $data =$_POST;
    $allRequest = $userModel->getAllCorporateTravelDetails($data['type']);
}

include 'html/corporatetravelagentdetails.php';
