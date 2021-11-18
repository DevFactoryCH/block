<?php

use Illuminate\Support\Facades\Route;
use Devfactory\Block\Http\Controllers\BlockController;

$prefix = config('block.route_prefix');

Route::prefix($prefix)->middleware('web')->group(function() {
    Route::get('/', [BlockController::class, 'index'])
        ->name('block.index');
    Route::get('create', [BlockController::class, 'create'])
        ->name('block.create');
    Route::post('/', [BlockController::class, 'store'])
        ->name('block.store');
    Route::get('{id}/edit', [BlockController::class, 'edit'])
        ->name('block.edit');
    Route::put('{id}', [BlockController::class, 'update'])
        ->name('block.update');
    Route::delete('{id}', [BlockController::class, 'destroy'])
        ->name('block.destroy');
});
