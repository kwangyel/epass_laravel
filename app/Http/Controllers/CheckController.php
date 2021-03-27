<?php

namespace App\Http\Controllers;

use App\Check;
use App\Http\Resources\CheckResource;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $check = Check::with('staff','car', 'visitor', 'staffs')->get();

        return response([ 'data' => CheckResource::collection($check), 'success' => 'true'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check = Check::create($request->all);
        return response([ 'data' => CheckResource::collection($check), 'success' => 'true'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $check = Check::find($id);

        return response([ 'data' => CheckResource::collection($check), 'success' => 'true'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $check = Check::find($id);
        $check->update($request->all());

        return response([ 'data' => CheckResource::collection($check), 'success' => 'true'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check = Check::destroy($id);
        return response([ 'data' => CheckResource::collection($check), 'success' => 'true'], 200);
    }
}
