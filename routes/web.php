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

Route::post('/register/username', 'Auth\RegisterController@usernameExist')->name('username.exist');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function() {

    Route::get('/accounts/profile/{id}/edit', 'UsersController@profile')->name('profile.edit');
    Route::post('/accounts/profile/{id}', 'UsersController@profileUpdate')->name('profile.update');
    Route::post('/accounts/profile/password/{id}', 'UsersController@profilePasswordUpdate')->name('profile.passwordUpdate');

    Route::group(['middleware' => 'checkAdmin'], function() {
        
        // ACCOUNTS
        Route::post('/accounts/users/{id}/status', 'UsersController@changeStatus')->name('users.switchStatus');  // switch user status
        Route::post('/accounts/users/{id}/admin', 'UsersController@changeAdmin')->name('users.switchAdmin');     // switch user admin
        Route::post('/accounts/users/{id}/reset', 'UsersController@resetPassword')->name('users.reset');         // reset user password
        Route::post('/accounts/users/{id}/account', 'UsersController@updateAccountSettings')->name('users.accountUpdate');         // reset user password

        Route::resource('accounts/users', 'UsersController');
        Route::resource('accounts/groups', 'GroupsController');
        Route::resource('accounts/roles/role', 'RoleController');
        Route::resource('accounts/roles/permission', 'PermissionController');

        //Route::get('/accounts/groups', 'GroupsController@index')->name('accounts.groups');      // group
        //Route::post('/accounts/groups/store', 'GroupsController@store')->name('accounts.group.store'); // store new group
    });

    /*** HRMIS-APPLICANTS CONTROLLER ***/
    Route::get('hrmis/applicants/all', 'Hrmis\ApplicantsController@showApplicants')->name('applicants.showApplicants');
    Route::resource('hrmis/applicants', 'Hrmis\ApplicantsController');  // Resource controller for applicants
    Route::get('hrmis/lineup/{id}/print', 'Hrmis\SelectionLineupController@printLineup')->name('lineup.print.lineup');
    Route::resource('hrmis/lineup', 'Hrmis\SelectionLineupController');  // Resource controller for applicants
    Route::resource('hrmis/positions', 'Hrmis\PositionController');   // Resource controller for positions
    Route::resource('hrmis/psb', 'Hrmis\PsbController');   // Resource controller for positions

    /*** PSB RATING SYSTEM CONTROLLER ***/
    Route::resource('psbrs', 'Psbrs\PsbRatingController');
    Route::resource('psbrs/lineup/selection', 'Psbrs\SelectionLineupController');

});
