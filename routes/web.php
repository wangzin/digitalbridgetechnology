<?php

use App\Http\Controllers\WebsiteHomeController;
use Illuminate\Support\Facades\Route;
Route::get('/', [WebsiteHomeController::class, 'index'])->name('index');

Route::prefix('digitalbridgesolution')->group(function () {
    Route::get('about', [WebsiteHomeController::class, 'about'])->name('about');
    Route::get('service', [WebsiteHomeController::class, 'service'])->name('service');
    Route::get('contact', [WebsiteHomeController::class, 'contact'])->name('contact');
    Route::post('savecontact', [WebsiteHomeController::class, 'savecontact'])->name('savecontact');
    
});
   
