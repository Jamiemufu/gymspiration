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

//root
Route::get('/', 'Controller@index');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes... ready for when users can register
// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset');
//member role routes

//admin only routes
Route::get('/admin', 'AdminController@dashboard')->name('dashboard');
Route::get('/admin/members/', 'AdminController@members')->name('members');
//admin member routes
Route::get('/admin/members/create/', 'MemberController@create')->name('createMember');
Route::post('/admin/members/', 'MemberController@store')->name('storeMember');
Route::get('/admin/members/', 'MemberController@index')->name('viewMember');
Route::get('/admin/members/edit/{id}', 'MemberController@edit')->name('editMember');
Route::delete('/admin/members/delete/{id}', 'MemberController@destroy')->name('deleteMember');
Route::patch('/admin/members/update/{id}', 'MemberController@update')->name('updateMember');
//search routes
Route::any('/admin/members/search', 'MemberController@search')->name('search');
//reports
Route::get('/admin/reports/', 'AdminController@reports')->name('reports');
Route::get('/admin/reports/members/all', 'AdminController@exportAllMembers')->name('exportMembers');
Route::get('/admin/reports/members/month', 'AdminController@exportMonthType')->name('exportMonthType');
Route::get('/admin/reports/members/year', 'AdminController@exportYearlyType')->name('exportYearlyType');
Route::any('/admin/reports/members/monthly/', 'AdminController@exportMonthlyMembers')->name('exportMonthlyMembers');
Route::any('/admin/reports/members/monthly/download', 'AdminController@exportMonthlyMembers');
//user route
Route::get('/', 'HomeController@index');