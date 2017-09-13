<?php
require_once 'class/classValidation.php';
require_once 'class/classBlog.php';

$validation = new airportAssValidation\inputValidation;
$blogModel = new airportAssBlog\blog;

$objectID = "";
$status = false;
$error = [];
$blogTitle ="";
$blogContent = "";
$blogImage = "";
$imageStatus = false;


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


if(isset($_GET['id'])){
    $objectID = $_GET['id'];
    $blogDetails = $blogModel->getBlogInfo($objectID); 
    $comment = $blogModel->fetchComments($objectID);
    
    $blogTitle = $blogDetails->title;
    if($blogDetails->image !=''){
         $blogImage = $blogDetails->image->getURL();
         $imageStatus = true;
    }
    $blogContent  = $blogDetails->content;
    
    if(isset($_POST['submit'])){
        $data = $_POST;
        $notRequired = [];
        $error = $validation->checkEmpty($data, $notRequired);
        if(count($error)==0){
            $status = $blogModel->addComment($data,$objectID);
        }
    }
    include('html/blogcomment.php');
    
}else{
    header("Http/1.0 404 Not Found");
    echo "<h1>404 Not Found</h1>";
    echo "The page that you have requested could not be found.".$objectID;
    exit();
}
