<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
|--------------------------------------------------------------------------
|--------------------------------------------------------------------------
|##########################################################################
| Front Routes
|##########################################################################
|--------------------------------------------------------------------------
|--------------------------------------------------------------------------
|--------------------------------------------------------------------------
|
*/
Route::prefix('/')->group(function () {

    ##------------------------------------------------------- MAIN HOME ADMIN DASHBOARD PAGE
    Route::get('/', function () { return view('default.front.home'); })->name('front.home');



}) ;













/*
|--------------------------------------------------------------------------
|--------------------------------------------------------------------------
|--------------------------------------------------------------------------
|##########################################################################
| Doctors Routes
|##########################################################################
|--------------------------------------------------------------------------
|--------------------------------------------------------------------------
|--------------------------------------------------------------------------
|
*/
Route::prefix('doctor')->group(function () {

    ##------------------------------------------------------- MAIN HOME ADMIN DASHBOARD PAGE
    Route::get('/', function () { return view('default.doctor.home'); })->name('doctor.home');


    ##------------------------------------------------------- LOGGING & LOGOUT SECTION
    Route::get('/login', 'DoctorLoginController@showLoginForm')->name('doctor.login');
    Route::post('/login', 'DoctorLoginController@login')->name('doctor.login.submit');
    Route::get('/logout', 'DoctorLoginController@doctorLogout')->name('doctor.logout');

}) ;













/*
|--------------------------------------------------------------------------
|--------------------------------------------------------------------------
|--------------------------------------------------------------------------
|##########################################################################
| Admins Routes
|##########################################################################
|--------------------------------------------------------------------------
|--------------------------------------------------------------------------
|--------------------------------------------------------------------------
|
*/
Route::prefix('admin')->group(function () {

    ##------------------------------------------------------- MAIN HOME ADMIN DASHBOARD PAGE
    Route::get('/', function () { return view('default.admin.home'); })->name('admin.home');


    ##------------------------------------------------------- LOGGING & LOGOUT SECTION
    Route::get('/login', 'AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'AdminLoginController@adminLogout')->name('admin.logout');
    

    ##------------------------------------------------------- FORGET PASSWORD SECTION
    Route::get('/forgot-password', 'AdminPasswordResetLinkController@create')->name('admin.password.request');
    Route::post('/forgot-password', 'AdminPasswordResetLinkController@store')->name('admin.password.email');
    Route::get('/reset-password/{token}', 'AdminNewPasswordController@create')->name('admin.password.reset');
    Route::post('/reset-password', 'AdminNewPasswordController@store')->name('admin.password.update');
    
    
    ##------------------------------------------------------- ADMIN PROFILE SECTION
    Route::match(['get', 'post'], "/myprofile", ['uses'=>'AdminController@edit', 'as'=>'admin.profile']);
    Route::post("/myprofile/password", ['uses'=>'AdminController@updatePassword', 'as'=>'admin.change.password']);    

}) ;
