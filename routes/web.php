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
    Route::get('/', function () { return view('default.user.home'); })->name('user.home');


    ##------------------------------------------------------- LOGGING & LOGOUT SECTION
    Route::get('/login', 'UserLoginController@showLoginForm')->name('user.login');
    Route::post('/login', 'UserLoginController@login')->name('user.login.submit');
    Route::get('/logout', 'UserLoginController@userLogout')->name('user.logout');

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
    
    
    ##------------------------------------------------------- MY CLININCS SECTION
    Route::get('/clinics', 'ClinicController@index')->name('doctor.clinics');
    Route::post('/clinic/add', 'ClinicController@store')->name('doctor.clinic.add');
    Route::post('/clinic/delete', 'ClinicController@delete')->name('doctor.clinic.delete');
    Route::get('/clinic/edit', 'ClinicController@showEditForm')->name('doctor.clinic.showEditForm');
    Route::post('/clinic/edit', 'ClinicController@update')->name('doctor.clinic.update');

    
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
    

    ##------------------------------------------------------- CLINICS SECTION FOR APPROVAL
    Route::get('/clinics', 'ClinicController@clinicsForAdmin')->name('admin.clinics');
    Route::post('/clinic/approve', 'ClinicController@approve')->name('admin.clinic.approve');
    Route::post('/clinic/decline', 'ClinicController@decline')->name('admin.clinic.decline');

}) ;
