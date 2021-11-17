<?php 

namespace Devfactory\Block\Facades;

use Devfactory\Block\BlockBuilder;
use Illuminate\Support\Facades\Facade;

class Block extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    { 
        return BlockBuilder::class;
    }
}
