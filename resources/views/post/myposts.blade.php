@extends('layouts.app')
@section('title','Mis Propuestas')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>Mis propuestas 
                <a href="{{ route('post.create') }}" class="pull-right clearfix">
                    <button class="btn btn-primary"><i class="fa fa-plus"></i> Crear propuesta</button>
                </a>
            </h1>
            <hr>
            @foreach($posts as $post)
            <div class="panel panel-success">
                <div class="panel-heading"><h1>{{$post->titulo}}</h1></div>
                <div class="panel-body">
                    <h2>{{$post->contenido}}</h2>
                    <div class="info">
                        Propuesta enviada por {{$post->user->nombre}} {{$post->user->apellido}}  | {{$post->created_at}}.
                    </div>
                </div>
                <div class="panel-footer">
                    <a class="btn btn-warning" href="{{route('post.edit',$post->id)}}"><i class="fa fa-edit"></i></a>
                	<a class="btn btn-danger" href="{{route('post.destroy',$post->id)}}" onclick="return confirm('Estas seguro?');"><i class="fa fa-trash"></i></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
