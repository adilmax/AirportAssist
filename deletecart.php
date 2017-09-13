<?php
session_start();
$deleteIndex = $_GET['d'];

if(isset($_SESSION['content'][$deleteIndex])){
   
    unset($_SESSION['content'][$deleteIndex]);
    $_SESSION['content'] = array_values($_SESSION['content']);
    header("Location:viewgiftcart");
}

?>

