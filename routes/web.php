<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/',[FrontController::class,'homePage'])->name('homepage');
Route::get('/tracking',[FrontController::class,'trackingPage'])->name('trackingPage');
Route::get('/contact',[FrontController::class,'contactPage'])->name('contactPage');
Route::get('/about',[FrontController::class,'aboutPage'])->name('aboutPage');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])
    ->get('/{any}', function () {
        return view('sadmin');
    })->where('any','.*');
