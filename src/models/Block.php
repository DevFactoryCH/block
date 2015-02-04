<?php

namespace Devfactory\Block\Models;

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Block extends Eloquent {

  public static $rules = array(
    'title' => 'required|unique:blocks,title',
    'body' => 'required',
  );

}