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


Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/home/cs', 'HomeController@cust')->name('homecs');
//Route::get('/home/dl', 'HomeController@dl')->name('homedl');

Route::group(['middleware' => ['auth','admin']], function(){

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::get('/role-register','Admin\DashboardController@registered');
    Route::get('/role-edit/{id}', 'Admin\DashboardController@registeredit');
    Route::get('/inventory', 'Admin\DashboardController@inventory');
    Route::put('role-register-update/{id}', 'Admin\DashboardController@registerupdate');
    Route::delete('/role-delete/{id}', 'Admin\DashboardController@registerdelete');
    Route::get('/inv', 'Inv\InvController@index');
    Route::get('/inv/create', 'Inv\InvController@create');
    Route::post('/inv', 'Inv\InvController@store');
    Route::get('/inv/edit/{id}', 'Inv\InvController@edit');
    #Route::resource('items', 'ItemController');
});

// Route::get('post/create', 'PostController@create');

//Route::post('post', 'PostController@store');