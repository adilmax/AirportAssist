<?php

require_once 'class/classValidation.php';
require_once 'class/classBlog.php';

$validation = new airportAssValidation\inputValidation;
$blogModel = new airportAssBlog\blog;

$status = false;
$error = [];
if(isset($_POST['submit'])){
    $data = $_POST;
    $notRequired = ['tags'];
    $error = $validation->checkEmpty($data, $notRequired);
    
    if(count($error)==0){
        $status = $blogModel->addBlog($data);
    }
    
}
$serverNameValue = $_SERVER['SERVER_NAME'];
$serverName = str_replace("www.", "", $serverNameValue);
$isCity = $validation->isCityDomain($serverName);
$formatName = $validation->FormatName($serverName);
if($formatName != false){
$domainName = $formatName['domainName'];
$titleValue = $formatName['titleName'];
}else{
   $domainName =  $serverName;
   $titleValue = $serverName;
}
include 'html/blogpost.php';