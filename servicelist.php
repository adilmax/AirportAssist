<?php
require_once 'class/classUser.php';
if(isset($_POST['serviceType'])){
    $userModel = new airportAssUser\user;
    $serviceType = $_POST['serviceType'];
    $serviceList = $userModel->getSeviceList($serviceType);
    echo json_encode($serviceList);
    
}else{
    header("Http/1.0 404 Not Found");
    echo "<h1>404 Not Found</h1>";
    echo "The page that you have requested could not be found.";
    exit();
}
