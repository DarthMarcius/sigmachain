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
		if(Request::ajax()){
			$email = Input::get('email');
			$password = Input::get('password');
			$data = array('email' => $email, 'password' => $password);
			/*
			Client Admin Auth Switch
			*/
				 Config::set('auth.model', 'Company');
				 Config::set('auth.table', 'companies');
			/*
			Client Admin Auth Switch end
			*/
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

	public function adminLoginStep1() {
		if(Request::ajax()){
			$name = Input::get('name');
			$password = Input::get('password');
			$data = array('name' => $name, 'password' => $password);

			//Client Admin Auth Switch
				 Config::set('auth.model', 'Admin');
				 Config::set('auth.table', 'admins');
			//Client Admin Auth Switch end

			if (Auth::validate(array('name' => $name, 'password' => $password,)))
			{
				$admin = Admin::where('name', '=', $name)->first();
				$email = $admin->email;
				$name = $admin->name;
				$secret_enter_key = Hash::make($admin->password.rand(0, 1000));
				$admin->secret_enter_key = $secret_enter_key;
				$admin->save();
				$this->sentEmail($name, $email, $secret_enter_key);
				//$this->sentEmail();
				$result = array (
					"result" => true
				);
	    		return Response::json($result);
			}else {
				$result = array (
					"result" => false,
				);
	    		return Response::json($result);
			}
		}
	}

	public function adminLoginStep2() {
		if(Request::ajax()){
			/*
			Client Admin Auth Switch
			*/
				 Config::set('auth.model', 'Admin');
				 Config::set('auth.table', 'admins');
			/*
			Client Admin Auth Switch end
			*/
			$secret = Input::get('secret');
			$admin = Admin::where('secret_enter_key', '=', $secret)->get()->first();
			$result = false;
			if( ! is_null($admin)) {
				$result = true;
				$admin_id = $admin->id;
				$admin_name = $admin->name;
				Auth::loginUsingId($admin_id);
				Session::put('admin_id', $admin_id);
				Session::put('admin_name', $admin_name);
				$result = array (
					"result" => $result,
				);
	    		return Response::json($result);
			}else {
				$result = array (
					"result" => $result,
				);
	    		return Response::json($result);
			}
			//var_dump($admin->name);
			//$data = array('email' => $email, 'password' => $password);

			/*
			
			$result = array (
					"sec" => $secret,
					"result" => $admin,
				);
	    		return Response::json($result);
			/*if (Auth::attempt(array('email' => $email, 'password' => $password,)))
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
			}*/
		}

	}

	public function sentEmail($name, $email, $secret_enter_key) {
		$data = array (
			"secret_enter_key" => $secret_enter_key,
			"name" => $name,
			"host" => $_ENV['host_name'],
		);
		$email_data = array (
			"name" => $name,
			"email" => $email,
		);
		Mail::send('emails.admin.admin_secret_send', $data, function($message) use($email_data)
		{
    		$message->to($email_data["email"], $email_data["name"])->subject('Your secret key for sigmachain.com admin');
		});
	}

}
