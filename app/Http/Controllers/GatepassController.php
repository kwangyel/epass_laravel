<?php

namespace App\Http\Controllers;

use App\Gatepass;
use App\Gateitem;
use Illumicate\Support\Collection;
use Illuminate\Http\Request;

class GatepassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Gatepass::all();
        return response()->json($item,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = Gatepass::create($request->all());
        $gid = $item->id;
        $items = collect($request->items);
        $items_w_id = $items->map(function($part,$key) use($gid){
            $part['gid'] = $gid;
            return $part;
        });
        $created_items = Gateitem::insert($items_w_id->toArray());
        return response()->json(['success'=>$created_items],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gatepass  $gatepass
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Gatepass::find($id);
        return response()->json($item,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gatepass  $gatepass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Gatepass::find($id);
        $item->update($request->all());
        return response()->json($item,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gatepass  $gatepass
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Gatepass::destroy($id);
        return response()->json($item,200);
    }
}
