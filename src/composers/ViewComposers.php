<?php 

namespace Devfactory\Block\Composers;

class BlockComposer
{
    public function compose($view) {

        $prefix = rtrim(config('block::route_prefix'), '.') . '.';

        $view->with(['prefix' => $prefix]);
    }
}
