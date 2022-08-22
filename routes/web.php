<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'redirect']);
Route::get('/add_doctor_view', [AdminController::class, 'addview']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::post('/upload_doctor', [AdminController::class, 'upload']);
Route::get('/showappointments', [AdminController::class, 'showappointments']);
Route::get('/approve/{id}', [AdminController::class, 'approve']);
Route::get('/cancel/{id}', [AdminController::class, 'cancel']);
Route::get('/showdoctors', [AdminController::class, 'showdoctors']);
Route::get('/delete/{id}', [AdminController::class, 'delete']);
Route::post('/editdoctor/{id}', [AdminController::class, 'editdoctor']);
Route::get('/updatedoctor/{id}', [AdminController::class, 'updatedoctor']);
Route::post('/appointment', [HomeController::class, 'appointment']);
Route::get('/myappointment', [HomeController::class, 'myappointment']);
Route::get('/cancel_appointment/{id}', [HomeController::class, 'cancel_appointment']);
