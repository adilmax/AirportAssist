<?php

require_once 'class/classBlogVerification.php';
if(!isset($_SESSION['userName'])){
    header("location:login.php");
    exit;
}
$blogModel = new airportAssBlogVerification\blogVerification;

if(isset($_GET['id'])){    
   $objectID = $_GET['id'];
   $status = ($_GET['type'] == "true")?true:false;
   $verifyStatus = $blogModel->changeCommentStatus($objectID,$status);
    
    if($verifyStatus){
        header("Location:verifycomment");
    }else{
        echo "Exception";
    }
    
    
}else{
    header("Http/1.0 404 Not Found");
    echo "<h1>404 Not Found</h1>";
    echo "The page that you have requested could not be found.";
    exit();
}


