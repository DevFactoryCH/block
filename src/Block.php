<?php

namespace Devfactory\Block;

use Devfactory\Block\Models\Block as BlockModel;
use Illuminate\Support\Facades\Request;

class Block {

  const  BLOCK_VISIBILITY_LISTED    = 2;  //Shows this block on only the listed pages.
  const  BLOCK_VISIBILITY_NOTLISTED = 3;  //Shows this block on every page except the listed pages.
  const  BLOCK_VISIBILITY_PHP       = 4;  //Shows this block if the associated PHP code returns TRUE.


  /**
   * The block name
   *
   * @var string
   **/
  protected $block_name;

  public function formats() {
    return array(
      3 => trans('block::block.not_listed'),
      2 => trans('block::block.listed'),
      4 => trans('block::block.php')
    );
  }

  public function region($region) {
    $blocks = BlockModel::where('region', '=', $region)->orderby('weight', 'ASC')->get();

    $output = '';
    foreach($blocks as $key => $block) {
      if(!$this->show($block)) {
        continue;
      }

      $output .= '<div class="content content-' . $region . ' clearfix">';
      $output .= $block->body;
      $output .= '</div>';
    }

    return $output;

  }

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
    case self::BLOCK_VISIBILITY_LISTED:
      return $this->listed_page($block);
      break;
    case self::BLOCK_VISIBILITY_NOTLISTED:
      return ($this->listed_page($block)) ? false : true;
      break;
    case self::BLOCK_VISIBILITY_PHP:
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
    print eval('?>' . $block->pages);
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
    $arr_listed = explode ("\n", $block->pages);

    if (in_array(Request::path(), $arr_listed)) {
      return true;
    }

    return false;
  }
}