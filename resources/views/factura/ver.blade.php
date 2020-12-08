@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sena Web Php|2020</title>
</head>
<body >

    <div class="container" align="center"  style="
width:60%">
    <h1>Ver Factura</h1>
<a href="{{ route('factura.index') }}"><button type="button" class="btn btn-danger">Volver</button></a>
    <table class="table table-hover">
            <thead class="bg-info">
                <tr>
                    <td>Id</td>
                    <td>Numero Factura</td>
                    <td>Cliente</td>
                    <td>Vendedor</td>
                    <td>Fecha Factura</td>
                    <td>Total</td>
                    <td>Opciones</td>
                </tr>
            </thead>
            <tbody>
               <tr>
                <td>{{$factura->id}}</td>
                <td>{{$factura->codigo}}</td>
                @foreach ($cliente as $c)
                <td value="{{ $c->id }}">{{ $c->nombre }}</td>
            @endforeach
                @foreach ($user as $u)
                <td value="{{ $u->id }}">{{ $u->name }}</td>
            @endforeach
                <td>{{$factura->fecha}}</td>
                <td>{{$factura->total}}</td>
                <td>
                    <a class="btn btn-success" href="{{ route('producto.addProducto',['factura_id'=>$factura->id])}}">Add Productos</a>
                </td>

               </tr>
          </tbody>
        
    </table>
    <br>
    <h1>Lista de Productos</h1><br>
    <table class="table table-hover">
            <thead class="bg-info">
                <tr>
                    <td>Id</td>
                    <td>Codigo</td>
                    <td>Nombre</td>
                    <td>Proveedor</td>
                    <td>Precio</td>
                    <td>Cantidad</td>
                    <td>Opciones</td>
                </tr>
            </thead>
            <tbody>
               
               <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
              
          </tbody>
        
    </table>
    </div>
</body>
</html>
@endsection
