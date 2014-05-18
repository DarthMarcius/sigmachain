<?php
	class Helpers {
		public static function validetePasswords($password, $password_confirm) {
			if($password != $password_confirm) {
				return false;
			}
			if(strlen($password) < 6 || strlen($password) > 50) {
				return false;
			}

			if(strlen($password_confirm) < 6 || strlen($password_confirm) > 50) {
				return false;
			}

			return true;
		}

		public static function valideteEmails($email, $email_confirm) {
			$regexp = "/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\\.[A-Z]{2,4}$/i";
			if($email != $email_confirm) {
				return false;
			}
			if(!preg_match($regexp, $email)) {
				return false;
			}
			if(!preg_match($regexp, $email_confirm)) {
				return false;
			}

			return true;
		}

		public static function validName($name) {
			if(strlen($name) < 1 || strlen($name) > 100) {
				return false;
			}

			return true;
		}

		public static function validDescription($description) {
			if(strlen($description) > 300) {
				return false;
			}

			return true;
		}

		public static function getRegistrationMessage($status) {
			$result = "";
			switch($status) {
				case "exists":
				$result = "Company with such email is already registred.";
				break;
				case "ok":
				$result = "Welcome to SigmaChain. To Finish your registration, please open the link we just sent to your email.";
				break;
				case "badData":
				$result = "Something is wrong with input data.";
				break;
				case "confirm_ok":
				$result = "You you confirmed your registration, you will be redirected to your company dashboard now.";
				break;
				case "registredAllready":
				$result = "You already confirmed your company registration.";
				break;
				case "noSuchCompany":
				$result = "This registration link is deprecated.";
				break;
			}
			return $result;
		}
	}
?>