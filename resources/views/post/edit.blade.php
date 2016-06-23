@extends('layouts.app')
@section('title','Editar Propuesta')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        <h1>Editar Propuesta</h1>
        <hr>
            <form action="{{ route('post.update',$post->id) }}" method="post">
                <div class="form-group">
                    <label for="titulo">Titulo</label>
                    <input type="text" name="titulo" value="{{$post->titulo}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="contenido">Contenido</label>
                    <textarea name="contenido" id="" cols="30"  rows="10" class="form-control">{{$post->contenido}}</textarea>
                </div>
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <button type="submit" class="btn btn-primary">Editar propuesta</button>
            </form>
        </div>
    </div>
</div>
@endsection
