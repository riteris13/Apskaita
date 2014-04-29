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

        Route::group(array('before' => 'first-login'), function(){

            Route::get('/', 'HomeController@showWelcome');
            Route::controller('lang', 'LangController');

            Route::post('/auth/change', array(
                'as' => 'change',
                'uses' => 'AuthController@postChange'
            ));

            Route::get('/auth/change', array(
                        'as' => 'change',
                        'uses' => 'AuthController@getChange'
            ));

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
                Route::get('/invoice', function(){return View::make('invoice/invoice');});
            });
        });
    });
});

Route::controller('auth', 'AuthController');