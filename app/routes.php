<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	//echo(App::environment());
	return View::make('home');
});
//registration route
Route::post('/register', 'RegistrationController@preRegisterAndSentEmail');
Route::get('/register', 'RegistrationController@confirmRegistration');

Route::post("/login", "LoginController@login");

Route::get("/company/{id}", array('before' => 'auth', 'as' => 'company_id', 'uses' => 'DashboardController@displayDashboard'));

/*ajax*/
Route::get("/company/owner/dashboard", array('uses' => 'DashboardController@getOwnerDashboard'));
Route::get("/company/owner/profile", array('uses' => 'DashboardController@getOwnerProfile'));
Route::get("/company/search", array('uses' => 'DashboardController@getSearch'));
Route::get("/company/owner/logo-update-live", array('uses' => 'DashboardController@getLogoURL'));

// profile update
Route::post("/company/owner/profile_update/gps", array('uses' => 'ProfileUpdateController@updateOfficeLocation'));
Route::post("/company/owner/profile_update/logo", 'ProfileUpdateController@updateLogo');
// profile update end
/*ajax end */
/*Route::get("/company/{id}", array('before' => 'auth', function($id)
{
	return View::make('pages.dashboards.company_owner_dashboard');
	//var_dump(Session::get('company_id'));
}));*/
/*Route::post('/login', function()
{
	if(Request::ajax()) {
		return "hello";
	}

});*/