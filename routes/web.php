<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CifraController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return redirect()->route('cifras.index');
    })->name('dashboard');

    Route::resource('cifras', CifraController::class);

});

require __DIR__.'/auth.php';