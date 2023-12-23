<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SeatPlanController;
use App\Http\Controllers\TripController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// group auth middleware for route
Route::post('storeBooking',[BookingController::class,'storeBooking']);


// insert bus route
Route::post('/insertBus', [BusController::class, 'insertBus']);
// route for delete bus
Route::get('/deleteBus/{id}', [BusController::class, 'deleteBus']);

// inser trip
Route::post('insertTrip',[TripController::class,'insertTrip']);
Route::get('deleteTrip/{id}',[TripController::class,'deleteTrip']);

// schedule
Route::post('schedule',[ScheduleController::class,'store']);
Route::get('deleteSchedule/{id}',[ScheduleController::class,'deleteSchedule']);

// store seat
Route::post('insertSeat',[SeatPlanController::class,'storeSeat']);