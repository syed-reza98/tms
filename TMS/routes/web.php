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
    return view('welcome');
});
Route::get('/home', function () {
    return view('index');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('activities', 'ActivityLogController@index')->name('activities.browse');
    Route::post('activities/datatable', 'ActivityLogController@getDatatable')->name('activities.datatable');
});
Route::get('/log', function() {
    return Spatie\Activitylog\Models\Activity::all();
});
