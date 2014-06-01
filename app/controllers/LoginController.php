<?php
use Helpers as Helpers;
class LoginController extends BaseController {

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

	public function login() {
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

	}

}
