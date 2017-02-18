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


Route::get('/angular','SinhvienController@angular');
Route::get('/api/sinhviens','SinhvienController@getAll');
Route::get('/api/sinhviens/{id}','SinhvienController@getById');
//\Event::listen('Illuminate\Database\Events\QueryExecuted', function ($query) {
//    var_dump($query->sql);
//    var_dump($query->bindings);
//    var_dump($query->time);
//});
Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'admin'], function() {
    Route::get('/login', ['as' => 'admin.getLogin', 'uses' => 'Admin\AuthController@getLogin']);
    Route::post('/login', ['as' => 'admin.postLogin', 'uses' => 'Admin\AuthController@postLogin']);
    Route::get('/logout', ['as' => 'admin.getLogout', 'uses' => 'Admin\AuthController@getLogout']);

    Route::group(['middleware' => ['auth.admin:admin']], function() {
        Route::get('/', ['as' => 'admin.home', 'uses' => 'Admin\IndexController@getIndex']);
    });
});

//upload image router
Route::get('/upload','FileController@upload');
Route::post('/upload','FileController@doUpload');

//router for test multi ajax request at time
Route::get('/request1','FileController@request1');
Route::get('/request2','FileController@request2');
Route::get('/test','FileController@test');
