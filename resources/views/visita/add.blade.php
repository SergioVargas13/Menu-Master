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
    <h1>Add de Visitante</h1>
    <div class="form-group">
    <form method="POST" action="{{ route('visita.store')}}">
        @csrf
        <label for="formGroupExampleInput">Documento:</label>
        <input type="number" name="documento" class="form-control" id="formGroupExampleInput" placeholder="Digite el documento"><br>
        <label for="formGroupExampleInput">Nombre:</label>
        <input type="text" name="nombre" placeholder="Digite el nombre" class="form-control" id="formGroupExampleInput"><br>
        <label for="formGroupExampleInput">Telefono:</label>
        <input type="number" name="telefono" placeholder="Digite el telefono" class="form-control" id="formGroupExampleInput"><br>
        <label for="formGroupExampleInput">Dependencia:</label>
        <input type="text" name="dependencia" placeholder="Digite la dependencia" class="form-control" id="formGroupExampleInput"><br>
        <label for="formGroupExampleInput">Fecha:</label>
        <input type="datetime-local" name="fecha_visita" class="form-control" id="formGroupExampleInput"><br>
        <input type="submit" name="Guardar" class="btn btn-primary">
        <a href="{{ route('visita.index') }}"><button type="button" class="btn btn-danger">Cancelar</button></a>
    </form>
    </div>
    </div>
</body>
</html>
@endsection
