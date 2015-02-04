<?php

namespace Devfactory\Block\Controllers;

use View;
use Input;
use Redirect;
use Validator;
use Config;
use Response;

use Devfactory\Block\Models\Block;

class BlockController extends \BaseController {

  protected $route_prefix;

  public function __construct() {
    $this->route_prefix = rtrim(Config::get('block::route_prefix'), '.') . '.';

    View::composer('block::*', 'Devfactory\Block\Composers\BlockComposer');
  }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $blocks_disabled = Block::where('region', '=', '')->orderby('weight', 'ASC')->get();
    $regions = Config::get('block::regions');

    return View::make('block::index', compact('blocks_disabled', 'regions'));
  }


  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

    return View::make('block::create');
  }


  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store()
  {
    $validator = Validator::make(Input::All(), Block::$rules);
    if ($validator->fails()) {
      return Redirect::back()->withInput()->withErrors($validator);
    }

    $block = new Block();
    $block->title = strtolower(Input::get('title'));
    $block->body = Input::get('body');
    $block->status = TRUE;
    $block->save();

    return Redirect::route($this->route_prefix . 'block.index');
  }


  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    //
  }


  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $block = Block::find($id);

    return View::make('block::edit', compact('block'));
  }


  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    $rules = array(
      'title' => 'required|alpha_dash|unique:blocks,title,' . $id,
      'body' => 'required',
    );

    $validator = Validator::make(Input::All(), $rules);
    if ($validator->fails()) {
      return Redirect::back()->withInput()->withErrors($validator);
    }

    $block = Block::find($id);
    $block->title = strtolower(Input::get('title'));
    $block->body = Input::get('body');
    $block->status = TRUE;
    $block->save();

    return Redirect::route($this->route_prefix . 'block.index');
  }


  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $block = Block::find($id);
    $block->delete();

    return Redirect::back();
  }

  public function order($region) {
    $inputs = Input::all();

    if(!isset($inputs['block'])) {
      return Response::make('no block found');
    }

    foreach ($inputs['block'] as $weight => $id){
      if(!$id) {
        continue;
      }
      $block = Block::find($id);

      if(!$block) {
        continue;
      }

      if($region == 'disabled'){
        $block->region = null;
      }else{
        $block->region = $region;
      }
      $block->weight = $weight;
      $block->save();
    }
    return Response::make('Updated');
  }

}
