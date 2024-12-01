<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrganizerController;
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

Route::get('/display', function() {
    return view('display', [
        'heading' => '<h1>Belajar Blade Templates</h1>'
    ]);
});


Route::get('/admin', [DashboardController::class, 'index']);

# route events crud
Route::get('/admin/events', [EventController::class, 'index']);
Route::post('/admin/events', [EventController::class, 'store']);
Route::get('/admin/events/create', [EventController::class, 'create']);
Route::get('/admin/events/{event}', [EventController::class, 'show']);
Route::put('/admin/events/{event}', [EventController::class, 'update']);
Route::get('/admin/events/{event}/edit', [EventController::class, 'edit']);
Route::delete('/admin/events/{event}', [EventController::class, 'delete']);

# resource controller
Route::resource('/admin/organizers', OrganizerController::class)->except(['show']);
