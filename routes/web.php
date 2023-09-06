<?php

use App\Http\Controllers\HomeController;
use App\Livewire\ProfileEditor;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
	return view('welcome');
});

Auth::routes([
	'register' => false,
]);

//Unauthorised routes
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login')->name('login');
Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@create')->name('register');
Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

//Authorised routes
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/profile', ProfileEditor::class)->name('profile.editor');

//userController routes
Route::post('/set_user_location', 'App\Http\Controllers\UserController@set_user_location')->name('set_user_location');
Route::post('/save_user_profile', 'App\Http\Controllers\UserController@save_user_profile')->name('profile.save');

