<?php

namespace Devfactory\Block\Controllers;

use View;
use Input;
use Redirect;

use Devfactory\Block\Models\Block;

class BlockController extends \BaseController {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $blocks = Block::all();

    return View::make('block::index', compact('blocks'));
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
    $block = new Block();
    $block->title = Input::get('title');
    $block->body = Input::get('body');
    $block->status = TRUE;
    $block->save();

    return Redirect::route('block.index');
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
    //
  }


  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    //
  }


  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    //
  }


}
