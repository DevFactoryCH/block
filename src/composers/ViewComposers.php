<?php 

namespace Devfactory\Block\Composers;

use Config;

class BlockComposer {
  
  public function compose($view) {
    
    $prefix = rtrim(Config::get('block::route_prefix'), '.') . '.';
    

    $view->with(['prefix' => $prefix]);
  }
}