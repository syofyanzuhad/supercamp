<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/register', function () {
//     return view('api/auth/register');
// })->name('register');

Route::get('/login', function () {
    return view('api/auth/login');
})->name('api/login');

// Route::post('/register', 'UserController@register');
Route::post('/login', 'UserController@login')->name('api/login');

Route::group(['middleware' => ['jwt.verify']], function() {

    Route::resource('lesson', 'LessonController')->parameters([
        'lesson' => 'id'
        ]);
        
        Route::resource('participant', 'ParticipantController')->parameters([
            'participant' => 'id'
        ]);

        // Route::resource('reactnative', 'ReactNativeController')->parameters([
        //     'reactnative' => 'id'
        // ]);
        
        // Route::resource('reactjs', 'ReactJavascriptController')->parameters([
        //     'reactjs' => 'id'
        // ]);
    });

