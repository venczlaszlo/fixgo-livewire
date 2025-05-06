<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LegalController;


Route::get('/', function () {
    return view('homepage');
})->name('homepage');

Route::middleware('auth')->get('/profile', [ProfileController::class, 'showProfile'])->name('profile');

Route::get('/home', function () {
    return view('homepage');
})->name('home');

// Profil route:

Route::get('/profile', function () {
    return view('profile.profile');
})->name('profile');


Route::middleware(['auth'])->group(function () {
    Route::view('/profile', 'profile.profile')->name('profile');
    Route::post('/profile/upload', [ProfileController::class, 'upload'])->name('profile.upload');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Szolgáltatások routeok:

Route::get('/alkatreszkereskedo', [ServiceController::class, 'index'])->name('alkatreszkereskedo')->defaults('type', 'alkatreszkereskedo');
Route::get('/autoszerelo', [ServiceController::class, 'index'])->name('autoszerelo')->defaults('type', 'autoszerelo');
Route::get('/gumiszerviz', [ServiceController::class, 'index'])->name('gumiszerviz')->defaults('type', 'gumiszerviz');
Route::get('/automoso', [ServiceController::class, 'index'])->name('automoso')->defaults('type', 'automoso');
Route::get('/automentok', [ServiceController::class, 'index'])->name('automentok')->defaults('type', 'automentok');

Route::post('/services/{service}/toggle-favorite', [ServiceController::class, 'toggleFavorite'])->name('services.toggleFavorite');

Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');


Route::post('/service/{id}/upload-image', [ServiceController::class, 'uploadImage'])->name('service.uploadImage');



// Cég routeok:

Route::get('/about-us', [CompanyController::class, 'aboutUs'])->name('about-us');
Route::get('/contact', [CompanyController::class, 'contact'])->name('contact');

// Jogi információk routeok:

Route::get('/terms-of-service', [LegalController::class, 'termsOfService'])->name('terms-of-service');
Route::get('/privacy-policy', [LegalController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/cookie-policy', [LegalController::class, 'cookiePolicy'])->name('cookie-policy');

//

Route::get('/services/{service}', [ServiceController::class, 'index'])->name('services.index');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';


require __DIR__.'/auth.php';
