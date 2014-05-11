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


Route::group(array('before' => 'notAuth'), function(){

    Route::group(array('before' => 'crsf'), function(){

        Route::get('/auth/logout', array('uses' => 'AuthController@getLogout'));

        Route::post('/auth/change', array(
            'as' => 'change',
            'uses' => 'AuthController@postChange'
        ));

        Route::get('/auth/change', array(
            'as' => 'change',
            'uses' => 'AuthController@getChange'
        ));

        Route::group(array('before' => 'first_login'), function(){

            Route::get('/', 'HomeController@showWelcome');
            Route::controller('lang', 'LangController');

            Route::controller('report', 'ReportController');

            Route::group(array('before' => 'direktore'), function(){
                Route::post('/auth/add', array('uses' => 'AuthController@postAdd'));
                Route::get('/auth/add', array('uses' => 'AuthController@getAdd'));
                Route::controller('item', 'ItemController');
                Route::controller('category', 'CategoryController');
                Route::controller('clinic', 'ClinicController');
                Route::controller('visit', 'VisitController');
                Route::controller('doctor', 'DoctorController');
                Route::controller('order', 'OrderController');
                Route::controller('export', 'ExportController');
                Route::get('/invoice', function(){return View::make('invoice/invoice');});

            });
        });
    });
});
Route::post('/auth', array('uses' => 'AuthController@postIndex'));
Route::get('/auth', array('uses' => 'AuthController@getIndex'));