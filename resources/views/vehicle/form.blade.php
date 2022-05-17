<h1>{{$mode}} Vehículo</h1>

<label for="">placa</label>
<input type="text" name="placa" value="{{isset($vehicle->placa)?$vehicle->placa:''}}">
<label for="">color</label>
<input type="text" name="color" value="{{isset($vehicle->color)?$vehicle->placa:''}}">
<label for="">marca</label>
<input type="text" name="marca" value="{{isset($vehicle->marca)?$vehicle->placa:''}}">
<label for="">tipo</label>
<select name="tipo" >
    <option value="Particular">Particular</option>
    <option value="Publico">Público</option>
</select>
<label for="">propietario</label>
<select name="propietario_id">
    <option value="1">aura</option>
    <option value="2">lina</option>
    </select>
<label for="">conductor</label>
<select name="conductor_id">
    <option value="3">tatiana</option>
    </select>
<button type="submit"  id="enviar">{{$mode}}</button>

<a href="{{route('vehicles.index')}}">Regresar</a>
