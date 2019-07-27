<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(
    [
        'namespace' => 'Front'
    ],
    function(){
        Route::get('/','FrontController@index')->name('home');
        Route::get('profile/{slug}','FrontController@profile')->name('profile');
        Route::resource('features','FeaturesController');
        Route::post('feature-data','FeaturesController@featuresData')->name('features.data');
        Route::resource('about','AboutController');
        Route::resource('courses','FeaturesController');
    }
);
Auth::routes();