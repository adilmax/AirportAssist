<?php

require_once 'class/classValidation.php';
require_once 'class/classBlogVerification.php';

if(!isset($_SESSION['userName'])){
    header("location:login.php");
    exit;
}

$validation = new airportAssValidation\inputValidation;
$blogModel = new airportAssBlogVerification\blogVerification;

$blogpostCategory = [1=>'Travel Trends',2=>'Travel Tips',3=>'Travel News',4=>'Travel Money'];

$blogSection = ['airport'=>'Airport Assistance','emergency'=>'Emergency Assistance','medical'=>'Medical Care'];

$objectID = "";
$status = false;
$error = [];
$blogTitle = "";
$blogContent = "";
$tags = "";
$image = "";
$imgStatus = false;
$type = "";
$category = "";

if(isset($_GET['id'])){
    $objectID = $_GET['id'];
    
     if(isset($_POST['submit'])){
        $data = $_POST;
        $notRequired = ['tags'];
        $error = $validation->checkEmpty($data, $notRequired);

        if((count($error)==0) && $objectID != ""){
            $status = $blogModel->updateBlog($data,$objectID);
        }
        if((count($error)==0) && $objectID == ""){
            $status = $blogModel->addBlog($data);
        }

    }
    
        $blogDetails = $blogModel->getBlogInfo($objectID); 
        $blogDetails->fetch();
        $blogTitle = $blogDetails->title;
        $blogContent = $blogDetails->content;
        $tags = $blogDetails->tags;
        $category = $blogDetails->category;
        $type = $blogDetails->type;
        if($blogDetails->image != ""){
            $image = $blogDetails->image->getURL();
            $imgStatus = true;
    }    
    
    include 'html/blogpost.php';

    
    }else{
    if(isset($_POST['submit'])){
        $data = $_POST;
        $notRequired = ['tags'];
        $error = $validation->checkEmpty($data, $notRequired);
        
        if((count($error)==0) && $objectID == ""){
            $status = $blogModel->addBlog($data);
        }

    }
	 
	
    include 'html/blogpost.php';
}

    
    
  


