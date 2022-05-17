<h1>{{$mode}} Vehículo</h1>


@if (count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
    <label for="">placa</label>
    <input class="form-control" type="text" name="placa" value="{{isset($vehicle->placa)?$vehicle->placa:old('placa')}}">
</div>
<div class="form-group">
    <label for="">color</label>
    <input class="form-control" type="text" name="color" value="{{isset($vehicle->color)?$vehicle->color:old('color')}}">
</div>
<div class="form-group">
    <label for="">marca</label>
    <input class="form-control" type="text" name="marca" value="{{isset($vehicle->marca)?$vehicle->marca:old('marca')}}">
</div>
<div class="form-group">
    <label for="">tipo</label>
    <select class="form-control" name="tipo" >
        <option value="{{null}}">Seleccione una opción</option>
        <option value="Particular" {{isset($vehicle->tipo) && $vehicle->tipo =='Particular'?'selected':''}} >Particular</option>
        <option value="Publico" {{ isset($vehicle->tipo)&& $vehicle->tipo =='Publico'?'selected':''}}>Público</option>
    </select>
</div>
<div class="form-group">
    <label for="">propietario</label>
    <select class="form-control" name="propietario_id">
        <option value="{{null}}">Seleccione una opción</option>
            @foreach ($users as $user)
                @if ($user->role_id == 1 )
                    <option value="{{$user->id}}">{{$user->primer_nombre}} {{$user->primer_apellido}}</option>
                @endif
            @endforeach
    </select>
<label for="">conductor</label>
</div>
<div class="form-group">
    <select class="form-control" name="conductor_id">
        <option value="{{null}}">Seleccione una opción</option>
        @foreach ($users as $user)
        @if ($user->role_id == 2 && $user->assigned == 'No asignado')
            <option value="{{$user->id}}" {{isset($vehicle->conductor_id) && $vehicle->conductor_id == $user->id ? 'selected' :''}}    >{{$user->primer_nombre}} {{$user->primer_apellido}}</option>
        @endif
    @endforeach
    </select>
</div>

<button class="btn btn-success mt-3" type="submit"  id="enviar">{{$mode}}</button>


<a class="btn btn-primary mt-3" href="{{route('vehicles.index')}}">Regresar</a>
