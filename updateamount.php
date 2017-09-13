<?php 
require_once 'class/classUser.php';
$userModel  = new airportAssUser\user;
if(isset($_POST['amount'])){ 
   $conCode = $_POST['conCode'];
   $amount = $_POST['amount'];
   $advance = $_POST['advance'];
   //echo $conCode." ".$amount;
   $status = $userModel->updateAmount($conCode, $amount, $advance);
   echo $status;
}else{
    header("Http/1.0 404 Not Found");
    echo "<h1>404 Not Found</h1>";
    echo "The page that you have requested could not be found.";
    exit();
}
//$status = $userModel->updateAmount("0hbCwAPfAS", 20);
   //echo $status;
?>
