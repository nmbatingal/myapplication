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

//Route::get('/', function () { return view('auth.login'); });

Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function() {

    Route::get('/accounts/profile/{id}', 'UsersController@profile')->name('profile.show');

    Route::group(['middleware' => 'checkAdmin'], function() {
        
        // ACCOUNTS
        Route::post('/accounts/users/status', 'UsersController@changeStatus')->name('users.switchStatus');  // switch user status
        Route::post('/accounts/users/admin', 'UsersController@changeAdmin')->name('users.switchAdmin');     // switch user admin
        Route::post('/accounts/users/reset', 'UsersController@resetPassword')->name('users.reset');         // reset user password

        Route::resource('accounts/users', 'UsersController');
        Route::resource('accounts/groups', 'GroupsController');

        //Route::get('/accounts/groups', 'GroupsController@index')->name('accounts.groups');      // group
        //Route::post('/accounts/groups/store', 'GroupsController@store')->name('accounts.group.store'); // store new group
    });

    /*** HRMIS-APPLICANTS CONTROLLER ***/
    Route::get('hrmis/applicants/all', 'Hrmis\ApplicantsController@showApplicants')->name('applicants.showApplicants');
    Route::resource('hrmis/applicants', 'Hrmis\ApplicantsController');  // Resource controller for applicants
    Route::resource('hrmis/applicants/lineup', 'Hrmis\SelectionLineupController');  // Resource controller for applicants

    Route::resource('hrmis/positions', 'Hrmis\PositionController');   // Resource controller for positions

});
