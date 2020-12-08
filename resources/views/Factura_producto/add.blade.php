@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crear Producto</title>
</head>
<body>
    <div class="container"  style="
width:30%">
<h1>Add de Producto</h1>
    <form method="POST" action="{{route('producto.store')}}">
        @csrf
        <label for="formGroupExampleInput">Código:</label>
        <input type="text" name="codigo" class="form-control" placeholder="Digite el Código"><br>
        <label for="formGroupExampleInput">Nombre:</label>
        <input type="text" name="nombre" class="form-control" placeholder="Digite el Nombre"><br>
        <label for="formGroupExampleInput">Proveedor:</label>
        <select name="proveedor_id" class="form-control" required>
            <option></option>
            @foreach ($proveedor as $p)
                <option value="{{ $p->id }}">{{ $p->nombre }}</option>
            @endforeach
        </select><br>
        <label for="formGroupExampleInput">Precio:</label>
        <input type="number" name="precio" class="form-control" placeholder="Digite el Precio"><br>
        <label for="formGroupExampleInput">Cantidad:</label>
        <input type="text" name="cantidad" class="form-control" placeholder="Digite la Cantidad"><br>
        <input type="submit" name="Agregar" class="btn btn-primary">
        <a href="{{ route('producto.index') }}"><button type="button" class="btn btn-danger">Cancelar</button></a>
    </form>

    
</body>
</html>
@endsection
