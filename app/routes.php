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
	return View::make('registration');
});
//registration route
Route::post('/register', 'RegistrationController@preRegisterAndSentEmail');
Route::get('/register', 'RegistrationController@confirmRegistration');
/*Route::post('/register', function()
{

	return View::make('pages.registration_confirm');
});*/

/*Route::get('/register', function()
{
	return View::make('pages.registration_confirm');
});*/
///
Route::get('/mail', function()
{	
	$data = ["mail" => "Markiyan"];
	Mail::send('emails.register.register', $data, function($message)
	{
    	$message->to('asmodianis@gmail.com', 'John Smith')->subject('Welcome!');
	});
});

