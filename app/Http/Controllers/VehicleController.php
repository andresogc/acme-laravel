<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\User;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::paginate(1);

       
        return view('vehicle.index',compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::All();
        return view('vehicle.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = [
            'placa'=>'required|string|max:50|unique:vehicles',
            'color'=>'required|string|max:50',
            'marca'=>'required|string|max:100',
            'tipo'=>'required',
            'propietario_id'=>'required',
            'conductor_id'=>'required',

        ];
        $message=[
            'required'=>'El :attribute es requerido',
            'color.required'=>'El color es requerido',
            'marca.required'=>'La marca es requerido',
        ];

        $this->validate($request, $fields,$message);

        $vehicle = request()->except('_token');
        Vehicle::insert($vehicle);

        return redirect('vehicles')->with('message','Vehículo agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $users = User::All();
        return view('vehicle.edit',compact('vehicle','users'));
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
        $fields = [
            'placa'=>'required|string|max:50|unique:vehicles',
            'color'=>'required|string|max:50',
            'marca'=>'required|string|max:100',
            'tipo'=>'required',
            'propietario_id'=>'required',
            'conductor_id'=>'required',

        ];
        $message=[
            'required'=>'El :attribute es requerido',
            'color.required'=>'El color es requerido',
            'marca.required'=>'La marca es requerido',
        ];

        $this->validate($request, $fields,$message);

        $vehicle = request()->except('_token','_method');
        Vehicle::where('id',$id)->update($vehicle);

        $vehicle=Vehicle::findOrFail($id);

        return redirect('vehicles')->with('message','Vehículo modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Vehicle::destroy($id);
        return redirect('vehicles')->with('message','Vehículo eliminado');
    }
}
