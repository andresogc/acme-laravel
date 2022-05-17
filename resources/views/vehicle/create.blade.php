@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{route('vehicles.store')}}" method="POST" >
        @csrf
        @include('vehicle.form',['mode'=>'Crear'])

    </form>
</div>
@endsection
