<?php
use Helpers as Helpers;
class DashboardController extends BaseController {

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
	public function displayDashboard($company_id) {
		$session_company_id = Session::get("company_id");
		$companyModel = Company::findOrFail($company_id);
		Session::put("current_company_id", $company_id);
		if($company_id == $session_company_id) {
			return View::make('pages.dashboards.company_owner_dashboard');
		}else {
			return View::make('pages.dashboards.company_guest_dashboard');
		}
	}

	public function getOwnerDashboard() {
		//$companyModel = Company::find($company_id);
		if(Request::ajax()){
			$html = View::make('dashboard_content.owner.dashboard');
			$result = array(
				"latitude" => "",
				"longitude" => "",
				'html' => "$html",
			);
			return Response::json($result);
	    }
	}

	public function getOwnerProfile() {
		//$companyModel = Company::find($company_id);
		if(Request::ajax()){
			$html = View::make('dashboard_content.owner.profile');
			$result = array(
				'html' => "$html",
			);
			return Response::json($result);
	    }
	}

	public function getLogoURL() {
		if(Request::ajax()) {
			$company_data = CompanyData::where('company_id', "=", Session::get('company_id'))->first();
			$filename = $company_data->logo_url;
			$result = array(
				"url"=>"$filename",
			);
			return Response::json($result);
		}
	}

}
