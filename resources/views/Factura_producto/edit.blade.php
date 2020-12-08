@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
</head>
<body>
    <div class="container"  style="
width:30%">
<h1>editar de Producto</h1>
    <form method="POST" action="{{route('producto.update', ['producto'=>$producto->id])}}">
        @csrf
        {{method_field('PUT')}}
        <label for="formGroupExampleInput">Código:</label>
        <input type="text" name="codigo" class="form-control" value="{{$producto->codigo}}"><br>
        <label for="formGroupExampleInput">Nombre:</label>
        <input type="text" name="nombre" class="form-control" value="{{$producto->nombre}}"><br>
        <label for="formGroupExampleInput">Proveedor:</label>
        <select name="proveedor_id" class="form-control" required>
            
            @foreach ($proveedor as $p)>
                <option  {{ (($producto->proveedor_id==$p->id)?"selected":"") }} value="{{ $p->id }}">{{ $p->nombre }}</option>
            @endforeach
        </select><br>
        <label for="formGroupExampleInput">Precio:</label>
        <input type="number" name="precio" class="form-control" value="{{$producto->precio}}"><br>
        <label for="formGroupExampleInput">Cantidad:</label>
        <input type="text" name="cantidad" class="form-control" value="{{$producto->cantidad}}"><br>
        <input type="submit" name="Enviar" class="btn btn-primary">
        <a href="{{ route('producto.index') }}"><button type="button" class="btn btn-danger">Cancelar</button></a>

    </form>

</div>  
</body>
</html>
@endsection