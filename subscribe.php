<?php
require_once 'class/classAirportsubscription.php';

$subscription = new airportSubscribe\subscribe;
if(isset($_POST['email'])){
    $email = $_POST['email'];
    $status = $subscription->addSubscribe($email);
    echo $status;
    
}else{
    header("Http/1.0 404 Not Found");
    echo "<h1>404 Not Found</h1>";
    echo "The page that you have requested could not be found.";
    exit();
}
