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
        Route::get('/home','FrontController@index')->name('home');
        Route::get('profile/{slug}','FrontController@profile')->name('profile');
        Route::resource('features','FeaturesController')->middleware('auth');
        Route::post('feature-data','FeaturesController@featuresData')->middleware('auth')->name('features.data');
        Route::resource('about','AboutController')->middleware('auth');
        Route::resource('courses','FeaturesController')->middleware('auth');
        Route::resource('testimonials','TestimonialsController')->middleware('auth');
        Route::post('testimonials-data','TestimonialsController@testimonialsData')->middleware('auth')->name('testimonials.data');
    }
);
Auth::routes();
Route::get('logout','Auth\LoginController@logout')->name('logout');