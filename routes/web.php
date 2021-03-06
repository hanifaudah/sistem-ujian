<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('tests', 'TestsController');
Route::get('takeTest/{id}', 'TestsController@takeTest');
Route::get('startTest/{test_id}/{problem_index}', 'TestsController@startTest');
Route::post('storeGrade/{test_id}/{problem_id}/{index}', 'TestsController@storeGrade');
Route::get('results/{test_id}', 'TestsController@testResult');

Route::get('/problems/create/{id}', 'ProblemsController@create');
Route::post('/problems/{id}', 'ProblemsController@store');
Route::get('/problems/{id}/{index}', 'ProblemsController@show');
Route::resource('problems', 'ProblemsController');
