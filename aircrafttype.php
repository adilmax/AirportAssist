<?php


require_once 'class/classGroundHandling.php';
if(isset($_POST['aircraftType'])){
    $aircraftType = $_POST['aircraftType'];
    $groundHandlingObj = new airportAssGroundHandling\groundHandling;
    $aircraftTypeList = $groundHandlingObj->getAircraftSubType($aircraftType);
    echo json_encode($aircraftTypeList);

}else{
    echo "sorry no such a file";
}