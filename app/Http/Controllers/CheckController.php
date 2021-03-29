<?php

namespace App\Http\Controllers;

use App\Check;
use App\Http\Resources\CheckResource;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Car;
use App\Visitor;
use App\Staff;

class CheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $check = Check::with('staff','car', 'visitor')->get();

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
        $check = Check::create($request->all());
        $visitor_id = $request->get('visitor_id');
        $staff_id = $request->get('staff_id');
        $car_id = $request->get('car_id');

        if($visitor_id !== null){

            $type = $request->get('type');

            if ($type === 'checked-in'){
                $data = array(
                    'status' => 'checked-in',
                );
                $visitor = Visitor::where('id',$request->get('visitor_id'));
                $result = $visitor->update($data);
                return response()->json($result,200);
            }
            else
            {
                $data =array(
                    'status' => 'checked-out',
                );
                $visitor = Visitor::where('id',$request->get('visitor_id'));
                $result = $visitor->update($data);
                return response()->json($result,200);
            }

        }elseif($staff_id !== null){

            $type = $request->get('type');

            if ($type === 'checked-in'){
                $data = array(
                    'status' => 'checked-in',
                );
                $staff = Staff::where('id',$request->get('staff_id'));
                $result = $staff->update($data);
                return response()->json($result,200);
            }
            else
            {
                $data =array(
                    'status' => 'checked-out',
                );
                $staff = Staff::where('id',$request->get('staff_id'));
                $result = $staff->update($data);
                return response()->json($result,200);
            }
        }elseif($car_id !== null) {

            $type = $request->get('type');

            if ($type === 'checked-in'){
                $data = array(
                    'status' => 'checked-in',
                );
                $car = Car::where('id',$request->get('car_id'));
                $result = $car->update($data);
                return response()->json($result,200);
            }
            else
            {
                $data =array(
                    'status' => 'checked-out',
                );
                $car = Car::where('id',$request->get('car_id'));
                $result = $car->update($data);
                return response()->json($result,200);
            }
        }  
        
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
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }

    public function showbydate()
    {
        $check = Check::with('staff', 'visitor' , 'car')->whereDate('time', Carbon::today())->get();

        return response([ 'data' => CheckResource::collection($check), 'success' => 'true'], 200);
    }


    public function checkcount()
    {
        $count = Check::count();
        return $count;
    }
}
