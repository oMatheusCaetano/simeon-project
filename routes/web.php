<?php

use App\Http\Controllers\App\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('app/{any}', [HomeController::class, 'index'])
    ->where('any', '.*')
    ->name('home.index');
