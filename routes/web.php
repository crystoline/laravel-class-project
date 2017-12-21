<?php
use Illuminate\Http\Request;
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

Route::post('/test', function(Request $request){
    dd($request);
   //return "You have posted a form";
});

Route::group(['middleware' => ['auth']], function (){
	Route::resource('/profile', 'ProfileController');

//	Route::get('/profile', ['uses' =>'ProfileController@index', 'as' => 'profile.index']);
//	Route::post('/profiles',  ['uses' =>'ProfileController@store', 'as' => 'profile.store']);
//	Route::get('/profile/create',  ['uses' =>'ProfileController@create', 'as' => 'profile.create']);
//	Route::get('/profile/{profile}/show',  ['uses' =>'ProfileController@show', 'as' => 'profile.show']);
//	Route::get('/profile/{profile}/edit',  ['uses' =>'ProfileController@edit', 'as' => 'profile.edit']);
//	Route::put('/profile/{profile}/update',  ['uses' =>'ProfileController@update', 'as' => 'profile.update']);
});


Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
