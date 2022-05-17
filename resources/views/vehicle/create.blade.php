<form action="{{route('vehicles.store')}}" method="POST" >
    @csrf
    @include('vehicle.form',['mode'=>'Crear'])

</form>
