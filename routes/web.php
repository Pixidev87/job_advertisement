<?php

use App\Http\Controllers\JobListingController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::inertia('/', 'welcome', [
    'canRegister' => Features::enabled(Features::registration()),
])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';


Route::get('/', [JobListingController::class, 'index'])->name('jobListing.index');
Route::get('/{jobListing}', [JobListingController::class, 'show'])->name('jobListing.show');

Route::middleware('auth')->group(function(){
    Route::get('/create', [JobListingController::class, 'create'])->name('jobListing.create');
    Route::post('/store', [JobListingController::class, 'store'])->name('jobListing.store');
});

