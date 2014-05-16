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
	return View::make('registration');
});

Route::get('/mail', function()
{	
	$data = ["mail" => "Markiyan"];
	Mail::send('emails.register.register', $data, function($message)
	{
    	$message->to('riesssen@hotmail.com', 'John Smith')->subject('Welcome!');
	});
});

