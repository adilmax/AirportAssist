<?php
require_once 'class/classValidation.php';
require_once 'class/classBlog.php';

$validation = new airportAssValidation\inputValidation;
$blogModel = new airportAssBlog\blog;

$showblogCategory = [1=>'Travel Trends',2=>'Travel Tips',3=>'Travel News',4=>'Travel Money'];

$status = false;
$error = [];
$statusSub = false;
$errorSub = [];
$page = 1;
$email = "";
$notRequired = [];
$date ="";

if (isset($_GET["id"])) {
    $category = $_GET["id"];
} else {
    $category = "";
}

if(isset($_POST['next'])|| isset($_POST['prev'])){

    $data = $_POST;
    if(isset($_POST['page']) && $_POST['page']!=""){
        $page = $_POST['page'];
    }    
     $blog = $blogModel->fetchBlog($page, $category, $date);
}else if(isset($_POST['search'])){
    $data = $_POST;
    
    if(isset($_POST['page']) && $_POST['page']){
        $page = $_POST['page'];
    } 
    if(isset($_POST['date']) && $_POST['date']!=""){
        $date = new DateTime($data['date']);
    } 
    if(isset($_POST['category']) && $_POST['category']!=""){
        $category = $_POST['category'];
        
    } 
    $blog = $blogModel->fetchBlog($page, $category,$date);   
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
    
    $blog = $blogModel->fetchBlog($page,$category, $date); 
}else{
    $blog = $blogModel->fetchBlog($page,$category, $date);
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