<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/races', "RaceController@getRaces");

Route::get('/racers', "RacerController@getRacers");

Route::get('/racers/{id}', "RacerController@getRacerDetail");

Route::post('/racers/{id}/delete',"RacerController@deleteRacer");

Route::get('/racereditor',"RacerController@racerEditorView" );
Route::post('/racereditor',"RacerController@editracer" );

Route::get('/racers/{id}/edit',"RacerController@editRacerView" );
Route::post('/racers/{id}/edit',"RacerController@updateRacer");


// Route::get('/races/{id}/racers', "RacerController@getRaceRacers");

Route::get('/races/{id}', "RaceController@getRaceDetails");

// Route::get('/races/{id}/racerdetail', "RaceController@getRaceRacers");

// Route::get('/editor', "RaceController@editRaceView");

// Route::post('/editor', "RaceController@editNewRace");

Route::get('/races/{id}/edit',"RaceController@editRace" );
Route::post('/races/{id}/edit',"RaceController@updateRace");


Route::post('/api/removeRace', "RaceController@removeRace");