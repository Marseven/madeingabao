<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RegistrationController as AdminRegistration;
use App\Http\Controllers\Public\CheckinController;
use App\Http\Controllers\Public\ContactController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\InvitationController;
use App\Http\Controllers\Public\RegistrationController as PublicRegistration;
use App\Http\Controllers\Public\TicketController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Pages publiques
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/inscription', [PublicRegistration::class, 'create'])->name('register.create');
Route::post('/inscription', [PublicRegistration::class, 'store'])->name('register.store');
Route::get('/inscription/merci/{registration:reference}', [PublicRegistration::class, 'thanks'])->name('register.thanks');

Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// Télécharger son billet (recherche par email ou téléphone)
Route::get('/mon-billet', [TicketController::class, 'show'])->name('ticket.show');
Route::post('/mon-billet', [TicketController::class, 'find'])->name('ticket.find');

// Vérification (scan QR) et invitation PDF — sécurisées par token unique
Route::get('/checkin/{token}', [CheckinController::class, 'show'])->name('checkin');
Route::get('/invitation/{token}', [InvitationController::class, 'show'])->name('invitation');

/*
|--------------------------------------------------------------------------
| Administration (auth minimale)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.attempt');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // /export AVANT /{registration} pour éviter la capture du mot "export"
        Route::get('registrations/export', [AdminRegistration::class, 'export'])->name('registrations.export');

        Route::get('registrations', [AdminRegistration::class, 'index'])->name('registrations.index');
        Route::get('registrations/{registration}', [AdminRegistration::class, 'show'])->name('registrations.show');
        Route::patch('registrations/{registration}/status', [AdminRegistration::class, 'updateStatus'])->name('registrations.status');
        Route::delete('registrations/{registration}', [AdminRegistration::class, 'destroy'])->name('registrations.destroy');
        Route::get('registrations/{registration}/invitation', [AdminRegistration::class, 'invitation'])->name('registrations.invitation');
        Route::post('registrations/{registration}/remind', [AdminRegistration::class, 'remind'])->name('registrations.remind');
    });
});
