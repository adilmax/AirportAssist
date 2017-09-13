<?php
session_start();
if (isset($_POST['Submit'])) {

    $login [0] = ['userName' => 'christine',
        'password' => 'Pssv@$24',
        'name' => 'Christine Michael'];

    $login [1] = ['userName' => 'AdminAirport',
        'password' => 'MUrgency!@#*()',
        'name' => 'Super Admin'];

    $login [2] = ['userName' => 'sunitha',
        'password' => 'MUrgency!@#*()',
        'name' => 'Sunitha Markose'];

    $login [3] = ['userName' => 'Airport',
        'password' => 'Pssv@$24',
        'name' => 'Others'];

    $login [4] = ['userName' => 'manjula',
        'password' => 'manjula@airportassit',
        'name' => 'manjula'];

    $login [5] = ['userName' => 'anand',
        'password' => 'anand@airportassit',
        'name' => 'anand'];

    $userName = isset($_POST['userName']) ? $_POST['userName'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $status = false;
    for ($i = 0; $i < count($login); $i++) {
        if ($login[$i]['userName'] == $userName && $login[$i]['password'] == $password) {
            $_SESSION['user'] = $login[$i];
            $_SESSION['userName'] = $userName;
            $status = true;
            if ($userName === 'Airport') {
                header("location:blogpost.php");
            } else {
                header("location:requestreport.php");
            }
        }
    }
    if ($status == false) {
        $msg = "<span>Username or Password wrong!</span>";
    }
}
include_once 'html/login.php';
?>