@extends('layouts.app')
@section('title','Personas Involucradas')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>Personas Involucradas en el proyecto</h1>
            <hr>
            @foreach($users as $user)
            <div class="panel panel-success">
                <div class="panel-heading"><h3>{{$user->nombre}} {{$user->apellido}}</h3></div>
                <div class="panel-body">
                    <h4>En que puedo ayudar:</h4>
                    <p>{{$user->propuesta}}</p>
                </div>
                <div class="panel-footer">
                    <p>Telefono: {{ $user->telefono }} | Email: {{ $user->email }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center">{!!$users->render()!!}</div>
        
    </div>
</div>
@endsection
