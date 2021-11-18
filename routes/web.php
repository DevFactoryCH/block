<?php

use Illuminate\Support\Facades\Route;
use Devfactory\Block\Http\Controllers\BlockController;

$prefix = config('block::route_prefix');

Route::prefix($prefix)->middleware('web')->group(function() {
    Route::get('block', [BlockController::class, 'index'])
        ->name('block.index');
    Route::get('create', [BlockController::class, 'store'])
        ->name('block.create');
    Route::post('block', [BlockController::class, 'store'])
        ->name('block.store');
    Route::get('edit/{id}', [BlockController::class, 'edit'])
        ->name('block.edit');
    Route::put('update/{id}', [BlockController::class, 'update'])
        ->name('block.update');
    Route::put('destroy/{id}', [BlockController::class, 'destroy'])
        ->name('block.destroy');
});
