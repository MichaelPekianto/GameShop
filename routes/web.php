<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\member;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


Route::group(['middleware'=> 'admin'],function(){

    Route::get('/managegame',[GameController::class,'managegame']);
    Route::get('/insert',[GameController::class,'insertPage']);
    Route::post('/insert',[GameController::class,'insert']);
    Route::get('/update/{id}',[GameController::class, 'updatePage']);
    Route::post('/update/{id}',[GameController::class, 'update']);
    Route::get('/delete/{id}',[GameController::class, 'delete']);
    Route::get('/managegenre',[GameController::class,'managegenre']);
    Route::get('/updategenre/{id}',[GameController::class, 'updategenrePage']) ;
    Route::post('/updategenre/{id}', [GameController::class, 'updategenre']);
});
Route::group(['middleware'=> 'member'],function () {
    Route::get('/profile', [GameController::class, 'profile']);
    Route::post('/updateprofile', [UserController::class, 'updateprofile']);
    Route::post('/updatepassword', [UserController::class, 'updatepassword']);
    Route::post('/cart/{id}',[CartController::class, 'add']);
    Route::get('/cart',[CartController::class, 'index']);
    Route::post('/updatecart/{id}', [CartController::class, 'updatecart']);
    Route::get('/deletecart/{id}', [CartController::class, 'deletecart']);
    Route::get('/transaction', ([CartController::class, 'transaction']));
    Route::get('/history',([CartController::class,'history']));
    Route::get('/transactiondetails/{id}',[CartController::class, 'transactiondetails']);
});

Route::get('/', [App\Http\Controllers\GameController::class, 'index']);
Route::get('/search', [GameController::class, 'search']);
Route::get('/details/{id}', [GameController::class, 'details']);
