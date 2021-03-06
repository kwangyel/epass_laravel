<?php

namespace App\Http\Controllers;

use App\Http\Resources\StaffResource;
use App\Staff;
use Illuminate\Http\Request;
use App\Agency;
use App\General;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Staff::with('agency')->get();
        return response([ 'data' => StaffResource::collection($staff), 'success' => 'true'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $staff = Staff::create($request->all());
        return  $staff;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($agency_id)
    {
        $staff = Staff::all()->where('agency_id', $agency_id);
        return response([ 'data' => StaffResource::collection($staff), 'success' => 'true'], 200);
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
        $staff = Staff::find($id);
        $data = $request->all();
        $staff->update($data);
        return response()->json($staff,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff = Staff::destroy($id);
        return $staff;
    }


    public function agency(Staff $agency_id)
    {
        $staff = Staff::all()->where('agency_id', $agency_id);
        return response()->json($staff,200);
    }

    
    public function showbyrole()
    {
        $staff = Staff::all()->where('role','driver');
        return response([ 'data' => StaffResource::collection($staff), 'success' => 'true'], 200);
    }


    public function staffcount()
    {
        $count = Staff::count();
        return $count;
    }


}
