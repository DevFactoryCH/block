<?php

namespace Devfactory\Block\View\Composers;

use Illuminate\View\View;

class BlockComposer
{
    public function compose(View $view)
    {
        $prefix = rtrim(config('block.route_prefix'), '.') . '.';

        $view->with(['prefix' => $prefix]);
    }
}
