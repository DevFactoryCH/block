<?php 

namespace Devfactory\Block;

use Devfactory\Block\Models\Block as BlockModel;

class Block {
  
  /**
   * The block name
   *
   * @var string
   **/
  protected $block_name;


  public function get($block_name = '') {
    $block = BlockModel::where('title', $block_name)->first();

    if ($block) {
      return $block->body;
    }

    return FALSE;
  }

}