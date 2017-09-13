<?php 
require_once 'class/classParseSettings.php';
require_once 'class/classValidation.php';

if(isset($_POST['fullNumber'])){  
    $validation = new airportAssValidation\inputValidation;
    $mobileNumber = $_POST['fullNumber'];
    $mobileCheck = $validation->checkMobileNumber($mobileNumber);
    if($mobileCheck){
        mt_srand((double)microtime()*1000000); 
        $randNumber = mt_rand(10000,99999); 
        $result = \Parse\ ParseCloud::run('sendcode', ["Code"=>$randNumber,'MobNumber'=>$mobileNumber]);         
        if($result == "true"){
            echo $randNumber;
        }else{
            echo 2;
        }
       // echo $randNumber;
    }else{
        echo 3;
    }
}else{
    echo "no such a page.";
}
?>