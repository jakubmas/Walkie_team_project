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
// Route::get('/dog-create', function ()
// {

    // $breeds = \App\Breed::pluck('name', 'id');

    // return view('/create_dog/create_dog', compact(['breeds']));
// });

//Kuba:
Route::get('/', function(){
    return view('homepage');
});

//Marta:

Route::group(['middleware' => ['can:admin']], function () {

    Route::resource('/dog', 'DogController')->except(['index', 'show']);
    Route::resource('/user', 'UserController')->except(['create','store']);

});

Route::resource('/dog', 'DogController')->only(['index', 'show']);
Route::get('/contact', 'UserController@contact');
Route::post('/contact', 'UserController@send');
//Auth:
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


