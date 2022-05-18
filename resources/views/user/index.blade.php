@extends('layouts.app')
@section('content')
<div class="container">



        @if (Session::has('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
           <h3> {{Session::get('message')}}</h3>
        </div>
        @endif

    <div>
        <h3>Usuarios</h3>
    </div>

    <a href="{{route('users.create')}}" class="btn btn-success mb-3">Crear un usuario</a>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">Cédula </th>
                <th scope="col">Nombres</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Direccion</th>
                <th scope="col">Telefono</th>
                <th scope="col">Vehiculo Asignado</th>
                <th scope="col">Rol</th>
                <th scope="col">Ciudad</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->cedula }}</td>
                    <td>{{$user->primer_nombre}} {{$user->segundo_nombre}}</td>
                    <td>{{$user->primer_apellido}} {{$user->segundo_apellido}}</td>
                    <td>{{$user->direccion}}</td>
                    <td>{{$user->telefono}}</td>
                    <td>{{$user->assigned}}</td>
                    <td>{{$user->role->nombre}}</td>
                    <td>{{$user->city->nombre}}</td>
                    <td>
                        <a class="btn btn-warning" href="{{route('users.edit',['user'=>$user->id])}}">
                            Editar
                        </a>
                        <form class="d-inline" action="{{route('users.destroy',['user'=>$user->id])}}" method="POST">
                            @csrf
                            {{method_field('DELETE')}}
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Esta seguro de eliminar este registro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
    {!!$users->links()!!}
</div>
@endsection
