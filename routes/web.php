<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DocumentRequestController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DocumentRequestController as ControllersDocumentRequestController;
use App\Http\Controllers\VerificationController;
use GuzzleHttp\Middleware;
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


Route::get('/login', [AuthController::class, 'loginview'])->name('login');
Route::get('/register', [AuthController::class, 'registerview']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
     ->name('verification.verify');
Route::post('/email/verify/resend', [VerificationController::class, 'resend'])
     ->name('verification.resend');




Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
         
    Route::resource('document-requests', DocumentRequestController::class)
    ->only(['index', 'update', 'show'])
    ->names([
        'index' => 'documents.index',
        'update' => 'documents.update',
        'show' => 'documents.show'
    ]);
});
    

    // Resident Routes
Route::middleware(['auth', 'resident'])->prefix('resident')->group(function() {
    Route::get('/dashboard', function () {
        return view('resident.dashboard');
    })->name('resident.dashboard');
    Route::resource('requests', ControllersDocumentRequestController::class)
        ->only(['index', 'create', 'store', 'show']);
});