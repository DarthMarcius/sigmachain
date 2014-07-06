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
			$company_data = CompanyData::where('company_id', "=", Session::get('current_company_id'))->first();
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
			$directory = base_path() .DIRECTORY_SEPARATOR. $_ENV['public_folder_name'] . DIRECTORY_SEPARATOR ."img".DIRECTORY_SEPARATOR."logos".DIRECTORY_SEPARATOR;
			$filename = sha1(Session::get('current_company_id')).".{$extension}";
			$upload_success = Input::file('photo')->move($directory, $filename);

			$company_data = CompanyData::where('company_id', "=", Session::get('current_company_id'));
			$company_data = $company_data->first();
			$company_data->logo_url = $filename;
			$company_data->save();

			$result = array (
				"result" => "$res",
			);
			return Response::json($result);
		}
	}

	public function updateCompanyInfo() {
		if(Request::ajax()){
			$input = Input::all();
			$res = "ok";
			$company_data = Company::where('id', "=", Session::get('current_company_id'))->first();
			$company_data->name = $input["name"];
			$company_data->country = $input["country"];
			$company_data->description = $input["description"];
			$company_data->save();
			
			$result = array (
				"result" => "$res",
			);
			return Response::json($result);
		}
	}

	public function updateCompanyContactInfo() {
		if(Request::ajax()){
			$input = Input::all();
			$res = "ok";
			$company_data = CompanyData::where('company_id', "=", Session::get('current_company_id'))->first();
			$company_data->address = $input["address"];
			$company_data->phone = $input["phone"];
			$company_data->skype = $input["skype"];
			$company_data->save();
			$result = array (
				"result" => "$res",
			);
			return Response::json($result);
		}
	}

	public function updateCompanyPass() {
		if(Request::ajax()){
			$input = Input::all();
			$res = "ok";
			$company_data = Company::where('id', "=", Session::get('current_company_id'))->first();

			if(!Hash::check($input["oldPassword"], $company_data->password)) {
				$res = "wrong old password";
				$result = array (
				"result" => "$res",
				);
				return Response::json($result);
			}

			$company_data->password = Hash::make($input["password"]);
			$company_data->save();

			$result = array (
				"result" => "$res",
			);
			return Response::json($result);
		}
	}

	public function updateCompanyEmail() {
		if(Request::ajax()){
			$input = Input::all();
			$res = "ok";
			$company_data = Company::where('id', "=", Session::get('current_company_id'))->first();
			$company_data->email = $input["email"];
			$company_data->save();
			$result = array (
				"result" => "$res",
			);
			return Response::json($result);
		}
	}

}
