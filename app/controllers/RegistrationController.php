<?php
use Helpers as Helpers;
class RegistrationController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function preRegisterAndSentEmail() {
		$preRegisterStatus = $this->preRegister();
		$registration_confirm_message = array (
			"message" => Helpers::getRegistrationMessage($preRegisterStatus)
		);
		return View::make('pages.registration_confirm', $registration_confirm_message);
		

	}

	public function preRegister() {
		$name = Input::get('name');
		$email = Input::get('email');
		$emailConfirm = Input::get('email-confirm');
		$country = Input::get('country');
		$password = Input::get('password');
		$passwordConfirm = Input::get('password-confirm');
		$description = Input::get('about');
		$result = "ok";
		//echo ($name);
		//$this->pushToDB();
		$validPasswords = Helpers::validetePasswords($password, $passwordConfirm);
		$validEmails = Helpers::valideteEmails($email, $emailConfirm);
		$validName = Helpers::validName($name);
		$validDescription = Helpers::validDescription($description);
		//echo($validPasswords);
		//echo($validEmails);
		//echo($validName);
		if(!$validPasswords || !$validEmails || !$validName || !$validDescription) {
			$result = "badData";
			return $result;
		}
		$company = Company::where('email', '=', $email)->get();
		$companyExists = false;
		if(count($company) > 0) {
			$companyExists = true;
		}
		if($companyExists) {
			$result = "exists";
			return $result;
		}

		$company = new Company;

		$company->name = $name;
		$company->email = $email;
		$company->password = Hash::make($password);
		$company->country = $country;
		$company->registration_confirm_key = Hash::make($password).Hash::make($email);
		$company->description = $description;
		$company->touch();

		$this->sentEmail($company->email, $company->name, $company->registration_confirm_key);
		$company->save();
		return $result;
		//echo($company::get("id"));
	}

	public function sentEmail($email, $company_name, $registration_confirm_key) {
		$data = array (
			"registration_confirm_key" => $registration_confirm_key,
			"host" => $_ENV['host_name'],
		);
		$email_data = array (
			"name" => $company_name,
			"email" => $email,
		);
		Mail::send('emails.register.register', $data, function($message) use($email_data)
		{
    		$message->to($email_data["email"], $email_data["name"])->subject('Confirm your registration on sigmachain.com');
		});
	}

	public function confirmOrDecline() {
		$link = Input::get('link');
		$status = "confirm_ok";
		$companyExists = false;

		$companyModel = Company::where('registration_confirm_key', '=', $link);
		//$companyModel->save();
		//var_dump($companyModel->get()[0]->name);
		$company = $companyModel->get();
		//var_dump($companyModel->first());
		if(count($company) > 0) {
			$companyExists = true;
		}
		if(!$companyExists) {
			$status = "noSuchCompany";
			return $status;
		}

		$rowToSave = $companyModel->first();
		$current_registration_status = $rowToSave->registration_status;
		//var_dump($current_registration_status);
		if($current_registration_status == 0) {
			$rowToSave->registration_status = 1;
			$rowToSave->save();
		}else {
			if($current_registration_status == 1) {
				$status = "registredAllready";
				return $status;
			}else {
				$status = "badData";
				return $status;
			}
			
		}

		return $status;
	}

	public function confirmRegistration()
	{
		$confirmStatus = $this -> confirmOrDecline();

		$registration_confirm_message = array (
			"message" => Helpers::getRegistrationMessage($confirmStatus),
		);
		if($confirmStatus != "confirm_ok") {
			return View::make('pages.registration_confirm', $registration_confirm_message);
		}else {
			$link = Input::get('link');
			$companyModel = Company::where('registration_confirm_key', '=', $link);
			$company = $companyModel->first();
			$id = $company->id;
			Auth::loginUsingId($id);
			Session::put('company_id', $id);
			return Redirect::to('company/'.$id);
		}

	}

}
