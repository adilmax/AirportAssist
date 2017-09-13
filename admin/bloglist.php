<?php

require_once 'class/classValidation.php';
require_once 'class/classBlogVerification.php';
if(!isset($_SESSION['userName'])){
    header("location:login.php");
    exit;
}
$validation = new airportAssValidation\inputValidation;
$blogModel = new airportAssBlogVerification\blogVerification;
$deletestatus = false;
if(isset($_GET['s'])){
    if($_GET['s'] == 1){
        $deletestatus = true;
    }
}
$page = 1;
if(isset($_POST['next'])|| isset($_POST['prev'])){    
    if(isset($_POST['page']) && $_POST['page']){
        $page = $_POST['page'];
    }
}

$blogList = $blogModel->fetchBlog($page);
$count = $blogModel->TotalCountBlog();

include 'html/bloglist.php';