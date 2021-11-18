<?php

namespace Devfactory\Block\Http\Controllers;

use Devfactory\Block\Models\Block;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $blocks = Block::get();

        return view('block::index', compact('blocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('block::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Block::$rules);

        Block::create([
            'title' => $request->title,
            'body' => $request->body,
            'status' => true,
        ]);

        return redirect()->route('block.index');
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

        return view('block::edit', compact('block'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required|alpha_dash|unique:blocks,title,' . $id,
            'body' => 'required',
        ];

        $this->validate($request, $rules);

        $block = Block::find($id);
        $block->update([
            'title' => $request->title,
            'body' => $request->body,
            'status' => true,

        ]);

        return redirect()->route('block.index');
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

        return redirect()->back();
    }
}
