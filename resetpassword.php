<?php
require_once 'class/classResponder.php';
$responderModel = new airportAssResponder\responder;
if($_POST['email']){
    $email = $_POST['email'];
    echo $status = $responderModel->resetPassword($email);     
}else{
    header("Http/1.0 404 Not Found");
    echo "<h1>404 Not Found</h1>";
    echo "The page that you have requested could not be found.";
    exit();
}


