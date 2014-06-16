<?php
use Helpers as Helpers;
class ProfileUpdateController extends BaseController {

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

	/*public function login() {
		$email = Input::get('email');
		$password = Input::get('password');
		$data = array('email' => $email, 'password' => $password);

		if (Auth::attempt(array('email' => $email, 'password' => $password,)))
		{
			$company = Company::where('email', '=', $email)->first();
			$id = $company->id;
			Session::put('company_id', $id);
			$result = array (
				"result" => true,
				"id" => $id
			);
			//return json_encode($result);
    		return Response::json($result);
    		//echo("yes");
		}else {
			$result = array (
				"result" => false,
			);
			//return json_encode($result);
    		return Response::json($result);
    		//echo("no");
		}

	}*/
	public $restful = true;
	public function updateOfficeLocation() {
		if(Request::ajax()){
			$result = array (
				"result" => "error",
			);
			$latitude = Input::get('latitude');
			$longitude = Input::get('longitude');
			$company_data = CompanyData::where('company_id', "=", Session::get('company_id'))->first();
			$company_data->latitude = $latitude;
			$company_data->longitude = $longitude;
			$company_data->save();
			$result = array (
				"result" => "ok",
			);
			return Response::json($result);
		}
	}

	public function updateLogo() {
		if(Request::ajax()){
			$input = Input::all();
			$rules = array(
				'photo' => 'required|image|max:5000',
			);
			$res = "ok";
			
			$validation = Validator::make($input, $rules);
			if($validation->fails()) {
				$res = "false";
			}

			$extension = File::extension($_FILES['photo']['name']);
			$directory = public_path() . DIRECTORY_SEPARATOR ."img".DIRECTORY_SEPARATOR."logos".DIRECTORY_SEPARATOR;
			$filename = sha1(Auth::user()->id).".{$extension}";
			$upload_success = Input::file('photo')->move($directory, $filename);

			$company_data = CompanyData::where('company_id', "=", Session::get('company_id'))->first();
			$company_data->logo_url = $filename;
			$company_data->save();

			$result = array (
				"result" => "res",
			);
			return Response::json($result);
		}
	}

	public function updateCompanyInfo() {
		if(Request::ajax()){
			/*$company_data = Company::where('id', "=", Session::get('company_id'))->first();
			$company_data->logo_url = $filename;
			$company_data->save();*/
		}
	}

	public function updateContactInfo() {
		if(Request::ajax()){
			/*$company_data = CompanyData::where('company_id', "=", Session::get('company_id'))->first();
			$company_data->logo_url = $filename;
			$company_data->save();*/
		}
	}

	public function updatePassword() {
		if(Request::ajax()){
			/*$company_data = Company::where('id', "=", Session::get('company_id'))->first();
			$company_data->logo_url = $filename;
			$company_data->save();*/
		}
	}

	public function updateEmail() {
		if(Request::ajax()){
			/*$company_data = Company::where('id', "=", Session::get('company_id'))->first();
			$company_data->logo_url = $filename;
			$company_data->save();*/
		}
	}

}
