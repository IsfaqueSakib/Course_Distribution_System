<?php

/*
|-------------------------------------------------------------------------------
| Web Routes
|-------------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Backend Routes----------------------------------------------------------------
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'SuperAdminController@index');
Route::post('/admin-dashboard', 'AdminController@dashboard');
Route::get('/logout', 'SuperAdminController@logout');

//Course Routes ----------------------------------------------------------------
Route::get('/addCourse', 'CourseController@index');
Route::get('/uploadCourseCSV', 'CourseController@upload_course_csv');
Route::post('/store_course_data','CourseController@store_course_data');
Route::post('/save_course','CourseController@save_course');
Route::get('/allCourses','CourseController@all_courses');
Route::get('/inactiveCourse/{course_code}','CourseController@inactive_course');
Route::get('/activeCourse/{course_code}','CourseController@active_course');
Route::get('/editCourse/{course_code}','CourseController@edit_course');
Route::post('/update_course/{course_code}','CourseController@update_course');
Route::get('/deleteCourse/{course_code}','CourseController@delete_course');

//Teacher Routes----------------------------------------------------------------
Route::get('/addTeacher', 'TeacherController@index');
Route::post('/save_teacher', 'TeacherController@save_teacher');
Route::get('/allTeachers', 'TeacherController@all_teacher');
Route::get('/inactiveTeacher/{short_name}', 'TeacherController@inactive_teacher');
Route::get('/activeTeacher/{short_name}', 'TeacherController@active_teacher');
Route::get('/editTeacher/{short_name}', 'TeacherController@edit_teacher');
Route::get('/deleteTeacher/{short_name}', 'TeacherController@delete_teacher');
Route::post('/update_teacher/{short_name}','TeacherController@update_teacher');
Route::get('/uploadTeacherCSV', 'TeacherController@upload_teacher_csv');
Route::post('/store_teacher_data','TeacherController@store_teacher_data');

//Frontend Routes---------------------------------------------------------------
Route::get('/edit_profile', 'FrontendController@editProfile');
Route::get('/courseSelection', 'FrontendController@course_selection');
Route::get('/currentCourse', 'FrontendController@current_course');
Route::get('/primary_selection/{course_code}', 'FrontendController@primary_course_selection');
Route::get('/release_course/{course_code}', 'FrontendController@release_course');
Route::get('/level_1_courses', 'FrontendController@level_1_courses');
Route::get('/level_2_courses', 'FrontendController@level_2_courses');
Route::get('/level_3_courses', 'FrontendController@level_3_courses');
Route::get('/level_4_courses', 'FrontendController@level_4_courses');

//logout
Route::get('/user_logout', 'FrontendController@user_logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
