<?php

use Illuminate\Support\Facades\Route;

use App\Models\HomepageSetting;

Route::get('/', function () {
    \App\Models\View::recordView('homepage');
    $settings = App\Models\HomepageSetting::getCached();
    return view('welcome', compact('settings'));
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::view('contacts', 'contacts')->name('contacts');
    Route::view('reviews', 'reviews')->name('reviews');
    Route::view('analytics', 'analytics')->name('analytics');
    Route::get('/homepage-settings', \App\Livewire\HomepageSettingsForm::class)->name('homepage-settings');
});

require __DIR__.'/settings.php';
