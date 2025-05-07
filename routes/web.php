<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LegalController;

// Főoldal
Route::get('/', fn() => view('homepage'))->name('homepage');

// Authentikációhoz kötött profil funkciók
Route::middleware(['auth'])->group(function () {
    Route::view('/profile', 'profile.profile')->name('profile');
    Route::post('/profile/upload', [ProfileController::class, 'upload'])->name('profile.upload');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('password.update');

    // Volt beállítási oldalak
    Route::redirect('settings', 'settings/profile');
    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

// Szolgáltatások
Route::prefix('/')->group(function () {
    Route::get('alkatreszkereskedo', [ServiceController::class, 'index'])->name('alkatreszkereskedo')->defaults('type', 'alkatreszkereskedo');
    Route::get('autoszerelo', [ServiceController::class, 'index'])->name('autoszerelo')->defaults('type', 'autoszerelo');
    Route::get('gumiszerviz', [ServiceController::class, 'index'])->name('gumiszerviz')->defaults('type', 'gumiszerviz');
    Route::get('automoso', [ServiceController::class, 'index'])->name('automoso')->defaults('type', 'automoso');
    Route::get('automentok', [ServiceController::class, 'index'])->name('automentok')->defaults('type', 'automentok');
});

Route::post('/services/{service}/toggle-favorite', [ServiceController::class, 'toggleFavorite'])->name('services.toggleFavorite');
Route::post('/service/{id}/upload-image', [ServiceController::class, 'uploadImage'])->name('service.uploadImage');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');

// Céges oldalak
Route::get('/about-us', [CompanyController::class, 'aboutUs'])->name('about-us');
Route::get('/contact', [CompanyController::class, 'contact'])->name('contact');
Route::post('/contact', [CompanyController::class, 'send'])->name('contact.send');


// Jogi oldalak
Route::get('/terms-of-service', [LegalController::class, 'termsOfService'])->name('terms-of-service');
Route::get('/privacy-policy', [LegalController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/cookie-policy', [LegalController::class, 'cookiePolicy'])->name('cookie-policy');

// Auth route-ok betöltése
require __DIR__.'/auth.php';
