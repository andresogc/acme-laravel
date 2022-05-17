@if (Session::has('message'))
    {{Session::get('message')}}
@endif

<a href="{{route('vehicles.create')}}">Crear un vehiculo</a>

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
                <td>{{$vehicle->propietario_id}}</td>
                <td>{{$vehicle->conductor_id}}</td>
                <td>
                    <a href="{{route('vehicles.edit',['vehicle'=>$vehicle->id])}}">
                        Editar
                    </a>
                    <form action="{{route('vehicles.destroy',['vehicle'=>$vehicle->id])}}" method="POST">
                        @csrf
                        {{method_field('DELETE')}}
                        <button type="submit" onclick="return confirm('Esta seguro de eliminar este registro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach


      </tbody>
  </table>
