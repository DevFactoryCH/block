<?php

$prefix = Config::get('block::route_prefix');
$before = Config::get('gate::filter_before');

Route::group(array('prefix' => $prefix, 'before' => $before), function() {

  Route::resource('block', 'Devfactory\Block\Controllers\BlockController');

  Route::get('block/order/{region_id}', array(
               'as' =>  'block.order',
               'uses' => 'Devfactory\Block\Controllers\BlockController@order'
             ));

});