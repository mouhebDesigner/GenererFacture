<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviController;
use App\Http\Controllers\UserController;
// FRONT CONTORLLER;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;

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
// USER ROUTES ---------------------------------
Route::resource('users', UserController::class);
// SERVICE ROUTES ---------------------------------
Route::resource('services', ServiceController::class);
// DEVI ROUTES ---------------------------------
Route::resource('devis', DeviController::class);
Route::get('/devis/pdf/{id}', [DeviController::class, 'exportPDF'])->name('devis.pdf');

// FACTURE ROUTES ---------------------------------
Route::resource('factures', FactureController::class)->only('index', 'destroy', 'show');
Route::get('/factures/create/{devis_id}', [FactureController::class, 'create'])->name('factures.create');
Route::get('/factures/pdf/{id}', [FactureController::class, 'exportPDF'])->name('factures.pdf');

// CLIENT ROUTES ---------------------------------
Route::resource('clients', ClientController::class);
// PROFILE ROUTES ---------------------------------
Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
Route::put('profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');





Route::get('/', function () {
    return view('auth.login-design');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
