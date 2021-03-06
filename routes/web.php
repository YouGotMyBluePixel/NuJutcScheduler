<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusRoutesController;
use App\Http\Controllers\SmartCardController;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
    'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/topup', function () {
    return Inertia::render('TopUp');
})->name('TopUp');

Route::get('/features', function () {
    return Inertia::render('Features');
})->name('Features');

Route::get('/contact', function () {
    return Inertia::render('Contact');
})->name('contact');

Route::get('/smartcardtopup', function () {
    return Inertia::render('SmartCardTopUp');
})->name('smartcard');

Route::resource('/smartcard', SmartCardController::class);

Route::resource('busroutes', BusRoutesController::class);

require __DIR__.'/auth.php';
