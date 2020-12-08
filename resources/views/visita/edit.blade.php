@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container"  style="
width:30%">
    <h1>editar de Visitante</h1>
    <form method="POST" action="{{ route('visita.update',['visitum'=>$visita->id]) }}">
        @csrf
        {{ method_field('PUT') }}
        <label for="formGroupExampleInput">Documento:</label>
        <input type="number" name="documento" value="{{ $visita->documento }}" class="form-control" id="formGroupExampleInput" placeholder="Digite el documento">
        <label for="formGroupExampleInput">Nombre:</label>
        <input type="text" name="nombre" value="{{ $visita->nombre }}" class="form-control" id="formGroupExampleInput" placeholder="Digite el nombre">
        <label for="formGroupExampleInput">Telefono:</label>
        <input type="number" name="telefono" value="{{ $visita->telefono }}" class="form-control" id="formGroupExampleInput" placeholder="Digite el telefono">
        <label for="formGroupExampleInput">Dependencia:</label>
        <input type="text" name="dependencia" value="{{ $visita->dependencia }}" class="form-control" id="formGroupExampleInput" placeholder="Digite la dependencia">
        <label for="formGroupExampleInput">Fecha:</label>
        <input type="text" value="{{ $visita->fecha_visita }}" class="form-control" id="formGroupExampleInput" name="fecha_visita"><br>
        <input type="submit" name="Guardar" class="btn btn-primary">
        <a href="{{ route('visita.index') }}"><button type="button" class="btn btn-danger">Cancelar</button></a>
    </form>
</div>
</body>
</html>
@endsection