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
    return view('welcome');
});

Route::post('/admin/login', 'UserController@admin_login')->name('admin/login');

Route::get('/admin/login', function() {
    return view('auth/admin_login');
})->name('admin/login');

// Route::get('/home', function () {
//     return view('home');
// });

Auth::routes();

Route::group(['middleware' => ['auth']], function() {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/kelas', 'HomeController@kelas')->name('kelas');
    Route::get('/pendaftar', 'HomeController@pendaftar')->name('pendaftar');
    Route::get('/konfirmasi', 'HomeController@konfirmasi')->name('konfirmasi');
    Route::get('/peserta', 'HomeController@peserta')->name('peserta');
    Route::get('/user', 'HomeController@user')->name('user');
    Route::get('/administrasi', 'HomeController@administrasi')->name('administrasi');
    Route::get('/laporan', 'HomeController@laporan')->name('laporan');
    Route::get('/sampah', 'HomeController@draft')->name('sampah');

    Route::get('register/show', 'ParticipantController@show_registered')->name('register/show');
    Route::get('confirmed/show', 'ParticipantController@show_confirmed')->name('confirmed/show');
    Route::get('participant/show', 'ParticipantController@show_participant')->name('participant/show');
    Route::resource('participant', 'ParticipantController');
    Route::post('participant/delete', 'ParticipantController@deleteSelected')->name('participant/delete');

    Route::get('/class/show', 'LessonController@show_all')->name('class/show');
    Route::post('/class/delete', 'LessonController@deleteSelected')->name('class/delete');
    Route::resource('class', 'LessonController');

    Route::get('/mentor', 'HomeController@mentor')->name('mentor');
    Route::get('/mentor/show', 'MentorController@show_mentor')->name('mentor/show');
    Route::post('/mentor/store', 'MentorController@store_mentor')->name('mentor/store');
    Route::get('/mentor/{id}/edit', 'MentorController@edit_mentor')->name('mentor/edit');
    Route::patch('/mentor/{id}', 'MentorController@update_mentor')->name('mentor/update');
    Route::delete('/mentor/{id}', 'MentorController@destroy_mentor')->name('mentor/destroy');
    Route::post('/mentor/delete', 'MentorController@deleteSelected_mentor')->name('mentor/delete');

    
    Route::prefix('setting')->group(function () {
        Route::get('/pelajaran', 'HomeController@pelajaran')->name('pelajaran');
        Route::get('/classname/show', 'LessonController@show_classname')->name('classname/show');
        Route::post('/classname/store', 'LessonController@store_classname')->name('classname/store');
        Route::get('/classname/{id}/edit', 'LessonController@edit_classname')->name('classname/edit');
        Route::patch('/classname/{id}', 'LessonController@update_classname')->name('classname/update');
        Route::delete('/classname/{id}', 'LessonController@destroy_classname')->name('classname/destroy');
        Route::post('/classname/delete', 'LessonController@deleteSelected_classname')->name('classname/delete');
        
        Route::get('/status', 'HomeController@status')->name('status');
        Route::get('/status/show', 'StatusController@show_status')->name('status/show');
        Route::post('/status/store', 'StatusController@store_status')->name('status/store');
        Route::get('/status/{id}/edit', 'StatusController@edit_status')->name('status/edit');
        Route::patch('/status/{id}', 'StatusController@update_status')->name('status/update');
        Route::delete('/status/{id}', 'StatusController@destroy_status')->name('status/destroy');
        Route::post('/status/delete', 'StatusController@deleteSelected_status')->name('status/delete');

        Route::get('/draft/show', 'ParticipantController@show_draft')->name('draft/show');
        Route::get('/draft/{id}/edit', 'ParticipantController@edit_draft')->name('draft/edit');

    });

});