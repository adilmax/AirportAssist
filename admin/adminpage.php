<?
require_once 'class/classUser.php';

if(!isset($_SESSION['userName'])){
    header("location:login.php");
    exit;
}

$userModel  = new airportAssUser\user;
$status = false;
$userDetails = [];
$conCode = "";
$requestStatus = 1;
$services  = [1=>"Meet traveler at the curb",2=>'Escorted through security',3=>'Access to private airline clubs',4=>'Constant monitoring of flights',
        5=>'Seat assignments',6=>'Assist with upgrades',7=>'Re-booking arrangements',8=>'Pre-boarding',9=>'Any special requests'
];
$title = ['Mr'=>'Mr','Miss'=>'Miss','Mrs'=>'Mrs','Ms'=>'Ms'];
$flightType = [1=>'Arrival',2=>'Departure',3=>'Transit'];
$classOfTravel = [1=>'Economy',2=>'Buisness',3=>'First',4=>'Premium Economy'];
$closedPersonName = $_SESSION['user']['name'];
if (isset($_GET['d']) && $_GET['d'] !=""){
    $conCode = $_GET['d'];
    $userDetails = $userModel->getDetails($conCode); 
    if($userDetails->currency != ""){
        $userDetails->currency->fetch();
    }
    $status = ($userDetails != false)?false:true;
    $requestStatusArray = [1=>"Pending",2=>'Processed',3=>'Payment Success',4=>'Refund',5=>'Closed',6=>'Cancelled'];
    if($userDetails->status != ""){
        $requestStatus = $userDetails->status;
    }
    if(isset($requestStatusArray[$requestStatus ])){
        $requestStatusValue = $requestStatusArray[$requestStatus];
    }else{
         $requestStatusValue = "-";
    }
    require_once('html/adminpage.php');
}else{
    header("HTTP/1.0 404 Not Found");
    echo "<h1>404 Not Found</h1>";
    echo "The page that you have requested could not be found.";
    exit();
}
?>
 
