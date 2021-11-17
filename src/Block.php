<?php 

namespace Devfactory\Block;

use Devfactory\Block\Models\Block as ModelsBlock;

class Block
{
    /**
     * @var string
     */
    protected $blockName;

    public function get($blockName = '')
    {
        $block = ModelsBlock::where('title', $blockName)
            ->first();

        if ($block) {
            return $block->body;
        }

        return false;
    }
}
