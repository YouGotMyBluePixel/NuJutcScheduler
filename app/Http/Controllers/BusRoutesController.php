<?php

namespace App\Http\Controllers;
use App\Models\BusRoutes;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;

class BusRoutesController extends Controller
{
    public function index()
    {
        $data = BusRoutes::all();
        return Inertia::render('BusRoutes', ['data' => $data]);
    }
    public function getroutes()
    {
        $BusRoutes = BusRoutes::get();
        return $BusRoutes;
    }
    public function updatebus(Request $request)
    {
        $id = $request->get('id');
        $BusRoute1=$request->get('busroute1');
        $BusRoute2=$request->get('busroute2');
        $Description=$request->get('description');
        $Price=$request->get('price');
        $Time=$request->get('time');

        return BusRoutes::updateOrCreate(
            ['id'=>$id],
            [
            'id'=>$id,
            'busroute1' =>$BusRoute1,
            'busroute2' => $BusRoute2,
            'description' => $Description,
            'price' => $Price,
            'time' => $Time,
            
            ]);
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'busroute1' => ['required'],
            'busroute2' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
        ])->validate();
  
        BusRoutes::create($request->all());
  
        return redirect()->back()
                    ->with('message', 'BusRoutes Created Successfully.');
    }
    public function update(Request $request)
    {
        Validator::make($request->all(), [
            'title' => ['required'],
            'body' => ['required'],
        ])->validate();
  
        if ($request->has('id')) {
            BusRoutes::find($request->input('id'))->update($request->all());
            return redirect()->back()
                    ->with('message', 'BusRoutes Updated Successfully.');
        }
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function destroy(Request $request)
    {
        if ($request->has('id')) {
            BusRoutes::find($request->input('id'))->delete();
            return redirect()->back();
        }
    }
  
}
