@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crear Cliente</title>
</head>
<body>
    <div class="container"  style="
width:30%">

<h1>Agregar Factura</h1>
    <form method="POST" action="{{route('factura.store')}}">
        @csrf
        <label for="formGroupExampleInput">Codigo:</label>
        <input readonly type="text" name="codigo"  class="form-control" value="FAC{{ $num }}"><br>
        <label for="formGroupExampleInput">Cliente:</label>
        <select name="cliente_id" id="cliente" class="form-control" required>
            <option></option>
            @foreach ($cliente as $c)
                <option value="{{ $c->id }}">{{ $c->nombre }}</option>
            @endforeach
        </select><br>
        <label for="formGroupExampleInput">Vendedor:</label>
        <select name="vendedor_id" id="vendedor" class="form-control" required>
            <option></option>
            @foreach ($user as $u)
                <option value="{{ $u->id }}">{{ $u->name }}</option>
            @endforeach
        </select><br>
        <label for="formGroupExampleInput">Fecha:</label>
        <input type="datetime-local" name="fecha" id="fecha" class="form-control" placeholder="Digite el Fecha"><br>
        <input type="submit" name="Agregar" class="btn btn-primary">
        <a href="{{ route('factura.index') }}"><button type="button" class="btn btn-danger">Cancelar</button></a>
    </form>
    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
<script src="{{asset('js/cookie.js')}}"></script>
    
</body>
</html>
@endsection
