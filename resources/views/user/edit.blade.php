@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{route('users.update',['user'=>$user->id])}}" method="POST">
        @csrf
        {{method_field('PATCH')}}
        @include('user.form',['mode'=>'Editar'])
    </form>
</div>
@endsection
