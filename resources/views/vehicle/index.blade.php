@extends('layouts.app')
@section('content')
<div class="container">



        @if (Session::has('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
           <h3> {{Session::get('message')}}</h3>
        </div>
        @endif



    <a href="{{route('vehicles.create')}}" class="btn btn-success mb-3">Crear un vehiculo</a>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
            <th scope="col">Placa</th>
            <th scope="col">Color</th>
            <th scope="col">Marca</th>
            <th scope="col">Tipo</th>
            <th scope="col">Propietario</th>
            <th scope="col">Conductor</th>
            <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vehicles as $vehicle)
                <tr>
                    <td>{{$vehicle->placa}}</td>
                    <td>{{$vehicle->color}}</td>
                    <td>{{$vehicle->marca}}</td>
                    <td>{{$vehicle->tipo}}</td>
                    <td>{{$vehicle->userPropietario->primer_nombre}} {{$vehicle->userPropietario->primer_apellido}}</td>
                    <td>{{$vehicle->userConductor->primer_nombre}} {{$vehicle->userConductor->primer_apellido}}</td>
                    <td>
                        <a class="btn btn-warning" href="{{route('vehicles.edit',['vehicle'=>$vehicle->id])}}">
                            Editar
                        </a>
                        <form class="d-inline" action="{{route('vehicles.destroy',['vehicle'=>$vehicle->id])}}" method="POST">
                            @csrf
                            {{method_field('DELETE')}}
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Esta seguro de eliminar este registro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
    {!!$vehicles->links()!!}
</div>
@endsection
