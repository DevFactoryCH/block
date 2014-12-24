<?php

$prefix = Config::get('block::route_prefix');

Route::group(array('prefix' => $prefix), function() {

  Route::resource('block', 'Devfactory\Block\Controllers\BlockController');

});