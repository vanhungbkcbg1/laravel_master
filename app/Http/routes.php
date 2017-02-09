<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','HomeController@index');

Route::get('/test',"MyController@test");
Route::post("/save","MyController@save")->name("save");

Route::get('/error',function(){

    return view('errors.error');
})->name('error');

Route::get('/get_file','MyController@getFile')->name('get_file');
Route::get('/event','MyController@event');
Route::get('/asset','MyController@asset');
Route::get('/storage','MyController@storage');

Route::get('/sinhvien','SinhvienController@index')->name('sinhvien_list');
Route::get('/file/{file}','FileController@view')->name('file_view');
Route::get('/sinhvien/create','SinhvienController@create')->name('sinhvien_create');
Route::post('/sinhvien/save','SinhvienController@save')->name('sinhvien_save');
Route::post('/authentication','MyAuthentication@authenticate');
Route::get('/signup','MyAuthentfileication@signup');
Route::get('/login','MyAuthentication@login');
Route::post('/user/register','MyAuthentication@register');
Route::get('/user/logout',function(){
    \Illuminate\Support\Facades\Auth::logout();
});

//\Event::listen('Illuminate\Database\Events\QueryExecuted', function ($query) {
//    var_dump($query->sql);
//    var_dump($query->bindings);
//    var_dump($query->time);
//});