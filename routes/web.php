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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users/{user}/edit','UserController@edit');
Route::patch('/users/{user}','UserController@update');
Route::get('/users/{user}','UserController@show');
Route::get('/users','UserController@index');
Route::delete('/users/{user}','UserController@destroy');

Route::get('/academic_experiences/create', 'AcademicExperienceController@create');
Route::get('/academic_experiences/{academicExperience}/edit', 'AcademicExperienceController@edit');
Route::post('/academic_experiences','AcademicExperienceController@store');
Route::patch('/academic_experiences/{academicExperience}','AcademicExperienceController@update');
Route::get('/academic_experiences/{academicExperience}', 'AcademicExperienceController@destroy');

Route::get('/work_experiences/create', 'WorkExperienceController@create');
Route::get('/work_experiences/{workExperience}/edit', 'WorkExperienceController@edit');
Route::post('/work_experiences','WorkExperienceController@store');
Route::patch('/work_experiences/{workExperience}','WorkExperienceController@update');
Route::delete('/work_experiences/{workExperience}', 'WorkExperienceController@destroy');

Route::get('/clients', 'UserController@clientIndex');
Route::get('/clients/create', 'UserController@clientCreate');
Route::post('/users/','UserController@Store');
Route::get('/employees', 'UserController@employeeIndex');
Route::get('/employees/create', 'UserController@employeeCreate');
Route::get('/candidates', 'UserController@candidateIndex');


Route::resource('/locations', 'LocationController');
Route::resource('/tasks', 'TaskController');
Route::resource('/sectors', 'SectorController');

Route::get('/work_with_us','WorkWithUsController@show');
