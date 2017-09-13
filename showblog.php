<?php
require_once 'class/classValidation.php';
require_once 'class/classBlog.php';

$validation = new airportAssValidation\inputValidation;
$blogModel = new airportAssBlog\blog;


$status = false;
$error = [];
$statusSub = false;
$errorSub = [];
$page = 1;
$email = "";
$notRequired = [];

if(isset($_POST['next'])|| isset($_POST['prev'])){

    $data = $_POST;
    if(isset($_POST['page']) && $_POST['page']){
        $page = $_POST['page'];
    }    
     $blog = $blogModel->fetchBlog($page);
}else if(isset($_POST['search'])){
    $data = $_POST;
    
    if(isset($_POST['page']) && $_POST['page']){
        $page = $_POST['page'];
    } 
    
    $notRequired = ['email'];
    $error = $validation->checkEmpty($data, $notRequired);
    if(count($error)==0){        
        $date = new DateTime($data['date']);
        $blog = $blogModel->fetchSpecificBlog($page,$date);        
    }else{
        $blog = $blogModel->fetchBlog($page);
    }    
}else if(isset($_POST['submit'])){
    $data = $_POST;
    
    if(isset($_POST['page']) && $_POST['page']){
        $page = $_POST['page'];
    } 
    
     $notRequired = ['date'];
    $errorSub = $validation->checkEmpty($data, $notRequired);
    
    if(count($errorSub)==0){
        $email = $data['email'];
        $errorSub = $blogModel->emailValidation($email);
        if(count($errorSub)==0){
            $errorSub = $blogModel->checkEmail($email);
            if(count($errorSub)==0){
                $statusSub = $blogModel->addSubscriber($email);
            }            
        }        
    }
    
    $blog = $blogModel->fetchBlog($page); 
}else{
    $blog = $blogModel->fetchBlog($page);
}

$count = $blogModel->TotalCount();

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

include 'html/showblog.php';