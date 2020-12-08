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
    <h1>editar Curso</h1>
    <form method="POST" action="{{ route('curso.update',['curso'=>$curso->id]) }}">
        @csrf
        {{ method_field('PUT') }}
        <label for="formGroupExampleInput">Nombre Curso:</label>
        <input type="text" name="nombre" value="{{ $curso->nombre }}" class="form-control" id="formGroupExampleInput"><br>
        <label for="formGroupExampleInput">Instructor Lider:</label>
        <input type="text" name="instructor_lider" value="{{ $curso->instructor_lider }}" class="form-control" id="formGroupExampleInput"><br>
        <label for="formGroupExampleInput">Fecha Inicio:</label>
        <input type="text" value="{{ $curso->fecha_inicio }}" name="fecha_inicio" class="form-control" id="formGroupExampleInput"><br>
        <label for="formGroupExampleInput">Fecha Fin:</label>
        <input type="text" value="{{ $curso->fecha_fin }}" name="fecha_fin" class="form-control" id="formGroupExampleInput"><br>
        <input type="submit" name="Guardar" class="btn btn-primary">
        <a href="{{ route('curso.index') }}"><button type="button" class="btn btn-danger">Cancelar</button></a
    </form>
</div>
</body>
</html>
@endsection