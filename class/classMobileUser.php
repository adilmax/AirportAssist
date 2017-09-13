<?php
namespace airportAssMobUser;
require_once 'classParseSettingsMobile.php';

class mobileUser{
    public function checkFbUser($fbId)
	{
		$object = new \Parse\ParseQuery("_User");
        $object->equalTo("fbId", $fbId);

		try {
			$results = $object->find();
			if(count($results)>0)
			{
				return $results[0];
			}
			else
			{
				return false;
			}
		}
		catch(ParseException $e){
			return false;
		}
	}


	public function addUserFacebook($userData,$currentUser)
	{
		/*$object = new \Parse\ParseObject("_User");

		$random = $this->generateRandomString();
		$object->set('username',$random);
		$object->set('password',$random);*/
		
		$currentUser->set('fbId',$userData['id']);
                $currentUser->set('linkUrl',$userData['link']);
		$currentUser->set('firstName',ucfirst($userData['first_name']));
		$currentUser->set('firstNameLC',strtolower($userData['first_name']));
		$currentUser->set('lastName',ucfirst($userData['last_name']));
		$currentUser->set('lastNameLC',strtolower($userData['last_name']));
		$currentUser->set('gender',$userData['gender']);
		$currentUser->set('emailFB',$userData['email']);
		$currentUser->set('regSource','web');
		$currentUser->set('imageUrl',$userData['picture']);
		
		try {
			$currentUser->save();
			return true;
		}
		catch(ParseException $e){
			return false;
		}
	}

	function generateRandomString($length = 15)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++)
		{
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
        
        public function addTestUser(){
           $object = new \Parse\ParseObject("_User");;
           $object->set('username',"testing123");
           $object->set("password",$this->generateRandomString());
           $object->save();
        }

}


