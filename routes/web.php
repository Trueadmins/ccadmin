<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::prefix('admin')->group(function(){
    Route::get('/dashboard', [HomeController::class, 'sadminDashboard'])->name('sadminDashboard');
    Route::get('/users', [HomeController::class, 'allUsers'])->name('allUsers');
});

Route::middleware(['auth'])
    ->get('/{any}', function () {
        return view('sadmin');
    })->where('any','.*');
