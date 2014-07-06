<?php
use Helpers as Helpers;
class AdminController extends BaseController {

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

	// public function login() {
	// 	$email = Input::get('email');
	// 	$password = Input::get('password');
	// 	$data = array('email' => $email, 'password' => $password);

	// 	if (Auth::attempt(array('email' => $email, 'password' => $password,)))
	// 	{
	// 		$company = Company::where('email', '=', $email)->first();
	// 		$id = $company->id;
	// 		Session::put('company_id', $id);
	// 		$result = array (
	// 			"result" => true,
	// 			"id" => $id
	// 		);
	// 		//return json_encode($result);
 //    		return Response::json($result);
 //    		//echo("yes");
	// 	}else {
	// 		$result = array (
	// 			"result" => false,
	// 		);
	// 		//return json_encode($result);
 //    		return Response::json($result);
 //    		//echo("no");
	// 	}

	// }
	public function logout() {
		if(Request::ajax()) {
			Auth::logout();
			$result = array(
				"result"=>"ok",
			);
			return Response::json($result);
		}
	}

	public function showAdminPage() {
		Session::forget("current_company_id");
		return View::make("pages.admin.admin");
	}

	public function showAdminLoginPage() {
		//$this->createNewAdmin();
		return View::make("pages.admin.admin_login");
		//return Redirect::secure(Request::path());
	}
	public function createNewAdmin() {
		$name = "DartMarcius";
		$password = "111111";
		$passwordHash = Hash::make($password);
		$email = "marksidius@gmail.com";
		$newAdmin = new Admin;
		$newAdmin->name = $name;
		$newAdmin->email = $email;
		$newAdmin->password = $passwordHash;
		$newAdmin->save();
	}
	/*public function getCompanyName() {
		if(Request::ajax()) {
			$company_data = Company::where('id', "=", Session::get('company_id'))->first();
			$name = $company_data->name;
			$result = array(
				"name"=>"$name",
			);
			return Response::json($result);
		}
	}*/

}
