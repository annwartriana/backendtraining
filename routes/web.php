<?php

use Illuminate\Support\Facades\Route;

//Enlazamos la vista de CompaniesController 
use App\Http\Controllers\CompaniesController;

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

Route::resource('companies', CompaniesController::class)->middleware('auth');

//Auth::routes(['register'=>false, 'reset'=> false]);
Auth::routes();

Route::get('/home', [CompaniesController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [CompaniesController::class, 'index'])->name('home');

});