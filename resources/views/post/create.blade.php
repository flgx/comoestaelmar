@extends('layouts.app')
@section('title','Crear Propuesta')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        <h1>Crear Propuesta</h1>
        <hr>
            <form action="{{ route('post.store') }}" method="POST">
                <div class="form-group">
                    <label for="titulo">Titulo</label>
                    <input type="text" name="titulo" class="form-control">
                </div>
                <div class="form-group">
                    <label for="contenido">Contenido</label>
                    <textarea name="contenido" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <button type="submit" class="btn btn-primary">Enviar propuesta</button>
            </form>
        </div>
    </div>
</div>
@endsection
