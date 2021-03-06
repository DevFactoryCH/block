<?php

namespace Devfactory\Block\Models;

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Block extends Eloquent {

  public static $rules = array(
    'title' => 'required|alpha_dash|unique:blocks,title',
    'body' => 'required',
  );

}