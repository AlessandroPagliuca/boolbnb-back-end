<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Host\DashboardController;
use App\Http\Controllers\Host\ApartmentController;
use App\Http\Controllers\Host\SponsorshipController;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'verified'])->name('host.')->prefix('host')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('apartments', ApartmentController::class)->parameters(['apartments' => 'apartment:slug']);
    //Route::resource('sponsorships', SponsorshipController::class)->parameters(['sponsorships' => 'sponsorship:id']);

});

Route::get('/apartments/{slug}/views', [ApartmentController::class, 'showViews'])->name('host.apartments.views');
Route::get('/host/apartments/{slug}/showpay', [ApartmentController::class, 'showpay'])->name('host.apartments.showpay');
Route::get('/host/apartments/showpay/{slug}/{id}/payment', [ApartmentController::class, 'payment'])->name('host.apartments.payment');


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';