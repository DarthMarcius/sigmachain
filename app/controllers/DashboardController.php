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
	public function logout() {
		if(Request::ajax()) {
			Config::set('auth.model', 'Company');
			Auth::logout();
			Config::set('auth.model', 'Admin');
			Auth::logout();
			$result = array(
				"result"=>"ok",
			);
			return Response::json($result);
		}
	}

	public function displayDashboard($company_id) {
		Session::put("current_company_id", $company_id);
		$session_company_id = Session::get("company_id");

		$companyModel = Company::findOrFail($company_id);

		
		
		$companyData = $companyModel->companyData();
		$companyData = $companyData->first();

		$dataArray = array(
			"name" => $companyModel->name,
			"description" => $companyModel->description,
			"country" => $companyModel->country,
			"address" => $companyData->address,
			"phone" => $companyData->phone,
			"skype" => $companyData->skype,
			"logo" => $companyData->logo_url,
			"email" => $companyModel->email,
			"company_id" => $session_company_id,

			);
		if($company_id == $session_company_id || Session::get("admin_name") != null) {//if you are the owner of the page or admin
			//var_dump(Session::all());
			return View::make('pages.dashboards.company_owner_dashboard', $dataArray);
			
		}else {
			return View::make('pages.dashboards.company_guest_dashboard', $dataArray);
		}
	}

	public function getOwnerDashboard() {
		//$company_id = Session::get("company_id");
		$session_company_id = Session::get("current_company_id");
		$companyModel = Company::findOrFail($session_company_id);
		$company = $companyModel->first();
		$companyData = $companyModel->companyData();
		$companyData = $companyData->first();
		$dataArray = array(
			"name" => $companyModel->name,
			"description" => $companyModel->description,
			"country" => $companyModel->country,
			"address" => $companyData->address,
			"phone" => $companyData->phone,
			"skype" => $companyData->skype,
			"logo" => $companyData->logo_url,
			"email" => $companyModel->email,
			"company_id" => $session_company_id,
			);

		if(Request::ajax()){
			$html = View::make('dashboard_content.owner.dashboard', $dataArray);
			$result = array(
				"latitude" => "",
				"longitude" => "",
				'html' => "$html",
			);
			return Response::json($result);
	    }
	}

	public function getOwnerProfile() {
		//$company_id = Session::get("company_id");
		$session_company_id = Session::get("current_company_id");
		$companyModel = Company::findOrFail($session_company_id);

		$companyData = $companyModel->companyData();
		$companyData = $companyData->first();
		$dataArray = array(
			"name" => $companyModel->name,
			"description" => $companyModel->description,
			"country" => $companyModel->country,
			"address" => $companyData->address,
			"phone" => $companyData->phone,
			"skype" => $companyData->skype,
			"logo" => $companyData->logo_url,
			"email" => $companyModel->email,
			"company_id" => $session_company_id,
			);
		if(Request::ajax()){
			$html = View::make('dashboard_content.owner.profile', $dataArray);
			$result = array(
				'html' => "$html",
			);
			return Response::json($result);
	    }
	}

	public function getSearch() {
		if(Request::ajax()){
			$companies = Company::all();
			$data = array(
					'companies' => $companies,
				);
			$html = View::make('dashboard_content.search', $data);
			$result = array(
					'html' => "$html",
				);
			return Response::json($result);
		}
	}

	public function getLogoURL() {
		if(Request::ajax()) {
			$company_data = CompanyData::where('company_id', "=", Session::get('current_company_id'))->first();
			$filename = $company_data->logo_url;
			$result = array(
				"url"=>"$filename",
			);
			return Response::json($result);
		}
	}

	public function getCompanyName() {
		if(Request::ajax()) {
			$company_data = Company::where('id', "=", Session::get('current_company_id'))->first();
			$name = $company_data->name;
			$result = array(
				"name"=>"$name",
			);
			return Response::json($result);
		}
	}

	public function getGpsData() {
		if(Request::ajax()) {
			$company_data = CompanyData::where('company_id', "=", Session::get('current_company_id'))->first();
			$latitude = $company_data->latitude;
			$longitude = $company_data->longitude;
			$result = array(
				"latitude"=>"$latitude",
				"longitude"=>"$longitude",
			);
			return Response::json($result);
		}
	}

}
