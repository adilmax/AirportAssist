<?php
session_start();
require_once("captcha.php");
require_once 'class/classValidation.php';
require_once 'class/classUser.php';

$validation = new airportAssValidation\inputValidation;
$userModel = new airportAssUser\user;
$error = [];
$status = false;
if(isset($_POST['contact'])){
    $data = $_POST;
   if($_SESSION['captcha']['code'] == $_POST['captcha']){
       $error = $validation->checkEmpty($data, []);
       if(count($error)== 0){
           $userModel->sendContactMessage($data);
           $userModel->sendContactMail($data);
           header("Location:thankyou");
       }
   }else{
       $error[0] = "Verification code incorrect";
   }
}
$serverNameValue = $_SERVER['SERVER_NAME'];
$serverName = str_replace("www.", "", $serverNameValue);
$isCity = $validation->isCityDomain($serverName);
$airportInfoUrl = "";
$formatName = $validation->FormatName($serverName);
if($formatName != false){
$domainName = $formatName['domainName'];
$titleValue = $formatName['titleName'];
}else{
   $domainName =  $serverName;
   $titleValue = $serverName;
}
$_SESSION['title'] = $titleValue;
include 'html/contact.php';

