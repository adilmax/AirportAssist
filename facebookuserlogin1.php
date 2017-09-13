<?php

require_once 'class/classParseSettings.php';
require 'class/classUser.php';

$userObject = new airportAssUser\user;

$user = $userObject->checkFbUser($_POST['id']);
if($user)
{
	$userArr['firstName'] = $user->firstName;
	$userArr['lastName'] = $user->lastName;
	$userArr['email'] = $user->emailFB;
	echo json_encode($userArr);
}
else
{
	$result = $userObject->addUserFacebook($_POST);
	echo $result;
}