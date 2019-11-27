<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login','Auth\LoginController@ApiLogin');
Route::post('/logout','Auth\LoginController@ApiLogout');
Route::group(['middleware' => 'auth:api'], function(){
    Route::get('/visit_events/{visitEvent}','VisitEventController@ApiShow');

    Route::get('employees/{user}','UserController@ApiShowEmployee');
    Route::get('home','UserController@ApiHome');

    Route::post('complaints/','ComplaintController@ApiStore');
    Route::post('raitings/','RaitingController@ApiStore');

    Route::get('locations/{location}','LocationController@ApiShow');
    Route::post('/visit_events/{visit_event}/attachTask/{task_id}','VisitEventController@ApiAttachTask');
    Route::post('/visit_events/{visit_event}/detachTask/{task_id}','VisitEventController@ApiDetachTask');
    Route::post('/attendance_log/','AttendanceLogController@store');
});



