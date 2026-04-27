<?php

use App\Http\Controllers\ShipmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\Admin\RateController;
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

Route::get('/',[FrontController::class,'homePage'])->name('homepage');
Route::get('/tracking',[FrontController::class,'trackingPage'])->name('trackingPage');
Route::get('/contact',[FrontController::class,'contactPage'])->name('contactPage');
Route::get('/about',[FrontController::class,'aboutPage'])->name('aboutPage');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::prefix('admin')->group(function(){
    Route::get('/dashboard', [HomeController::class, 'sadminDashboard'])->name('sadminDashboard');
    Route::get('/users', [HomeController::class, 'allUsers'])->name('allUsers');
    Route::post('/user/add', [HomeController::class, 'addAdminUser']);
    Route::post('/user/update/{id}', [HomeController::class, 'updateAdminUser']);
    Route::get('/couriers', [HomeController::class, 'getAdminCouriers']);
    Route::post('/courier/add', [HomeController::class, 'addAdminCourier']);
    Route::post('/courier/update', [HomeController::class, 'editAdminCourier']);
    Route::post('/service', [HomeController::class, 'upsertService']);
    Route::get('/rates/{serviceId}', [HomeController::class, 'getRates']);
    Route::post('/rate', [HomeController::class, 'storeRate']);
    Route::put('/rate/{id}', [HomeController::class, 'updateRate']);
    Route::delete('/rate/{id}', [HomeController::class, 'deleteRate']);
    Route::get('/company/{companyId}/couriers', [HomeController::class, 'getCompanyCouriers']);
    Route::post('/company/{companyId}/couriers', [HomeController::class, 'upsertCompanyCourier']);
    Route::get('/shipments',[HomeController::class,'getAdminShipments']);
    Route::get('/companies', [HomeController::class, 'adminCompanies']);
    Route::post('/company/add', [HomeController::class, 'addAdminCompany']);
    Route::post('/company/update', [HomeController::class, 'updateAdminCompany']);
    Route::post('/all/countries', [HomeController::class, 'seedCountries']);
    Route::get('/all/countries', [HomeController::class, 'getCountries']);
    Route::get('/active-countries', [HomeController::class, 'getActiveCountries']);
    Route::post('/update/country', [HomeController::class, 'updateCountry']);
    Route::get('/company/services',[ShipmentController::class,'getAvailableServices']);
    Route::post('/company/calculate-rates',[ShipmentController::class,'calculateRates']);
});

Route::middleware(['auth'])
    ->get('/{any}', function () {
        return view('sadmin');
    })->where('any','.*');
