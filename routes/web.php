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

Route::get('/', 'HomeController@index')->name('home');

Route::resources([
    'profile' => 'ProfileController',
]);

Route::post('/setpwm/{sensor}', 'SensorController@setPWM');
Route::get('/getpwm/{sensor}', 'SensorController@getPWM');
Route::post('/setgpio/{sensor}', 'SensorController@setGPIO');
Route::get('/getgpio/{sensor}', 'SensorController@getGPIO');
Route::get('/getsensorsdata', 'ShieldController@getSensorsData');

Route::get('/gettimer/{sensor}', 'TimerController@getTimer');
Route::post('/settimer/{sensor}', 'TimerController@setTimer');
Route::get('/listtimers', 'TimerController@listTimers');

Route::get('/profile/{profile}/activate', 'ProfileController@activate');

Route::get('/shield', 'ShieldController@index');
Route::get('/shield/sensors', 'ShieldController@sensors');
Route::get('/shield/air', 'ShieldController@air');
Route::get('/shield/lighting', 'ShieldController@lighting');
Route::get('/shield/temperature', 'ShieldController@temperature');
Route::get('/shield/hepa', 'ShieldController@hepa');
Route::get('/shield/sound', 'ShieldController@sound');

Route::get('/leisure', 'LeisureController@index');
Route::get('/leisure/salt', 'LeisureController@salt');
Route::get('/leisure/lighting', 'LeisureController@lighting');
Route::get('/leisure/aroma', 'LeisureController@aroma');
Route::get('/leisure/sound', 'LeisureController@sound');
