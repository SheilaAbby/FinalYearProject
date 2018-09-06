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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//QA Routes
Route::get('qa-home','QAController@index')->name('qa_home');

//admin routes
//Route::resource('administration','AdminController')->middleware('is_admin');

//Lecturer routes
Route::get('lecturer_home','LecturersController@home')->name('lecturer_home');

//lectuer routes
//Route::group(['middleware'=>'is_admin'],function (){
    Route::resource('administration','AdminController');
    Route::get('administration/lecturers/add','AdminController@addLect')->name('admin.addLect');
    Route::get('administration/lecturers/delete-lecturer','AdminController@deleteLect')->name('admin.deleteLect');
    Route::get('/edit','LecturersController@index1');
    Route::get('/edit/update/{id}','LecturersController@edit');
    Route::get('/delete/{id}','LecturersController@destroy');
    Route::post('/updated/{id}','LecturersController@update');

    //admin performance routes
    Route::get('admin/view-performance','AdminController@view_performance')->name('view_performance');
//courses routes
    Route::get('/addCourse','CourseController@index');
    Route::post('/saveCourse','CourseController@store');
    Route::get('/view_courses','CourseController@show');

//Students Routes
    Route::get('/addStudent','StudentController@index');
    Route::post('/saveStudent','StudentController@store');
    Route::resource('lecturers','LecturersController');

//Units Routes
    Route::get('admin/add_units','UnitsController@index')->name('add_units');
    Route::post('admin/save_unit','UnitsController@store')->name('save_unit');
    Route::get('/admin/view_units','UnitsController@show')->name('view_units');
    Route::get('/admin/allocate/{id}','UnitsController@allocate_lecturers');
    Route::post('/admin/allocate_lecturers','UnitsController@allocate_to_lecturers')->name('allocate_lecturers');
    Route::get('/admin/unallocate/{id}/{unit_id}','UnitsController@unallocate_lecturers');
    Route::get('/admin/allocations/{id}','UnitsController@view_allocations');
    Route::get('/add_to_currents/{lect_id}/{unit_id}','UnitsController@addtocurrents');


//});

//QA Assess Lecture routes
Route::get('/assessLect/{id}','AssessController@index');
Route::post('/assess/{id}','AssessController@store');
Route::get('all_units/assessed/{id}','QAController@allunits');
Route::get('/qa/view-unit-score/{evaluation_id}','QAController@view_score');
Route::post('/qa-add-comment/{evaluation_id}','QAController@add_comment');


//contact us routes
Route::get('contact-us', 'ContactUSController@contactUS')->name('contactUs');
Route::post('contact-us', ['as'=>'contactus.store','uses'=>'ContactUSController@contactUSPost']);
