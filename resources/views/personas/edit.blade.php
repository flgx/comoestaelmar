@extends('layouts.app')
@section('title','Editar Usuario: '. $user->name)

@section('content')
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1>Mi perfil</h1>
                <hr>
            	{!! Form::open(['route' => ['user.update',$user->id],'method' => 'PUT']) !!}

            		<div class="form-group">
            			{!! Form::label('nombre','Nombre') !!}
            			{!! Form::text('nombre', $user->nombre,['class'=> 'form-control','placeholder'=>'Ingresar Nombre','required']) !!}
            		</div>
            		<div class="form-group">
            			{!! Form::label('apellido','Apellido') !!}
            			{!! Form::text('apellido', $user->apellido,['class'=> 'form-control','placeholder'=>'Ingresar Apellido','required']) !!}
            		</div>
            		<div class="form-group">
            			{!! Form::label('telefono','Telefono') !!}
            			{!! Form::text('telefono', $user->telefono,['class'=> 'form-control','placeholder'=>'Ingresar Telefono','required']) !!}
            		</div>
            		<div class="form-group">
            			{!! Form::label('email','E-mail') !!}
            			{!! Form::email('email', $user->email,['class'=> 'form-control','placeholder'=>'youremail@gmail.com','required']) !!}
            		</div>
                    @if(Auth::user()->type == 'admin')
            		<div class="form-group">
            			{!! Form::label('type','User Type') !!}
            			{!! Form::select('type',[''=>'Select type of user','member'=> 'Member','admin' => 'Administrator'],$user->type,['class'=> 'form-control','required']) !!}
            		</div>
                    @endif
            		<div class="form-group">
            			{!! Form::submit('Editar Usuario',['class'=>'btn btn-primary']) !!}
            		</div>

            	{!! Form::close() !!}
            </div>
        </div>
        <!-- /.row -->


@endsection