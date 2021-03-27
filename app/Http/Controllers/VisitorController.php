<?php

namespace App\Http\Controllers;

use App\Visitor;
use Illuminate\Http\Request;
use App\Http\Resources\VisitorResource;
use Carbon\Carbon;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitor = Visitor::with('staff')->get();

        return response([ 'data' => VisitorResource::collection($visitor), 'success' => 'true'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $visitor = Visitor::create($request->all);
        return response([ 'data' => VisitorResource::collection($visitor), 'success' => 'true'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($agency)
    {
        $visitor = Visitor::all()->where('agency', $agency );

        return response([ 'data' => VisitorResource::collection($visitor), 'success' => 'true'], 200);
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
        $visitor = Visitor::find($id);
        $visitor->update($request->all());

        return response([ 'data' => VisitorResource::collection($visitor), 'success' => 'true'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visitor = Visitor::destroy($id);
        return response([ 'data' => VisitorResource::collection($visitor), 'success' => 'true'], 200);
    }

    public function showbydate()
    {
        $visitor = Visitor::whereDate('arrivedtime', Carbon::today())->get();

        return response([ 'data' => VisitorResource::collection($visitor), 'success' => 'true'], 200);
    }

}

