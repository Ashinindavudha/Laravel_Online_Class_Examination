<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {

// Route::group(['middleware' => 'auth'], function () {
	//User Action Route
	Route::resource('user_actions', 'UserActionController');
	//Role Route
	Route::resource('roles', 'RoleController');
//Subject Route
	Route::resource('subjects', 'SubjectController');
    //Question Route
	Route::resource('questions', 'QuestionController');
    //Question Option Route
	Route::resource('question-options', 'QuestionsOptionController');
	Route::resource('tests', 'TestController');
    //Result Show Route
	Route::resource('results', 'ResultController');
	//Student Register Number Route
    Route::resource('studentregisters', 'StudentRegisterController');
     //Student Roll Number Route
    Route::resource('studentrolls', 'StudentRollController');

    //Course Semester Route
    Route::resource('coursesemesters', 'CourseSemesterController');

    //Academic Year Route
    Route::resource('academicyears', 'AcademicYearController');
    Route::post('users/media', 'UserController@storeMedia')->name('users.storeMedia');
    Route::resource('users', 'UserController');

});
