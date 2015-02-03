<?php

return array(

  /*
	|--------------------------------------------------------------------------
	| Block route prefix
	|--------------------------------------------------------------------------
	|
	| You can use this param to set the prefix before the routes
	|
	*/
  'route_prefix' => 'admin',

  /*
	|--------------------------------------------------------------------------
	| Block filter before
	|--------------------------------------------------------------------------
	|
	| You can set the filter who will be used to display the page
	|
	*/
  'filter_before' => 'admin-auth',

  /*
	|--------------------------------------------------------------------------
	| Block regions
	|--------------------------------------------------------------------------
	|
	| The default regions
	|
	*/
  'regions' => array(
    'header' => 'Header',
    'sidebar_left' => 'Sidebar Left',
    'content' => 'Content',
    'sidebar_right' => 'Sidebar Right',
    'footer' => 'Footer',
  ),

);