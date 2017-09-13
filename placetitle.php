<?php


require_once 'class/classResponder.php';

if(isset($_POST['country'])){
    $country = $_POST['country'];
    $airportObject = new airportAssResponder\responder;
    $placeTitle = $airportObject->getPlaceTitle($country);
    echo json_encode($placeTitle);

}else{
    echo "sorry no such a file";
}