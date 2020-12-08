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
    <h1>Add Curso</h1>
    <div class="form-group">
    <form method="POST" action="{{ route('curso.store')}}">
        @csrf
        <label for="formGroupExampleInput">Nombre Curso:</label>
        <input type="text" name="nombre" placeholder="Digite el nombre" class="form-control" id="formGroupExampleInput"><br>
        <label for="formGroupExampleInput">Instructor Lider:</label>
        <input type="text" name="instructor_lider" placeholder="Digite el Nombre" class="form-control" id="formGroupExampleInput"><br>
        <label for="formGroupExampleInput">Fecha Inicio:</label>
        <input type="datetime-local" name="fecha_inicio" class="form-control" id="formGroupExampleInput"><br>
        <label for="formGroupExampleInput">Fecha Fin:</label>
        <input type="datetime-local" name="fecha_fin" class="form-control" id="formGroupExampleInput"><br>
        <input type="submit" name="Guardar" class="btn btn-primary">
        <a href="{{ route('curso.index') }}"><button type="button" class="btn btn-danger">Cancelar</button></a>
    </form>
    </div>
    </div>
</body>
</html>
@endsection
