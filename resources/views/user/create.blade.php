@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{route('users.store')}}" method="POST" >
        @csrf
        @include('user.form',['mode'=>'Crear'])

    </form>
</div>
@endsection
