<?php 

namespace Devfactory\Block\Composers;

use Config;

class BlockComposer {
  
  public function compose($view) {
    
    $prefix = rtrim(Config::get('taxonomy::route_prefix'), '.') . '.';
    
    $layout = (object) [
      'extends' => Config::get('taxonomy::config.layout.extends'),
      'header' => Config::get('taxonomy::config.layout.header'),
      'content' => Config::get('taxonomy::config.layout.content'),
    ];

    $view->with(['prefix' => $prefix, 'layout' => $layout]);
  }
}