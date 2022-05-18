<h1>{{$mode}} Usuario</h1>


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
    <label for="">cedula</label>
    <input class="form-control" type="number" name="cedula" value="{{isset($user->cedula )?$user->cedula :old('cedula')}}">
</div>
<div class="form-group">
    <label for="">Primer nombre</label>
    <input class="form-control" type="text" name="primer_nombre" value="{{isset($user->primer_nombre)?$user->primer_nombre:old('primer_nombre')}}">
</div>
<div class="form-group">
    <label for="">Segundo nombre</label>
    <input class="form-control" type="text" name="segundo_nombre" value="{{isset($user->segundo_nombre)?$user->segundo_nombre:old('segundo_nombre')}}">
</div>
<div class="form-group">
    <label for="">primer_apellido</label>
    <input class="form-control" type="text" name="primer_apellido" value="{{isset($user->primer_apellido)?$user->primer_apellido:old('primer_apellido')}}">
</div>
<div class="form-group">
    <label for="">Segundo apellido</label>
    <input class="form-control" type="text" name="segundo_apellido" value="{{isset($user->segundo_apellido)?$user->segundo_apellido:old('segundo_apellido')}}">
</div>
<div class="form-group">
    <label for="">Dirección</label>
    <input class="form-control" type="text" name="direccion" value="{{isset($user->direccion)?$user->direccion:old('direccion')}}">
</div>
<div class="form-group">
    <label for="">Teléfono</label>
    <input class="form-control" type="number" name="telefono" value="{{isset($user->telefono)?$user->telefono:old('telefono')}}">
</div>
<div class="form-group">
    <label for="">Rol</label>
    <select class="form-control" name="role_id" >
        <option value="{{null}}">Seleccione una opción</option>
            @foreach ($roles as $rol)
                    <option value="{{$rol->id}}" {{isset($user->role_id) && $user->role_id == $rol->id ?'selected':'' }} >{{$rol->nombre}}</option>
            @endforeach
    </select>
</div>
<div class="form-group">
    <label for="">City</label>
    <select class="form-control" name="city_id">
        <option value="{{null}}">Seleccione una opción</option>
            @foreach ($cities as $city)
                    <option value="{{$city->id}}" {{isset($user->city_id) && $user->city_id == $city->id ?'selected':'' }}>{{$city->nombre}}</option>
            @endforeach
    </select>

</div>

<button class="btn btn-success mt-3" type="submit"  id="enviar">{{$mode}}</button>

<a class="btn btn-primary mt-3" href="{{route('users.index')}}">Regresar</a>
