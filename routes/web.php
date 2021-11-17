<?php

use Devfactory\Block\Http\Controllers\BlockController;

$prefix = config('block::route_prefix');

Route::prefix($prefix)->group(function() {
    Route::resource('block', BlockController::class);
});
