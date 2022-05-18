<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\City;
use App\Models\Role;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(3);
        return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::All();
        $roles = Role::All();
        return view('user.create', compact('cities','roles'));
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
            'cedula'=>'required|string|max:100',
            'primer_nombre'=>'required|string|max:100',
            'segundo_nombre'=>'string|max:100',
            'primer_apellido'=>'required|string|max:100',
            'segundo_apellido'=>'required|string|max:100',
            'direccion'=>'required|string|max:100',
            'telefono'=>'required|string|max:50',
            'role_id'=>'required',
            'city_id'=>'required',
        ];
        $message=[
            'required'=>'El :attribute es requerido',
            'role_id.required'=>'El rol es requerido',
            'city_id.required'=>'La ciudad es requerido',
        ];

        $this->validate($request, $fields,$message);

        $user = request()->except('_token');
        User::insert($user+['assigned' => $request->role_id == 1?'No aplica':'No asignado']);

        return redirect('users')->with('message','Usuario agregado con éxito');
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
        $user = User::findOrFail($id);
        $cities = City::All();
        $roles = Role::All();
        return view('user.edit',compact('user','roles','cities'));
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
            'cedula'=>'required|string|max:100',
            'primer_nombre'=>'required|string|max:100',
            'segundo_nombre'=>'string|max:100',
            'primer_apellido'=>'required|string|max:100',
            'segundo_apellido'=>'required|string|max:100',
            'direccion'=>'required|string|max:100',
            'telefono'=>'required|string|max:50',
            'role_id'=>'required',
            'city_id'=>'required',

        ];
        $message=[
            'required'=>'El :attribute es requerido',
            'role_id.required'=>'El rol es requerido',
            'city_id.required'=>'La ciudad es requerido',
        ];

        $this->validate($request, $fields,$message);

        $user = request()->except('_token','_method');
        User::where('id',$id)->update($user);

        return redirect('users')->with('message','Usuario modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('users')->with('message','User eliminado');
    }
}
