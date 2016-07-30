<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControlUser
 *
 * @author marcw
 */
class UserController {

	public static function Create() {

		if ($_POST["submit"]) {
			$User = new User();
			$iscorrect = array();
			$iscorrect = array(
				"ID" => (bool) $User->setID($_POST["ID"]),
				"RePassword" => (bool) $User->setPassword($_POST["password"]),
				"password" => (bool) ($_POST["password"] === $_POST["RePassword"]),
				"fullName" => (bool) $User->setfullName($_POST["fullName"]),
				"email" => (bool) $User->setEmail($_POST["email"]),
				"phoneNumber" => (bool) $User->setPhoneNumber($_POST["phoneNumber"]),
				"gender" => (bool) $User->setGender($_POST["gender"]),
				"birthDate" => (bool) $User->setBirthDate($_POST["BirthdayYear"], $_POST["BirthdayMonth"], $_POST["BirthdayDay"]),
				"IDtaken" => (bool) $User->isIDAvailable($_POST["ID"]),
				"emailtaken" => (bool) $User->isEmailAvailable($_POST["email"]),
			);
			if (Validation::valAll($iscorrect)) {
				$User->create();
				Header::Location("signup_success.php");
				exit;
			}
		}
	}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public static function Update() {
		User::CheckLogin();
		$User = new User();
		$User->read(User::getSessionUserID());

		if (isset($_POST["submit"])) {
			$User->setLastUpdateDate();
			$iscorrect = array(
				"OldPassword" => (bool) $User->isCorrectPassword($_POST["OldPassword"]),
				"fullName" => (bool) $User->setfullName($_POST["fullName"]),
				"emailtaken" => (bool) $User->isEmailAvailable($_POST["email"]) || $_POST["email"] == $User->getEmail(),
				"email" => (bool) $User->setEmail($_POST["email"]),
				"phoneNumber" => (bool) $User->setPhoneNumber($_POST["phoneNumber"]),
				"gender" => (bool) $User->setGender($_POST["gender"]),
				"birthDate" => (bool) $User->setBirthDate($_POST["BirthdayYear"], $_POST["BirthdayMonth"], $_POST["BirthdayDay"]),
				"about" => (bool) $User->setAbout($_POST["about"])
			);
			if (Validation::valAll($iscorrect)) {
				$User->update();
				$Passed = true;
			}
		}
	}

	public static function UpdatePW() {
		User::CheckLogin();
		$User = new User();
		$User->read(User::getSessionUserID());
		if (isset($_POST["submit"])) {
			$User->setLastUpdateDate();
			$iscorrect = array(
				"OldPassword" => (bool) $User->isCorrectPassword($_POST["OldPassword"]),
				"RePassword" => (bool) $_POST["password"] === $_POST["RePassword"],
				"password" => (bool) $User->setPassword($_POST["password"]),
			);
			if (Validation::valAll($iscorrect) && $User->update()) {
				$Passed = true;
			}
		}
	}

	public static function Login() {
		if (isset($_POST["submit"])) {
			$user = new User();
			$isLogin = $user->Login($_POST["ID"], $_POST["Password"]);
			if ($isLogin) {
				header('Location: index.php');
			}
		}
		return $isLogin;
	}

}
