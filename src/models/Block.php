<?php

namespace Devfactory\Block\Models;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    public static $rules = [
        'title' => 'required|alpha_dash|unique:blocks,title',
        'body' => 'required',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'body',
        'status',
    ];
}
