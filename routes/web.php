<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index'])->name('home');

Route::controller(RecipeController::class)
    ->prefix('recipes')
    ->name('recipes.')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show')->where('id', '[0-9]+');
    });

Route::resource('/abouts', AboutController::class);