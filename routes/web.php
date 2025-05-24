<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DocumentRequestController;
use App\Http\Controllers\Admin\ReportsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DocumentRequestController as ControllersDocumentRequestController;
use App\Http\Controllers\ProfileController;
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
    
    // Document Request Routes
    Route::get('/admin/documents', [DocumentRequestController::class, 'index'])->name('documents.index');
    Route::get('/admin/documents/{document}', [DocumentRequestController::class, 'show'])->name('documents.show');
    Route::put('/admin/documents/{documentRequest}', [DocumentRequestController::class, 'update'])->name('documents.update');
    


    // Resident Routes
    Route::resource('residents', \App\Http\Controllers\Admin\ResidentController::class)->names('residents');


     // report Routes
    Route::get('/dx', [ReportsController::class, 'index'])->name('reports.index');
    Route::post('/generate', [ReportsController::class, 'generate'])->name('reports.generate');
    Route::post('/export', [ReportsController::class, 'exportPdf'])->name('reports.export');


    //Settings Routes
    Route::get('/settings', [\App\Http\Controllers\Admin\SettingsController::class, 'index'])->name('settings.index');
    Route::put('/documents', [\App\Http\Controllers\Admin\SettingsController::class, 'updateDocumentSettings'])->name('settings.update-documents');


    
    // Document Type Routes
    Route::get('/create', [\App\Http\Controllers\Admin\DocumentController::class, 'create'])->name('documents.create');
    Route::post('/store', [\App\Http\Controllers\Admin\DocumentController::class, 'store'])->name('documents.store');
    Route::get('/{document}', [\App\Http\Controllers\Admin\DocumentController::class, 'show'])->name('documents.details');

    

    //Prfoile Routes
    Route::get('/', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');


});
    

    // Resident Routes
Route::middleware(['auth', 'resident'])->prefix('resident')->group(function() {
    Route::get('/dashboard', function () {
        return view('resident.dashboard');
    })->name('resident.dashboard');
    Route::resource('requests', ControllersDocumentRequestController::class)
        ->only(['index', 'create', 'store', 'show']);
});