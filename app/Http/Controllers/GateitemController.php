<?php

namespace App\Http\Controllers;

use App\Gateitem;
use Illuminate\Http\Request;

class GateitemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Gateitem::all();
        return response()->json($item,200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //not required as there is bulk insert in gatepass
    }

    /**
     * Display the specified item for a gate pass id.
     *
     * @param  \App\Gateitem  $gateitem
     * @return \Illuminate\Http\Response
     */
    public function show($gid)
    {
        $item = Gateitem::where('gid',$gid)->get();
        return response()->json($item,200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gateitem  $gateitem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Gateitem::find($id);
        $item->update($request->all());
        return response()->json($item,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gateitem  $gateitem
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Gateitem::destroy($id);
        return response()->json($item,200);
    }
}
