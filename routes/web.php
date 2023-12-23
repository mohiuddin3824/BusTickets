<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SeatPlanController;
use App\Http\Controllers\TripController;
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

/*
Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
*/

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/dashboard', [RoleController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/add-buses', [busController::class, 'getBus'])->name('add-buses');
Route::get('/add-trip', [tripController::class, 'getAllTrips'])->name('add-trip');
Route::get('/schedule', [ScheduleController::class, 'schedule'])->name('schedule');
Route::get('/seatplane', [SeatPlanController::class, 'seatplane'])->name('seatplane');
Route::get('/booking', [BookingController::class, 'bookings'])->name('booking');

// user booking
Route::get('/usersbookings', [BookingController::class, 'usersbookings'])->name('usersbookings');

Route::get('/buses', [BusController::class, 'buses'])->name('buses');
Route::get('/trips', [TripController::class, 'trips'])->name('trips');
Route::get('/schedules', [ScheduleController::class, 'schedules'])->name('schedules');

