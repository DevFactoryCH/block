<?php

namespace Devfactory\Block;

use Devfactory\Block\Models\Block as BlockModel;
use Illuminate\Support\Facades\Request;

class Block {

  const  BLOCK_REGION_NONE          = 1;  //Denotes that a block is not enabled in any region and should not be shown.
  const  BLOCK_VISIBILITY_LISTED    = 2;  //Shows this block on only the listed pages.
  const  BLOCK_VISIBILITY_NOTLISTED = 3;  //Shows this block on every page except the listed pages.
  const  BLOCK_VISIBILITY_PHP       = 4;  //Shows this block if the associated PHP code returns TRUE.


  /**
   * The block name
   *
   * @var string
   **/
  protected $block_name;


  public function get($block_name = '')
  {
    $block = BlockModel::where('title', $block_name)->first();

    if ($block && $this->show($block)) {
      return $block->body;
    }

    return FALSE;
  }

  public function show(BlockModel $block)
  {
    switch($block->format) {
    case BLOCK_REGION_NONE:
      return false;
      break;
    case BLOCK_VISIBILITY_LISTED:
      return $this->listed_page($block);
      break;
    case BLOCK_VISIBILITY_NOTLISTED:
      return ($this->listed_page($block)) ? false : true;
      break;
    case BLOCK_VISIBILITY_PHP:
      return ($this->block_eval($block)) ? true : false;
      break;
    }
  }

  /**
   * Eval the php code
   *
   * @param code
   *
   * @return
   */
  protected function block_eval(BlockModel $block)
  {
    ob_start();
    print eval('?>' . $code);
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
  }

  /**
   * Check if the block sould be display
   *
   * @param string
   *
   * @return
   */
  protected function listed_page(BlockModel $block)
  {
    $arr_listed = explode ("\n", $listed);

    if (in_array(Request::url(), $arr_listed)) {
      return true;
    }

    return false;
  }
}