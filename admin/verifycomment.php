<?php

require_once 'class/classBlogVerification.php';
if(!isset($_SESSION['userName'])){
    header("location:login.php");
    exit;
}
$blogModel = new airportAssBlogVerification\blogVerification;

$page = 1;
if(isset($_POST['next'])|| isset($_POST['prev'])){    
    if(isset($_POST['page']) && $_POST['page']){
        $page = $_POST['page'];
    }
}
$comment = $blogModel->fetchComments($page);
$count = $blogModel->TotalCount();


include 'html/verifycomment.php';