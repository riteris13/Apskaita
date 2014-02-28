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


Route::group(array('before' => 'notAuth'), function()
{
    Route::get('/', 'HomeController@showWelcome');
    Route::controller('lang', 'LangController');
    Route::controller('item', 'ItemController');
    Route::controller('category', 'CategoryController');
    Route::controller('report', 'ReportController');
    Route::controller('clinic', 'ClinicController');
	Route::controller('visit', 'VisitController');
    Route::controller('doctor', 'DoctorController');
});
    Route::controller('auth', 'AuthController');