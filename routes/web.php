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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/user/logout', 'Auth\LoginController@logoutUser')->name('user.logout');


Route::group(['prefix' => 'admin'], function() {
    Route::get('/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AuthAdmin\LoginController@Login')->name('admin.login.submit'); 
    Route::get('/', 'AdminController@index')->name('admin.home');
    Route::get('/logout', 'AuthAdmin\LoginController@logout')->name('admin.logout');
    Route::get('/password/reset', 'AuthAdmin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::get('/password/email', 'AuthAdmin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    // Route::get('/cluster/get/{id}', 'ClusterController@GetCluster')->name('cluster.get');
    Route::get('/cluster/edit/{id}', 'ClusterController@Edit')->name('cluster.edit');
    Route::post('/cluster/update/{id}', 'ClusterController@Update')->name('cluster.update');
    Route::get('/cluster/view', 'ClusterController@dataTable')->name('cluster.view');
    Route::get('/cluster/delete/{id}', 'ClusterController@Delete')->name('cluster.delete');
    Route::get('/cluster/create', 'ClusterController@Create')->name('cluster.create');
    Route::post('/cluster/store', 'ClusterController@store')->name('cluster.store');
    Route::get('/cluster/soal/create/{id}', 'ClusterController@Import')->name('cluster.soal.create');
    Route::post('/cluster/soal/store/{id}', 'ClusterController@StoreImport')->name('cluster.soal.store');
    Route::get('/soal/view/{id}', 'ClusterController@GetSoal')->name('soal.view');
});
