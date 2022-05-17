<form action="{{route('vehicles.update',['vehicle'=>$vehicle->id])}}" method="POST">
    @csrf
    {{method_field('PATCH')}}
    @include('vehicle.form',['mode'=>'Editar'])
</form>
