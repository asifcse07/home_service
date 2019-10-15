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

Route::get('/',array('as'=>'Sign in', 'uses' =>'SystemAuthController@authLogin'));
Route::get('/admin',array('as'=>'Sign Up', 'uses' =>'SystemAuthController@adinRegitrationPage'));

Route::get('/login',array('as'=>'Sign in', 'uses' =>'SystemAuthController@authLogin'));
Route::post('/login',array('as'=>'Sign in' , 'uses' =>'SystemAuthController@authPostLogin'));

//admin
Route::get('/admin-login',array('as'=>'Sign in', 'uses' =>'SystemAuthController@authAdminLogin'));
Route::post('/admin-login',array('as'=>'Sign in' , 'uses' =>'SystemAuthController@authPostAdminLogin'));

// Route::get('/#toregister',array('as'=>'Sign Up', 'uses' =>'SystemAuthController@RegitrationPage'));

// Route::post('/register',array('as'=>'Registration' , 'uses' =>'SystemAuthController@authRegistration'));
$router->post('/register', 'SystemAuthController@authRegistration');
$router->post('/admin-register', 'SystemAuthController@authAdminRegistration');


Route::group(['middleware' => ['home_service_auth']], function(){
	#LogOut
    // Route::get('/logout',array('as'=>'Logout' , 'uses' =>'SystemAuthController@authLogout'));
    #ChangePassword
    // Route::get('/change/password',array('as'=>'Change Password' , 'uses' =>'SystemAuthController@ProfileChangePasswordPage'));
    // Route::post('/change/password',array('as'=>'Change Password' , 'uses' =>'SystemAuthController@UserProfileUpdatePassword'));
    Route::get('/logout',array('as'=>'Logout' , 'uses' =>'SystemAuthController@logout'));


	#Dashboard
    Route::get('/dashboard',array('as'=>'Dashboard', 'uses' =>'ServiceController@adminDashboard'));

	// Route::get('/profile', 'SystemAuthController@profile');

	Route::get('/service-list', 'ServiceController@index');
	Route::post('/add-service', 'ServiceController@store');
	Route::post('/add-sub-service', 'ServiceController@subSrvcStore');
	Route::get('/all-services', 'ServiceController@getServiceData');
});