<?php

use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/hom2', [App\Http\Controllers\HomeController::class, 'dashboard']);
// Route::get('/booking/create', [App\Http\Controllers\BookingController::class, 'create']);

// Route::get('/form',function(){
//    return view('booking');
// });
Route::get('/get-destinations', [TicketController::class, 'getDestinations']);
Route::get('/get-trips/{destination_id}', [TicketController::class, 'getTrips']);
Route::get('/get-seats/{trip_id}', [TicketController::class, 'getSeats']);
Route::post('/store-booking', [TicketController::class, 'storeBooking']);
Route::get('/bookinglist', [TicketController::class, 'showBookings']);