<?php

require_once __DIR__ . '/Facebook/autoload.php';

require 'class/classMobileUser.php';
use Facebook\Facebook as Facebook;


$fb = new Facebook([
	//'app_id' => '1617274408512337', //Web
	'app_id' => '1449018095403725',	  //mobile
	//'app_secret' => 'f613505991e0af5058576a77ea902a3f',		//web
	'app_secret' => 'c12e03205eb437aa73a625ed4c9df5a6',		//mobile
	'default_graph_version' => 'v2.5',
]);

//first check parse
$currentUser = Parse\ParseUser::getCurrentUser();

if($currentUser)
{
	//echo 'user is logged in, logging out';
	//ParseUser::logOut();
	$result['error'] = '';
	echo json_encode($result);
}
else
{
	$helper = $fb->getJavaScriptHelper();
	$oAuth2Client = $fb->getOAuth2Client();
	try {
		$accessToken = $helper->getAccessToken(); //getting short lived token
		$token = $accessToken;
	} 
	catch(Facebook\Exceptions\FacebookResponseException $e) {
		// When Graph returns an error
		//echo 'Graph returned an error: ' . $e->getMessage();
		$result['error'] = 'Graph returned an error: ' . $e->getMessage();
		echo json_encode($result);
	} 
	catch(Facebook\Exceptions\FacebookSDKException $e) {
		// When validation fails or other local issues
		//echo 'Facebook SDK returned an error: ' . $e->getMessage();
		$result['error'] = 'Facebook SDK returned an error: ' . $e->getMessage();
		echo json_encode($result);
	}


	if (! isset($accessToken))
	{
		//echo 'No cookie set or no OAuth data could be obtained from cookie.';
	}
	else
	{
		// Logged in
		//echo '<h3>Access Token</h3>';

		$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($token);
		$longToken = $longLivedAccessToken->getValue();  
		 
		$fb->setDefaultAccessToken($longLivedAccessToken);
	 
		$response = $fb->get('/me?fields=id,link,first_name,last_name,gender,email');

		$user = $response->getGraphUser();

		$user['picture'] = "https://graph.facebook.com/".$user['id']."/picture?type=small";

		$userObject = new airportAssMobUser\mobileUser;

		/*$fbUser = $userObject->checkFbUser($user['id']);
		if($fbUser)
		{
			$userArr['firstName'] = $fbUser->firstName;
			$userArr['lastName'] = $fbUser->lastName;
			$userArr['email'] = $fbUser->emailFB;
			$userArr['error'] = "";
			$result = json_encode($userArr);
		}
		else
		{
			$addStatus = $userObject->addUserFacebook($user);
			if($addStatus)
			{
				$userArr['firstName'] = $user['first_name'];
				$userArr['lastName'] = $user['last_name'];
				$userArr['email'] = $user['email'];
				$userArr['error'] = "";
				$result = json_encode($userArr);
			}
			else
			{
				$userArr['error'] = "Unable to Login. Please try again later.";
				$result = json_encode($userArr);
			}
		}*/

		$id = $user['id'];
		$email = $user['email'];

		$currentUser = Parse\ParseUser::logInWithFacebook($id, $longToken); //works
                $userObject->addUserFacebook($user,$currentUser);
                $userArr['firstName'] = $user['first_name'];
                $userArr['lastName'] = $user['last_name'];
                $userArr['email'] = $user['email'];
                $userArr['error'] = "";
                $result = json_encode($userArr);
                 
		echo $result;
	}
}