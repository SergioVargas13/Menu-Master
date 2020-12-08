@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
</head>
<body>
    <div class="container"  style="
width:30%">
<h1>editar de Cliente</h1>
    <form method="POST" action="{{route('factura.update', ['factura'=>$factura->id])}}">
        @csrf
        {{method_field('PUT')}}
        <label for="formGroupExampleInput">Codigo:</label>
        <input readonly type="text" name="codigo"  class="form-control" value="{{$factura->codigo}}"><br>
        <label for="formGroupExampleInput">Cliente:</label>
        <select name="cliente_id" class="form-control" required>
            @foreach ($cliente as $c)
                <option value="{{ $c->id }}">{{ $c->nombre }}</option>
            @endforeach
        </select><br>
        <label for="formGroupExampleInput">Vendedor:</label>
        <select name="vendedor_id" id="vendedor" class="form-control" required>
            @foreach ($user as $u)
                <option value="{{ $u->id }}">{{ $u->name }}</option>
            @endforeach
        </select><br>
        <label for="formGroupExampleInput">Fecha:</label>
        <input type="datetime-local" name="fecha" class="form-control" placeholder="Digite el Fecha"><br>
        <input type="submit" name="Agregar" class="btn btn-primary">
        <a href="{{ route('factura.index') }}"><button type="button" class="btn btn-danger">Cancelar</button></a>

    </form>

</div>  
</body>
</html>
@endsection