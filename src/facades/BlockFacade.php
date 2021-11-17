<?php 

namespace Devfactory\Block\Facades;

use Illuminate\Support\Facades\Facade;

class BlockFacade extends Facade
{
    /**
    * Get the registered name of the component.
    *
    * @return string
    */
    protected static function getFacadeAccessor() { return 'block'; }
}